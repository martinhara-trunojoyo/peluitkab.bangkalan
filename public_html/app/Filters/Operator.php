<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Operator implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if(is_null(session()->get('sslogin')))
        {
            return redirect()->to("sslogin");
        }else{
            if(session()->get('id_role')!= 1){
                return redirect()->to("sslogin");
            }
        }
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}