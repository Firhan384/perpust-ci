<?php namespace App\Controllers;

use App\Models\Auth_model;
class AuthController extends BaseController
{

    public function __construct()
    {   
        $p = new Auth_model();
        if($p->checkAuth()){
            return redirect()->to('/');
        }
    }


    public function index()
    {
        return view('panel/login');       
    }

    public function ActionLogin()
    {
        $post = $this->request->getPost();
        $username = $post['username'];
        $password = $post['password'];
        print_r($post);
    }

    

}
