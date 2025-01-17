<?php

namespace App\Models;

use CodeIgniter\Model;

class User_pembimbing extends Model
{
    protected $table      = 'ssuser_pembimbing';
    protected $primaryKey = 'id_ssuser_pembimbing';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_ssuser', 'id_sub'];
}