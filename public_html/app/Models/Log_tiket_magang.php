<?php

namespace App\Models;

use CodeIgniter\Model;

class Log_tiket_magang extends Model
{
    protected $table      = 'log_aktifitas_magang';
    protected $primaryKey = 'id_log';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_tiket', 'id_user', 'tgl_aktifitas', 'aktifitas', 'color', 'icon'];
}