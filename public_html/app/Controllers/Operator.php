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

class Operator extends BaseController
{
    public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
    }
    // -----------------------------------------------------------------------------------------------------------------------
    // Dashboard
    public function orders_user()
    {
        $db = \Config\Database::connect();

        if(session()->get('id_role')==1){
            $count_pembimbing = $db->table('ssuser')->where('ssuser.active', 1)->where('ssuser.role_id', 3)->where('ssuser.id_opd', session()->get('id_opd'))->countAllResults();
            $count_operator = $db->table('ssuser')->where('ssuser.active', 1)->where('ssuser.role_id', 1)->where('ssuser.id_opd', session()->get('id_opd'))->countAllResults();
            $count_magang = $db->table('tb_tiket_magang')->select('count(tb_tiket_magang.id_user)')->join('ssuser', 'ssuser.id_ssuser = tb_tiket_magang.id_user', 'left')->where('ssuser.role_id', 4)->where('ssuser.active', 1)->where('tb_tiket_magang.id_opd', session()->get('id_opd'))->groupBy('ssuser.id_ssuser')->countAllResults();
            $count_all = $count_pembimbing + $count_operator + $count_magang;

            $data = array(
                'count_pembimbing' => $count_pembimbing,
                'count_operator' => $count_operator,
                'count_magang' => $count_magang,
                'count_all' => $count_all,
            );
        }elseif(session()->get('id_role')==2){
            $verifikator_pelayanan = $db->table('verifikator_pelayanan')->select('verifikator_pelayanan.id_pelayanan')->where('verifikator_pelayanan.id_user', session()->get('id_user'))->get()->getResult();
            $pelayanan = [];
            foreach ($verifikator_pelayanan as $row) {
                array_push($pelayanan, $row->id_pelayanan);
            }
            
            $instansi = $db->table('ssuser')->join('ssopd', 'ssuser.id_opd = ssopd.id_opd', 'left')->where('ssuser.id_ssuser', session()->get('id_user'))->get()->getRow();

            $data = array(
                'instansi' => $instansi->akronim_opd,
                'list_pelayanan' => $pelayanan,
                'count_pelayanan' => count($pelayanan),
            );
        } elseif(session()->get('id_role')==3){
            $instansi = $db->table('ssuser')->join('ssopd', 'ssuser.id_opd = ssopd.id_opd', 'left')->where('ssuser.id_ssuser', session()->get('id_user'))->get()->getRow();
            $ssuser_pembimbing = $db->table('ssuser_pembimbing')->where('ssuser_pembimbing.id_ssuser', session()->get('id_user'))->get()->getRow();
            $sub = $db->table('sub_bagian')->where('sub_bagian.id_sub', $ssuser_pembimbing->id_sub)->where('sub_bagian.active', 1)->get()->getRow();

            $data = array(
                'instansi' => $instansi->akronim_opd,
                'count_pelayanan' =>  $sub->nama_sub,
            );
        }else{
            $user = $db->table('ssuser_magang')->where('ssuser_magang.id_ssuser', session()->get('id_user'))->get()->getRow();
            
            if($user->gender == 0){
                $gender = "Perempuan";
            }else{
                $gender = "Laki-laki";
            }

            if($user->jenis == 0){
                $jenis = "Siswa";
            }else{
                $jenis = "Mahasiswa";
            }

            $data = array(
                'gender' => $gender,
                'civitas' =>  $user->civitas,
                'jurusan' =>  $jenis,
            );
        }

        echo json_encode($data);
    }

    public function orders_tiket()
    {
        $tgl = date("Y-m-d H:i:s");
        
        $db = \Config\Database::connect();

        if(session()->get('id_role')==1){
            if($this->request->getVar('id')==0){
                $count_proses = $db->table('tb_tiket')->where("date_part('day', tb_tiket.tgl_input)", date("d", strtotime($tgl)))->where("date_part('month', tb_tiket.tgl_input)", date("m", strtotime($tgl)))->where("date_part('year', tb_tiket.tgl_input)", date("Y", strtotime($tgl)))->where('tb_tiket.id_user', session()->get('id_user'))->where('tb_tiket.status', 0)->countAllResults();
                $count_selesai = $db->table('tb_tiket')->where("date_part('day', tb_tiket.tgl_input)", date("d", strtotime($tgl)))->where("date_part('month', tb_tiket.tgl_input)", date("m", strtotime($tgl)))->where("date_part('year', tb_tiket.tgl_input)", date("Y", strtotime($tgl)))->where('tb_tiket.id_user', session()->get('id_user'))->where('tb_tiket.status', 1)->countAllResults();
                $count_tolak = $db->table('tb_tiket')->where("date_part('day', tb_tiket.tgl_input)", date("d", strtotime($tgl)))->where("date_part('month', tb_tiket.tgl_input)", date("m", strtotime($tgl)))->where("date_part('year', tb_tiket.tgl_input)", date("Y", strtotime($tgl)))->where('tb_tiket.id_user', session()->get('id_user'))->where('tb_tiket.status', 2)->countAllResults();
                $count_semua = $db->table('tb_tiket')->where("date_part('day', tb_tiket.tgl_input)", date("d", strtotime($tgl)))->where("date_part('month', tb_tiket.tgl_input)", date("m", strtotime($tgl)))->where("date_part('year', tb_tiket.tgl_input)", date("Y", strtotime($tgl)))->where('tb_tiket.id_user', session()->get('id_user'))->countAllResults();

            }elseif($this->request->getVar('id')==1){
                $count_proses = $db->table('tb_tiket')->where("date_part('month', tb_tiket.tgl_input)", date("m", strtotime($tgl)))->where('tb_tiket.id_user', session()->get('id_user'))->where('tb_tiket.status', 0)->countAllResults();
                $count_selesai = $db->table('tb_tiket')->where("date_part('month', tb_tiket.tgl_input)", date("m", strtotime($tgl)))->where('tb_tiket.id_user', session()->get('id_user'))->where('tb_tiket.status', 1)->countAllResults();
                $count_tolak = $db->table('tb_tiket')->where("date_part('month', tb_tiket.tgl_input)", date("m", strtotime($tgl)))->where('tb_tiket.id_user', session()->get('id_user'))->where('tb_tiket.status', 2)->countAllResults();
                $count_semua = $db->table('tb_tiket')->where("date_part('month', tb_tiket.tgl_input)", date("m", strtotime($tgl)))->where('tb_tiket.id_user', session()->get('id_user'))->countAllResults();

            }else{
                $count_proses = $db->table('tb_tiket')->where("date_part('year', tb_tiket.tgl_input)", date("Y", strtotime($tgl)))->where('tb_tiket.id_user', session()->get('id_user'))->where('tb_tiket.status', 0)->countAllResults(); 
                $count_selesai = $db->table('tb_tiket')->where("date_part('year', tb_tiket.tgl_input)", date("Y", strtotime($tgl)))->where('tb_tiket.id_user', session()->get('id_user'))->where('tb_tiket.status', 1)->countAllResults(); 
                $count_tolak = $db->table('tb_tiket')->where("date_part('year', tb_tiket.tgl_input)", date("Y", strtotime($tgl)))->where('tb_tiket.id_user', session()->get('id_user'))->where('tb_tiket.status', 2)->countAllResults(); 
                $count_semua = $db->table('tb_tiket')->where("date_part('year', tb_tiket.tgl_input)", date("Y", strtotime($tgl)))->where('tb_tiket.id_user', session()->get('id_user'))->countAllResults(); 
            }
        }elseif(session()->get('id_role')==2){
            $verifikator_pelayanan = $db->table('verifikator_pelayanan')->select('verifikator_pelayanan.id_pelayanan')->where('verifikator_pelayanan.id_user', session()->get('id_user'))->get()->getResult();
            $pelayanan = [];
            foreach ($verifikator_pelayanan as $row) {
                array_push($pelayanan, $row->id_pelayanan);
            }
            
            // $test = $db->table('tb_tiket')->whereIn('tb_tiket.id_pelayanan', $pelayanan)->countAllResults(); 
            // $test_list = $db->table('tb_tiket')->whereIn('tb_tiket.id_pelayanan', $pelayanan)->get()->getResult(); 


            if($this->request->getVar('id')==0){
                $count_proses = $db->table('tb_tiket')->whereIn('tb_tiket.id_pelayanan', $pelayanan)->where("date_part('day', tb_tiket.tgl_input)", date("d", strtotime($tgl)))->where("date_part('month', tb_tiket.tgl_input)", date("m", strtotime($tgl)))->where("date_part('year', tb_tiket.tgl_input)", date("Y", strtotime($tgl)))->where('tb_tiket.status', 0)->countAllResults();
                $count_selesai = $db->table('tb_tiket')->whereIn('tb_tiket.id_pelayanan', $pelayanan)->where("date_part('day', tb_tiket.tgl_input)", date("d", strtotime($tgl)))->where("date_part('month', tb_tiket.tgl_input)", date("m", strtotime($tgl)))->where("date_part('year', tb_tiket.tgl_input)", date("Y", strtotime($tgl)))->where('tb_tiket.status', 1)->countAllResults();
                $count_tolak = $db->table('tb_tiket')->whereIn('tb_tiket.id_pelayanan', $pelayanan)->where("date_part('day', tb_tiket.tgl_input)", date("d", strtotime($tgl)))->where("date_part('month', tb_tiket.tgl_input)", date("m", strtotime($tgl)))->where("date_part('year', tb_tiket.tgl_input)", date("Y", strtotime($tgl)))->where('tb_tiket.status', 2)->countAllResults();
                $count_semua = $db->table('tb_tiket')->whereIn('tb_tiket.id_pelayanan', $pelayanan)->where("date_part('day', tb_tiket.tgl_input)", date("d", strtotime($tgl)))->where("date_part('month', tb_tiket.tgl_input)", date("m", strtotime($tgl)))->where("date_part('year', tb_tiket.tgl_input)", date("Y", strtotime($tgl)))->countAllResults();

            }elseif($this->request->getVar('id')==1){
                $count_proses = $db->table('tb_tiket')->whereIn('tb_tiket.id_pelayanan', $pelayanan)->where("date_part('month', tb_tiket.tgl_input)", date("m", strtotime($tgl)))->where('tb_tiket.status', 0)->countAllResults();
                $count_selesai = $db->table('tb_tiket')->whereIn('tb_tiket.id_pelayanan', $pelayanan)->where("date_part('month', tb_tiket.tgl_input)", date("m", strtotime($tgl)))->where('tb_tiket.status', 1)->countAllResults();
                $count_tolak = $db->table('tb_tiket')->whereIn('tb_tiket.id_pelayanan', $pelayanan)->where("date_part('month', tb_tiket.tgl_input)", date("m", strtotime($tgl)))->where('tb_tiket.status', 2)->countAllResults();
                $count_semua = $db->table('tb_tiket')->whereIn('tb_tiket.id_pelayanan', $pelayanan)->where("date_part('month', tb_tiket.tgl_input)", date("m", strtotime($tgl)))->countAllResults();

            }else{
                $count_proses = $db->table('tb_tiket')->whereIn('tb_tiket.id_pelayanan', $pelayanan)->where("date_part('year', tb_tiket.tgl_input)", date("Y", strtotime($tgl)))->where('tb_tiket.status', 0)->countAllResults(); 
                $count_selesai = $db->table('tb_tiket')->whereIn('tb_tiket.id_pelayanan', $pelayanan)->where("date_part('year', tb_tiket.tgl_input)", date("Y", strtotime($tgl)))->where('tb_tiket.status', 1)->countAllResults(); 
                $count_tolak = $db->table('tb_tiket')->whereIn('tb_tiket.id_pelayanan', $pelayanan)->where("date_part('year', tb_tiket.tgl_input)", date("Y", strtotime($tgl)))->where('tb_tiket.status', 2)->countAllResults(); 
                $count_semua = $db->table('tb_tiket')->whereIn('tb_tiket.id_pelayanan', $pelayanan)->where("date_part('year', tb_tiket.tgl_input)", date("Y", strtotime($tgl)))->countAllResults(); 
            }
        } elseif(session()->get('id_role')==3){
            if($this->request->getVar('id')==0){
                $count_proses = $db->table('tb_tiket_magang')->where("date_part('day', tb_tiket_magang.tgl_input)", date("d", strtotime($tgl)))->where("date_part('month', tb_tiket_magang.tgl_input)", date("m", strtotime($tgl)))->where("date_part('year', tb_tiket_magang.tgl_input)", date("Y", strtotime($tgl)))->where('tb_tiket_magang.id_pembina_lapangan', session()->get('id_user'))->where('tb_tiket_magang.status', 0)->countAllResults();
                $count_selesai = $db->table('tb_tiket_magang')->where("date_part('day', tb_tiket_magang.tgl_input)", date("d", strtotime($tgl)))->where("date_part('month', tb_tiket_magang.tgl_input)", date("m", strtotime($tgl)))->where("date_part('year', tb_tiket_magang.tgl_input)", date("Y", strtotime($tgl)))->where('tb_tiket_magang.id_pembina_lapangan', session()->get('id_user'))->where('tb_tiket_magang.status', 1)->countAllResults();
                $count_tolak = $db->table('tb_tiket_magang')->where("date_part('day', tb_tiket_magang.tgl_input)", date("d", strtotime($tgl)))->where("date_part('month', tb_tiket_magang.tgl_input)", date("m", strtotime($tgl)))->where("date_part('year', tb_tiket_magang.tgl_input)", date("Y", strtotime($tgl)))->where('tb_tiket_magang.id_pembina_lapangan', session()->get('id_user'))->where('tb_tiket_magang.status', 2)->countAllResults();
                $count_semua = $db->table('tb_tiket_magang')->where("date_part('day', tb_tiket_magang.tgl_input)", date("d", strtotime($tgl)))->where("date_part('month', tb_tiket_magang.tgl_input)", date("m", strtotime($tgl)))->where("date_part('year', tb_tiket_magang.tgl_input)", date("Y", strtotime($tgl)))->where('tb_tiket_magang.id_pembina_lapangan', session()->get('id_user'))->countAllResults();

            }elseif($this->request->getVar('id')==1){
                $count_proses = $db->table('tb_tiket_magang')->where("date_part('month', tb_tiket_magang.tgl_input)", date("m", strtotime($tgl)))->where('tb_tiket_magang.id_pembina_lapangan', session()->get('id_user'))->where('tb_tiket_magang.status', 0)->countAllResults();
                $count_selesai = $db->table('tb_tiket_magang')->where("date_part('month', tb_tiket_magang.tgl_input)", date("m", strtotime($tgl)))->where('tb_tiket_magang.id_pembina_lapangan', session()->get('id_user'))->where('tb_tiket_magang.status', 1)->countAllResults();
                $count_tolak = $db->table('tb_tiket_magang')->where("date_part('month', tb_tiket_magang.tgl_input)", date("m", strtotime($tgl)))->where('tb_tiket_magang.id_pembina_lapangan', session()->get('id_user'))->where('tb_tiket_magang.status', 2)->countAllResults();
                $count_semua = $db->table('tb_tiket_magang')->where("date_part('month', tb_tiket_magang.tgl_input)", date("m", strtotime($tgl)))->where('tb_tiket_magang.id_pembina_lapangan', session()->get('id_user'))->countAllResults();

            }else{
                $count_proses = $db->table('tb_tiket_magang')->where("date_part('year', tb_tiket_magang.tgl_input)", date("Y", strtotime($tgl)))->where('tb_tiket_magang.id_pembina_lapangan', session()->get('id_user'))->where('tb_tiket_magang.status', 0)->countAllResults(); 
                $count_selesai = $db->table('tb_tiket_magang')->where("date_part('year', tb_tiket_magang.tgl_input)", date("Y", strtotime($tgl)))->where('tb_tiket_magang.id_pembina_lapangan', session()->get('id_user'))->where('tb_tiket_magang.status', 1)->countAllResults(); 
                $count_tolak = $db->table('tb_tiket_magang')->where("date_part('year', tb_tiket_magang.tgl_input)", date("Y", strtotime($tgl)))->where('tb_tiket_magang.id_pembina_lapangan', session()->get('id_user'))->where('tb_tiket_magang.status', 2)->countAllResults(); 
                $count_semua = $db->table('tb_tiket_magang')->where("date_part('year', tb_tiket_magang.tgl_input)", date("Y", strtotime($tgl)))->where('tb_tiket_magang.id_pembina_lapangan', session()->get('id_user'))->countAllResults(); 
            }
        } else{
            if($this->request->getVar('id')==0){
                $count_proses = $db->table('tb_tiket_magang')->where("date_part('day', tb_tiket_magang.tgl_input)", date("d", strtotime($tgl)))->where("date_part('month', tb_tiket_magang.tgl_input)", date("m", strtotime($tgl)))->where("date_part('year', tb_tiket_magang.tgl_input)", date("Y", strtotime($tgl)))->where('tb_tiket_magang.id_user', session()->get('id_user'))->where('tb_tiket_magang.status', 0)->countAllResults();
                $count_selesai = $db->table('tb_tiket_magang')->where("date_part('day', tb_tiket_magang.tgl_input)", date("d", strtotime($tgl)))->where("date_part('month', tb_tiket_magang.tgl_input)", date("m", strtotime($tgl)))->where("date_part('year', tb_tiket_magang.tgl_input)", date("Y", strtotime($tgl)))->where('tb_tiket_magang.id_user', session()->get('id_user'))->where('tb_tiket_magang.status', 1)->countAllResults();
                $count_tolak = $db->table('tb_tiket_magang')->where("date_part('day', tb_tiket_magang.tgl_input)", date("d", strtotime($tgl)))->where("date_part('month', tb_tiket_magang.tgl_input)", date("m", strtotime($tgl)))->where("date_part('year', tb_tiket_magang.tgl_input)", date("Y", strtotime($tgl)))->where('tb_tiket_magang.id_user', session()->get('id_user'))->where('tb_tiket_magang.status', 2)->countAllResults();
                $count_semua = $db->table('tb_tiket_magang')->where("date_part('day', tb_tiket_magang.tgl_input)", date("d", strtotime($tgl)))->where("date_part('month', tb_tiket_magang.tgl_input)", date("m", strtotime($tgl)))->where("date_part('year', tb_tiket_magang.tgl_input)", date("Y", strtotime($tgl)))->where('tb_tiket_magang.id_user', session()->get('id_user'))->countAllResults();

            }elseif($this->request->getVar('id')==1){
                $count_proses = $db->table('tb_tiket_magang')->where("date_part('month', tb_tiket_magang.tgl_input)", date("m", strtotime($tgl)))->where('tb_tiket_magang.id_user', session()->get('id_user'))->where('tb_tiket_magang.status', 0)->countAllResults();
                $count_selesai = $db->table('tb_tiket_magang')->where("date_part('month', tb_tiket_magang.tgl_input)", date("m", strtotime($tgl)))->where('tb_tiket_magang.id_user', session()->get('id_user'))->where('tb_tiket_magang.status', 1)->countAllResults();
                $count_tolak = $db->table('tb_tiket_magang')->where("date_part('month', tb_tiket_magang.tgl_input)", date("m", strtotime($tgl)))->where('tb_tiket_magang.id_user', session()->get('id_user'))->where('tb_tiket_magang.status', 2)->countAllResults();
                $count_semua = $db->table('tb_tiket_magang')->where("date_part('month', tb_tiket_magang.tgl_input)", date("m", strtotime($tgl)))->where('tb_tiket_magang.id_user', session()->get('id_user'))->countAllResults();

            }else{
                $count_proses = $db->table('tb_tiket_magang')->where("date_part('year', tb_tiket_magang.tgl_input)", date("Y", strtotime($tgl)))->where('tb_tiket_magang.id_user', session()->get('id_user'))->where('tb_tiket_magang.status', 0)->countAllResults(); 
                $count_selesai = $db->table('tb_tiket_magang')->where("date_part('year', tb_tiket_magang.tgl_input)", date("Y", strtotime($tgl)))->where('tb_tiket_magang.id_user', session()->get('id_user'))->where('tb_tiket_magang.status', 1)->countAllResults(); 
                $count_tolak = $db->table('tb_tiket_magang')->where("date_part('year', tb_tiket_magang.tgl_input)", date("Y", strtotime($tgl)))->where('tb_tiket_magang.id_user', session()->get('id_user'))->where('tb_tiket_magang.status', 2)->countAllResults(); 
                $count_semua = $db->table('tb_tiket_magang')->where("date_part('year', tb_tiket_magang.tgl_input)", date("Y", strtotime($tgl)))->where('tb_tiket_magang.id_user', session()->get('id_user'))->countAllResults(); 
            }
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
        
        if(session()->get('id_role')!=1){
            $verifikator_pelayanan = $db->table('verifikator_pelayanan')->select('verifikator_pelayanan.id_pelayanan')->where('verifikator_pelayanan.id_user', session()->get('id_user'))->get()->getResult();
            $pelayanan = [];
            foreach ($verifikator_pelayanan as $row) {
                array_push($pelayanan, $row->id_pelayanan);
            }
        }
        
        for ($x = $end; $x <= $start; $x++) {
            if(session()->get('id_role')==1){
                array_push($tahun, $x);
                $count_proses = $db->table('tb_tiket')->where("date_part('year', tb_tiket.tgl_input)", $x)->where('tb_tiket.status', 0)->where('tb_tiket.id_user', session()->get('id_user'))->countAllResults(); 
                array_push($proses, $count_proses);
                $count_selesai = $db->table('tb_tiket')->where("date_part('year', tb_tiket.tgl_input)", $x)->where('tb_tiket.status', 1)->where('tb_tiket.id_user', session()->get('id_user'))->countAllResults(); 
                array_push($selesai, $count_selesai);
                $count_tolak = $db->table('tb_tiket')->where("date_part('year', tb_tiket.tgl_input)", $x)->where('tb_tiket.status', 2)->where('tb_tiket.id_user', session()->get('id_user'))->countAllResults();
                array_push($tolak, $count_tolak);
                $count_batal = $db->table('tb_tiket')->where("date_part('year', tb_tiket.tgl_input)", $x)->where('tb_tiket.status', 3)->where('tb_tiket.id_user', session()->get('id_user'))->countAllResults();
                array_push($batal, $count_batal);
            }else{
                array_push($tahun, $x);
                $count_proses = $db->table('tb_tiket')->whereIn('tb_tiket.id_pelayanan', $pelayanan)->where("date_part('year', tb_tiket.tgl_input)", $x)->where('tb_tiket.status', 0)->countAllResults(); 
                array_push($proses, $count_proses);
                $count_selesai = $db->table('tb_tiket')->whereIn('tb_tiket.id_pelayanan', $pelayanan)->where("date_part('year', tb_tiket.tgl_input)", $x)->where('tb_tiket.status', 1)->countAllResults(); 
                array_push($selesai, $count_selesai);
                $count_tolak = $db->table('tb_tiket')->whereIn('tb_tiket.id_pelayanan', $pelayanan)->where("date_part('year', tb_tiket.tgl_input)", $x)->where('tb_tiket.status', 2)->countAllResults();
                array_push($tolak, $count_tolak);
                $count_batal = $db->table('tb_tiket')->whereIn('tb_tiket.id_pelayanan', $pelayanan)->where("date_part('year', tb_tiket.tgl_input)", $x)->where('tb_tiket.status', 3)->countAllResults();
                array_push($batal, $count_batal);
            }
            
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

        if(session()->get('id_role')==1){
            $count_semua = $db->table('tb_tiket')->where("date_part('month', tb_tiket.tgl_input)", date("m", strtotime($tgl)))->where('tb_tiket.id_user', session()->get('id_user'))->get()->getResult();

        }else{
            $verifikator_pelayanan = $db->table('verifikator_pelayanan')->select('verifikator_pelayanan.id_pelayanan')->where('verifikator_pelayanan.id_user', session()->get('id_user'))->get()->getResult();
            $pelayanan = [];
            foreach ($verifikator_pelayanan as $row) {
                array_push($pelayanan, $row->id_pelayanan);
            }

            $count_semua = $db->table('tb_tiket')->whereIn('tb_tiket.id_pelayanan', $pelayanan)->where("date_part('month', tb_tiket.tgl_input)", date("m", strtotime($tgl)))->get()->getResult();
        }
        
        echo json_encode($count_semua);
    }
}