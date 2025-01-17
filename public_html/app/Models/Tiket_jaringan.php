<?php

namespace App\Models;

use CodeIgniter\Model;

class Tiket_jaringan extends Model
{
    protected $table      = 'tb_tiket_jaringan';
    protected $primaryKey = 'id_pelayanan_jaringan';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_tiket', 'tgl_kejadian', 'keluhan', 'nama_pic', 'no_pic', 'berkas_pengantar', 'tindak_lanjut'];
}