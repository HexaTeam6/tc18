<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Daftar_model');
        $this->load->model('User_model');
    }

    public function index()
    {
        $this->load->view('pages/daftar');
    }

    public function insert()
    {
        //upload file and get the name
        $foto = $this->uploadFile();

        $this->output->enable_profiler(TRUE);
//        $fileName = date("d-m-Y H:i:s")."_".@$_FILES['foto']['name'];
       $NRP = $_SESSION['kode_user'];
       $nama = $this->input->post('nama');
       $password = $this->input->post('password');
       $email = $this->input->post('email');
       $jenisKelamin = $this->input->post('jenisKelamin');
       $tempatLahir = $this->input->post('tempatLahir');
       $tanggalLahir = $this->input->post('tanggalLahir');
       $alamat = $this->input->post('alamat');
       $alamat_sby = $this->input->post('alamatsby');
       $telepon = $this->input->post('telepon');
       $mbti = $this->input->post('mbti');
       $hobi = $this->input->post('hobi');
       $fav = $this->input->post('fav');
       $moto = $this->input->post('moto');
       $tujuan = $this->input->post('tujuan');

        $data = array(
            'NRP' => $NRP,
            'nama' => $nama,
            'email' => $email,
            'jenis_kelamin' => $jenisKelamin,
            'tempat_lahir' => $tempatLahir,
            'tanggal_lahir' => $tanggalLahir,
            'alamat' => $alamat,
            'alamat_sby' => $alamat_sby,
            'no_telp' => $telepon,
            'mbti' => strtoupper($mbti),
            'hobi' => $hobi,
            'fav' => $fav,
            'moto' => $moto,
            'tujuan' => $tujuan,
            'foto' => $foto
        );
        $dataLogin = array(
            'email' => $email,
            'nama' => $nama,
            'password' => md5($password),
            'foto' => $foto
        );

        $this->session->set_userdata("foto",$foto);
        $this->Daftar_model->update_data('kode_user', 'master_login', $_SESSION['kode_user'], $dataLogin);
        $this->Daftar_model->input_data('master_mahasiswa', $data);
        redirect('/home');
    }

    public function checkUserEmail($email)
    {
        $email = str_replace("-at-", "@", $email);
        $query = $this->User_model->cekEmail($email);
        if (count($query->result()) > 0){
//            return true;
            echo "true";
        }else{
//            return false;
            echo "false";
        }
    }

    public function uploadFile()
    {
        //Make directory
        if(!file_exists("assets/img/userProfile")){
            mkdir("assets/img/userProfile");
        }

        $config['upload_path'] = './assets/img/userProfile/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        $this->upload->do_upload('foto');

        $upload_data = $this->upload->data();

        $file_name = $upload_data['file_name'];

        return $file_name;

    }

}
?>