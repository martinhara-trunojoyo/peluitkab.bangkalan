<?php

namespace App\Models;

use CodeIgniter\Model;

class Tiket_zoom extends Model
{
    protected $table      = 'tb_tiket_zoom';
    protected $primaryKey = 'id_pelayanan_zoom';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_tiket', 'nama_acara', 'tgl_awal', 'tgl_akhir', 'nama_pic', 'no_pic', 'berkas_pengantar', 'jenis_zoom', 'meeting_id', 'passcode', 'tempat', 'operator'];
}