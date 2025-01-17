<?php

namespace App\Controllers;

use App\Models\Pelayanan;
use App\Models\Otp;
use App\Models\User;
use App\Models\Opd;

class Statistik extends BaseController
{
    public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
    }
    
    public function zoom_meeting()
    {
        $data = array(
            'title' => 'dashboard'
        );
        return view('statistik/zoom',$data);
    }

}