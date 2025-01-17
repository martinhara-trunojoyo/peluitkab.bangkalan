<?php

namespace App\Controllers;

use App\Models\Tiket_magang;
use App\Models\Log_tiket_magang;
use App\Models\Tiket_magang_nilai;

class Magang extends BaseController
{
    public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
    }

    // -----------------------------------------------------------------------------------------------------------------------
    // Catatan

    public function update_catatan()
    {
        $tiketModel = new Tiket_magang();
        $logModel = new Log_tiket_magang();

        if($this->request->getVar('status')==1){
            $status = 'Tiket telah diselesaikan';
            $warna = 'success';
            $icon = 'fa fa-check';
            $message = "Haloo Peserta Magang. \n\nSelamat ya, Sertifikat Magang dan Penilaian anda sudah dapat diakses loh. Ayo buruan login ke Aplikasi PELUIT.";
        }elseif($this->request->getVar('status')==0){
            $status = 'Tiket telah ditolak';
            $warna = 'danger';
            $icon = 'fa fa-times';
            $message = "Haloo Peserta Magang. \n\nMaaf ya, permintaan magang anda telah ditolak. Yuk intip alasan tiket kamu ditolak, SEMANGAT !!";
        }elseif($this->request->getVar('status')==2){
            $status = 'Tiket telah dibatalkan';
            $warna = 'dark';
            $icon = 'fa fa-times';
            $message = "Haloo Operator. \n\nMaaf ya, ada permintaan magang yang dibatalkan.";
        }elseif($this->request->getVar('status')==4){
            $status = 'Tiket telah diverifikasi, peserta dapat melaksanakan kegiatan magang di instansi tujuan';
            $warna = 'info';
            $icon = 'fas fa-user-clock';
            $message = "Haloo Peserta Magang. \n\nYeay !! ada kabar baik nih, permintaan magang anda telah diverifikasi. Selamat melaksanakan kegiatan magang di instansi tujuan anda.";
        }else{
            $status = 'Tugas dan Pembimbing Lapangan telah ditentukan';
            $warna = 'info';
            $icon = 'fas fa-user-shield';
            $message = "Haloo Peserta Magang. \n\nTugas dan Pembimbing Lapangan anda telah ditentukan looh, Ayo login dan kepoin tugas kamu.";
        } 

        if($this->request->getVar('status')==0||$this->request->getVar('status')==2){
            $data = [
                'status' => $this->request->getVar('status'),
                'catatan' => $this->request->getVar('catatan'),
            ];
            $tiketModel->update($this->request->getVar('id_tiket'), $data);
            
            $tgl = date("Y-m-d H:i:s");
        
            $data = [
                'id_tiket' => $this->request->getVar('id_tiket'),
                'id_user' => session()->get('id_user'),
                'tgl_aktifitas' =>  $tgl,
                'aktifitas' => "Memperbaharui catatan",
                'color' => "primary",
                'icon' => "far fa-edit",
            ];
            $logModel->insert($data);
            
            
        }elseif($this->request->getVar('status')==1){
            $data = [
                'status' => 1,
            ];
            $tiketModel->update($this->request->getVar('id_tiket'), $data);
            
            $tgl = date("Y-m-d H:i:s");
        
            $data = [
                'id_tiket' => $this->request->getVar('id_tiket'),
                'id_user' => session()->get('id_user'),
                'tgl_aktifitas' =>  $tgl,
                'aktifitas' => 'Form Penilaian telah diisi oleh Pembimbing Lapangan, peserta dapat mengakses nilai dan sertifikat magang',
                'color' => "info",
                'icon' => 'fas fa-user-edit',
            ];
            $logModel->insert($data);
        }else{
            $data = [
                'status' => $this->request->getVar('status'),
            ];
            $tiketModel->update($this->request->getVar('id_tiket'), $data);
        }
        
        $tgl = date("Y-m-d H:i:s");
        $data = [
            'id_tiket' => $this->request->getVar('id_tiket'),
            'id_user' => session()->get('id_user'),
            'tgl_aktifitas' =>  $tgl,
            'aktifitas' => $status,
            'color' => $warna,
            'icon' => $icon,
        ];

        $logModel->insert($data);

        $response = [
            'status' => 200,
            'message' => "Status berhasil di update."
        ];

        if($this->request->getVar('status')!=2){
            // NOTIFIKASI TO USER
            $db = \Config\Database::connect();
            $tiket = $db->table('tb_tiket_magang')->select('tb_tiket_magang.id_user')->where("tb_tiket_magang.id_tiket", $this->request->getVar('id_tiket'))->get()->getRow();
            $user = $db->table('ssuser')->select('ssuser.id_chat')->where("ssuser.id_ssuser", $tiket->id_user)->get()->getRow();
            helper('notification_helper');
            $hasil = telegram($user->id_chat,$message);
        }
        
        echo json_encode($response);

    }

    public function update_pembimbing()
    {
        $tiketModel = new Tiket_magang();
        $logModel = new Log_tiket_magang();

        $data = [
            'id_pembina_lapangan' => $this->request->getVar('id_pembina_lapangan'),
            'nama_project' => $this->request->getVar('nama_project'),
        ];
        $tiketModel->update($this->request->getVar('id_tiket'), $data);
        
        $tgl = date("Y-m-d H:i:s");
    
        $data = [
            'id_tiket' => $this->request->getVar('id_tiket'),
            'id_user' => session()->get('id_user'),
            'tgl_aktifitas' =>  $tgl,
            'aktifitas' => "Memperbaharui Form Tugas dan Pembimbing Lapangan",
            'color' => "primary",
            'icon' => "far fa-edit",
        ];
        $logModel->insert($data);

        $response = [
            'status' => 200,
            'message' => "Tugas dan Pembimbing Lapangan berhasil di update."
        ];
        
        echo json_encode($response);

    }

    public function update_nilai()
    {
        $tiketModel = new Tiket_magang();
        $logModel = new Log_tiket_magang();
        $nilaiModel = new Tiket_magang_nilai();

        $db = \Config\Database::connect();
        $nilai = $db->table('tb_tiket_magang_nilai')->where('tb_tiket_magang_nilai.id_tiket', $this->request->getVar('id_tiket'))->countAllResults();

        $tgl = date("Y-m-d H:i:s");
        $data = [
            'id_tiket' => $this->request->getVar('id_tiket'),
            'nilai_performance' => $this->request->getVar('nilai_performance'),
            'nilai_sikap' => $this->request->getVar('nilai_sikap'),
            'nilai_kerjasama' => $this->request->getVar('nilai_kerjasama'),
            'nilai_disiplin' => $this->request->getVar('nilai_disiplin'),
            'nilai_komunikasi' => $this->request->getVar('nilai_komunikasi'),
            'nilai_tanggung_jawab' => $this->request->getVar('nilai_tanggung_jawab'),
            'nilai_teknis' => $this->request->getVar('nilai_teknis'),
            'catatan_nilai' => $this->request->getVar('catatan_nilai'),
            'tgl_input' =>  $tgl,
        ];
        if($nilai==0){
            $nilaiModel->insert($data);
            $this->generate_qrcode($this->request->getVar('id_tiket'),$this->request->getVar('kode_tiket'));
        }else{
            $nilaiModel->update($this->request->getVar('id_tiket'), $data);
        }
        
        $data = [
            'id_tiket' => $this->request->getVar('id_tiket'),
            'id_user' => session()->get('id_user'),
            'tgl_aktifitas' =>  $tgl,
            'aktifitas' => "Memperbaharui Form Penilaian",
            'color' => "primary",
            'icon' => "far fa-edit",
        ];
        $logModel->insert($data);

        $response = [
            'status' => 200,
            'message' => "Form Penilaian berhasil di update."
        ];
        
        echo json_encode($response);

    }

    //QRCODE
    public function generate_qrcode($id_tiket,$kode_tiket)
    {
        // $myURL = md5($this->request->getVar('id_tiket'));
        $myURL = $id_tiket;
        $image_name = strval($myURL) . '.png';

        $data = base_url("homepage/detail-nilai/") ."/". strval($id_tiket) ."/". strval($kode_tiket);
        $size = '300x300';
        $logo = './public/assets/image/favicon/logo_bangkalan.png';
        
        $QR = imagecreatefrompng('https://chart.googleapis.com/chart?cht=qr&chld=H|1&chs=' . $size . '&chl=' . urlencode($data));

        // START TO DRAW THE IMAGE ON THE QR CODE
        $logo = @imagecreatefromstring(file_get_contents($logo));
        imagecolortransparent($logo , imagecolorallocatealpha($logo , 0, 0, 0, 127));
        imagealphablending($logo , false);
        imagesavealpha($logo , true);
        
        $QR_width = imagesx($QR);
        $QR_height = imagesy($QR);

        $logo_width = imagesx($logo);
        $logo_height = imagesy($logo);

        // Scale logo to fit in the QR Code
        $logo_qr_width = $QR_width/3;
        $scale = $logo_width/$logo_qr_width;
        $logo_qr_height = $logo_height/$scale;

        imagecopyresampled($QR, $logo, $QR_width/3, $QR_height/3, 0, 0, $logo_qr_width, $logo_qr_height, $logo_width, $logo_height);

        // END OF DRAW

        imagepng($QR, './public/assets/qrcode/' . $image_name);
        imagedestroy($QR);
    }
}