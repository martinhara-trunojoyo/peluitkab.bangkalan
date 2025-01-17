<?php

namespace App\Controllers;

use App\Models\Pelayanan;
use App\Models\Faq;
use App\Models\User;
use App\Models\Opd;
use App\Models\Tiket;

use App\Models\Tiket_magang;
use App\Models\Tiket_magang_nilai;
use App\Models\User_magang;

class Home extends BaseController
{
    public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
    }
    public function index()
    {
        $userModel = new Pelayanan();
        $array = array('active' => 1);
        $users = $userModel->where($array)->findAll();
        $data['list_pelayanan'] = $users;
        $data['title'] = 'dashboard';
        // return view('homepage',$data);
        return view('homepage/dashboard',$data);
    }
    
    public function list()
    {
        return view('list_app');
    }

    public function login()
    {
        return view('auth/login');
    }

    public function register()
    {
        return view('auth/register');
    }

    public function dashboard()
    {
        return view('admin/dashboard');
    }

    public function zoom()
    {
        $data['title'] = "Zoom Meeting";
        $data['id_pelayanan'] = "1";
        return view('guest/kalender',$data);
    }

    public function sub_domain()
    {
        $data['title'] = "Sub Domain";
        $data['id_pelayanan'] = "5";
        return view('guest/chart_bar',$data);
    }

    public function magang_page()
    {
        $data = array(
            'title' => 'magang'
        );
        return view('homepage/magang',$data);
    }

    public function faq_page()
    {
        $userModel = new Faq();
        $users = $userModel->where('active', 1)->findAll();
        
        $data = array(
            'title' => 'faq',
            'list_faq' => $users
        );
        return view('homepage/faq',$data);
    }

    

    public function get_faq()
    {
        $userModel = new Faq();
        $users = $userModel->where('active', 1)->findAll();

        echo json_encode($users);
    }

    public function help_desk_page()
    {
        $data = array(
            'title' => 'help'
        );
        return view('homepage/helpdesk',$data);
    }

    public function detail_tiket_page($id_tiket, $kode_tiket)
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
                'title' => 'tiket',
                'kode_tiket' => $kode_tiket,
                'tgl_input' => $tgl_indo,
                'time' => date('H:i:s A', $date),
                'jenis_pelayanan' => $pelayanan["nama_pelayanan"],
                'nama' => $user["nama"],
                'opd' => $opd["akronim_opd"],
                'status_tiket' => $status,
                'id_tiket' => $id_tiket,
            );

            return view('homepage/tiket',$data);
        }
        
    }
    
    public function detail_tiket_nilai($id_tiket, $kode_tiket)
    {
        $tiketModel = new Tiket_magang();
        $array = array('id_tiket' => $id_tiket);
        $tiket = $tiketModel->where($array)->findAll();
        if(count($tiket)==0){
            return view('errors/html/error_404');
        }else{
            $tiket = $tiketModel->where($array)->first();

            $userModel = new User();
            $array = array('id_ssuser' => $tiket["id_user"]);
            $user = $userModel->where($array)->first();
            
            $array = array('id_ssuser' => $tiket["id_pembina_lapangan"]);
            $user_pembimbing = $userModel->where($array)->first();
            
            $user_magangModel = new User_magang();
            $array = array('id_ssuser' => $tiket["id_user"]);
            $user_magang = $user_magangModel->where($array)->first();
            
            $opdModel = new Opd();
            $array = array('id_opd' => $tiket["id_opd"]);
            $opd = $opdModel->where($array)->first();
            
            // TGL INDO
            $tgl_awal = strtotime($tiket["tgl_awal"]);
            $tgl_akhir = strtotime($tiket["tgl_akhir"]);

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
            $new_tgl_awal = date('Y-m-d', $tgl_awal);
            $new_tgl_akhir = date('Y-m-d', $tgl_akhir);

            $split_tgl_awal = explode('-', $new_tgl_awal);
            $tgl_indo_tgl_awal = $split_tgl_awal[2] . ' ' . $bulan[ (int)$split_tgl_awal[1] ] . ' ' . $split_tgl_awal[0];
            
            $split_tgl_akhir = explode('-', $new_tgl_akhir);
            $tgl_indo_tgl_awal = $split_tgl_akhir[2] . ' ' . $bulan[ (int)$split_tgl_akhir[1] ] . ' ' . $split_tgl_akhir[0];

            // STATUS
            if($tiket["status"]==1){
                $status = "SELESAI";
            }elseif($tiket["status"]==2){
                $status = "DIBATALKAN";
            }elseif($tiket["status"]==0){
                $status = "DITOLAK";
            }else{
                $status = "PROSES";
            }

            // NILAI
            $db = \Config\Database::connect();
            $nilai = $db->table('tb_tiket_magang_nilai')->where('tb_tiket_magang_nilai.id_tiket', $id_tiket)->countAllResults();
            if($nilai==0){
                $nilai_performance = 0;
                $nilai_sikap = 0;
                $nilai_kerjasama = 0;
                $nilai_disiplin = 0;
                $nilai_komunikasi = 0;
                $nilai_tanggung_jawab = 0;
                $nilai_teknis = 0;
                $catatan_nilai = "";
                
                // RATA RATA
                $average = 0;
            }else{
                $nilai = $db->table('tb_tiket_magang_nilai')->where('tb_tiket_magang_nilai.id_tiket', $id_tiket)->get()->getRowArray();

                $nilai_performance = $nilai["nilai_performance"];
                $nilai_sikap = $nilai["nilai_sikap"];
                $nilai_kerjasama = $nilai["nilai_kerjasama"];
                $nilai_disiplin = $nilai["nilai_disiplin"];
                $nilai_komunikasi = $nilai["nilai_komunikasi"];
                $nilai_tanggung_jawab = $nilai["nilai_tanggung_jawab"];
                $nilai_teknis = $nilai["nilai_teknis"];
                $catatan_nilai = $nilai["catatan_nilai"];

                // RATA RATA
                $array_average = array($nilai_performance,$nilai_sikap,$nilai_kerjasama,$nilai_disiplin,$nilai_komunikasi,$nilai_tanggung_jawab,$nilai_teknis);
                $average = intval(array_sum($array_average) / count($array_average));
            }

            $nilai_performance_huruf = ($nilai_performance >= 80 ? "A" : ($nilai_performance >= 68 ? "B" : ($nilai_performance >= 56 ? "C": ($nilai_performance >= 45 ? "D" : "E"))));
            $nilai_sikap_huruf = ($nilai_sikap >= 80 ? "A" : ($nilai_sikap >= 68 ? "B" : ($nilai_sikap >= 56 ? "C": ($nilai_sikap >= 45 ? "D" : "E"))));
            $nilai_kerjasama_huruf = ($nilai_kerjasama >= 80 ? "A" : ($nilai_kerjasama >= 68 ? "B" : ($nilai_kerjasama >= 56 ? "C": ($nilai_kerjasama >= 45 ? "D" : "E"))));
            $nilai_disiplin_huruf = ($nilai_disiplin >= 80 ? "A" : ($nilai_disiplin >= 68 ? "B" : ($nilai_disiplin >= 56 ? "C": ($nilai_disiplin >= 45 ? "D" : "E"))));
            $nilai_komunikasi_huruf = ($nilai_komunikasi >= 80 ? "A" : ($nilai_komunikasi >= 68 ? "B" : ($nilai_komunikasi >= 56 ? "C": ($nilai_komunikasi >= 45 ? "D" : "E"))));
            $nilai_tanggung_jawab_huruf = ($nilai_tanggung_jawab >= 80 ? "A" : ($nilai_tanggung_jawab >= 68 ? "B" : ($nilai_tanggung_jawab >= 56 ? "C": ($nilai_tanggung_jawab >= 45 ? "D" : "E"))));
            $nilai_teknis_huruf = ($nilai_teknis >= 80 ? "A" : ($nilai_teknis >= 68 ? "B" : ($nilai_teknis >= 56 ? "C": ($nilai_teknis >= 45 ? "D" : "E"))));

            $average_huruf = ($average >= 80 ? "A" : ($average >= 68 ? "B" : ($average >= 56 ? "C": ($average >= 45 ? "D" : "E"))));

            $data = array(
                'kode_tiket' => $kode_tiket,
                'id_tiket' => $id_tiket,
                'nama' => $user["nama"],
                'nomor_induk' => $user_magang["nomor_induk"],
                'jurusan' => $user_magang["jurusan"],
                'civitas' => $user_magang["civitas"],
                'opd' => $opd["nama_opd"],
                'tgl_awal' => $tgl_indo_tgl_awal,
                'tgl_akhir' => $tgl_indo_tgl_awal,
                'pembimbing' => $user_pembimbing["nama"],
                'nilai_performance' => $nilai_performance,
                'nilai_sikap' => $nilai_sikap,
                'nilai_kerjasama' => $nilai_kerjasama,
                'nilai_disiplin' => $nilai_disiplin,
                'nilai_komunikasi' => $nilai_komunikasi,
                'nilai_tanggung_jawab' => $nilai_tanggung_jawab,
                'nilai_teknis' => $nilai_teknis,
                'catatan_nilai' => $catatan_nilai,
                'catatan' => $tiket["catatan"],
                'status' => $status,
                'nilai_performance_huruf' => $nilai_performance_huruf,
                'nilai_sikap_huruf' => $nilai_sikap_huruf,
                'nilai_kerjasama_huruf' => $nilai_kerjasama_huruf,
                'nilai_disiplin_huruf' => $nilai_disiplin_huruf,
                'nilai_komunikasi_huruf' => $nilai_komunikasi_huruf,
                'nilai_tanggung_jawab_huruf' => $nilai_tanggung_jawab_huruf,
                'nilai_teknis_huruf' => $nilai_teknis_huruf,
                'rata_rata' => $average,
                'rata_rata_huruf' => $average_huruf,
            );
            return view('print/nilai',$data);
        }
        
    }

    // -----------------------------------------------------------------------------------------------------------------------
    // Statistik

    public function orders_tiket_magang()
    {
        $tgl = date("Y-m-d H:i:s");
        
        $db = \Config\Database::connect();

        $count_proses = $db->table('tb_tiket_magang')->where("date_part('year', tb_tiket_magang.tgl_input)", date("Y", strtotime($tgl)))->where('tb_tiket_magang.status >=', 3)->countAllResults(); 
        $count_selesai = $db->table('tb_tiket_magang')->where("date_part('year', tb_tiket_magang.tgl_input)", date("Y", strtotime($tgl)))->where('tb_tiket_magang.status', 1)->countAllResults(); 
        $count_tolak = $db->table('tb_tiket_magang')->where("date_part('year', tb_tiket_magang.tgl_input)", date("Y", strtotime($tgl)))->where('tb_tiket_magang.status', 0)->countAllResults(); 
        $count_semua = $db->table('tb_tiket_magang')->where("date_part('year', tb_tiket_magang.tgl_input)", date("Y", strtotime($tgl)))->countAllResults();
        
        $data = array(
            'count_proses' => $count_proses,
            'count_selesai' => $count_selesai,
            'count_tolak' => $count_tolak,
            'count_semua' => $count_semua,
            'tahun' => date("Y"),
        );
        echo json_encode($data);
    }

    public function orders_tiket_magang_jenis()
    {
        $tgl = date("Y-m-d H:i:s");
        
        $db = \Config\Database::connect();

        $count_mahasiswa = $db->table('ssuser_magang')->join('ssuser', 'ssuser_magang.id_ssuser = ssuser.id_ssuser', 'left')->where("date_part('year', ssuser.tgl_input)", date("Y", strtotime($tgl)))->where('ssuser.active', 1)->where('ssuser_magang.jenis', 1)->countAllResults(); 
        $count_siswa = $db->table('ssuser_magang')->join('ssuser', 'ssuser_magang.id_ssuser = ssuser.id_ssuser', 'left')->where("date_part('year', ssuser.tgl_input)", date("Y", strtotime($tgl)))->where('ssuser.active', 1)->where('ssuser_magang.jenis', 0)->countAllResults(); 
        $count_semua = $db->table('ssuser_magang')->join('ssuser', 'ssuser_magang.id_ssuser = ssuser.id_ssuser', 'left')->where("date_part('year', ssuser.tgl_input)", date("Y", strtotime($tgl)))->where('ssuser.active', 1)->countAllResults(); 
        
        $data = array(
            'count_mahasiswa' => $count_mahasiswa,
            'count_siswa' => $count_siswa,
            'count_semua' => $count_semua,
            'tahun' => date("Y"),
        );
        echo json_encode($data);
    }

    public function orders_get_magang_id()
    {
        $user_magangModel = new User_magang();
        $array = array('nomor_induk' =>  $this->request->getVar('id'));
        $user_magang = $user_magangModel->where($array)->findAll();

        if(count($user_magang)==0){
            $response = array(
                'status' => 404,
                'message' => "Data tidak ditemukan.",
            );
        }else{
            $array = array('nomor_induk' =>  $this->request->getVar('id'));
            $user_magang = $user_magangModel->where($array)->first();

            $userModel = new User();
            $array = array('id_ssuser' => $user_magang["id_ssuser"]);
            $user = $userModel->where($array)->first();

            // $status = 0;
            // if($user["active"]==1){

            // }

            $projekModel = new Tiket_magang();
            $array = array('id_user' => $user_magang["id_ssuser"]);
            $projek = $projekModel->where($array)->first();

            $opdModel = new Opd();
            $array = array('id_opd' => $projek["id_opd"]);
            $opd = $opdModel->where($array)->first();
            
            $date =strtotime($projek["tgl_input"]);
            
            $data = array(
                'nama' => $user["nama"],
                'foto' => $user["file_foto"],
                'civitas' => $user_magang["civitas"],
                'opd' => $opd["akronim_opd"],
                'pembina' => $user["file_foto"],
                'nomor_induk' => $user_magang["nomor_induk"],
                'active' => $user["active"],
                'nama_pembimbing' => $projek["nama_pembimbing"],
                'nama_project' => $projek["nama_project"],
                'tgl' => date("d-m-Y", $date),
            );

            $response = array(
                'status' => 500,
                'message' => "Berhasil.",
                'data' => $data,
            );
        }
        
        echo json_encode($response);
    }

    public function orders_tiket_magang_jenis_bulan()
    {
        $tgl = date("Y-m-d H:i:s");
        $tgl_input = $this->request->getVar('tgl');
        
        $db = \Config\Database::connect();

        $count_mahasiswa = $db->table('ssuser_magang')->join('ssuser', 'ssuser_magang.id_ssuser = ssuser.id_ssuser', 'left')->where("date_part('month', ssuser.tgl_input)", date("m", strtotime($tgl_input)))->where("date_part('year', ssuser.tgl_input)", date("Y", strtotime($tgl_input)))->where('ssuser.active', 1)->where('ssuser_magang.jenis', 1)->countAllResults(); 
        $count_siswa = $db->table('ssuser_magang')->join('ssuser', 'ssuser_magang.id_ssuser = ssuser.id_ssuser', 'left')->where("date_part('month', ssuser.tgl_input)", date("m", strtotime($tgl_input)))->where("date_part('year', ssuser.tgl_input)", date("Y", strtotime($tgl_input)))->where('ssuser.active', 1)->where('ssuser_magang.jenis', 0)->countAllResults(); 
        
        $data = array(
            'count_mahasiswa' => $count_mahasiswa,
            'count_siswa' => $count_siswa,
            'tahun' => date("Y"),
        );
        echo json_encode($data);
    }

    public function orders_tiket_magang_jenis_hari()
    {
        $tgl = date("Y-m-d H:i:s");
        $tgl_input = $this->request->getVar('tgl');
        
        $db = \Config\Database::connect();

        $count_semua = $db->table('tb_tiket_magang')->where("date_part('month', tb_tiket_magang.tgl_input)", date("m", strtotime($tgl_input)))->where("date_part('year', tb_tiket_magang.tgl_input)", date("Y", strtotime($tgl_input)))->get()->getResult(); 
        
        echo json_encode($count_semua);
    }

    // -----------------------------------------------------------------------------------------------------------------------
    // Homepage

    public function orders_tiket_pelayanan()
    {
        $tgl = date("Y-m-d H:i:s");
        
        $db = \Config\Database::connect();

        $count_proses = $db->table('tb_tiket')->where("date_part('year', tb_tiket.tgl_input)", date("Y", strtotime($tgl)))->where('tb_tiket.status', 0)->countAllResults(); 
        $count_selesai = $db->table('tb_tiket')->where("date_part('year', tb_tiket.tgl_input)", date("Y", strtotime($tgl)))->where('tb_tiket.status', 1)->countAllResults(); 
        $count_tolak = $db->table('tb_tiket')->where("date_part('year', tb_tiket.tgl_input)", date("Y", strtotime($tgl)))->where('tb_tiket.status', 2)->countAllResults(); 
        $count_semua = $db->table('tb_tiket')->where("date_part('year', tb_tiket.tgl_input)", date("Y", strtotime($tgl)))->countAllResults();
        
        $data = array(
            'count_proses' => $count_proses,
            'count_selesai' => $count_selesai,
            'count_tolak' => $count_tolak,
            'count_semua' => $count_semua,
            'tahun' => date("Y"),
        );
        echo json_encode($data);
    }

    public function orders_tiket_data_master()
    {
        $tgl = date("Y-m-d H:i:s");
        
        $db = \Config\Database::connect();

        $count_siswa = $db->table('sspelayanan')->select('sspelayanan.id_opd, count(sspelayanan.id_opd)')->where('sspelayanan.active', 1)->groupBy('sspelayanan.id_opd')->countAllResults(); 
        $count_mahasiswa = $db->table('ssuser')->where('ssuser.active', 1)->countAllResults(); 
        $count_semua = $db->table('sspelayanan')->where('sspelayanan.active', 1)->countAllResults(); 
        
        $data = array(
            'count_mahasiswa' => $count_mahasiswa,
            'count_siswa' => $count_siswa,
            'count_semua' => $count_semua,
            'tahun' => date("Y"),
        );
        echo json_encode($data);
    }

    // -----------------------------------------------------------------------------------------------------------------------
    // Notifikasi
    
    public function notification($chat_id,$message)
    {
        $apiToken = "5891211388:AAEEr5OkhKVGZi0JMt2ENhHLLmJFDKlspiE";
        $data = [
        'chat_id' => $chat_id,
        'text' => $message 
        ];
        $response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" . http_build_query($data) );
        $response = json_decode($response);
        // return $response->ok;
        return $response;
    }
}