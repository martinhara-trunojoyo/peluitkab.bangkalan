<?php

namespace App\Models;

use CodeIgniter\Model;

class User extends Model
{
    protected $table      = 'ssuser';
    protected $primaryKey = 'id_ssuser';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['username', 'nip', 'nama' ,'nik', 'id_chat', 'active', 'role_id',"file_foto","id_opd","tgl_input", "tgl_validasi"];
}