<?php

namespace App\Models;

use CodeIgniter\Model;

class Tiket_hosting extends Model
{
    protected $table      = 'tb_tiket_hosting';
    protected $primaryKey = 'id_pelayanan_hosting';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_tiket', 'nama_aplikasi', 'deskripsi', 'spesifikasi','nama_pic','no_pic','port', 'db_access', 'server_access', 'berkas_pengantar'];
}