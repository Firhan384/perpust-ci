<?php 

namespace App\Models;
use CodeIgniter\Model;

class User_model extends Model
{

    protected $table = 't_user';
    var $column_order = array(null, 'nama_user','role','status'); //set column field database for datatable orderable
    var $column_search = array('FirstName','LastName','phone','address','city','country'); //set column field database for datatable searchable 
    var $order = array('id' => 'asc'); // default order 
    protected $allowedFields = ['nama_user', 'password','role','status','create_at','create_date','update_date'];

    public function getDataUser($id=false)
    {
        if($id === false):
            return $this->findAll();
        else:
            return $this->db->table($this->table)->where(['id_user'=>$id])->get()->getResultObject();
        endif;
    }

    public function addDataUser($data)
    {
        $this->db->table($this->table);
        return $this->insert($data);
    }

    public function updateDataUser($id,$data)
    {
        return $this->db->table($this->table)->update($data,['id_user'=>$id]);
    }

    public function deleDataUser($id)
    {
        if(empty($id)){
            return false;
        } else {
            return $this->db->table($this->table)->delete(['id_user'=>$id]);
        }
    }

}