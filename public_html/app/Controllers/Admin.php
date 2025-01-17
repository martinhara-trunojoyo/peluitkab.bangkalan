<?php

namespace App\Controllers;

use App\Models\Pelayanan;
use App\Models\Otp;
use App\Models\User;
use App\Models\Opd;
use App\Models\Verifikator;
use App\Models\Peralatan;
use App\Models\Aula;
use App\Models\Sub;
use App\Models\Faq;

use App\Models\Tiket;

use App\Models\User_pembimbing;

class Admin extends BaseController
{
    public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
    }
    
    public function index()
    {
        $db = \Config\Database::connect();
        $count_verifikator = $db->table('ssuser')->where('ssuser.role_id', 2)->where('ssuser.active', 1)->countAllResults();
        $count_operator = $db->table('ssuser')->where('ssuser.role_id', 1)->where('ssuser.active', 1)->countAllResults();
        $count_magang = $db->table('ssuser')->where('ssuser.role_id', 4)->where('ssuser.active', 1)->countAllResults();
        $count_all = $db->table('ssuser')->where('ssuser.active', 1)->countAllResults();
        
        $role = "";
        if(session()->get('id_role')==0){
            $role = "Admin";
        }elseif (session()->get('id_role')==1){
            $role = "Operator";
        }elseif (session()->get('id_role')==2){
            $role = "Verifikator";
        }elseif (session()->get('id_role')==3){
            $role = "Pembimbing";
        }else{
            $role = "Magang";
        }

        $data = array(
            'title' => 'dashboard',
            'count_verifikator' => $count_verifikator,
            'count_operator' => $count_operator,
            'count_magang' => $count_magang,
            'count_all' => $count_all,
            'nama' => session()->get('nama'),
            'url' => session()->get('foto'),
            'role' =>  $role,
        );
        return view(session()->get('role').'/dashboard', $data);
    }

    // -----------------------------------------------------------------------------------------------------------------------
    // Dashboard

    public function orders_tiket()
    {
        $tgl = date("Y-m-d H:i:s");
        
        $db = \Config\Database::connect();

        if($this->request->getVar('id')==0){
            $count_proses = $db->table('tb_tiket')->where("date_part('day', tb_tiket.tgl_input)", date("d", strtotime($tgl)))->where("date_part('month', tb_tiket.tgl_input)", date("m", strtotime($tgl)))->where("date_part('year', tb_tiket.tgl_input)", date("Y", strtotime($tgl)))->where('tb_tiket.status', 0)->countAllResults();
            $count_selesai = $db->table('tb_tiket')->where("date_part('day', tb_tiket.tgl_input)", date("d", strtotime($tgl)))->where("date_part('month', tb_tiket.tgl_input)", date("m", strtotime($tgl)))->where("date_part('year', tb_tiket.tgl_input)", date("Y", strtotime($tgl)))->where('tb_tiket.status', 1)->countAllResults();
            $count_tolak = $db->table('tb_tiket')->where("date_part('day', tb_tiket.tgl_input)", date("d", strtotime($tgl)))->where("date_part('month', tb_tiket.tgl_input)", date("m", strtotime($tgl)))->where("date_part('year', tb_tiket.tgl_input)", date("Y", strtotime($tgl)))->where('tb_tiket.status', 2)->countAllResults();
            $count_semua = $db->table('tb_tiket')->where("date_part('day', tb_tiket.tgl_input)", date("d", strtotime($tgl)))->where("date_part('month', tb_tiket.tgl_input)", date("m", strtotime($tgl)))->where("date_part('year', tb_tiket.tgl_input)", date("Y", strtotime($tgl)))->countAllResults();

        }elseif($this->request->getVar('id')==1){
            $count_proses = $db->table('tb_tiket')->where("date_part('month', tb_tiket.tgl_input)", date("m", strtotime($tgl)))->where('tb_tiket.status', 0)->countAllResults();
            $count_selesai = $db->table('tb_tiket')->where("date_part('month', tb_tiket.tgl_input)", date("m", strtotime($tgl)))->where('tb_tiket.status', 1)->countAllResults();
            $count_tolak = $db->table('tb_tiket')->where("date_part('month', tb_tiket.tgl_input)", date("m", strtotime($tgl)))->where('tb_tiket.status', 2)->countAllResults();
            $count_semua = $db->table('tb_tiket')->where("date_part('month', tb_tiket.tgl_input)", date("m", strtotime($tgl)))->countAllResults();

        }else{
            $count_proses = $db->table('tb_tiket')->where("date_part('year', tb_tiket.tgl_input)", date("Y", strtotime($tgl)))->where('tb_tiket.status', 0)->countAllResults(); 
            $count_selesai = $db->table('tb_tiket')->where("date_part('year', tb_tiket.tgl_input)", date("Y", strtotime($tgl)))->where('tb_tiket.status', 1)->countAllResults(); 
            $count_tolak = $db->table('tb_tiket')->where("date_part('year', tb_tiket.tgl_input)", date("Y", strtotime($tgl)))->where('tb_tiket.status', 2)->countAllResults(); 
            $count_semua = $db->table('tb_tiket')->where("date_part('year', tb_tiket.tgl_input)", date("Y", strtotime($tgl)))->countAllResults(); 
        }
        
        $data = array(
            'count_proses' => $count_proses,
            'count_selesai' => $count_selesai,
            'count_tolak' => $count_tolak,
            'count_semua' => $count_semua,
        );
        echo json_encode($data);
    }

    public function orders_tiket_tahunan()
    {
        $tgl = date("Y-m-d H:i:s");

        $start = (int) $this->request->getVar('tahun');
        $end = $start - 2;

        $db = \Config\Database::connect();

        $tahun = [];
        $proses = [];
        $selesai = [];
        $tolak = [];
        $batal = [];
        for ($x = $end; $x <= $start; $x++) {
            array_push($tahun, $x);
            $count_proses = $db->table('tb_tiket')->where("date_part('year', tb_tiket.tgl_input)", $x)->where('tb_tiket.status', 0)->countAllResults(); 
            array_push($proses, $count_proses);
            $count_selesai = $db->table('tb_tiket')->where("date_part('year', tb_tiket.tgl_input)", $x)->where('tb_tiket.status', 1)->countAllResults(); 
            array_push($selesai, $count_selesai);
            $count_tolak = $db->table('tb_tiket')->where("date_part('year', tb_tiket.tgl_input)", $x)->where('tb_tiket.status', 2)->countAllResults();
            array_push($tolak, $count_tolak);
            $count_batal = $db->table('tb_tiket')->where("date_part('year', tb_tiket.tgl_input)", $x)->where('tb_tiket.status', 3)->countAllResults();
            array_push($batal, $count_batal);
        }
        
        
        $data = array(
            'tahun' => $tahun,
            'proses' => $proses,
            'selesai' => $selesai,
            'tolak' => $tolak,
            'batal' => $batal,
        );
        
        echo json_encode($data);
    }

    public function orders_tiket_harian()
    {
        $tgl = date("Y-m-d H:i:s");
        
        $db = \Config\Database::connect();
        $count_semua = $db->table('tb_tiket')->where("date_part('month', tb_tiket.tgl_input)", date("m", strtotime($tgl)))->get()->getResult();

        $data = array(
            'count_semua' => $count_semua,
        );
        echo json_encode($count_semua);
    }

    public function orders_tiket_kalender()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tb_tiket')->select('tb_tiket.id_tiket, tb_tiket.tgl_input as start, tb_tiket.tgl_input as end, sspelayanan.nama_pelayanan as description, ssopd.akronim_opd as title, tb_tiket.status, tb_tiket.status as color, sspelayanan.nama_pelayanan')->join('sspelayanan', 'sspelayanan.id_pelayanan = tb_tiket.id_pelayanan', 'left')->join('ssuser', 'ssuser.id_ssuser = tb_tiket.id_user', 'left')->join('ssopd', 'ssopd.id_opd = ssuser.id_opd', 'left')->where("date_part('month', tb_tiket.tgl_input)", date("m", strtotime($this->request->getVar('tgl'))))->where("date_part('year', tb_tiket.tgl_input)", date("Y", strtotime($this->request->getVar('tgl'))))->get()->getResult();
        
        foreach ($builder as $row)
        {
            if($row->status=="0"){
                $row->color = "#3C75F0";
            }elseif($row->status=="1"){
                $row->color = "#0F6B35";
            }elseif($row->status=="2"){
                $row->color = "#ff0000";
            }else{
                $row->color = "#000000";
            }
        }
       
        echo json_encode($builder);
    }

    // -----------------------------------------------------------------------------------------------------------------------
    // Menu Tiket
    public function tiket_page()
    {
        $data = array(
            'title' => 'tiket'
        );
        return view('admin/tiket',$data);
    }

    // -----------------------------------------------------------------------------------------------------------------------
    // Menu Profile
    public function profile_page()
    {
        // $db = \Config\Database::connect();

        $role = "";
        if(session()->get('id_role')==0){
            $role = "Admin";
        }elseif (session()->get('id_role')==1){
            $role = "Operator";
        }elseif (session()->get('id_role')==2){
            $role = "Verifikator";
        }elseif (session()->get('id_role')==3){
            $role = "Pembimbing";
        }else{
            $role = "Magang";
        }
        $userModel = new User();
        $array = array('id_ssuser' => session()->get('id_user'));
        $user = $userModel->where($array)->first();
        
        $data = array(
            'title' => 'profile',
            'nama' => session()->get('nama'),
            'url' => session()->get('foto'),
            'role' =>  $role,
            'id_chat' =>  $user["id_chat"],
        );
        return view('admin/profile',$data);
    }

    // -----------------------------------------------------------------------------------------------------------------------
    // Menu Print
    public function print_tiket($id_tiket, $kode_tiket)
    {
        $tiketModel = new Tiket();
        $array = array('id_tiket' => $id_tiket);
        $tiket = $tiketModel->where($array)->findAll();
        if(count($tiket)==0){
            return view('errors/html/error_404');
        }else{
            $tiketModel = new Tiket();
            $array = array('id_tiket' => $id_tiket);
            $tiket = $tiketModel->where($array)->first();

            $pelayananModel = new Pelayanan();
            $array = array('id_pelayanan' => $tiket["id_pelayanan"]);
            $pelayanan = $pelayananModel->where($array)->first();

            $userModel = new User();
            $array = array('id_ssuser' => $tiket["id_user"]);
            $user = $userModel->where($array)->first();

            $opdModel = new Opd();
            $array = array('id_opd' => $user["id_opd"]);
            $opd = $opdModel->where($array)->first();

            // TGL INDO
            $date = strtotime($tiket["tgl_input"]);
            $hari_list = array ( 1 =>    'Senin',
                'Selasa',
                'Rabu',
                'Kamis',
                'Jumat',
                'Sabtu',
                'Minggu'
            );
            $num = date('N', $date); 
            $hari = $hari_list[$num];

            $bulan = array (1 =>   'Januari',
                    'Februari',
                    'Maret',
                    'April',
                    'Mei',
                    'Juni',
                    'Juli',
                    'Agustus',
                    'September',
                    'Oktober',
                    'November',
                    'Desember'
                );
            $new_date = date('Y-m-d', $date);
            // date('l, d F Y', $date)
            $split 	  = explode('-', $new_date);
            $tgl_indo = $hari. ', ' .$split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
            
            if($tiket["status"]=="0"){
                $status = "Proses";
            }elseif($tiket["status"]=="1"){
                $status = "Selesai";
            }elseif($tiket["status"]=="2"){
                $status = "Ditolak";
            }else{
                $status = "Dibatalkan";
            }
            
            $data = array(
                'kode_tiket' => $kode_tiket,
                'tgl_input' => $tgl_indo,
                'time' => date('H:i:s A', $date),
                'jenis_pelayanan' => $pelayanan["nama_pelayanan"],
                'nama' => $user["nama"],
                'opd' => $opd["akronim_opd"],
                'status_tiket' => $status,
                'id_tiket' => $id_tiket,
            );

            return view('print/tiket',$data);
        }
        
    }
    
    // -----------------------------------------------------------------------------------------------------------------------
    // Menu Landing
    public function landing_page()
    {
        $db = \Config\Database::connect();
        $verifikator_pelayanan = $db->table('verifikator_pelayanan')->select('sspelayanan.id_pelayanan,sspelayanan.active,sspelayanan.route,sspelayanan.nama_pelayanan')->join('sspelayanan', 'sspelayanan.id_pelayanan = verifikator_pelayanan.id_pelayanan', 'left')->where('sspelayanan.active', 1)->where('verifikator_pelayanan.id_user', session()->get('id_user'))->get()->getResult();
        // var_dump($verifikator_pelayanan[0]->active);
        // echo $verifikator_pelayanan[0]->route;
        // die;
        // $userModel = new Pelayanan();
        // $array = array('active' => 1);
        // $users = $userModel->where($array)->findAll();
        $data = array(
            'title' => 'tiket',
            'list_pelayanan' => $verifikator_pelayanan
        );
        return view('admin/landing',$data);
    }

    // -----------------------------------------------------------------------------------------------------------------------
    // Menu Magang
    public function magang_page()
    {
        $data = array(
            'title' => 'magang'
        );
        return view('admin/magang/list',$data);
    }

    // -----------------------------------------------------------------------------------------------------------------------
    // Pengguna ADMIN
    public function pengguna_admin_page()
    {
         $data = array(
            'title' => 'pengguna',
            'subtitle' => 'admin'
        );
        return view('admin/pengguna_admin',$data);
    }

    public function get_pengguna_admin_page()
    {
        $userModel = new User();
        $array = array('role_id' => 0);
        $users = $userModel->where($array)->findAll();

        echo json_encode($users);
    }

    public function set_admin()
    {
        $userModel = new User();

        $array = array('nip' => $this->request->getVar('nip'), 'active' => 1);
        $users = $userModel->where($array)->findAll();

        if(count($users)==0){
            $tgl = date("Y-m-d H:i:s");
            
            $data = [
                'nama' => $this->request->getVar('nama'),
                'username'    => $this->request->getVar('nip'),
                'nip'    => $this->request->getVar('nip'),
                'id_chat'    => $this->request->getVar('id_chat'),
                'role_id'    => 0,
                'active'    => 1,
                'tgl_input'    => $tgl,
                'tgl_validasi'    => $tgl,
                'file_foto'    => "default.png",
            ];

            $userModel->insert($data);
            // $id = $userModel->getInsertID();

            // $dataBerkas = $this->request->getFile('foto');
            // $fileName = md5($id).".".$dataBerkas->guessExtension();
            // $fileName = str_replace(" ","",$fileName);
            // $dataBerkas->move('./public/assets/image/avatar',$fileName);
            // $data = [
            //     'file_foto' => $fileName,
            // ];
            // $userModel->update($id, $data);

            $response = [
                'status' => 200,
                'message' => "User Telah Ditambahkan."
            ];
        }else{
            $response = [
                'status' => 500,
                'message' => "NIP Telah Terdaftar."
            ];
        }
        
        echo json_encode($response);
    }

    public function update_admin()
    {
        $userModel = new User();

        $array = array('nip' => $this->request->getVar('nip'),'id_ssuser !=' => $this->request->getVar('id_user'), 'active' => 1);
        $users = $userModel->where($array)->findAll();

        if(count($users)==0){
            
            $data = [
                'nama' => $this->request->getVar('nama'),
                'username'    => $this->request->getVar('nip'),
                'nip'    => $this->request->getVar('nip'),
                'id_chat'    => $this->request->getVar('id_chat'),
            ];

            $userModel->update($this->request->getVar('id_user'), $data);

            $response = [
                'status' => 200,
                'message' => "User Telah Diubah."
            ];
        }else{
            $response = [
                'status' => 500,
                'message' => "NIP Telah Terdaftar."
            ];
        }
        
        echo json_encode($response);
    }

    public function update_status()
    {
        // NOTIFIKASI VERIFIKASI TO USER MAGANG
        $db = \Config\Database::connect();
        $user = $db->table('ssuser')->where('ssuser.id_ssuser', $this->request->getVar('id_ssuser'))->get()->getRow();

        if($user->role_id == 4 && $user->active == 3){
            if($this->request->getVar('active') == 0){
                $message = "Haloo ".$user->nama.". \nMaaf, permohonan pembuatan akun anda telah ditolak. Silahkan hubungi WA Center DISKOMINFO Kabupatan Bangkalan ( 082336274643 ) untuk dapat mengetahui penolakan akun anda.";
            }else{
                $message = "Haloo ".$user->nama.". \nAyo login, permohonan pembuatan akun anda telah di verifikasi. Gunakan nomor induk anda sebagai username.";
            }
            helper('notification_helper');
            $hasil = telegram($user->id_chat,$message);
        }
        
        $userModel = new User();

        $data = [
            'active' =>  $this->request->getVar('active'),
        ];
        $userModel->update($this->request->getVar('id_ssuser'), $data);

        $response = [
            'status' => 200,
            'message' => "Aktivasi User Telah Diubah."
        ];
        
        echo json_encode($response);
    }

    public function update_id_chat()
    {
        $userModel = new User();

        $data = [
            'id_chat' =>  $this->request->getVar('id_chat'),
        ];
        $userModel->update($this->request->getVar('id_ssuser'), $data);

        $response = [
            'status' => 200,
            'message' => "Id Chat User Telah Diubah."
        ];
        
        echo json_encode($response);
    }

    public function update_foto()
    {
        $userModel = new User();

        $array = array('id_ssuser' => $this->request->getVar('id_ssuser'));
        $users = $userModel->where($array)->first();
        if($users["file_foto"] != 'default.png'){
            unlink('./public/assets/image/avatar/' . str_replace(" ","",$users["file_foto"]));
        }
        
        $dataBerkas = $this->request->getFile('foto');
        $fileName = md5($this->request->getVar('id_ssuser')).".".$dataBerkas->guessExtension();
        $dataBerkas->move('./public/assets/image/avatar',$fileName);
        $data = [
            'file_foto' => $fileName,
        ];
        $userModel->update($this->request->getVar('id_ssuser'), $data);
        session()->set('foto', $fileName);
        $response = [
            'status' => 200,
            'message' => "Foto User Telah Diubah."
        ];
        
        echo json_encode($response);
    }

    public function del_pengguna()
    {
        $optModel = new Otp();
        $optModel->where('id_ssuser', $this->request->getVar('id_ssuser'))->delete();

        $userModel = new User();

        $array = array('id_ssuser' => $this->request->getVar('id_ssuser'));
        $users = $userModel->where($array)->first();
        // // if($users["file_foto"] != "default.png"){
        // //     unlink('./public/assets/image/avatar/' . $users["file_foto"]);
        // // }
        if(strval(strcmp($users["file_foto"], "default.png")) == 1){
            unlink('./public/assets/image/avatar/' . $users["file_foto"]);
        }
        
        $userModel->delete($this->request->getVar('id_ssuser'));
        
        $response = [
            'status' => 200,
            'message' =>  "User Telah Dihapus."
        ];
        
        echo json_encode($response);
    }

    // -----------------------------------------------------------------------------------------------------------------------
    // Pengguna Verifikator
    public function pengguna_verifikator_page()
    {
         $data = array(
            'title' => 'pengguna',
            'subtitle' => 'verifikator'
        );
        return view('admin/pengguna_verifikator',$data);
    }

    public function get_pengguna_verifikator_page()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('verifikator_pelayanan')->select('ssuser.id_ssuser, ssuser.username, ssuser.id_chat, ssuser.active, ssuser.role_id, ssuser.file_foto, ssuser.nama, array_agg(sspelayanan.id_pelayanan) AS id_pelayanan, array_agg(sspelayanan.nama_pelayanan) AS nama_pelayanan')->join('ssuser', 'ssuser.id_ssuser = verifikator_pelayanan.id_user', 'left')->join('sspelayanan', 'sspelayanan.id_pelayanan = verifikator_pelayanan.id_pelayanan', 'left')->where('ssuser.role_id', 2)->groupBy('ssuser.id_ssuser')->get()->getResult();
        
        // $userModel = new V_vefirikator();
        // $array = array('role_id' => 2);
        // $users = $userModel->where($array)->findAll();

        echo json_encode($builder);
    }

    public function set_verifikator()
    {
        $userModel = new User();

        $array = array('nip' => $this->request->getVar('nip'), 'active' => 1);
        $users = $userModel->where($array)->findAll();

        if(count($users)==0){
            $tgl = date("Y-m-d H:i:s");
            
            $data = [
                'nama' => $this->request->getVar('nama'),
                'username'    => $this->request->getVar('nip'),
                'nip'    => $this->request->getVar('nip'),
                'id_chat'    => $this->request->getVar('id_chat'),
                'role_id'    => 2,
                'active'    => 1,
                'tgl_input'    => $tgl,
                'tgl_validasi'    => $tgl,
                'file_foto'    => "default.png",
            ];

            $userModel->insert($data);
            $id = $userModel->getInsertID();

            // $dataBerkas = $this->request->getFile('foto');
            // $fileName = md5($id).".".$dataBerkas->guessExtension();
            // $fileName = str_replace(" ","",$fileName);
            // $dataBerkas->move('./public/assets/image/avatar',$fileName);
            // $data = [
            //     'file_foto' => $fileName,
            // ];
            // $userModel->update($id, $data);

            $userModel = new Verifikator();
            $array_pelayanan = explode(",",$this->request->getVar('pelayanan'));
            for($x =0;$x<count($array_pelayanan);$x++){
                $data = [
                    'id_user' => $id,
                    'id_pelayanan'    => $array_pelayanan[$x],
                ];

                $userModel->insert($data);
            }
            $response = [
                'status' => 200,
                'message' => "User Telah Ditambahkan."
            ];
        }else{
            $response = [
                'status' => 500,
                'message' => "Username Telah Terdaftar."
            ];
        }
        
        echo json_encode($response);
    }
    
    public function update_list_pelayanan()
    {
        $userModel = new Verifikator();
        $userModel->where('id_user', $this->request->getVar('id_ssuser'))->delete();

        $array_pelayanan = explode(",",$this->request->getVar('pelayanan'));
        for($x =0;$x<count($array_pelayanan);$x++){
            $data = [
                'id_user' => $this->request->getVar('id_ssuser'),
                'id_pelayanan'    => $array_pelayanan[$x],
            ];

            $userModel->insert($data);
        }
        $response = [
            'status' => 200,
            'message' => "Daftar Pelayanan Telah Diubah."
        ];
        
        echo json_encode($response);
    }

    public function delete_verifikator()
    {
        $userModel = new Verifikator();
        $userModel->where('id_user', $this->request->getVar('id_ssuser'))->delete();

        $optModel = new Otp();
        $optModel->where('id_ssuser', $this->request->getVar('id_ssuser'))->delete();

        $userModel = new User();

        $array = array('id_ssuser' => $this->request->getVar('id_ssuser'));
        $users = $userModel->where($array)->first();
        if(strval(strcmp($users["file_foto"], "default.png")) == 1){
            unlink('./public/assets/image/avatar/' . str_replace(" ","",$users["file_foto"]));
        }
        $userModel->delete($this->request->getVar('id_ssuser'));
        
        $response = [
            'status' => 200,
            'message' => "User Telah Dihapus."
        ];
        
        echo json_encode($response);
    }

    // -----------------------------------------------------------------------------------------------------------------------
    // Pengguna Operator
    public function pengguna_operator_page()
    {
         $data = array(
            'title' => 'pengguna',
            'subtitle' => 'operator'
        );
        return view('admin/pengguna_op',$data);
    }

    public function get_pengguna_operator_page()
    {
        $userModel = new User();
        $array = array('role_id' => 1);
        $users = $userModel->where($array)->findAll();

        echo json_encode($users);
    }

    public function get_opd()
    {
        $userModel = new Opd();
        $users = $userModel->findAll();

        echo json_encode($users);
    }

    public function set_op()
    {
        $userModel = new User();

        $array = array('nip' => $this->request->getVar('nip'), 'active' => 1);
        $users = $userModel->where($array)->findAll();

        if(count($users)==0){
            $tgl = date("Y-m-d H:i:s");
            
            $data = [
                'nama' => $this->request->getVar('nama'),
                'nip'    => $this->request->getVar('nip'),
                'username'    => $this->request->getVar('nip'),
                'id_chat'    => $this->request->getVar('id_chat'),
                'role_id'    => 1,
                'active'    => 1,
                'tgl_validasi'    => $tgl,
                'tgl_input'    => $tgl,
                'id_opd'    => $this->request->getVar('id_opd'),
                'file_foto'    => "default.png",
            ];

            $userModel->insert($data);
            // $id = $userModel->getInsertID();

            // $dataBerkas = $this->request->getFile('foto');
            // $fileName = md5($id).".".$dataBerkas->guessExtension();
            // $fileName = str_replace(" ","",$fileName);
            // $dataBerkas->move('./public/assets/image/avatar',$fileName);
            // $data = [
            //     'file_foto' => $fileName,
            // ];
            // $userModel->update($id, $data);

            $response = [
                'status' => 200,
                'message' => "User Telah Ditambahkan."
            ];
        }else{
            $response = [
                'status' => 500,
                'message' => "NIP Telah Terdaftar."
            ];
        }
        
        echo json_encode($response);
    }

    public function update_op()
    {
        $userModel = new User();

        $array = array('nip' => $this->request->getVar('nip'),'id_ssuser !=' => $this->request->getVar('id_user'), 'active' => 1);
        $users = $userModel->where($array)->findAll();

        if(count($users)==0){
            
            $data = [
                'nama' => $this->request->getVar('nama'),
                'username'    => $this->request->getVar('nip'),
                'nip'    => $this->request->getVar('nip'),
                'id_chat'    => $this->request->getVar('id_chat'),
                'id_opd'    => $this->request->getVar('id_opd'),
            ];

            $userModel->update($this->request->getVar('id_user'), $data);

            $response = [
                'status' => 200,
                'message' => "User Telah Diubah."
            ];
        }else{
            $response = [
                'status' => 500,
                'message' => "NIP Telah Terdaftar."
            ];
        }
        
        echo json_encode($response);
    }
    // -----------------------------------------------------------------------------------------------------------------------
    // Pengguna Pembimbing
    public function pengguna_pembimbing_page()
    {
         $data = array(
            'title' => 'pengguna',
            'subtitle' => 'pembimbing'
        );
        return view('admin/pengguna_pembimbing',$data);
    }

    public function get_pembimbing()
    {
        $userModel = new User();

        $array = array('id_opd' => $this->request->getVar('id_opd'),'role_id' => 3);
        $users = $userModel->where($array)->findAll();

        if(count($users)!=0){
            $db = \Config\Database::connect();
            $builder = $db->table('ssuser_pembimbing')->select('ssuser.id_ssuser, ssuser.username, ssuser.nip, ssuser.nama, ssuser.id_chat, ssuser.active, ssuser.file_foto, ssuser.id_opd')->join('ssuser', 'ssuser.id_ssuser = ssuser_pembimbing.id_ssuser', 'left')->where('ssuser.id_opd', $this->request->getVar('id_opd'))->where('ssuser_pembimbing.id_sub', $this->request->getVar('id_sub'))->get()->getResult(); 
        }else{
            $builder = array();
        }

       
        echo json_encode($builder);
    }

    public function set_pembimbing()
    {
        $userModel = new User();

        $array = array('nip' => $this->request->getVar('nip'), 'active' => 1);
        $users = $userModel->where($array)->findAll();

        if(count($users)==0){
            $tgl = date("Y-m-d H:i:s");
            
            $data = [
                'nama' => $this->request->getVar('nama'),
                'nip'    => $this->request->getVar('nip'),
                'username'    => $this->request->getVar('nip'),
                'id_chat'    => $this->request->getVar('id_chat'),
                'role_id'    => 3,
                'active'    => 1,
                'tgl_input'    => $tgl,
                'tgl_validasi'    => $tgl,
                'id_opd'    => $this->request->getVar('id_opd'),
                'file_foto'    => "default.png",
            ];

            $userModel->insert($data);
            $id = $userModel->getInsertID();

            // $dataBerkas = $this->request->getFile('foto');
            // $fileName = md5($id).".".$dataBerkas->guessExtension();
            // $fileName = str_replace(" ","",$fileName);
            // $dataBerkas->move('./public/assets/image/avatar',$fileName);
            // $data = [
            //     'file_foto' => $fileName,
            // ];
            // $userModel->update($id, $data);

            $subModel = new User_pembimbing();
            $data = [
                'id_ssuser' => $id,
                'id_sub'    => $this->request->getVar('id_sub'),
            ];
            $subModel->insert($data);

            $response = [
                'status' => 200,
                'message' => "User Telah Ditambahkan."
            ];
        }else{
            $response = [
                'status' => 500,
                'message' => "NIP Telah Terdaftar."
            ];
        }
        
        echo json_encode($response);
    }

    public function delete_pembimbing()
    {
        $userModel = new User_pembimbing();
        $userModel->where('id_ssuser', $this->request->getVar('id_ssuser'))->delete();

        $optModel = new Otp();
        $optModel->where('id_ssuser', $this->request->getVar('id_ssuser'))->delete();

        $userModel = new User();

        $array = array('id_ssuser' => $this->request->getVar('id_ssuser'));
        $users = $userModel->where($array)->first();
        if(strval(strcmp($users["file_foto"], "default.png")) == 1){
            unlink('./public/assets/image/avatar/' . str_replace(" ","",$users["file_foto"]));
        }
        $userModel->delete($this->request->getVar('id_ssuser'));
        
        $response = [
            'status' => 200,
            'message' => "User Telah Dihapus."
        ];
        
        echo json_encode($response);
    }
    
    // -----------------------------------------------------------------------------------------------------------------------
    // Pengguna User
    public function pengguna_user_page()
    {
         $data = array(
            'title' => 'pengguna',
            'subtitle' => 'user'
        );
        return view('admin/pengguna_user',$data);
    }

    public function get_pengguna_user_page()
    {
        $db = \Config\Database::connect();
        if($this->request->getVar('status')==4){
            $builder = $db->table('ssuser_magang')->select('ssuser.id_ssuser, ssuser.username, ssuser.nama, ssuser.id_chat, ssuser.active, ssuser.file_foto, ssuser_magang.jenis, ssuser_magang.jurusan, ssuser_magang.civitas, ssuser_magang.ktp')->join('ssuser', 'ssuser_magang.id_ssuser = ssuser.id_ssuser', 'left')->where("date_part('year', ssuser.tgl_input)", $this->request->getVar('tahun'))->orderBy('ssuser.tgl_input', 'DESC')->get()->getResult();
        }else{
            $builder = $db->table('ssuser_magang')->select('ssuser.id_ssuser, ssuser.username, ssuser.nama, ssuser.id_chat, ssuser.active, ssuser.file_foto, ssuser_magang.jenis, ssuser_magang.jurusan, ssuser_magang.civitas, ssuser_magang.ktp')->join('ssuser', 'ssuser_magang.id_ssuser = ssuser.id_ssuser', 'left')->where('ssuser.active', $this->request->getVar('status'))->where("date_part('year', ssuser.tgl_input)", $this->request->getVar('tahun'))->orderBy('ssuser.tgl_input', 'DESC')->get()->getResult();
        }
        echo json_encode($builder);
    }

    public function get_user_count()
    {
        $db = \Config\Database::connect();
        $proses = $db->table('ssuser_magang')->select('ssuser.id_ssuser, ssuser.username, ssuser.nama, ssuser.id_chat, ssuser.active, ssuser.file_foto, ssuser_magang.jenis, ssuser_magang.jurusan, ssuser_magang.civitas, ssuser_magang.ktp')->join('ssuser', 'ssuser_magang.id_ssuser = ssuser.id_ssuser', 'left')->where('ssuser.active', 3)->where("date_part('year', ssuser.tgl_input)", $this->request->getVar('tahun'))->orderBy('ssuser.id_ssuser', 'DESC')->countAllResults();
        $selesai = $db->table('ssuser_magang')->select('ssuser.id_ssuser, ssuser.username, ssuser.nama, ssuser.id_chat, ssuser.active, ssuser.file_foto, ssuser_magang.jenis, ssuser_magang.jurusan, ssuser_magang.civitas, ssuser_magang.ktp')->join('ssuser', 'ssuser_magang.id_ssuser = ssuser.id_ssuser', 'left')->where('ssuser.active', 1)->where("date_part('year', ssuser.tgl_input)", $this->request->getVar('tahun'))->orderBy('ssuser.id_ssuser', 'DESC')->countAllResults();
        $tolak = $db->table('ssuser_magang')->select('ssuser.id_ssuser, ssuser.username, ssuser.nama, ssuser.id_chat, ssuser.active, ssuser.file_foto, ssuser_magang.jenis, ssuser_magang.jurusan, ssuser_magang.civitas, ssuser_magang.ktp')->join('ssuser', 'ssuser_magang.id_ssuser = ssuser.id_ssuser', 'left')->where('ssuser.active', 0)->where("date_part('year', ssuser.tgl_input)", $this->request->getVar('tahun'))->orderBy('ssuser.id_ssuser', 'DESC')->countAllResults();
        $semua = $db->table('ssuser_magang')->select('ssuser.id_ssuser, ssuser.username, ssuser.nama, ssuser.id_chat, ssuser.active, ssuser.file_foto, ssuser_magang.jenis, ssuser_magang.jurusan, ssuser_magang.civitas, ssuser_magang.ktp')->join('ssuser', 'ssuser_magang.id_ssuser = ssuser.id_ssuser', 'left')->where("date_part('year', ssuser.tgl_input)", $this->request->getVar('tahun'))->orderBy('ssuser.id_ssuser', 'DESC')->countAllResults();
        
        $response = [
            'proses' => $proses,
            'selesai' => $selesai,
            'tolak' => $tolak,
            'semua' => $semua,
        ];
        
        echo json_encode($response);
    }

    // -----------------------------------------------------------------------------------------------------------------------
    // Pelayanan
    public function pelayanan_page()
    {
         $data = array(
            'title' => 'pelayanan'
        );
        return view('admin/pelayanan',$data);
    }

    public function get_pelayanan()
    {
        $userModel = new Pelayanan();
        $users = $userModel->findAll();

        echo json_encode($users);
    }

    public function update_status_pelayanan()
    {
        $userModel = new Pelayanan();

        $data = [
            'active' =>  $this->request->getVar('active'),
        ];
        $userModel->update($this->request->getVar('id_pelayanan'), $data);

        $response = [
            'status' => 200,
            'message' => "Aktivasi Pelayanan Telah Diubah."
        ];
        
        echo json_encode($response);
    }

    public function del_pelayanan()
    {
        $optModel = new Pelayanan();
        $optModel->where('id_pelayanan', $this->request->getVar('id_pelayanan'))->delete();

        $response = [
            'status' => 200,
            'message' => "Pelayanan Telah Dihapus."
        ];
        
        echo json_encode($response);
    }

    public function set_pelayanan()
    {
        $userModel = new Pelayanan();

        $array = array('route' => $this->request->getVar('route'), 'active' => 1);
        $users = $userModel->where($array)->findAll();

        if(count($users)==0){
            $tgl = date("Y-m-d H:i:s");
            $data = [
                'route' => $this->request->getVar('route'),
                'nama_pelayanan'    => $this->request->getVar('nama_pelayanan'),
                'url'    => $this->request->getVar('url'),
                'deskripsi'    => $this->request->getVar('deskripsi'),
                'file_foto'    => 'logokominfo.png',
                'tgl_input'    => $tgl,
                'active'    => 1,
                'id_opd'    => $this->request->getVar('id_opd'),
            ];

            $userModel->insert($data);

            $response = [
                'status' => 200,
                'message' => "Pelayanan Telah Ditambahkan."
            ];
        }else{
            $response = [
                'status' => 500,
                'message' => "Route Telah Terdaftar."
            ];
        }
        
        echo json_encode($response);
    }

    public function update_pelayanan()
    {
        $userModel = new Pelayanan();

        $data = [
            'route' => $this->request->getVar('route'),
            'nama_pelayanan'    => $this->request->getVar('nama_pelayanan'),
            'url'    => $this->request->getVar('url'),
            'deskripsi'    => $this->request->getVar('deskripsi'),
            'id_opd'    => $this->request->getVar('id_opd'),
        ];

        $userModel->update($this->request->getVar('id_pelayanan'), $data);

        $response = [
            'status' => 200,
            'message' => "Pelayanan Telah Diubah."
        ];
        
        echo json_encode($response);
    }

    public function detail_form($id_pelayanan)
    {
        $pelayananModel = new Pelayanan();
        $array = array('id_pelayanan' => $id_pelayanan);
        $pelayanan = $pelayananModel->where($array)->first();
        
        if (!$pelayanan) {
            return redirect()->to('/admin/pelayanan');
        }

        $data = array(
            'title' => 'pelayanan',
            'pelayanan' => $pelayanan
        );
        return view('admin/form-pelayanan', $data);
    }

    public function get_form_fields($id_pelayanan) {
        $formFieldModel = new \App\Models\FormField();
        $fields = $formFieldModel->where('id_pelayanan', $id_pelayanan)->findAll();
        return $this->response->setJSON($fields);
    }

    public function save_form_field() {
        $formFieldModel = new \App\Models\FormField();
        
        $data = [
            'id_pelayanan' => $this->request->getPost('id_pelayanan'),
            'label' => $this->request->getPost('label'),
            'field_type' => $this->request->getPost('type'), // Note: form sends 'type' but we store as 'field_type'
            'required' => $this->request->getPost('required')
        ];
        
        if ($this->request->getPost('id_form')) {
            $formFieldModel->update($this->request->getPost('id_form'), $data);
        } else {
            $formFieldModel->insert($data);
        }
        
        return $this->response->setJSON([
            'status' => 200,
            'message' => 'Form field saved successfully'
        ]);
    }

    public function delete_form_field($id) {
        $formFieldModel = new \App\Models\FormField();
        $formFieldModel->delete($id);
        
        return $this->response->setJSON([
            'status' => 200,
            'message' => 'Form field deleted successfully'
        ]);
    }

    // -----------------------------------------------------------------------------------------------------------------------
    // Peralatan Zoom
    public function alat_zoom_page()
    {
         $data = array(
            'title' => 'barang'
        );
        return view('admin/peralatan',$data);
    }

    public function get_peralatan()
    {
        $userModel = new Peralatan();
        $users = $userModel->findAll();

        echo json_encode($users);
    }

    public function update_status_peralatan()
    {
        $userModel = new Peralatan();

        $data = [
            'active' =>  $this->request->getVar('active'),
        ];
        $userModel->update($this->request->getVar('id_alat'), $data);

        $response = [
            'status' => 200,
            'message' => "Aktivasi Alat Telah Diubah."
        ];
        
        echo json_encode($response);
    }

    public function del_peralatan()
    {
        $optModel = new Peralatan();
        $optModel->where('id_alat', $this->request->getVar('id_alat'))->delete();

        $response = [
            'status' => 200,
            'message' => "Alat Telah Dihapus."
        ];
        
        echo json_encode($response);
    }

    public function set_peralatan()
    {
        $userModel = new Peralatan();

        $tgl = date("Y-m-d H:i:s");

        $data = [
            'nama_alat' => $this->request->getVar('nama_alat'),
            'merk'    => $this->request->getVar('merk'),
            'nomor_seri'    => $this->request->getVar('nomor_seri'),
            'active'    => 1,
            'tgl_input'    => $tgl,
        ];

        $userModel->insert($data);

        $response = [
            'status' => 200,
            'message' => "Alat Telah Ditambahkan."
        ];
        
        echo json_encode($response);
    }

    public function update_peralatan()
    {
        $userModel = new Peralatan();

        $data = [
            'nama_alat' => $this->request->getVar('nama_alat'),
            'merk'    => $this->request->getVar('merk'),
            'nomor_seri'    => $this->request->getVar('nomor_seri'),
        ];

        $userModel->update($this->request->getVar('id_alat'), $data);

        $response = [
            'status' => 200,
            'message' => "Alat Telah Diubah."
        ];
        
        echo json_encode($response);
    }

    
    // -----------------------------------------------------------------------------------------------------------------------
    // Peralatan Aula
    public function aula_page()
    {
         $data = array(
            'title' => 'aula'
        );
        return view('admin/aula',$data);
    }

    public function get_aula()
    {
        $userModel = new Aula();
        $users = $userModel->findAll();

        echo json_encode($users);
    }

    public function update_status_aula()
    {
        $userModel = new Aula();

        $data = [
            'active' =>  $this->request->getVar('active'),
        ];
        $userModel->update($this->request->getVar('id_aula'), $data);

        $response = [
            'status' => 200,
            'message' => "Aktivasi Aula Telah Diubah."
        ];
        
        echo json_encode($response);
    }

    public function del_aula()
    {
        $optModel = new Aula();
        $optModel->where('id_aula', $this->request->getVar('id_aula'))->delete();

        $response = [
            'status' => 200,
            'message' => "Aula Telah Dihapus."
        ];
        
        echo json_encode($response);
    }

    public function set_aula()
    {
        $userModel = new Aula();

        $tgl = date("Y-m-d H:i:s");

        $data = [
            'nama_aula' => $this->request->getVar('nama_aula'),
            'active'    => 1,
            'tgl_input'    => $tgl,
        ];

        $userModel->insert($data);

        $response = [
            'status' => 200,
            'message' => "Aula Telah Ditambahkan."
        ];
        
        echo json_encode($response);
    }

    // -----------------------------------------------------------------------------------------------------------------------
    // Peralatan OPD
    public function opd_page()
    {
         $data = array(
            'title' => 'instansi'
        );
        return view('admin/instansi',$data);
    }

    public function del_opd()
    {
        $optModel = new OPD();
        $optModel->where('id_opd', $this->request->getVar('id_opd'))->delete();

        $response = [
            'status' => 200,
            'message' => "Instansi Telah Dihapus."
        ];
        
        echo json_encode($response);
    }

    public function set_opd()
    {
        $userModel = new OPD();

        $array = array('nama_opd' => $this->request->getVar('nama_opd'), 'akronim_opd' => $this->request->getVar('akronim_opd'));
        $users = $userModel->where($array)->findAll();

        if(count($users)==0){
            $data = [
                'nama_opd' => $this->request->getVar('nama_opd'),
                'akronim_opd' => $this->request->getVar('akronim_opd'),
                'foto_opd' => 'logokominfo.png'
            ];

            $userModel->insert($data);

            $response = [
                'status' => 200,
                'message' => "Instansi Telah Ditambahkan."
            ];
        }else{
            $response = [
                'status' => 500,
                'message' => "Instansi Telah Ada."
            ];
        }
       
        echo json_encode($response);
    }

    public function update_opd()
    {
        $userModel = new OPD();

        $array = array('nama_opd' => $this->request->getVar('nama_opd'), 'akronim_opd' => $this->request->getVar('akronim_opd'));
        $users = $userModel->where($array)->findAll();

        if(count($users)==0){
            $data = [
                'nama_opd' => $this->request->getVar('nama_opd'),
                'akronim_opd' => $this->request->getVar('akronim_opd'),
            ];

            $userModel->update($this->request->getVar('id_opd'), $data);

            $response = [
                'status' => 200,
                'message' => "Instansi Telah Diubah."
            ];
        }else{
            $response = [
                'status' => 500,
                'message' => "Instansi Telah Ada."
            ];
        }
       
        echo json_encode($response);
    }

    // -----------------------------------------------------------------------------------------------------------------------
    // Peralatan Sub Bagian
    public function sub_page()
    {
         $data = array(
            'title' => 'sub-bagian'
        );
        return view('admin/sub',$data);
    }

    public function get_sub()
    {
        $userModel = new Sub();
        $array = array('id_opd' => $this->request->getVar('id_opd'));
        $users = $userModel->where($array)->findAll();

        echo json_encode($users);
    }

    public function del_sub()
    {
        $optModel = new Sub();
        $optModel->where('id_sub', $this->request->getVar('id_sub'))->delete();

        $response = [
            'status' => 200,
            'message' => "Sub Bagian Telah Dihapus."
        ];
        
        echo json_encode($response);
    }

    public function set_sub()
    {
        $userModel = new Sub();

        $array = array('nama_sub' => $this->request->getVar('nama_sub'), 'id_opd' => $this->request->getVar('id_opd'));
        $users = $userModel->where($array)->findAll();

        if(count($users)==0){

            $tgl = date("Y-m-d H:i:s");
            
            $data = [
                'nama_sub' => $this->request->getVar('nama_sub'),
                'id_opd' => $this->request->getVar('id_opd'),
                'active'    => 1,
                'tgl_input'    => $tgl,
            ];

            $userModel->insert($data);

            $response = [
                'status' => 200,
                'message' => "Instansi Telah Ditambahkan."
            ];
        }else{
            $response = [
                'status' => 500,
                'message' => "Instansi Telah Ada."
            ];
        }
       
        echo json_encode($response);
    }

    public function update_sub()
    {
        $userModel = new Sub();

        $data = [
            'nama_sub' => $this->request->getVar('nama_sub'),
        ];

        $userModel->update($this->request->getVar('id_sub'), $data);

        $response = [
            'status' => 200,
            'message' => "Sub Bagian Telah Diubah."
        ];
       
        echo json_encode($response);
    }

    // -----------------------------------------------------------------------------------------------------------------------
    // FAQ
    public function faq_page()
    {
         $data = array(
            'title' => 'faq'
        );
        return view('admin/faq',$data);
    }

    public function get_faq()
    {
        $userModel = new Faq();
        $users = $userModel->findAll();

        echo json_encode($users);
    }

    public function update_status_faq()
    {
        $userModel = new Faq();

        $data = [
            'active' =>  $this->request->getVar('active'),
        ];
        $userModel->update($this->request->getVar('id_faq'), $data);

        $response = [
            'status' => 200,
            'message' => "Aktivasi FAQ Telah Diubah."
        ];
        
        echo json_encode($response);
    }

    public function del_faq()
    {
        $optModel = new Faq();
        $optModel->where('id_faq', $this->request->getVar('id_faq'))->delete();

        $response = [
            'status' => 200,
            'message' => "FAQ Telah Dihapus."
        ];
        
        echo json_encode($response);
    }

    public function set_faq()
    {
        $userModel = new Faq();

        $tgl = date("Y-m-d H:i:s");
        
        $data = [
            'pertanyaan' => $this->request->getVar('pertanyaan'),
            'jawaban'    => $this->request->getVar('jawaban'),
            'tgl_input'    =>  $tgl,
            'active'    => 1,
            'id_opd'    => $this->request->getVar('id_opd'),
        ];

        $userModel->insert($data);

        $response = [
            'status' => 200,
            'message' => "Pertanyaan Telah Ditambahkan."
        ];
        
        echo json_encode($response);
    }

    public function update_faq()
    {
        $userModel = new Faq();

        $data = [
            'pertanyaan' => $this->request->getVar('pertanyaan'),
            'jawaban'    => $this->request->getVar('jawaban'),
            'id_opd'    => $this->request->getVar('id_opd'),
        ];

        $userModel->update($this->request->getVar('id_faq'), $data);

        $response = [
            'status' => 200,
            'message' => "FAQ Telah Diubah."
        ];
        
        echo json_encode($response);
    }

    // -----------------------------------------------------------------------------------------------------------------------
    // Landing Page Detail
    public function zoom_page()
    {
        $data = array(
            'title' => 'landing'
        );
        return view('detail/zoom',$data);
    }
}