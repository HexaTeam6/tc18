<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserProfile extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
//        $this->load->model('Logs_model');
    }

    public function index()
    {
        if(isset($_SESSION['kode_user'])){
            $data['data'] = $this->User_model->tampil_data()->result();
//            $data['logs'] = $this->Logs_model->getRiwayat()->result();

            //Notification
//            $data['notif'] = $this->Logs_model->getNotification()->result();
//            $data['new'] = $this->Logs_model->newNotification()->result();
//            $data['mark'] = $this->Logs_model->newNotification()->num_rows();

            $this->load->view('menu/pengaturan/user_profile', $data);
        }
        else{
            redirect(site_url().'/Auth/logout');
        }
    }

    public function update()
    {
        $nama = $this->input->post('nama');
        $jenis_kelamin = $this->input->post('jenisKelamin');
        $tempat_lahir = $this->input->post('tempatLahir');
        $tanggal_lahir = $this->input->post('tanggalLahir');
        $no_telp = $this->input->post('nomerTelepon');
        $alamat = $this->input->post('alamat');
        $alamat_sby = $this->input->post('alamat_sby');
        $hobi = $this->input->post('hobi');
        $moto = $this->input->post('moto');
        $tujuan = $this->input->post('tujuan');
        $mbti = $this->input->post('mbti');
        $fav = $this->input->post('fav');
        $dataUser = array(
            'nama' => $nama,
            'jenis_kelamin' => $jenis_kelamin,
            'tempat_lahir' => $tempat_lahir,
            'tanggal_lahir' => $tanggal_lahir,
            'no_telp' => $no_telp,
            'alamat' => $alamat,
            'alamat_sby' => $alamat_sby,
            'hobi' => $hobi,
            'moto' => $moto,
            'tujuan' => $tujuan,
            'mbti' => $mbti,
            'fav' => $fav
        );
        $dataLogin = array(
            'nama' => $nama
        );
//        $logs = array(
//            'kode_user' => $_SESSION['kode_user'],
//            'kode_kelas' => $_SESSION['kode_kelas'],
//            'message' => 'Informasi profil telah diperbarui',
//            'link' => 'UserProfile',
//            'icon' => 'ti-user'
//        );

//        switch ($_SESSION['kode_akses']){
//            case '2' : $this->User_model->update_data('NIP' ,'master_wali_kelas', $_SESSION['kode_user'], $dataUser);
//            break;
//            case '3' : $this->User_model->update_data('NIS' ,'Master_user', $_SESSION['kode_user'], $dataUser);
//            break;
//            case '4' : $this->User_model->update_data('NIK' ,'master_wali_murid', $_SESSION['kode_user'], $dataUser);
//            break;
//            default : '';
//        }

        $this->User_model->update_data('NRP' ,'master_mahasiswa', $_SESSION['kode_user'], $dataUser);
        $this->User_model->update_data('kode_user' ,'master_login', $_SESSION['kode_user'], $dataLogin);
//        $this->Logs_model->input_data('logs', $logs);
        $this->session->set_userdata("nama",$nama);
        $this->session->set_flashdata('msg', 'Berhasil diupdate!');

        redirect(site_url().'/UserProfile');
    }

    public function uploadFile()
    {
        //Delete recent image

        $recentImage = $this->User_model->selectUserInfo($_SESSION['kode_user'])->row()->foto;
        if(file_exists("assets/img/userProfile/".$recentImage)){
            unlink("assets/img/userProfile/".$recentImage);
        }

        $config['upload_path'] = './assets/img/userProfile/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        $this->upload->do_upload('foto');

        $upload_data = $this->upload->data();

        $file_name = $upload_data['file_name'];

        $data = array(
            'foto' => $file_name
        );

//        $logs = array(
//            'kode_user' => $_SESSION['kode_user'],
//            'kode_kelas' => $_SESSION['kode_kelas'],
//            'message' => 'Foto profil telah diperbarui',
//            'link' => 'UserProfile',
//            'icon' => 'ti-user'
//        );

//        switch ($_SESSION['kode_akses']){
//            case '2' : $this->User_model->update_data('NIP' ,'master_wali_kelas', $_SESSION['kode_user'], $data);
//                break;
//            case '3' : $this->User_model->update_data('NIS' ,'Master_user', $_SESSION['kode_user'], $data);
//                break;
//            case '4' : $this->User_model->update_data('NIK' ,'master_wali_murid', $_SESSION['kode_user'], $data);
//                break;
//            default : '';
//        }
        $this->User_model->update_data('NRP' ,'master_mahasiswa', $_SESSION['kode_user'], $data);
        $this->User_model->update_data('kode_user' ,'master_login', $_SESSION['kode_user'], $data);
//        $this->Logs_model->input_data('logs', $logs);

        $this->session->set_userdata("foto",$file_name);

        $this->session->set_flashdata('msg', 'Berhasil diupload!');

        redirect(site_url().'/UserProfile');

    }

}
?>