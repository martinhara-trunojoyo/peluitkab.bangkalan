<?php

namespace App\Models;

use CodeIgniter\Model;

class Tiket_aula extends Model
{
    protected $table      = 'tb_tiket_aula';
    protected $primaryKey = 'id_pelayanan_aula';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_tiket', 'nama_acara', 'tgl_awal', 'tgl_akhir', 'id_aula', 'nama_pic', 'no_pic', 'berkas_pengantar'];
}