<?php namespace App\Controllers;

use App\Models\Auth_model;
class AuthController extends BaseController
{
    protected $call_model;
    public function __construct()
    {   
        $this->call_model = new Auth_model();
        if($this->call_model->checkAuth()){
            return redirect()->to('/view/dashboard');
        } else {
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
        $cek = $this->call_model->checkLoginAuth($username,$password);
        if($cek){
            $newdata = [
                'username'  => $username,
                'logged_in' => TRUE
            ];
            session()->set($newdata);
            return redirect()->to('/view/dashboard');
        } else {
            return redirect()->to('/');
        }
    }

    public function ActionLogout()
    {
        session()->destroy();
        return redirect()->to('/');
    }

    

}
