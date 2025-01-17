<?php

namespace App\Models;

use CodeIgniter\Model;

class Opd extends Model
{
    protected $table      = 'ssopd';
    protected $primaryKey = 'id_opd';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['nama_opd', 'akronim_opd', 'foto_opd'];
}