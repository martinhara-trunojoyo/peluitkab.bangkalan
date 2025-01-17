<?php

namespace App\Models;

use CodeIgniter\Model;

class Tiket_upload extends Model
{
    protected $table      = 'tb_tiket_upload';
    protected $primaryKey = 'id_pelayanan_upload';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_tiket', 'edisi', 'jenis_dokumen', 'nama_pic', 'no_pic', 'berkas_pengantar', 'berkas_upload'];
}