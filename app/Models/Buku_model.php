<?php namespace App\Models;
use CodeIgniter\Model;

class Buku_model extends Model
{
    protected $table = 't_buku';

    public function getDataBuku($id=false)
    {
        if($id === false):
            return $this->findAll();
        else:
            return $this->getWhere(['id_buku'=>$id]);
        endif;
    }

    public function updateDataBuku($id,$data)
    {
        return $this->db->table($this->table)->update($data,['id_buku'=>$id]);
    }

    public function deleDataBuku($id)
    {
        if(empty($id)){
            return false;
        } else {
            return $this->db->table($this->table)->delete(['id_buku'=>$id]);
        }
    }

}