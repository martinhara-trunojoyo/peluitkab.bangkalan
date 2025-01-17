<?php

namespace App\Models;

use CodeIgniter\Model;

class Otp extends Model
{
    protected $table      = 'ssotp';
    protected $primaryKey = 'id_otp';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_ssuser', 'kode_otp', 'exp_date', 'active'];
}