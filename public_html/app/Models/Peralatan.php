<?php

namespace App\Models;

use CodeIgniter\Model;

class Peralatan extends Model
{
    protected $table      = 'ssalat';
    protected $primaryKey = 'id_alat';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['nama_alat', 'nomor_seri', 'active','tgl_input', 'merk'];
}