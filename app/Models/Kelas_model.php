<?php 

namespace App\Models;
use CodeIgniter\Model;

class Kelas_model extends Model
{

    protected $table = 't_kelas';

    public function getDataKelas($id=false)
    {
        if($id === false):
            return $this->findAll();
        else:
            return $this->getWhere(['id_kelas'=>$id]);
        endif;
    }

    public function updateDataKelas($id,$data)
    {
        return $this->db->table($this->table)->update($data,['id_kelas'=>$id]);
    }

    public function deleDataKelas($id)
    {
        if(empty($id)){
            return false;
        } else {
            return $this->db->table($this->table)->delete(['id_kelas'=>$id]);
        }
    }

}