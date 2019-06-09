<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{
    function tampil_data(){
        $sql = "SELECT 
                mm.*, (SELECT count(NRP) FROM master_mahasiswa WHERE NRP NOT IN ('hexa')) as jumlahSiswa
                FROM master_login ml, master_mahasiswa mm 
                WHERE ml.kode_user = ?
                AND ml.kode_user = mm.NRP";
        $result = $this->db->query($sql, array($_SESSION['kode_user']));
        return $result;
    }

    function get_hak_akses(){
        return $this->db->query("SELECT l.* 
                                 FROM menu_level l, master_login u
                                 WHERE l.kode_akses = u.kode_akses 
                                 AND u.kode_user = '".$_SESSION['kode_user']."'");
    }

    function selectUserInfo($kode_user){
        $sql = "SELECT ml.*, ha.hak_akses 
                FROM master_login ml, menu_hak_akses ha
                WHERE ml.kode_user=?
                AND ml.kode_akses = ha.kode_akses";
        $result = $this->db->query($sql, array($kode_user));
        return $result;
    }

    function cekEmail($email){
        return $this->db->query("SELECT * FROM master_login WHERE email = ?", array($email));
    }

    function getLogin($kode_user, $password){
        $sql = "SELECT mm.*, ha.hak_akses
                FROM master_login mm, menu_hak_akses ha
                WHERE mm.kode_akses = ha.kode_akses
                AND mm.kode_user=? 
                AND mm.password=MD5(?)";
        $result = $this->db->query($sql, array($kode_user, $password));
        return $result;
    }

    function cekBio($kode_user){
        $sql = "SELECT *
                FROM master_mahasiswa
                WHERE NRP= ?";
        $result = $this->db->query($sql, array($kode_user));
        return $result;
    }

    public function input_data($table, $data){
        return $this->db->insert($table, $data);
    }

    function update_data($id,$table,$where,$data){
        $this->db->where($id,$where);
        $this->db->update($table,$data);
        return true;
    }
}
?>