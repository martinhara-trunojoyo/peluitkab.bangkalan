<?php

namespace App\Models;

use CodeIgniter\Model;

class Verifikator extends Model
{
    protected $table      = 'verifikator_pelayanan';
    protected $primaryKey = 'id_vpelayanan';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_user', 'id_pelayanan'];
}