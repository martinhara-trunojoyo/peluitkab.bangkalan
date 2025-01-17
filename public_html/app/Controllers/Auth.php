<?php

namespace App\Controllers;

use App\Models\User_magang;
use App\Models\Otp;
use App\Models\User;

class Auth extends BaseController
{
  public function __construct()
  {
    date_default_timezone_set('Asia/Jakarta');
  }

  public function login()
  {
    if (is_null(session()->get('sslogin'))) {
      return view('auth/login');
    } else {
      return redirect()->to(session()->get('role') . "/dashboard");
    }
  }

  public function logout()
  {
    session()->destroy();
    return view('auth/login');
  }

  public function get_username()
  {
    $userModel = new User();
    $array = array('username' => $this->request->getVar('username'));
    $users = $userModel->where($array)->findAll();
    if (count($users) == 0) {
      $response = [
        'status' => 500,
        'message' => "Username Tidak Terdaftar."
      ];
    } else {
      $array = array('username' => $this->request->getVar('username'), 'active' => 1);
      $users = $userModel->where($array)->first();

      if ($users != null) {
        $otpModel = new Otp();
        $array = array('id_ssuser' => $users["id_ssuser"], 'active' => 0);
        $otp = $otpModel->where($array)->first();

        $exp = date("Y-m-d H:i:s", strtotime("+3 minutes"));

        if ($otp != null) {
          $data = [
            'kode_otp' => $this->request->getVar('otp'),
            'exp_date' => $exp,
          ];
          $otpModel->update($otp["id_otp"], $data);
        } else {
          $data = [
            'kode_otp' => $this->request->getVar('otp'),
            'exp_date' => $exp,
            'id_ssuser' => $users["id_ssuser"],
            'active' => 0,
          ];
          $otpModel->insert($data);
        }

        $message = "Silahkan gunakan Kode OTP ini untuk dapat login. \n\nKode OTP : " . $this->request->getVar('otp');
        helper('notification_helper');
        $hasil = telegram($users["id_chat"], $message);
        if ($hasil->ok == true) {
          $response = [
            'status' => 200,
            'hasil' => $hasil,
            'message' => "Berhasil.",
          ];
        } else {
          $response = [
            'status' => 500,
            'message' => "Gagal.",
            'hasil' => $hasil->result,
          ];
        }
      } else {
        $array = array('username' => $this->request->getVar('username'), 'active' => 3);
        $users = $userModel->where($array)->first();
        if ($users != null) {
          $response = [
            'status' => 500,
            'message' => "Akun Masih Dalam Proses Verifikasi."
          ];
        } else {
          $response = [
            'status' => 500,
            'message' => "Akun Sudah Dinon-aktifkan."
          ];
        }
      }
    }
    echo json_encode($response);
  }

  public function get_login()
  {
    $userModel = new User();
    $array = array('username' => $this->request->getVar('username'), 'active' => 1);
    $users = $userModel->where($array)->first();

    $otpModel = new Otp();
    $array = array('id_ssuser' => $users["id_ssuser"], 'active' => 0);
    $otp = $otpModel->where($array)->first();

    if ($otp["kode_otp"] == $this->request->getVar('pin')) {
      $date = date("Y-m-d H:i:s");
      if ($date <= $otp["exp_date"]) {
        $data = [
          'active' => 1,
        ];
        $otpModel->update($otp["id_otp"], $data);

        if ($users["role_id"] == 0) {
          $role = "admin";
        } elseif ($users["role_id"] == 1) {
          $role = "operator";
        } elseif ($users["role_id"] == 2) {
          $role = "verifikator";
        } elseif ($users["role_id"] == 3) {
          $role = "pembimbing";
        } else {
          $role = "user";
        }

        $sessionData = [
          'sslogin' => true,
          'id_user' => $users["id_ssuser"],
          'nama' => $users["username"],
          'id_role' => $users["role_id"],
          'id_opd' => $users["id_opd"],
          'foto' => $users["file_foto"],
          'role' => $role,
        ];

        session()->set($sessionData);

        $response = [
          'status' => 200,
          'message' => "Berhasil.",
        ];
      } else {
        $response = [
          'status' => 500,
          'message' => "Kode OTP Kadaluarsa. Silahkan Kirim Ulang OTP untuk memperbaharui."
        ];
      }
    } else {
      $response = [
        'status' => 500,
        'message' => "Kode OTP Salah.",
      ];
    }

    echo json_encode($response);
  }

  public function register()
  {
    $userModel = new User();

    $array = array('username' => $this->request->getVar('nim'));
    $users = $userModel->where($array)->findAll();

    if (count($users) == 0) {
      $tgl = date("Y-m-d H:i:s");

      $data = [
        'nama' => $this->request->getVar('nama'),
        'username'    => $this->request->getVar('nim'),
        'id_chat'    => $this->request->getVar('id_chat'),
        'nik'    => $this->request->getVar('nik'),
        'role_id'    => 4,
        'active'    => 3,
        'tgl_input'    => $tgl,
        'file_foto'    => "default.png",
      ];

      $userModel->insert($data);
      $id = $userModel->getInsertID();

      $dataBerkas = $this->request->getFile('foto');
      $fileName = md5($id) . "." . $dataBerkas->guessExtension();
      $fileName = str_replace(" ", "", $fileName);
      $dataBerkas->move('./public/assets/image/avatar', $fileName);
      $data = [
        'file_foto' => $fileName,
      ];
      $userModel->update($id, $data);

      $dataBerkass = $this->request->getFile('ktp');
      $fileNames = md5($id) . "." . $dataBerkass->guessExtension();
      $fileNames = str_replace(" ", "", $fileNames);
      $dataBerkass->move('./public/assets/berkas/ktp', $fileNames);

      $magangModel = new User_magang();
      $data = [
        'id_ssuser' => $id,
        'gender'    => $this->request->getVar('jk'),
        'wa'    => $this->request->getVar('wa'),
        'jenis'    =>  $this->request->getVar('pekerjaan'),
        'nomor_induk'    =>  $this->request->getVar('nim'),
        'jurusan'    =>  $this->request->getVar('jurusan'),
        'civitas'    =>  $this->request->getVar('univ'),
        'ktp'    =>  $fileNames,
      ];
      $magangModel->insert($data);


      // NOTIFIKASI TO ADMIN
      $db = \Config\Database::connect();
      $builder = $db->table('ssuser')->select('ssuser.id_chat')->where("ssuser.active", 1)->where("ssuser.role_id", 0)->get()->getResult();

      foreach ($builder as $row) {
        $message = "Haloo Admin.
                \nAyo login, ada permohonan pembuatan akun yang harus kamu verifikasi. \nNama : " . $this->request->getVar('nama') . "\nCivitas : " . $this->request->getVar('univ');
        helper('notification_helper');
        $hasil = telegram($row->id_chat, $message);
      }

      $response = [
        'status' => 200,
        'message' => "Silahkan menunggu akun anda untuk diverifikasi. Pemberitahuan verifikasi akan dikirim melalui telegram."
      ];
    } else {
      $array = array('username' => $this->request->getVar('nim'), 'active' => 1);
      $users = $userModel->where($array)->first();

      if ($users != null) {
        $response = [
          'status' => 500,
          'message' => "Username telah terdaftar dan berstatus aktif."
        ];
      } else {
        $array = array('username' => $this->request->getVar('nim'), 'active' => 0);
        $users = $userModel->where($array)->first();

        if ($users != null) {
          $response = [
            'status' => 500,
            'message' => "Username telah terdaftar dan berstatus non-aktif."
          ];
        } else {
          $response = [
            'status' => 500,
            'message' => "Akun Masih Dalam Proses Verifikasi."
          ];
        }
      }
    }



    echo json_encode($response);
  }

  public function send_otp()
  {
    if (is_null(session()->get('count_otp'))) {
      $sessionData = [
        'count_otp' => 1,
      ];

      session()->set($sessionData);

      $message = "Silahkan gunakan Kode OTP ini untuk daftar. \n\nKode OTP : " . $this->request->getVar('otp');
      helper('notification_helper');
      $hasil = telegram($this->request->getVar('id_chat'), $message);
      if ($hasil->ok == true) {
        $response = [
          'status' => 200,
          'hasil' => $hasil,
          'message' => "Berhasil.",
        ];
      } else {
        $response = [
          'status' => 500,
          'message' => "Gagal.",
          'hasil' => $hasil->result,
        ];
      }
    } else {
      $count = (int) session()->get('count_otp');
      if ($count > 3) {
        $response = [
          'status' => 500,
          'message' => "Gagal.",
          'hasil' => "Anda Terlalu Sering Mengirim OTP. Silahkan coba lagi 2 jam kemudian.",
        ];
      } else {
        $sessionData = [
          'count_otp' => $count + 1,
        ];

        session()->set($sessionData);

        $message = "Silahkan gunakan Kode OTP ini untuk daftar. \n\nKode OTP : " . $this->request->getVar('otp');
        helper('notification_helper');
        $hasil = telegram($this->request->getVar('id_chat'), $message);
        if ($hasil->ok == true) {
          $response = [
            'status' => 200,
            'hasil' => $hasil,
            'message' => "Berhasil.",
          ];
        } else {
          $response = [
            'status' => 500,
            'message' => "Gagal.",
            'hasil' => $hasil->result,
          ];
        }
      }
    }
    echo json_encode($response);
  }
}
