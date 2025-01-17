<?php

namespace App\Models;

use CodeIgniter\Model;

class Sub extends Model
{
    protected $table      = 'sub_bagian';
    protected $primaryKey = 'id_sub';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_opd', 'nama_sub', 'active','tgl_input'];
}