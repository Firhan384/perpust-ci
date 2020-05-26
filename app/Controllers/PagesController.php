<?php namespace App\Controllers;

use App\Models\Buku_model;


class PagesController extends BaseController
{
    public function index()
    {
        // $newdata = [
        //         'username'  => 'johndoe',
        //         'email'     => 'johndoe@some-site.com',
        //         'logged_in' => TRUE
        // ];
    
        // session()->set($newdata);
        // print_r(session()->get('username'));
        $data['js'] = 'assets/js/panel-user.js';
        return view('panel/sub/user',$data);
    }

}
