<?php namespace App\Controllers;

use App\Models\Buku_model;
use App\Models\Auth_model;
use App\Models\User_model;

class PagesController extends BaseController
{
    var $call_model_user;
    var $call_model_buku;

    public function __construct()
    {   
        $this->call_model_user = new User_model();  
        $this->call_model_buku = new Buku_model(); 

        if(session()->get('logged_in')!=TRUE){
            return redirect()->to('/');
        } else {
            return redirect()->to('/view/dashboard');
        }
    }
    public function index()
    {
        var_dump(session()->get('logged_in'));
        $data['js'] = 'assets/js/panel-user.js';
        return view('panel/sub/dashboard',$data); 
    }

    public function management_user()
    {
        // print_r($this->call_model_user->getDataUser());die();
        $data['showData'] = $this->call_model_user->getDataUser();
        $data['js'] = 'assets/js/panel-user.js';
        return view('panel/sub/user',$data);
    }

    public function management_buku()
    {
        //print_r($this->call_model_buku->getCategoryBuku()->getResultArray());die();
        $data['showData'] = $this->call_model_buku->getDataBuku();
        $data['kategori_buku'] = $this->call_model_buku->getCategoryBuku();
        $data['js'] = 'assets/js/panel-buku.js';
        return view('panel/sub/management_buku',$data);
    }

}
