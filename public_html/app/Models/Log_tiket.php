<?php

namespace App\Models;

use CodeIgniter\Model;

class Log_tiket extends Model
{
    protected $table      = 'log_aktifitas_pelayanan';
    protected $primaryKey = 'id_log';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_tiket', 'id_user', 'tgl_aktifitas', 'aktifitas', 'color', 'icon'];
}