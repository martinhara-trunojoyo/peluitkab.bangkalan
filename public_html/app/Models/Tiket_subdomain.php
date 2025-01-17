<?php

namespace App\Models;

use CodeIgniter\Model;

class Tiket_subdomain extends Model
{
    protected $table      = 'tb_tiket_subdomain';
    protected $primaryKey = 'id_pelayanan_subdomain';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_tiket', 'nama_subdomain', 'ip_publik', 'nama_pic', 'no_pic', 'berkas_pengantar'];
}