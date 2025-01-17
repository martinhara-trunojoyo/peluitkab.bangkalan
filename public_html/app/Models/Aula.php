<?php

namespace App\Models;

use CodeIgniter\Model;

class Aula extends Model
{
    protected $table      = 'ssaula';
    protected $primaryKey = 'id_aula';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['nama_aula', 'active','tgl_input'];
}