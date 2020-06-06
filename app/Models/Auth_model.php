<?php namespace App\Models;
use CodeIgniter\Model;

class Auth_model extends Model
{
    protected $table = "t_user";
    
    public function checkAuth()
    {
        return (session()->get('logged_in') == true) ? true : false;
    }
    public function checkLoginAuth($nama,$password)
    {
        $p = $this->db->table($this->table);
        $check_valid =  $p->select('role')->getWhere(['nama_user'=>$nama,'password'=>$password])->resultID->num_rows;
        if($check_valid == 1){
            return true;
        } else {
            return false;
        }
    }
}

?>