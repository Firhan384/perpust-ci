<?php namespace App\Controllers;

use App\Models\Buku_model;

class BukuController extends BaseController
{
    protected $call_model;
    
    public function __construct()
    {
        $this->call_model = new Buku_model();    
    }


    public function addBuku()
    {
        $post = $this->request->getPost();
        $judul = $post['judul'];
        $pengarang = $post['pengarang'];
        $penerbit = $post['penerbit'];
        $id_kat_buku = ($post['id_kat_buku']);
        $create_at = session()->get('username');
        $create_date = date("Y-m-d h:i:s");
        $update_date = NULL;
        $data = array();
        if(empty($judul) || empty($pengarang) || empty($penerbit) || empty($id_kat_buku) )
        {   
            $data['msg'] = "data kosong";
            $data['status'] = false;
        } else {
            $data['msg'] = "data berhasil ditambahkan";
            $data['status'] = true;
            $this->call_model->addDataBuku(array('judul'=>$judul,
                                                 'pengarang'=>$pengarang,
                                                 'penerbit'=>$penerbit,
                                                 'id_kat_buku'=>$id_kat_buku,
                                                 'create_at'=>$create_at,
                                                 'create_date'=>$create_date,
                                                 'update_date'=>$update_date));
        }
        echo json_encode($data);
    }

    public function deleteBuku()
    {
        $id = $this->request->getGet('id');
        $this->call_model->deleDataBuku($id);
        echo json_encode(array('status'=>true));
    }

    public function getDataBukuById($id)
    {
        echo json_encode($this->call_model->getDataBuku($id));
    }

    public function updateBuku()
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
            $this->call_model->updateDataBuku($id,array('nama_user'=>$username,
                                                 'role'=>$role,
                                                 'status'=>$status,
                                                 'update_date'=>$update_date));
        }
        echo json_encode($data);   
    }


}
