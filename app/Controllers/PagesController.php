<?php namespace App\Controllers;

use App\Models\Buku_model;
use App\Models\Auth_model;

class PagesController extends BaseController
{
    public function index()
    {
        $newdata = [
                'username'  => 'johndoe',
                'email'     => 'johndoe@some-site.com',
                'logged_in' => TRUE
        ];
    
        session()->set($newdata);
        // print_r(session()->get('username'));

        $p = new Auth_model();
        echo "<pre>";
        print_r($this->request->getUserAgent()->isMobile());
            
    }

}
