<?php

namespace App\Controllers;

use App\Models\Tiket;
use App\Models\Log_tiket;
use App\Models\Log_tiket_magang;

use App\Models\Tiket_aula;
use App\Models\Tiket_subdomain;
use App\Models\Tiket_upload;
use App\Models\Tiket_hosting;
use App\Models\Tiket_tte;
use App\Models\Tiket_app;

use App\Models\Tiket_jaringan;
use App\Models\Tiket_jaringan_foto;

use App\Models\Tiket_alat;
use App\Models\Tiket_alat_list;
use App\Models\Tiket_zoom;

use App\Models\Tiket_magang;
use App\Models\FormField;

class Form extends BaseController
{
    public function __construct()
    {
        helper(['form', 'url']);
        date_default_timezone_set('Asia/Jakarta');
    }
    
    public function get_tiket()
    {
        $db = \Config\Database::connect();

        if(session()->get('id_role') == 0){
            if($this->request->getVar('status')==4){
                $builder = $db->table('tb_tiket')->select('tb_tiket.id_tiket, tb_tiket.kode_tiket, tb_tiket.tgl_input, tb_tiket.status, sspelayanan.nama_pelayanan, sspelayanan.route, ssuser.nama, ssopd.akronim_opd')->join('sspelayanan', 'tb_tiket.id_pelayanan = sspelayanan.id_pelayanan', 'left')->join('ssuser', 'ssuser.id_ssuser = tb_tiket.id_user', 'left')->join('ssopd', 'ssopd.id_opd = ssuser.id_opd', 'left')->orderBy('tb_tiket.id_tiket', 'DESC')->get()->getResult();
            }else{
                $builder = $db->table('tb_tiket')->select('tb_tiket.id_tiket, tb_tiket.kode_tiket, tb_tiket.tgl_input, tb_tiket.status, sspelayanan.nama_pelayanan, sspelayanan.route, ssuser.nama, ssopd.akronim_opd')->join('sspelayanan', 'tb_tiket.id_pelayanan = sspelayanan.id_pelayanan', 'left')->join('ssuser', 'ssuser.id_ssuser = tb_tiket.id_user', 'left')->join('ssopd', 'ssopd.id_opd = ssuser.id_opd', 'left')->where('tb_tiket.status', $this->request->getVar('status'))->where("date_part('year', tb_tiket.tgl_input)", $this->request->getVar('tahun'))->orderBy('tb_tiket.id_tiket', 'DESC')->get()->getResult();
            }
        }else{
            if($this->request->getVar('status')==4){
                $builder = $db->table('tb_tiket')->select('tb_tiket.id_tiket, tb_tiket.kode_tiket, tb_tiket.tgl_input, tb_tiket.status, sspelayanan.nama_pelayanan, sspelayanan.route, ssuser.nama, ssopd.akronim_opd')->join('sspelayanan', 'tb_tiket.id_pelayanan = sspelayanan.id_pelayanan', 'left')->join('ssuser', 'ssuser.id_ssuser = tb_tiket.id_user', 'left')->join('ssopd', 'ssopd.id_opd = ssuser.id_opd', 'left')->where('tb_tiket.id_user', session()->get('id_user'))->orderBy('tb_tiket.id_tiket', 'DESC')->get()->getResult();
            }else{
                $builder = $db->table('tb_tiket')->select('tb_tiket.id_tiket, tb_tiket.kode_tiket, tb_tiket.tgl_input, tb_tiket.status, sspelayanan.nama_pelayanan, sspelayanan.route, ssuser.nama, ssopd.akronim_opd')->join('sspelayanan', 'tb_tiket.id_pelayanan = sspelayanan.id_pelayanan', 'left')->join('ssuser', 'ssuser.id_ssuser = tb_tiket.id_user', 'left')->join('ssopd', 'ssopd.id_opd = ssuser.id_opd', 'left')->where('tb_tiket.id_user', session()->get('id_user'))->where('tb_tiket.status', $this->request->getVar('status'))->where("date_part('year', tb_tiket.tgl_input)", $this->request->getVar('tahun'))->orderBy('tb_tiket.id_tiket', 'DESC')->get()->getResult();
            }
        }
        
        echo json_encode($builder);
    }

    public function get_count_tiket()
    {
        $db = \Config\Database::connect();

        if(session()->get('id_role') == 0){
            $proses = $db->table('tb_tiket')->select('tb_tiket.id_tiket, tb_tiket.kode_tiket, tb_tiket.tgl_input, tb_tiket.status, sspelayanan.nama_pelayanan, ssuser.nama, ssopd.akronim_opd')->join('sspelayanan', 'tb_tiket.id_pelayanan = sspelayanan.id_pelayanan', 'left')->join('ssuser', 'ssuser.id_ssuser = tb_tiket.id_user', 'left')->join('ssopd', 'ssopd.id_opd = ssuser.id_opd', 'left')->where('tb_tiket.status', 0)->where("date_part('year', tb_tiket.tgl_input)", $this->request->getVar('tahun'))->orderBy('tb_tiket.id_tiket', 'DESC')->countAllResults();
            $selesai = $db->table('tb_tiket')->select('tb_tiket.id_tiket, tb_tiket.kode_tiket, tb_tiket.tgl_input, tb_tiket.status, sspelayanan.nama_pelayanan, ssuser.nama, ssopd.akronim_opd')->join('sspelayanan', 'tb_tiket.id_pelayanan = sspelayanan.id_pelayanan', 'left')->join('ssuser', 'ssuser.id_ssuser = tb_tiket.id_user', 'left')->join('ssopd', 'ssopd.id_opd = ssuser.id_opd', 'left')->where('tb_tiket.status', 1)->where("date_part('year', tb_tiket.tgl_input)", $this->request->getVar('tahun'))->orderBy('tb_tiket.id_tiket', 'DESC')->countAllResults();
            $tolak = $db->table('tb_tiket')->select('tb_tiket.id_tiket, tb_tiket.kode_tiket, tb_tiket.tgl_input, tb_tiket.status, sspelayanan.nama_pelayanan, ssuser.nama, ssopd.akronim_opd')->join('sspelayanan', 'tb_tiket.id_pelayanan = sspelayanan.id_pelayanan', 'left')->join('ssuser', 'ssuser.id_ssuser = tb_tiket.id_user', 'left')->join('ssopd', 'ssopd.id_opd = ssuser.id_opd', 'left')->where('tb_tiket.status', 2)->where("date_part('year', tb_tiket.tgl_input)", $this->request->getVar('tahun'))->orderBy('tb_tiket.id_tiket', 'DESC')->countAllResults();
            $batal = $db->table('tb_tiket')->select('tb_tiket.id_tiket, tb_tiket.kode_tiket, tb_tiket.tgl_input, tb_tiket.status, sspelayanan.nama_pelayanan, ssuser.nama, ssopd.akronim_opd')->join('sspelayanan', 'tb_tiket.id_pelayanan = sspelayanan.id_pelayanan', 'left')->join('ssuser', 'ssuser.id_ssuser = tb_tiket.id_user', 'left')->join('ssopd', 'ssopd.id_opd = ssuser.id_opd', 'left')->where('tb_tiket.status', 3)->where("date_part('year', tb_tiket.tgl_input)", $this->request->getVar('tahun'))->orderBy('tb_tiket.id_tiket', 'DESC')->countAllResults();
            $semua = $db->table('tb_tiket')->select('tb_tiket.id_tiket, tb_tiket.kode_tiket, tb_tiket.tgl_input, tb_tiket.status, sspelayanan.nama_pelayanan, ssuser.nama, ssopd.akronim_opd')->join('sspelayanan', 'tb_tiket.id_pelayanan = sspelayanan.id_pelayanan', 'left')->join('ssuser', 'ssuser.id_ssuser = tb_tiket.id_user', 'left')->join('ssopd', 'ssopd.id_opd = ssuser.id_opd', 'left')->where("date_part('year', tb_tiket.tgl_input)", $this->request->getVar('tahun'))->orderBy('tb_tiket.id_tiket', 'DESC')->countAllResults();
            
        }else{
            $proses = $db->table('tb_tiket')->select('tb_tiket.id_tiket, tb_tiket.kode_tiket, tb_tiket.tgl_input, tb_tiket.status, sspelayanan.nama_pelayanan, ssuser.nama, ssopd.akronim_opd')->join('sspelayanan', 'tb_tiket.id_pelayanan = sspelayanan.id_pelayanan', 'left')->join('ssuser', 'ssuser.id_ssuser = tb_tiket.id_user', 'left')->join('ssopd', 'ssopd.id_opd = ssuser.id_opd', 'left')->where('tb_tiket.id_user', session()->get('id_user'))->where('tb_tiket.status', 0)->where("date_part('year', tb_tiket.tgl_input)", $this->request->getVar('tahun'))->orderBy('tb_tiket.id_tiket', 'DESC')->countAllResults();
            $selesai = $db->table('tb_tiket')->select('tb_tiket.id_tiket, tb_tiket.kode_tiket, tb_tiket.tgl_input, tb_tiket.status, sspelayanan.nama_pelayanan, ssuser.nama, ssopd.akronim_opd')->join('sspelayanan', 'tb_tiket.id_pelayanan = sspelayanan.id_pelayanan', 'left')->join('ssuser', 'ssuser.id_ssuser = tb_tiket.id_user', 'left')->join('ssopd', 'ssopd.id_opd = ssuser.id_opd', 'left')->where('tb_tiket.id_user', session()->get('id_user'))->where('tb_tiket.status', 1)->where("date_part('year', tb_tiket.tgl_input)", $this->request->getVar('tahun'))->orderBy('tb_tiket.id_tiket', 'DESC')->countAllResults();
            $tolak = $db->table('tb_tiket')->select('tb_tiket.id_tiket, tb_tiket.kode_tiket, tb_tiket.tgl_input, tb_tiket.status, sspelayanan.nama_pelayanan, ssuser.nama, ssopd.akronim_opd')->join('sspelayanan', 'tb_tiket.id_pelayanan = sspelayanan.id_pelayanan', 'left')->join('ssuser', 'ssuser.id_ssuser = tb_tiket.id_user', 'left')->join('ssopd', 'ssopd.id_opd = ssuser.id_opd', 'left')->where('tb_tiket.id_user', session()->get('id_user'))->where('tb_tiket.status', 2)->where("date_part('year', tb_tiket.tgl_input)", $this->request->getVar('tahun'))->orderBy('tb_tiket.id_tiket', 'DESC')->countAllResults();
            $batal = $db->table('tb_tiket')->select('tb_tiket.id_tiket, tb_tiket.kode_tiket, tb_tiket.tgl_input, tb_tiket.status, sspelayanan.nama_pelayanan, ssuser.nama, ssopd.akronim_opd')->join('sspelayanan', 'tb_tiket.id_pelayanan = sspelayanan.id_pelayanan', 'left')->join('ssuser', 'ssuser.id_ssuser = tb_tiket.id_user', 'left')->join('ssopd', 'ssopd.id_opd = ssuser.id_opd', 'left')->where('tb_tiket.id_user', session()->get('id_user'))->where('tb_tiket.status', 3)->where("date_part('year', tb_tiket.tgl_input)", $this->request->getVar('tahun'))->orderBy('tb_tiket.id_tiket', 'DESC')->countAllResults();
            $semua = $db->table('tb_tiket')->select('tb_tiket.id_tiket, tb_tiket.kode_tiket, tb_tiket.tgl_input, tb_tiket.status, sspelayanan.nama_pelayanan, ssuser.nama, ssopd.akronim_opd')->join('sspelayanan', 'tb_tiket.id_pelayanan = sspelayanan.id_pelayanan', 'left')->join('ssuser', 'ssuser.id_ssuser = tb_tiket.id_user', 'left')->join('ssopd', 'ssopd.id_opd = ssuser.id_opd', 'left')->where('tb_tiket.id_user', session()->get('id_user'))->where("date_part('year', tb_tiket.tgl_input)", $this->request->getVar('tahun'))->orderBy('tb_tiket.id_tiket', 'DESC')->countAllResults();
            
        }
        
        $response = [
            'proses' => $proses,
            'selesai' => $selesai,
            'tolak' => $tolak,
            'batal' => $batal,
            'semua' => $semua,
        ];
        
        echo json_encode($response);
    }

    public function get_tiket_pelayanan()
    {
        $db = \Config\Database::connect();
        if($this->request->getVar('status')==4){
            $builder = $db->table('tb_tiket')->select('tb_tiket.id_tiket, tb_tiket.kode_tiket, tb_tiket.tgl_input, tb_tiket.status, sspelayanan.nama_pelayanan, ssuser.nama, ssopd.akronim_opd')->join('sspelayanan', 'tb_tiket.id_pelayanan = sspelayanan.id_pelayanan', 'left')->join('ssuser', 'ssuser.id_ssuser = tb_tiket.id_user', 'left')->join('ssopd', 'ssopd.id_opd = ssuser.id_opd', 'left')->where('tb_tiket.id_pelayanan', $this->request->getVar('id_pelayanan'))->orderBy('tb_tiket.id_tiket', 'DESC')->get()->getResult();
        }else{
            $builder = $db->table('tb_tiket')->select('tb_tiket.id_tiket, tb_tiket.kode_tiket, tb_tiket.tgl_input, tb_tiket.status, sspelayanan.nama_pelayanan, ssuser.nama, ssopd.akronim_opd')->join('sspelayanan', 'tb_tiket.id_pelayanan = sspelayanan.id_pelayanan', 'left')->join('ssuser', 'ssuser.id_ssuser = tb_tiket.id_user', 'left')->join('ssopd', 'ssopd.id_opd = ssuser.id_opd', 'left')->where('tb_tiket.id_pelayanan', $this->request->getVar('id_pelayanan'))->where('tb_tiket.status', $this->request->getVar('status'))->where("date_part('year', tb_tiket.tgl_input)", $this->request->getVar('tahun'))->orderBy('tb_tiket.id_tiket', 'DESC')->get()->getResult();
        }
        
        echo json_encode($builder);
    }

    public function get_count_tiket_pelayanan()
    {
        $db = \Config\Database::connect();
        $proses = $db->table('tb_tiket')->select('tb_tiket.id_tiket, tb_tiket.kode_tiket, tb_tiket.tgl_input, tb_tiket.status, sspelayanan.nama_pelayanan, ssuser.nama, ssopd.akronim_opd')->join('sspelayanan', 'tb_tiket.id_pelayanan = sspelayanan.id_pelayanan', 'left')->join('ssuser', 'ssuser.id_ssuser = tb_tiket.id_user', 'left')->join('ssopd', 'ssopd.id_opd = ssuser.id_opd', 'left')->where('tb_tiket.id_pelayanan', $this->request->getVar('id_pelayanan'))->where('tb_tiket.status', 0)->where("date_part('year', tb_tiket.tgl_input)", $this->request->getVar('tahun'))->orderBy('tb_tiket.id_tiket', 'DESC')->countAllResults();
        $selesai = $db->table('tb_tiket')->select('tb_tiket.id_tiket, tb_tiket.kode_tiket, tb_tiket.tgl_input, tb_tiket.status, sspelayanan.nama_pelayanan, ssuser.nama, ssopd.akronim_opd')->join('sspelayanan', 'tb_tiket.id_pelayanan = sspelayanan.id_pelayanan', 'left')->join('ssuser', 'ssuser.id_ssuser = tb_tiket.id_user', 'left')->join('ssopd', 'ssopd.id_opd = ssuser.id_opd', 'left')->where('tb_tiket.id_pelayanan', $this->request->getVar('id_pelayanan'))->where('tb_tiket.status', 1)->where("date_part('year', tb_tiket.tgl_input)", $this->request->getVar('tahun'))->orderBy('tb_tiket.id_tiket', 'DESC')->countAllResults();
        $tolak = $db->table('tb_tiket')->select('tb_tiket.id_tiket, tb_tiket.kode_tiket, tb_tiket.tgl_input, tb_tiket.status, sspelayanan.nama_pelayanan, ssuser.nama, ssopd.akronim_opd')->join('sspelayanan', 'tb_tiket.id_pelayanan = sspelayanan.id_pelayanan', 'left')->join('ssuser', 'ssuser.id_ssuser = tb_tiket.id_user', 'left')->join('ssopd', 'ssopd.id_opd = ssuser.id_opd', 'left')->where('tb_tiket.id_pelayanan', $this->request->getVar('id_pelayanan'))->where('tb_tiket.status', 2)->where("date_part('year', tb_tiket.tgl_input)", $this->request->getVar('tahun'))->orderBy('tb_tiket.id_tiket', 'DESC')->countAllResults();
        $batal = $db->table('tb_tiket')->select('tb_tiket.id_tiket, tb_tiket.kode_tiket, tb_tiket.tgl_input, tb_tiket.status, sspelayanan.nama_pelayanan, ssuser.nama, ssopd.akronim_opd')->join('sspelayanan', 'tb_tiket.id_pelayanan = sspelayanan.id_pelayanan', 'left')->join('ssuser', 'ssuser.id_ssuser = tb_tiket.id_user', 'left')->join('ssopd', 'ssopd.id_opd = ssuser.id_opd', 'left')->where('tb_tiket.id_pelayanan', $this->request->getVar('id_pelayanan'))->where('tb_tiket.status', 3)->where("date_part('year', tb_tiket.tgl_input)", $this->request->getVar('tahun'))->orderBy('tb_tiket.id_tiket', 'DESC')->countAllResults();
        $semua = $db->table('tb_tiket')->select('tb_tiket.id_tiket, tb_tiket.kode_tiket, tb_tiket.tgl_input, tb_tiket.status, sspelayanan.nama_pelayanan, ssuser.nama, ssopd.akronim_opd')->join('sspelayanan', 'tb_tiket.id_pelayanan = sspelayanan.id_pelayanan', 'left')->join('ssuser', 'ssuser.id_ssuser = tb_tiket.id_user', 'left')->join('ssopd', 'ssopd.id_opd = ssuser.id_opd', 'left')->where('tb_tiket.id_pelayanan', $this->request->getVar('id_pelayanan'))->where("date_part('year', tb_tiket.tgl_input)", $this->request->getVar('tahun'))->orderBy('tb_tiket.id_tiket', 'DESC')->countAllResults();
        
        $response = [
            'proses' => $proses,
            'selesai' => $selesai,
            'tolak' => $tolak,
            'batal' => $batal,
            'semua' => $semua,
        ];
        
        echo json_encode($response);
    }
    // -----------------------------------------------------------------------------------------------------------------------
    // Zoom
    public function zoom_page()
    {
        $data = array(
            'title' => 'tiket'
        );
        return view('form_tiket/zoom',$data);
    }
    public function add_zoom()
    {
        $userModel = new Tiket();

        $tgl = date("Y-m-d H:i:s");
        $data = [
            'kode_tiket' => $this->request->getVar('kode_zoom'),
            'tgl_input'    => $tgl,
            'id_pelayanan'    => 4,
            'id_user'    => session()->get('id_user'),
            'status'    => 0,
        ];

        $userModel->insert($data);
        $id = $userModel->getInsertID();


        $dataBerkas = $this->request->getFile('berkas');
        $fileName = md5($id).".".$dataBerkas->guessExtension();
        $fileName = str_replace(" ","",$fileName);
        $dataBerkas->move('./public/assets/berkas/surat-pengantar',$fileName);
        
        $zoomModel = new Tiket_zoom();

        $data = [
            'id_tiket' => $id,
            'nama_acara' => $this->request->getVar('acara'),
            'tgl_awal' =>  date("Y-m-d H:i:s", strtotime($this->request->getVar('tgl_mulai'))),
            'tgl_akhir' => date("Y-m-d H:i:s", strtotime($this->request->getVar('tgl_akhir'))),
            'nama_pic' => $this->request->getVar('nama_pic'),
            'no_pic' => $this->request->getVar('nomor_pic'),
            'jenis_zoom' => $this->request->getVar('jenis'),
            'meeting_id' => $this->request->getVar('meeting_id'),
            'passcode' => $this->request->getVar('passcode'),
            'tempat' => $this->request->getVar('tempat'),
            'operator' => $this->request->getVar('is_operator'),
            'berkas_pengantar' => $fileName,
        ];

        $zoomModel->insert($data);

        
        // NOTIFIKASI
        $this->notification(4);
        

        $logModel = new Log_tiket();
        $data = [
            'id_tiket' => $id,
            'id_user' => session()->get('id_user'),
            'tgl_aktifitas' =>  $tgl,
            'aktifitas' => "Membuat tiket",
            'color' => "warning",
            'icon' => "fas fa-ticket-alt",
        ];

        $logModel->insert($data);
        
        if($this->request->getVar('is_aula')=="1"){
            $data = [
                'kode_tiket' => $this->request->getVar('kode_aula'),
                'tgl_input'    => $tgl,
                'id_pelayanan'    => 6,
                'id_user'    => session()->get('id_user'),
                'status'    => 0,
            ];

            $userModel->insert($data);
            $id = $userModel->getInsertID();
            
            $aulaModel = new Tiket_aula();

            $data = [
                'id_tiket' => $id,
                'nama_acara' => $this->request->getVar('acara'),
                'tgl_awal' =>  date("Y-m-d H:i:s", strtotime($this->request->getVar('tgl_mulai'))),
                'tgl_akhir' => date("Y-m-d H:i:s", strtotime($this->request->getVar('tgl_akhir'))),
                'id_aula' => $this->request->getVar('myAula'),
                'nama_pic' => $this->request->getVar('nama_pic'),
                'no_pic' => $this->request->getVar('nomor_pic'),
                'berkas_pengantar' => $fileName,
            ];

            $aulaModel->insert($data);

            $logModel = new Log_tiket();
            $data = [
                'id_tiket' => $id,
                'id_user' => session()->get('id_user'),
                'tgl_aktifitas' =>  $tgl,
                'aktifitas' => "Membuat tiket",
                'color' => "warning",
                'icon' => "fas fa-ticket-alt",
            ];

            $logModel->insert($data);
            
            // NOTIFIKASI
            $this->notification(6);
            
        }

        if($this->request->getVar('is_alat')=="1"){
            $data = [
                'kode_tiket' => $this->request->getVar('kode_alat'),
                'tgl_input'    => $tgl,
                'id_pelayanan'    => 13,
                'id_user'    => session()->get('id_user'),
                'status'    => 0,
            ];

            $userModel->insert($data);
            $id = $userModel->getInsertID();
            
            $alatModel = new Tiket_alat();

            $data = [
                'id_tiket' => $id,
                'nama_acara' => $this->request->getVar('acara'),
                'tgl_awal' =>  date("Y-m-d H:i:s", strtotime($this->request->getVar('tgl_mulai'))),
                'tgl_akhir' => date("Y-m-d H:i:s", strtotime($this->request->getVar('tgl_akhir'))),
                'nama_pic' => $this->request->getVar('nama_pic'),
                'no_pic' => $this->request->getVar('nomor_pic'),
                'berkas_pengantar' => $fileName,
            ];

            $alatModel->insert($data);

            $listModel = new Tiket_alat_list();
            $array_pelayanan = explode(",",$this->request->getVar('myAlat'));
            for($x =0;$x<count($array_pelayanan);$x++){
                $data = [
                    'id_pelayanan_alat' => $id,
                    'id_alat'    => $array_pelayanan[$x],
                ];

                $listModel->insert($data);
            }

            $logModel = new Log_tiket();
            $data = [
                'id_tiket' => $id,
                'id_user' => session()->get('id_user'),
                'tgl_aktifitas' =>  $tgl,
                'aktifitas' => "Membuat tiket",
                'color' => "warning",
                'icon' => "fas fa-ticket-alt",
            ];

            $logModel->insert($data);
            
            // NOTIFIKASI
            $this->notification(13);
        
        }

        $response = [
            'status' => 200,
            'message' => "Tiket Berhasil Dibuat."
        ];
        
        echo json_encode($response);
    }

    public function add_zoom_calendar()
    {
        $db = \Config\Database::connect();
        // $builder = $db->table('tb_tiket_aula')->select('tb_tiket.id_tiket, tb_tiket_aula.tgl_awal as start, tb_tiket_aula.tgl_akhir as end, tb_tiket_aula.nama_acara as description, ssopd.akronim_opd as title, tb_tiket.status, tb_tiket.status as color, ssaula.nama_aula')->join('tb_tiket', 'tb_tiket.id_tiket = tb_tiket_aula.id_tiket', 'left')->join('ssuser', 'ssuser.id_ssuser = tb_tiket.id_user', 'left')->join('ssopd', 'ssopd.id_opd = ssuser.id_opd', 'left')->join('ssaula', 'ssaula.id_aula = tb_tiket_aula.id_aula', 'left')->where("date_part('month', tb_tiket_aula.tgl_awal)", date("m", strtotime($this->request->getVar('tgl'))))->where("date_part('year', tb_tiket_aula.tgl_awal)", date("Y", strtotime($this->request->getVar('tgl'))))->get()->getResult();
        
        // foreach ($builder as $row)
        // {
        //     if($row->status=="0"){
        //         $row->color = "#2B9DDE";
        //     }elseif($row->status=="1"){
        //         $row->color = "#2BDE77";
        //     }elseif($row->status=="2"){
        //         $row->color = "#DE2B2B";
        //     }else{
        //         $row->color = "#C9C9C9";
        //     }
        // }

        $builder_zoom = $db->table('tb_tiket_zoom')->select('tb_tiket.id_tiket, tb_tiket_zoom.tgl_awal as start, tb_tiket_zoom.tempat as nama_aula, tb_tiket_zoom.tgl_akhir as end, tb_tiket_zoom.nama_acara as description, ssopd.akronim_opd as title, tb_tiket.status, tb_tiket.status as color')->join('tb_tiket', 'tb_tiket.id_tiket = tb_tiket_zoom.id_tiket', 'left')->join('ssuser', 'ssuser.id_ssuser = tb_tiket.id_user', 'left')->join('ssopd', 'ssopd.id_opd = ssuser.id_opd', 'left')->where("date_part('month', tb_tiket_zoom.tgl_awal)", date("m", strtotime($this->request->getVar('tgl'))))->where("date_part('year', tb_tiket_zoom.tgl_awal)", date("Y", strtotime($this->request->getVar('tgl'))))->get()->getResult();
        // array_merge_recursive
        foreach ($builder_zoom as $row)
        {
            if($row->status=="0"){
                $row->color = "#2B9DDE";
            }elseif($row->status=="1"){
                $row->color = "#2BDE77";
            }elseif($row->status=="2"){
                $row->color = "#DE2B2B";
            }else{
                $row->color = "#C9C9C9";
            }
        }

        $response = [
            'status' => $this->request->getVar('tgl'),
            'message' => $builder_zoom
        ];
        echo json_encode($builder_zoom);

    }

    // -----------------------------------------------------------------------------------------------------------------------
    // AULA

    public function aula_page()
    {
        $data = array(
            'title' => 'tiket'
        );
        return view('form_tiket/aula',$data);
    }

    public function add_aula()
    {
        $userModel = new Tiket();

        $tgl = date("Y-m-d H:i:s");
        $data = [
            'kode_tiket' => $this->request->getVar('kode'),
            'tgl_input'    => $tgl,
            'id_pelayanan'    => 6,
            'id_user'    => session()->get('id_user'),
            'status'    => 0,
        ];

        $userModel->insert($data);
        $id = $userModel->getInsertID();

        $aulaModel = new Tiket_aula();

        $dataBerkas = $this->request->getFile('berkas');
        $fileName = md5($id).".".$dataBerkas->guessExtension();
        $fileName = str_replace(" ","",$fileName);
        $dataBerkas->move('./public/assets/berkas/surat-pengantar',$fileName);
        $data = [
            'id_tiket' => $id,
            'nama_acara' => $this->request->getVar('acara'),
            'tgl_awal' =>  date("Y-m-d H:i:s", strtotime($this->request->getVar('tgl_mulai'))),
            'tgl_akhir' => date("Y-m-d H:i:s", strtotime($this->request->getVar('tgl_akhir'))),
            'id_aula' => $this->request->getVar('myAula'),
            'nama_pic' => $this->request->getVar('nama_pic'),
            'no_pic' => $this->request->getVar('nomor_pic'),
            'berkas_pengantar' => $fileName,
        ];

        $aulaModel->insert($data);

        $logModel = new Log_tiket();
        $data = [
            'id_tiket' => $id,
            'id_user' => session()->get('id_user'),
            'tgl_aktifitas' =>  $tgl,
            'aktifitas' => "Membuat tiket",
            'color' => "warning",
            'icon' => "fas fa-ticket-alt",
        ];

        $logModel->insert($data);


        $response = [
            'status' => 200,
            'message' => "Tiket Berhasil Dibuat."
        ];

        // NOTIFIKASI
        $this->notification(6);
        
        echo json_encode($response);
    }

    public function add_aula_calendar()
    {
        $db = \Config\Database::connect();
        // $builder = $db->table('tb_tiket_aula')->join('tb_tiket', 'tb_tiket.id_tiket = tb_tiket_aula.id_tiket', 'left')->get()->getResult();
        $builder = $db->table('tb_tiket_aula')->select('tb_tiket.id_tiket, tb_tiket_aula.tgl_awal as start, tb_tiket_aula.tgl_akhir as end, tb_tiket_aula.nama_acara as description, ssopd.akronim_opd as title, tb_tiket.status, tb_tiket.status as color, ssaula.nama_aula')->join('tb_tiket', 'tb_tiket.id_tiket = tb_tiket_aula.id_tiket', 'left')->join('ssuser', 'ssuser.id_ssuser = tb_tiket.id_user', 'left')->join('ssopd', 'ssopd.id_opd = ssuser.id_opd', 'left')->join('ssaula', 'ssaula.id_aula = tb_tiket_aula.id_aula', 'left')->where("date_part('month', tb_tiket_aula.tgl_awal)", date("m", strtotime($this->request->getVar('tgl'))))->where("date_part('year', tb_tiket_aula.tgl_awal)", date("Y", strtotime($this->request->getVar('tgl'))))->get()->getResult();
        
        foreach ($builder as $row)
        {
            if($row->status=="0"){
                $row->color = "#2B9DDE";
            }elseif($row->status=="1"){
                $row->color = "#2BDE77";
            }elseif($row->status=="2"){
                $row->color = "#DE2B2B";
            }else{
                $row->color = "#C9C9C9";
            }
        }
        $response = [
            'status' => $this->request->getVar('tgl'),
            'message' => $builder
        ];
        echo json_encode($builder);

    }

    // -----------------------------------------------------------------------------------------------------------------------
    // Subdomain
    public function subdomain_page()
    {
        $data = array(
            'title' => 'tiket'
        );
        return view('form_tiket/sub-domain',$data);
    }

    public function add_subdomain()
    {
        $userModel = new Tiket();

        $tgl = date("Y-m-d H:i:s");
        $data = [
            'kode_tiket' => $this->request->getVar('kode'),
            'tgl_input'    => $tgl,
            'id_pelayanan'    => 5,
            'id_user'    => session()->get('id_user'),
            'status'    => 0,
        ];

        $userModel->insert($data);
        $id = $userModel->getInsertID();

        $subModel = new Tiket_subdomain();

        $dataBerkas = $this->request->getFile('berkas');
        $fileName = md5($id).".".$dataBerkas->guessExtension();
        $fileName = str_replace(" ","",$fileName);
        $dataBerkas->move('./public/assets/berkas/surat-pengantar',$fileName);
        $data = [
            'id_tiket' => $id,
            'nama_subdomain' => $this->request->getVar('subdomain'),
            'ip_publik' => $this->request->getVar('ip'),
            'nama_pic' => $this->request->getVar('nama_pic'),
            'no_pic' => $this->request->getVar('nomor_pic'),
            'berkas_pengantar' => $fileName,
        ];

        $subModel->insert($data);

        $logModel = new Log_tiket();
        $data = [
            'id_tiket' => $id,
            'id_user' => session()->get('id_user'),
            'tgl_aktifitas' =>  $tgl,
            'aktifitas' => "Membuat tiket",
            'color' => "warning",
            'icon' => "fas fa-ticket-alt",
        ];

        $logModel->insert($data);

        $response = [
            'status' => 200,
            'message' => "Tiket Berhasil Dibuat."
        ];

        // NOTIFIKASI
        $this->notification(5);
        
        echo json_encode($response);
    }

    // -----------------------------------------------------------------------------------------------------------------------
    // Upload Dokumen
    
    public function upload_page()
    {
        $data = array(
            'title' => 'tiket'
        );
        return view('form_tiket/upload',$data);
    }

    public function add_upload()
    {
        $userModel = new Tiket();

        $tgl = date("Y-m-d H:i:s");
        $data = [
            'kode_tiket' => $this->request->getVar('kode'),
            'tgl_input'    => $tgl,
            'id_pelayanan'    => 7,
            'id_user'    => session()->get('id_user'),
            'status'    => 0,
        ];

        $userModel->insert($data);
        $id = $userModel->getInsertID();

        $subModel = new Tiket_upload();

        $dataBerkas = $this->request->getFile('berkas');
        $fileName = md5($id).".".$dataBerkas->guessExtension();
        $fileName = str_replace(" ","",$fileName);
        $dataBerkas->move('./public/assets/berkas/surat-pengantar',$fileName);

        $dataBerkass = $this->request->getFile('dokumen');
        $fileNames = md5($id).".".$dataBerkass->guessExtension();
        $fileNames = str_replace(" ","",$fileNames);
        $dataBerkass->move('./public/assets/berkas/upload',$fileNames);

        $data = [
            'id_tiket' => $id,
            'edisi' => $this->request->getVar('edisi'),
            'jenis_dokumen' => $this->request->getVar('jenis'),
            'nama_pic' => $this->request->getVar('nama_pic'),
            'no_pic' => $this->request->getVar('nomor_pic'),
            'berkas_pengantar' => $fileName,
            'berkas_upload' => $fileNames,
        ];

        $subModel->insert($data);

        $logModel = new Log_tiket();
        $data = [
            'id_tiket' => $id,
            'id_user' => session()->get('id_user'),
            'tgl_aktifitas' =>  $tgl,
            'aktifitas' => "Membuat tiket",
            'color' => "warning",
            'icon' => "fas fa-ticket-alt",
        ];

        $logModel->insert($data);

        $response = [
            'status' => 200,
            'message' => "Tiket Berhasil Dibuat."
        ];
        
        // NOTIFIKASI
        $this->notification(7);
        
        echo json_encode($response);
    }

    // -----------------------------------------------------------------------------------------------------------------------
    // Hosting
    
    public function hosting_page()
    {
        $data = array(
            'title' => 'tiket'
        );
        return view('form_tiket/hosting',$data);
    }

    public function add_hosting()
    {
        $userModel = new Tiket();

        $tgl = date("Y-m-d H:i:s");
        $data = [
            'kode_tiket' => $this->request->getVar('kode'),
            'tgl_input'    => $tgl,
            'id_pelayanan'    => 8,
            'id_user'    => session()->get('id_user'),
            'status'    => 0,
        ];

        $userModel->insert($data);
        $id = $userModel->getInsertID();

        $subModel = new Tiket_hosting();

        $dataBerkas = $this->request->getFile('berkas');
        $fileName = md5($id).".".$dataBerkas->guessExtension();
        $fileName = str_replace(" ","",$fileName);
        $dataBerkas->move('./public/assets/berkas/surat-pengantar',$fileName);

        $data = [
            'id_tiket' => $id,
            'nama_aplikasi' => $this->request->getVar('nama'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'spesifikasi' => $this->request->getVar('spesifikasi'),
            'nama_pic' => $this->request->getVar('nama_pic'),
            'no_pic' => $this->request->getVar('nomor_pic'),
            'berkas_pengantar' => $fileName,
        ];

        $subModel->insert($data);

        $logModel = new Log_tiket();
        $data = [
            'id_tiket' => $id,
            'id_user' => session()->get('id_user'),
            'tgl_aktifitas' =>  $tgl,
            'aktifitas' => "Membuat tiket",
            'color' => "warning",
            'icon' => "fas fa-ticket-alt",
        ];

        $logModel->insert($data);

        $response = [
            'status' => 200,
            'message' => "Tiket Berhasil Dibuat."
        ];

        // NOTIFIKASI
        $this->notification(8);
        
        echo json_encode($response);
    }

    // -----------------------------------------------------------------------------------------------------------------------
    // TTE
    public function tte_page()
    {
        $data = array(
            'title' => 'tiket'
        );
        return view('form_tiket/tte',$data);
    }

    public function add_tte()
    {
        $userModel = new Tiket();

        $tgl = date("Y-m-d H:i:s");
        $data = [
            'kode_tiket' => $this->request->getVar('kode'),
            'tgl_input'    => $tgl,
            'id_pelayanan'    => 9,
            'id_user'    => session()->get('id_user'),
            'status'    => 0,
        ];

        $userModel->insert($data);
        $id = $userModel->getInsertID();

        $subModel = new Tiket_tte();

        $dataBerkas = $this->request->getFile('berkas');
        $fileName = md5($id).".".$dataBerkas->guessExtension();
        $fileName = str_replace(" ","",$fileName);
        $dataBerkas->move('./public/assets/berkas/surat-pengantar',$fileName);

        $dataBerkass = $this->request->getFile('ktp');
        $fileNames = md5($id).".".$dataBerkass->guessExtension();
        $fileNames = str_replace(" ","",$fileNames);
        $dataBerkass->move('./public/assets/berkas/ktp',$fileNames);

        $data = [
            'id_tiket' => $id,
            'jenis_layanan' => $this->request->getVar('jenis'),
            'nama' => $this->request->getVar('nama'),
            'jabatan' => $this->request->getVar('jabatan'),
            'nip' => $this->request->getVar('nip'),
            'nik' => $this->request->getVar('nik'),
            'nama_pic' => $this->request->getVar('nama_pic'),
            'no_pic' => $this->request->getVar('nomor_pic'),
            'berkas_pengantar' => $fileName,
            'berkas_ktp' => $fileNames,
        ];

        $subModel->insert($data);

        $logModel = new Log_tiket();
        $data = [
            'id_tiket' => $id,
            'id_user' => session()->get('id_user'),
            'tgl_aktifitas' =>  $tgl,
            'aktifitas' => "Membuat tiket",
            'color' => "warning",
            'icon' => "fas fa-ticket-alt",
        ];

        $logModel->insert($data);

        $response = [
            'status' => 200,
            'message' => "Tiket Berhasil Dibuat."
        ];
        
        // NOTIFIKASI
        $this->notification(9);
        
        echo json_encode($response);
    }

    // -----------------------------------------------------------------------------------------------------------------------
    // APP
    public function app_page()
    {
        $data = array(
            'title' => 'tiket'
        );
        return view('form_tiket/app',$data);
    }

    public function add_app()
    {
        $userModel = new Tiket();

        $tgl = date("Y-m-d H:i:s");
        $data = [
            'kode_tiket' => $this->request->getVar('kode'),
            'tgl_input'    => $tgl,
            'id_pelayanan'    => 10,
            'id_user'    => session()->get('id_user'),
            'status'    => 0,
        ];

        $userModel->insert($data);
        $id = $userModel->getInsertID();

        $subModel = new Tiket_app();

        $dataBerkas = $this->request->getFile('berkas');
        $fileName = md5($id).".".$dataBerkas->guessExtension();
        $fileName = str_replace(" ","",$fileName);
        $dataBerkas->move('./public/assets/berkas/surat-pengantar',$fileName);

        $data = [
            'id_tiket' => $id,
            'nama_aplikasi' => $this->request->getVar('nama'),
            'deskripsi_aplikasi' => $this->request->getVar('deskripsi'),
            'tgl' => $this->request->getVar('tgl'),
            'tempat' => $this->request->getVar('tempat'),
            'agenda' => $this->request->getVar('agenda'),
            'nama_pic' => $this->request->getVar('nama_pic'),
            'no_pic' => $this->request->getVar('nomor_pic'),
            'berkas_pengantar' => $fileName,
        ];

        $subModel->insert($data);

        $logModel = new Log_tiket();
        $data = [
            'id_tiket' => $id,
            'id_user' => session()->get('id_user'),
            'tgl_aktifitas' =>  $tgl,
            'aktifitas' => "Membuat tiket",
            'color' => "warning",
            'icon' => "fas fa-ticket-alt",
        ];

        $logModel->insert($data);

        $response = [
            'status' => 200,
            'message' => "Tiket Berhasil Dibuat."
        ];
        
        // NOTIFIKASI
        $this->notification(10);

        echo json_encode($response);
    }

    // -----------------------------------------------------------------------------------------------------------------------
    // Jaringan jaringan
    public function jaringan_page()
    {
        $data = array(
            'title' => 'tiket'
        );
        return view('form_tiket/jaringan',$data);
    }

    public function add_jaringan()
    {
        $userModel = new Tiket();

        $tgl = date("Y-m-d H:i:s");
        $data = [
            'kode_tiket' => $this->request->getVar('kode'),
            'tgl_input'    => $tgl,
            'id_pelayanan'    => 11,
            'id_user'    => session()->get('id_user'),
            'status'    => 0,
        ];

        $userModel->insert($data);
        $id = $userModel->getInsertID();

        $subModel = new Tiket_jaringan();

        $dataBerkas = $this->request->getFile('berkas');
        $fileName = md5($id).".".$dataBerkas->guessExtension();
        $fileName = str_replace(" ","",$fileName);
        $dataBerkas->move('./public/assets/berkas/surat-pengantar',$fileName);

        $data = [
            'id_tiket' => $id,
            'tgl_kejadian' => $this->request->getVar('tgl'),
            'keluhan' => $this->request->getVar('keluhan'),
            'nama_pic' => $this->request->getVar('nama_pic'),
            'no_pic' => $this->request->getVar('nomor_pic'),
            'berkas_pengantar' => $fileName,
        ];

        $subModel->insert($data);
        $id_pelayanan = $subModel->getInsertID();
        
        for ($x = 0; $x < (int) $this->request->getVar('jumlah_dokumentasi'); $x++) {
            $dokumen = 'dokumentasi_'.(string) $x;
            $dataBerkass = $this->request->getFile($dokumen); 
            $fileNames = md5($id_pelayanan).'_dokumentasi_'.(string) $x.".".$dataBerkass->guessExtension();
            $fileNames = str_replace(" ","",$fileNames);
            $dataBerkass->move('./public/assets/berkas/dokumentasi',$fileNames);

            $dokumentasiModel = new Tiket_jaringan_foto();
            $data = [
                'id_pelayanan_jaringan' => $id_pelayanan,
                'berkas_foto' => $fileNames,
            ];

            $dokumentasiModel->insert($data);
        }

        $logModel = new Log_tiket();
        $data = [
            'id_tiket' => $id,
            'id_user' => session()->get('id_user'),
            'tgl_aktifitas' =>  $tgl,
            'aktifitas' => "Membuat tiket",
            'color' => "warning",
            'icon' => "fas fa-ticket-alt",
        ];

        $logModel->insert($data);

        $response = [
            'status' => 200,
            'message' => "Tiket Berhasil Dibuat."
        ];

        // NOTIFIKASI
        $this->notification(11);
        
        echo json_encode($response);
    }

    // -----------------------------------------------------------------------------------------------------------------------
    // Magang

    public function add_magang()
    {
        
        $userModel = new Tiket_magang();

        $array = array('id_user' => session()->get('id_user'), 'status >' => 3);
        $users = $userModel->where($array)->findAll();

        if(count($users)==0){
            $tgl = date("Y-m-d H:i:s");
            $data = [
                'kode_tiket' => $this->request->getVar('kode'),
                'tgl_input'    => $tgl,
                'id_user'    => session()->get('id_user'),
                'status'    => 3,
                'id_opd' => $this->request->getVar('id_opd'),
                'tgl_awal' => $this->request->getVar('tgl_awal'),
                'tgl_akhir' => $this->request->getVar('tgl_akhir'),
                'nama_pembimbing' => $this->request->getVar('nama'),
                'no_pembimbing' => $this->request->getVar('wa'),
            ];

            $userModel->insert($data);
            $id = $userModel->getInsertID();
            
            $dataBerkas = $this->request->getFile('berkas');
            $fileName = md5($id).".".$dataBerkas->guessExtension();
            $fileName = str_replace(" ","",$fileName);
            $dataBerkas->move('./public/assets/berkas/magang/surat-pengantar',$fileName);

            $data = [
                'surat_pengantar' => $fileName,
            ];

            $userModel->update($id, $data);

            $logModel = new Log_tiket_magang();
            $data = [
                'id_tiket' => $id,
                'id_user' => session()->get('id_user'),
                'tgl_aktifitas' =>  $tgl,
                'aktifitas' => "Membuat tiket",
                'color' => "warning",
                'icon' => "fas fa-ticket-alt",
            ];

            $logModel->insert($data);

            // NOTIFIKASI TO OPERATOR
            $db = \Config\Database::connect();
            $builder = $db->table('ssuser')->select('ssuser.id_chat')->where("ssuser.active", 1)->where("ssuser.role_id", 1)->where("ssuser.id_opd", $this->request->getVar('id_opd'))->get()->getResult();
            $user = $db->table('ssuser')->select('ssuser.nama, ssuser_magang.civitas')->join('ssuser_magang', 'ssuser_magang.id_ssuser = ssuser.id_ssuser', 'left')->where("ssuser.id_ssuser", session()->get('id_user'))->get()->getRow();
            
            foreach ($builder as $row)
            {
                $message = "Haloo Operator.
                \nAyo login, ada permohonan pelaksanaan magang yang harus kamu verifikasi. \nNama : ".$user->nama."\nCivitas : ". $user->civitas;
                helper('notification_helper');
                $hasil = telegram($row->id_chat,$message);
            }

            $response = [
                'status' => 200,
                'message' => "Tiket Berhasil Dibuat."
            ];
            
        }else{
            $response = [
                'status' => 500,
                'message' => "Anda masih menjalani proses magang."
            ];
        }
        
        
        echo json_encode($response);
    }

    public function get_count_magang()
    {
        $db = \Config\Database::connect();

        if( (int) session()->get('id_role') == 0){
            $proses = $db->table('tb_tiket_magang')->select('tb_tiket_magang.id_tiket')->where('tb_tiket_magang.status >=', 3)->where("date_part('year', tb_tiket_magang.tgl_input)", $this->request->getVar('tahun'))->orderBy('tb_tiket_magang.id_tiket', 'DESC')->countAllResults();
            $selesai = $db->table('tb_tiket_magang')->select('tb_tiket_magang.id_tiket')->where('tb_tiket_magang.status', 1)->where("date_part('year', tb_tiket_magang.tgl_input)", $this->request->getVar('tahun'))->orderBy('tb_tiket_magang.id_tiket', 'DESC')->countAllResults();
            $tolak = $db->table('tb_tiket_magang')->select('tb_tiket_magang.id_tiket')->where('tb_tiket_magang.status', 0)->where("date_part('year', tb_tiket_magang.tgl_input)", $this->request->getVar('tahun'))->orderBy('tb_tiket_magang.id_tiket', 'DESC')->countAllResults();
            $batal = $db->table('tb_tiket_magang')->select('tb_tiket_magang.id_tiket')->where('tb_tiket_magang.status', 2)->where("date_part('year', tb_tiket_magang.tgl_input)", $this->request->getVar('tahun'))->orderBy('tb_tiket_magang.id_tiket', 'DESC')->countAllResults();
            $semua = $db->table('tb_tiket_magang')->select('tb_tiket_magang.id_tiket')->where("date_part('year', tb_tiket_magang.tgl_input)", $this->request->getVar('tahun'))->orderBy('tb_tiket_magang.id_tiket', 'DESC')->countAllResults();
           
        }elseif ( (int) session()->get('id_role') == 1){
            $proses = $db->table('tb_tiket_magang')->select('tb_tiket_magang.id_tiket')->where('tb_tiket_magang.id_opd', session()->get('id_opd'))->where('tb_tiket_magang.status >=', 3)->where("date_part('year', tb_tiket_magang.tgl_input)", $this->request->getVar('tahun'))->orderBy('tb_tiket_magang.id_tiket', 'DESC')->countAllResults();
            $selesai = $db->table('tb_tiket_magang')->select('tb_tiket_magang.id_tiket')->where('tb_tiket_magang.id_opd', session()->get('id_opd'))->where('tb_tiket_magang.status', 1)->where("date_part('year', tb_tiket_magang.tgl_input)", $this->request->getVar('tahun'))->orderBy('tb_tiket_magang.id_tiket', 'DESC')->countAllResults();
            $tolak = $db->table('tb_tiket_magang')->select('tb_tiket_magang.id_tiket')->where('tb_tiket_magang.id_opd', session()->get('id_opd'))->where('tb_tiket_magang.status', 0)->where("date_part('year', tb_tiket_magang.tgl_input)", $this->request->getVar('tahun'))->orderBy('tb_tiket_magang.id_tiket', 'DESC')->countAllResults();
            $batal = $db->table('tb_tiket_magang')->select('tb_tiket_magang.id_tiket')->where('tb_tiket_magang.id_opd', session()->get('id_opd'))->where('tb_tiket_magang.status', 2)->where("date_part('year', tb_tiket_magang.tgl_input)", $this->request->getVar('tahun'))->orderBy('tb_tiket_magang.id_tiket', 'DESC')->countAllResults();
            $semua = $db->table('tb_tiket_magang')->select('tb_tiket_magang.id_tiket')->where('tb_tiket_magang.id_opd', session()->get('id_opd'))->where("date_part('year', tb_tiket_magang.tgl_input)", $this->request->getVar('tahun'))->orderBy('tb_tiket_magang.id_tiket', 'DESC')->countAllResults();
        
        }elseif ( (int) session()->get('id_role') == 3){
            $proses = $db->table('tb_tiket_magang')->select('tb_tiket_magang.id_tiket')->where('tb_tiket_magang.id_pembina_lapangan', session()->get('id_user'))->where('tb_tiket_magang.status >=', 3)->where("date_part('year', tb_tiket_magang.tgl_input)", $this->request->getVar('tahun'))->orderBy('tb_tiket_magang.id_tiket', 'DESC')->countAllResults();
            $selesai = $db->table('tb_tiket_magang')->select('tb_tiket_magang.id_tiket')->where('tb_tiket_magang.id_pembina_lapangan', session()->get('id_user'))->where('tb_tiket_magang.status', 1)->where("date_part('year', tb_tiket_magang.tgl_input)", $this->request->getVar('tahun'))->orderBy('tb_tiket_magang.id_tiket', 'DESC')->countAllResults();
            $tolak = $db->table('tb_tiket_magang')->select('tb_tiket_magang.id_tiket')->where('tb_tiket_magang.id_pembina_lapangan', session()->get('id_user'))->where('tb_tiket_magang.status', 0)->where("date_part('year', tb_tiket_magang.tgl_input)", $this->request->getVar('tahun'))->orderBy('tb_tiket_magang.id_tiket', 'DESC')->countAllResults();
            $batal = $db->table('tb_tiket_magang')->select('tb_tiket_magang.id_tiket')->where('tb_tiket_magang.id_pembina_lapangan', session()->get('id_user'))->where('tb_tiket_magang.status', 2)->where("date_part('year', tb_tiket_magang.tgl_input)", $this->request->getVar('tahun'))->orderBy('tb_tiket_magang.id_tiket', 'DESC')->countAllResults();
            $semua = $db->table('tb_tiket_magang')->select('tb_tiket_magang.id_tiket')->where('tb_tiket_magang.id_pembina_lapangan', session()->get('id_user'))->where("date_part('year', tb_tiket_magang.tgl_input)", $this->request->getVar('tahun'))->orderBy('tb_tiket_magang.id_tiket', 'DESC')->countAllResults();
        
        }else{
            $proses = $db->table('tb_tiket_magang')->select('tb_tiket_magang.id_tiket')->where('tb_tiket_magang.id_user', session()->get('id_user'))->where('tb_tiket_magang.status >=', 3)->where("date_part('year', tb_tiket_magang.tgl_input)", $this->request->getVar('tahun'))->orderBy('tb_tiket_magang.id_tiket', 'DESC')->countAllResults();
            $selesai = $db->table('tb_tiket_magang')->select('tb_tiket_magang.id_tiket')->where('tb_tiket_magang.id_user', session()->get('id_user'))->where('tb_tiket_magang.status', 1)->where("date_part('year', tb_tiket_magang.tgl_input)", $this->request->getVar('tahun'))->orderBy('tb_tiket_magang.id_tiket', 'DESC')->countAllResults();
            $tolak = $db->table('tb_tiket_magang')->select('tb_tiket_magang.id_tiket')->where('tb_tiket_magang.id_user', session()->get('id_user'))->where('tb_tiket_magang.status', 0)->where("date_part('year', tb_tiket_magang.tgl_input)", $this->request->getVar('tahun'))->orderBy('tb_tiket_magang.id_tiket', 'DESC')->countAllResults();
            $batal = $db->table('tb_tiket_magang')->select('tb_tiket_magang.id_tiket')->where('tb_tiket_magang.id_user', session()->get('id_user'))->where('tb_tiket_magang.status', 2)->where("date_part('year', tb_tiket_magang.tgl_input)", $this->request->getVar('tahun'))->orderBy('tb_tiket_magang.id_tiket', 'DESC')->countAllResults();
            $semua = $db->table('tb_tiket_magang')->select('tb_tiket_magang.id_tiket')->where('tb_tiket_magang.id_user', session()->get('id_user'))->where("date_part('year', tb_tiket_magang.tgl_input)", $this->request->getVar('tahun'))->orderBy('tb_tiket_magang.id_tiket', 'DESC')->countAllResults();
                
        }
        
        $response = [
            'proses' => $proses,
            'selesai' => $selesai,
            'tolak' => $tolak,
            'batal' => $batal,
            'semua' => $semua,
        ];
        
        echo json_encode($response);
    }

    public function get_tiket_magang()
    {
        $db = \Config\Database::connect();

        if(session()->get('id_role') == 0){
            if($this->request->getVar('status') < 3){
                $builder = $db->table('tb_tiket_magang')->select('tb_tiket_magang.id_tiket, tb_tiket_magang.kode_tiket, tb_tiket_magang.tgl_input, tb_tiket_magang.status, ssuser.nama, ssopd.akronim_opd, ssuser_magang.civitas')->join('ssuser', 'ssuser.id_ssuser = tb_tiket_magang.id_user', 'left')->join('ssopd', 'ssopd.id_opd = tb_tiket_magang.id_opd', 'left')->join('ssuser_magang', 'ssuser_magang.id_ssuser = tb_tiket_magang.id_user', 'left')->where('tb_tiket_magang.status', $this->request->getVar('status'))->where("date_part('year', tb_tiket_magang.tgl_input)", $this->request->getVar('tahun'))->orderBy('tb_tiket_magang.id_tiket', 'DESC')->get()->getResult();
            }elseif($this->request->getVar('status') == 1000){
                $builder = $db->table('tb_tiket_magang')->select('tb_tiket_magang.id_tiket, tb_tiket_magang.kode_tiket, tb_tiket_magang.tgl_input, tb_tiket_magang.status, ssuser.nama, ssopd.akronim_opd, ssuser_magang.civitas')->join('ssuser', 'ssuser.id_ssuser = tb_tiket_magang.id_user', 'left')->join('ssopd', 'ssopd.id_opd = tb_tiket_magang.id_opd', 'left')->join('ssuser_magang', 'ssuser_magang.id_ssuser = tb_tiket_magang.id_user', 'left')->orderBy('tb_tiket_magang.id_tiket', 'DESC')->get()->getResult();
            }else{
                $builder = $db->table('tb_tiket_magang')->select('tb_tiket_magang.id_tiket, tb_tiket_magang.kode_tiket, tb_tiket_magang.tgl_input, tb_tiket_magang.status, ssuser.nama, ssopd.akronim_opd, ssuser_magang.civitas')->join('ssuser', 'ssuser.id_ssuser = tb_tiket_magang.id_user', 'left')->join('ssopd', 'ssopd.id_opd = tb_tiket_magang.id_opd', 'left')->join('ssuser_magang', 'ssuser_magang.id_ssuser = tb_tiket_magang.id_user', 'left')->where('tb_tiket_magang.status >=', 3)->where("date_part('year', tb_tiket_magang.tgl_input)", $this->request->getVar('tahun'))->orderBy('tb_tiket_magang.id_tiket', 'DESC')->get()->getResult();
            }
        }elseif (session()->get('id_role') == 1){
            if($this->request->getVar('status') < 3){
                $builder = $db->table('tb_tiket_magang')->select('tb_tiket_magang.id_tiket, tb_tiket_magang.kode_tiket, tb_tiket_magang.tgl_input, tb_tiket_magang.status, ssuser.nama, ssopd.akronim_opd, ssuser_magang.civitas')->join('ssuser', 'ssuser.id_ssuser = tb_tiket_magang.id_user', 'left')->join('ssopd', 'ssopd.id_opd = tb_tiket_magang.id_opd', 'left')->join('ssuser_magang', 'ssuser_magang.id_ssuser = tb_tiket_magang.id_user', 'left')->where('tb_tiket_magang.status', $this->request->getVar('status'))->where('tb_tiket_magang.id_opd', session()->get('id_opd'))->where("date_part('year', tb_tiket_magang.tgl_input)", $this->request->getVar('tahun'))->orderBy('tb_tiket_magang.id_tiket', 'DESC')->get()->getResult();
            }elseif($this->request->getVar('status') == 1000){
                $builder = $db->table('tb_tiket_magang')->select('tb_tiket_magang.id_tiket, tb_tiket_magang.kode_tiket, tb_tiket_magang.tgl_input, tb_tiket_magang.status, ssuser.nama, ssopd.akronim_opd, ssuser_magang.civitas')->join('ssuser', 'ssuser.id_ssuser = tb_tiket_magang.id_user', 'left')->join('ssopd', 'ssopd.id_opd = tb_tiket_magang.id_opd', 'left')->join('ssuser_magang', 'ssuser_magang.id_ssuser = tb_tiket_magang.id_user', 'left')->where('tb_tiket_magang.id_opd', session()->get('id_opd'))->orderBy('tb_tiket_magang.id_tiket', 'DESC')->get()->getResult();
            }else{
                $builder = $db->table('tb_tiket_magang')->select('tb_tiket_magang.id_tiket, tb_tiket_magang.kode_tiket, tb_tiket_magang.tgl_input, tb_tiket_magang.status, ssuser.nama, ssopd.akronim_opd, ssuser_magang.civitas')->join('ssuser', 'ssuser.id_ssuser = tb_tiket_magang.id_user', 'left')->join('ssopd', 'ssopd.id_opd = tb_tiket_magang.id_opd', 'left')->join('ssuser_magang', 'ssuser_magang.id_ssuser = tb_tiket_magang.id_user', 'left')->where('tb_tiket_magang.status >=', 3)->where('tb_tiket_magang.id_opd', session()->get('id_opd'))->where("date_part('year', tb_tiket_magang.tgl_input)", $this->request->getVar('tahun'))->orderBy('tb_tiket_magang.id_tiket', 'DESC')->get()->getResult();
            }
        }elseif (session()->get('id_role') == 3){
            if($this->request->getVar('status') < 3){
                $builder = $db->table('tb_tiket_magang')->select('tb_tiket_magang.id_tiket, tb_tiket_magang.kode_tiket, tb_tiket_magang.tgl_input, tb_tiket_magang.status, ssuser.nama, ssopd.akronim_opd, ssuser_magang.civitas')->join('ssuser', 'ssuser.id_ssuser = tb_tiket_magang.id_user', 'left')->join('ssopd', 'ssopd.id_opd = tb_tiket_magang.id_opd', 'left')->join('ssuser_magang', 'ssuser_magang.id_ssuser = tb_tiket_magang.id_user', 'left')->where('tb_tiket_magang.status', $this->request->getVar('status'))->where('tb_tiket_magang.id_pembina_lapangan', session()->get('id_user'))->where("date_part('year', tb_tiket_magang.tgl_input)", $this->request->getVar('tahun'))->orderBy('tb_tiket_magang.id_tiket', 'DESC')->get()->getResult();
            }elseif($this->request->getVar('status') == 1000){
                $builder = $db->table('tb_tiket_magang')->select('tb_tiket_magang.id_tiket, tb_tiket_magang.kode_tiket, tb_tiket_magang.tgl_input, tb_tiket_magang.status, ssuser.nama, ssopd.akronim_opd, ssuser_magang.civitas')->join('ssuser', 'ssuser.id_ssuser = tb_tiket_magang.id_user', 'left')->join('ssopd', 'ssopd.id_opd = tb_tiket_magang.id_opd', 'left')->join('ssuser_magang', 'ssuser_magang.id_ssuser = tb_tiket_magang.id_user', 'left')->where('tb_tiket_magang.id_pembina_lapangan', session()->get('id_user'))->orderBy('tb_tiket_magang.id_tiket', 'DESC')->get()->getResult();
            }else{
                $builder = $db->table('tb_tiket_magang')->select('tb_tiket_magang.id_tiket, tb_tiket_magang.kode_tiket, tb_tiket_magang.tgl_input, tb_tiket_magang.status, ssuser.nama, ssopd.akronim_opd, ssuser_magang.civitas')->join('ssuser', 'ssuser.id_ssuser = tb_tiket_magang.id_user', 'left')->join('ssopd', 'ssopd.id_opd = tb_tiket_magang.id_opd', 'left')->join('ssuser_magang', 'ssuser_magang.id_ssuser = tb_tiket_magang.id_user', 'left')->where('tb_tiket_magang.status >=', 3)->where('tb_tiket_magang.id_pembina_lapangan', session()->get('id_user'))->where("date_part('year', tb_tiket_magang.tgl_input)", $this->request->getVar('tahun'))->orderBy('tb_tiket_magang.id_tiket', 'DESC')->get()->getResult();
            }
        }else{
            if($this->request->getVar('status') < 3){
                $builder = $db->table('tb_tiket_magang')->select('tb_tiket_magang.id_tiket, tb_tiket_magang.kode_tiket, tb_tiket_magang.tgl_input, tb_tiket_magang.status, ssuser.nama, ssopd.akronim_opd, ssuser_magang.civitas')->join('ssuser', 'ssuser.id_ssuser = tb_tiket_magang.id_user', 'left')->join('ssopd', 'ssopd.id_opd = tb_tiket_magang.id_opd', 'left')->join('ssuser_magang', 'ssuser_magang.id_ssuser = tb_tiket_magang.id_user', 'left')->where('tb_tiket_magang.status', $this->request->getVar('status'))->where('tb_tiket_magang.id_user', session()->get('id_user'))->where("date_part('year', tb_tiket_magang.tgl_input)", $this->request->getVar('tahun'))->orderBy('tb_tiket_magang.id_tiket', 'DESC')->get()->getResult();
            }elseif($this->request->getVar('status') == 1000){
                $builder = $db->table('tb_tiket_magang')->select('tb_tiket_magang.id_tiket, tb_tiket_magang.kode_tiket, tb_tiket_magang.tgl_input, tb_tiket_magang.status, ssuser.nama, ssopd.akronim_opd, ssuser_magang.civitas')->join('ssuser', 'ssuser.id_ssuser = tb_tiket_magang.id_user', 'left')->join('ssopd', 'ssopd.id_opd = tb_tiket_magang.id_opd', 'left')->join('ssuser_magang', 'ssuser_magang.id_ssuser = tb_tiket_magang.id_user', 'left')->where('tb_tiket_magang.id_user', session()->get('id_user'))->orderBy('tb_tiket_magang.id_tiket', 'DESC')->get()->getResult();
            }else{
                $builder = $db->table('tb_tiket_magang')->select('tb_tiket_magang.id_tiket, tb_tiket_magang.kode_tiket, tb_tiket_magang.tgl_input, tb_tiket_magang.status, ssuser.nama, ssopd.akronim_opd, ssuser_magang.civitas')->join('ssuser', 'ssuser.id_ssuser = tb_tiket_magang.id_user', 'left')->join('ssopd', 'ssopd.id_opd = tb_tiket_magang.id_opd', 'left')->join('ssuser_magang', 'ssuser_magang.id_ssuser = tb_tiket_magang.id_user', 'left')->where('tb_tiket_magang.status >=', 3)->where('tb_tiket_magang.id_user', session()->get('id_user'))->where("date_part('year', tb_tiket_magang.tgl_input)", $this->request->getVar('tahun'))->orderBy('tb_tiket_magang.id_tiket', 'DESC')->get()->getResult();
            }
        }
        
        echo json_encode($builder);
    }

    public function get_opd_operator()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('ssuser')->select('ssuser.id_opd, ssopd.nama_opd')->join('ssopd', 'ssopd.id_opd = ssuser.id_opd', 'left')->where('ssuser.role_id', 1)->distinct('ssuser.id_opd')->get()->getResult();
        
        echo json_encode($builder);
    }

    // -----------------------------------------------------------------------------------------------------------------------
    // Notifikasi
    public function notification($id_pelayanan)
    {
        $db = \Config\Database::connect();
        $pemohon = $db->table('ssuser')->select('ssuser.nama')->where('ssuser.id_ssuser', session()->get('id_user'))->get()->getRow();
        $opd = $db->table('ssopd')->select('ssopd.akronim_opd')->where('ssopd.id_opd', session()->get('id_opd'))->get()->getRow();

        $user = $db->table('verifikator_pelayanan')->select('verifikator_pelayanan.id_user')->where("verifikator_pelayanan.id_pelayanan", $id_pelayanan)->get()->getResult();
        if(count($user)!=0){
            // NOTIFIKASI TO Verifikator
            foreach ($user as $row)
            {
                $verifikator = $db->table('ssuser')->select('ssuser.id_chat')->where('ssuser.id_ssuser', $row->id_user)->get()->getRow();

                $message = "Haloo Verifikator.
                \nAyo login, ada permohonan tiket pelayanan yang harus kamu verifikasi. \nNama : ". $pemohon->nama."\nOPD   : ". $opd->akronim_opd;
                helper('notification_helper');
                $hasil = telegram($verifikator->id_chat,$message);
            }
        }else{
            // NOTIFIKASI TO Admin
            $builder = $db->table('ssuser')->select('ssuser.id_chat')->where("ssuser.active", 1)->where("ssuser.role_id", 0)->get()->getResult();
            foreach ($builder as $row)
            {
                $message = "Haloo Admin.
                \nAyo login, ada permohonan tiket pelayanan yang harus kamu verifikasi. \nNama : ". $pemohon->nama."\nOPD   : ". $opd->akronim_opd;
                helper('notification_helper');
                $hasil = telegram($row->id_chat,$message);
            }
        }
    }

    public function index($route)
    {
        $formFieldModel = new FormField();
        $fields = $formFieldModel->getFieldsByRoute($route);

        return view('form_view', ['fields' => $fields, 'route' => $route]);
    }
}