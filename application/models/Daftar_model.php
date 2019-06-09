<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function input_data($table, $data)
    {
        return $this->db->insert($table, $data);
    }

    function update_data($id,$table,$where,$data){
        $this->db->where($id,$where);
        $this->db->update($table,$data);
        return true;
    }

}
?>