<?php

namespace App\Models;

use CodeIgniter\Model;

class Tiket_alat extends Model
{
    protected $table      = 'tb_tiket_alat';
    protected $primaryKey = 'id_pelayanan_alat';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_tiket', 'nama_acara', 'tgl_awal', 'tgl_akhir', 'nama_pic', 'no_pic', 'berkas_pengantar'];
}