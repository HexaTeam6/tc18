<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class master_user_model extends CI_Model{

    public function __construct()
    {
        parent::__construct();
    }

    function tampil_data(){
            return $this->db->query("
            SELECT ml.*, mha.hak_akses, mha.kode_akses, mm.NRP
		    FROM master_login ml
		    LEFT JOIN master_mahasiswa mm ON ml.kode_user = mm.NRP
		    LEFT JOIN menu_hak_akses mha ON ml.kode_akses = mha.kode_akses
		    WHERE ml.kode_akses NOT IN (1)");
    }

    function cetak(){
        return $this->db->query("
            SELECT ml.*, mha.hak_akses, mha.kode_akses, mm.*
		    FROM master_login ml, menu_hak_akses mha, master_mahasiswa mm
		    WHERE ml.kode_akses = mha.kode_akses
		    AND ml.kode_user = mm.NRP");
    }

    function homePreview($sampai, $dari, $like = ''){

//        if($like)
//            $this->db->where($like);

        return $this->db->query("
            SELECT ml.*, mha.hak_akses, mha.kode_akses, mm.*
		    FROM master_login ml, menu_hak_akses mha, master_mahasiswa mm
		    WHERE ml.kode_akses = mha.kode_akses
		    AND ml.kode_user = mm.NRP
		    AND (mm.NRP LIKE '%".$like."%' OR mm.nama LIKE '%".$like."%' OR mm.tempat_lahir LIKE '%".$like."%')
		    AND ml.kode_akses NOT IN (1)
		    LIMIT ?, ?", array($dari, $sampai));
    }

    function jumlah($like=''){

        return $this->db->query("
            SELECT ml.*, mha.hak_akses, mha.kode_akses, mm.*
		    FROM master_login ml, menu_hak_akses mha, master_mahasiswa mm
		    WHERE ml.kode_akses = mha.kode_akses
		    AND ml.kode_user = mm.NRP
		    AND (mm.NRP LIKE '%".$like."%' OR mm.nama LIKE '%".$like."%' OR mm.tempat_lahir LIKE '%".$like."%')")->num_rows();
    }

    function preview($kode_user){
        return $this->db->query("
            SELECT mm.*, (SELECT count(NRP) FROM master_mahasiswa WHERE NRP NOT IN ('hexa')) as jumlahSiswa
            FROM master_login ml, master_mahasiswa mm 
            WHERE ml.kode_user = ?
            AND ml.kode_user = mm.NRP", array($kode_user));
    }
//
//    function getJabatan($akses_jabatan){
//        return $this->db->query("SELECT * FROM master_jabatan
//                                 WHERE akses_jabatan = ?
//                                 AND kode_kelas = ?", array($akses_jabatan, $_SESSION['kode_kelas']));
//    }
//
//    function getKodeJabatan($akses_jabatan, $jabatan){
//        return $this->db->query("SELECT * FROM master_jabatan
//                                 WHERE akses_jabatan = ?
//                                 AND jabatan = ?
//                                 AND kode_kelas = ?", array($akses_jabatan, $jabatan, $_SESSION['kode_kelas']));
//    }

//    function doConfirm($table,$where,$data){
//        $this->db->where('kode_user',$where);
//        $this->db->update($table,$data);
//        return true;
//    }

    function input_data($table,$data){
        //$this->output->enable_profiler(TRUE);
        return $this->db->insert($table,$data);
    }
    function update_data($table,$id,$where,$data){
        $this->db->where($id,$where);
        $this->db->update($table,$data);
        return true;
    }
    function delete_data($table,$id,$where){
        $this->db->where($id, $where);
        $this->db->delete($table);
    }
    function inactive_data($table,$id,$where,$data){
        $this->db->where($id,$where);
        $this->db->update($table,$data);
        return true;
    }

}
?>