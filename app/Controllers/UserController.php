<?php namespace App\Controllers;

use App\Models\User_model;

class UserController extends BaseController
{
    protected $call_model;
    
    public function __construct()
    {
        $this->call_model = new User_model();    
    }


    public function addUser()
    {
        $post = $this->request->getPost();
        $username = $post['username'];
        $password = $post['password'];
        $role = ($post['role']);
        $status = ($post['status']);
        $create_at = session()->get('username');
        $create_date = date("Y-m-d h:i:s");
        $update_date = NULL;
        $data = array();
        if(empty($username) || empty($status) || empty($role) )
        {   
            $data['msg'] = "data kosong";
            $data['status'] = false;
        } else {
            $data['msg'] = "data berhasil ditambahkan";
            $data['status'] = true;
            $this->call_model->addDataUser(array('nama_user'=>$username,
                                                 'password'=>$password,
                                                 'role'=>$role,
                                                 'status'=>$status,
                                                 'create_at'=>$create_at,
                                                 'create_date'=>$create_date,
                                                 'update_date'=>$update_date));
        }
        echo json_encode($data);
    }

    public function deleteUser()
    {
        $id = $this->request->getGet('id');
        $this->call_model->deleDataUser($id);
        echo json_encode(array('status'=>true));
    }

    public function getDataUserById($id)
    {
        echo json_encode($this->call_model->getDataUser($id));
    }

    public function updateUser()
    {
        $id = $this->request->getPost('id');
        $post = $this->request->getPost();
        $username = $post['username'];
        $role = ($post['role']);
        $status = ($post['status']);
        $update_date = date("Y-m-d h:i:s");
        $data = array();
        if(empty($username) || empty($status) || empty($role) )
        {   
            $data['msg'] = "data kosong";
            $data['status'] = false;
        } else {
            $data['msg'] = "data berhasil diupdate";
            $data['status'] = true;
            $this->call_model->updateDataUser($id,array('nama_user'=>$username,
                                                 'role'=>$role,
                                                 'status'=>$status,
                                                 'update_date'=>$update_date));
        }
        echo json_encode($data);   
    }

}
