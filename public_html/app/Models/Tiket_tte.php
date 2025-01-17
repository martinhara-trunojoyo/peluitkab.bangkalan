<?php

namespace App\Models;

use CodeIgniter\Model;

class Tiket_tte extends Model
{
    protected $table      = 'tb_tiket_tte';
    protected $primaryKey = 'id_pelayanan_tte';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_tiket', 'nama', 'jabatan', 'nip', 'nik', 'jenis_layanan', 'berkas_ktp', 'nama_pic', 'no_pic', 'berkas_pengantar'];
}