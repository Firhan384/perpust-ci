<?php 

namespace App\Models;
use CodeIgniter\Model;

class Pinjam_model extends Model
{
    protected $table = 't_pinjam';

    public function getDataPinjam($id=false)
    {
        if($id === false):
            return $this->findAll();
        else:
            return $this->getWhere(['id_pinjam'=>$id]);
        endif;
    }

    public function updateDataPinjam($id,$data)
    {
        return $this->db->table($this->table)->update($data,['id_pinjam'=>$id]);
    }

    public function deleDataPinjam($id)
    {
        if(empty($id)){
            return false;
        } else {
            return $this->db->table($this->table)->delete(['id_pinjam'=>$id]);
        }
    }

}