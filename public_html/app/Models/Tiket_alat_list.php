<?php

namespace App\Models;

use CodeIgniter\Model;

class Tiket_alat_list extends Model
{
    protected $table      = 'tb_tiket_alat_list';
    protected $primaryKey = 'id_list';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_alat', 'id_pelayanan_alat'];
}