<?php

namespace App\Models;

use CodeIgniter\Model;

class User_magang extends Model
{
    protected $table      = 'ssuser_magang';
    protected $primaryKey = 'id_ssuser_magang';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_ssuser', 'gender', 'wa', 'jenis', 'nomor_induk', 'jurusan', 'civitas', 'ktp'];
}