<?php

namespace App\Models;

use CodeIgniter\Model;

class Tiket_magang_nilai extends Model
{
    protected $table      = 'tb_tiket_magang_nilai';
    protected $primaryKey = 'id_magang_nilai';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_tiket', 'tgl_input', 'nilai_performance', 'nilai_sikap', 'nilai_kerjasama', 'nilai_disiplin', 'nilai_komunikasi', 'nilai_tanggung_jawab', 'nilai_teknis', 'catatan_nilai'];
}