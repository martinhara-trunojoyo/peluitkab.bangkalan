<?php

namespace App\Models;

use CodeIgniter\Model;

class Tiket_jaringan_foto extends Model
{
    protected $table      = 'tb_tiket_jaringan_foto';
    protected $primaryKey = 'id_pelayanan_jaringan_foto';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_pelayanan_jaringan', 'berkas_foto'];
}