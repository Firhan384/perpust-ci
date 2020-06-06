<?php namespace App\Models;
use CodeIgniter\Model;

class Buku_model extends Model
{
    protected $table = 't_buku';
    protected $allowedFields = ['judul', 'penerbit','pengarang','id_kat_buku','status','create_at','create_date','update_date'];


    public function addDataBuku($data)
    {
        $this->db->table($this->table);
        return $this->insert($data);
    }

    public function getDataBuku($id=false)
    {
        if($id === false):
            return $this->db->query("SELECT t_buku.id_buku,t_buku.judul,t_buku.pengarang,t_buku.penerbit,t_kat_buku.nama_kat_buku,t_buku.status 
                              FROM t_buku INNER JOIN t_kat_buku ON t_buku.id_kat_buku = t_kat_buku.id_kat_buku where t_buku.status =1 ");
        else:
            return $this->db->table($this->table)->where(['id_buku'=>$id])->get()->getResultObject();
        endif;
    }

    public function getCategoryBuku()
    {
        return $this->db->query("SELECT DISTINCT t_kat_buku.nama_kat_buku,t_kat_buku.id_kat_buku as id_kat_bukus
                              FROM t_buku RIGHT JOIN t_kat_buku ON t_buku.id_kat_buku = t_kat_buku.id_kat_buku where t_buku.status =1 "); 
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