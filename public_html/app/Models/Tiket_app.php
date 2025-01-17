<?php

namespace App\Models;

use CodeIgniter\Model;

class Tiket_app extends Model
{
    protected $table      = 'tb_tiket_app';
    protected $primaryKey = 'id_pelayanan_app';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_tiket', 'nama_aplikasi', 'deskripsi_aplikasi', 'tgl','nama_pic','no_pic','tempat', 'agenda', 'berkas_pengantar'];
}