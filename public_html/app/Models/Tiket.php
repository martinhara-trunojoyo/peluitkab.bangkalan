<?php

namespace App\Models;

use CodeIgniter\Model;

class Tiket extends Model
{
    protected $table      = 'tb_tiket';
    protected $primaryKey = 'id_tiket';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['kode_tiket', 'tgl_input', 'id_pelayanan', 'id_user', 'status', 'catatan'];
}