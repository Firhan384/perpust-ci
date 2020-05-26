<?php 

namespace App\Models;
use CodeIgniter\Model;

class Siswa_model extends Model
{
    protected $table = 't_siswa';

    public function getDataSiswa($id=false)
    {
        if($id === false):
            return $this->findAll();
        else:
            return $this->getWhere(['id_siswa'=>$id]);
        endif;
    }

    public function updateDataSiswa($id,$data)
    {
        return $this->db->table($this->table)->update($data,['id_siswa'=>$id]);
    }

    public function deleDataSiswa($id)
    {
        if(empty($id)){
            return false;
        } else {
            return $this->db->table($this->table)->delete(['id_siswa'=>$id]);
        }
    }

}