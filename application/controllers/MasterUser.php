<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MasterUser extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Master_user_model');
        $this->load->model('Hak_akses_model');
//        $this->load->model('Logs_model');
    }

    public function index()
    {
        if(isset($_SESSION['kode_user'])){
            $data['data'] = $this->Master_user_model->tampil_data()->result();
            $data['akses'] = $this->Hak_akses_model->tampil_data()->result();
            //Notification
//            $data['notif'] = $this->Logs_model->getNotification()->result();
//            $data['new'] = $this->Logs_model->newNotification()->result();
//            $data['mark'] = $this->Logs_model->newNotification()->num_rows();

            $this->load->view('menu/master/master_user', $data);
        }
        else{
            redirect(site_url().'/Auth/logout');
        }
    }

//    public function confirm($nis, $nama)
//    {
//        $nama = str_replace('%20', ' ', $nama);
//
//        $data = array(
//            'status' => 'Confirmed'
//        );
//        $logs = array(
//            'kode_user' => $_SESSION['kode_user'],
//            'kode_kelas' => $_SESSION['kode_kelas'],
//            'message' => 'Telah mengkonfirmasi '.$nama.' sebagai anggota kelas',
//            'link' => 'MasterUser',
//            'icon' => 'mdi-account-check',
//            'color' => 'success'
//        );
//        $this->Master_user_model->doConfirm('master_login', $nis, $data);
//        $this->Logs_model->input_data('logs', $logs);
//        $this->session->set_flashdata('msg', 'Berhasil dikonfirmasi!');
//        redirect(site_url().'/MasterUser');
//    }

    public function insert(){


        $nama = $this->input->post('nama');
        $kode_user = $this->input->post('kode_user');
        $kode_akses = $this->input->post('kode_akses');
        $password = $this->input->post('password');
        $data = array(
            'nama' => $nama,
            'kode_user' => $kode_user,
            'kode_akses' => $kode_akses,
            'password' => md5($password)
        );
//        $logs = array(
//            'kode_user' => $_SESSION['kode_user'],
//            'kode_kelas' => $_SESSION['kode_kelas'],
//            'message' => 'Telah merubah '.$nama.' menjadi '.$jabatan,
//            'link' => 'MasterUser',
//            'icon' => 'mdi-account-edit',
//            'color' => 'warning'
//        );

        $this->Master_user_model->input_data('master_login', $data);
//        $this->Logs_model->input_data('logs', $logs);
        $this->session->set_flashdata('msg', 'Berhasil ditambahkan!');

        redirect(site_url().'/MasterUser');
    }

    public function update(){

        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $kode_user = $this->input->post('kode_user');
        $kode_akses = $this->input->post('kode_akses');
        $password = $this->input->post('password');
        $data = array(
            'nama' => $nama,
            'kode_user' => $kode_user,
            'kode_akses' => $kode_akses,
            'password' => md5($password)
        );
//        $logs = array(
//            'kode_user' => $_SESSION['kode_user'],
//            'kode_kelas' => $_SESSION['kode_kelas'],
//            'message' => 'Telah merubah '.$nama.' menjadi '.$jabatan,
//            'link' => 'MasterUser',
//            'icon' => 'mdi-account-edit',
//            'color' => 'warning'
//        );

        $this->Master_user_model->update_data('master_login', 'id', $id, $data);
//        $this->Logs_model->input_data('logs', $logs);
        $this->session->set_flashdata('msg', 'Berhasil diupdate!');

        redirect(site_url().'/MasterUser');
    }

    public function preview($kode_user){

        if(isset($_SESSION['kode_user'])){
            $data['data'] = $this->Master_user_model->preview($kode_user)->result();

            //Notification
//            $data['notif'] = $this->Logs_model->getNotification()->result();
//            $data['new'] = $this->Logs_model->newNotification()->result();
//            $data['mark'] = $this->Logs_model->newNotification()->num_rows();

            $this->load->view('menu/master/master_user_preview', $data);
        }
        else{
            redirect(site_url().'/Auth/logout');
        }
    }

//    public function getJabatan($akses_jabatan)
//    {
//        $cek = $this->Master_user_model->getJabatan($akses_jabatan)->num_rows();
//
//        if ($cek > 0 ){
//            $result = $this->Master_user_model->getJabatan($akses_jabatan)->result();
//            echo json_encode($result);
//        }else{
//            echo 'false';
//        }
//
//    }

//    public function getKodeJabatan($akses_jabatan, $jabatan)
//    {
//        $jabatan = str_replace('%20', ' ', $jabatan);
//        $cek = $this->Master_user_model->getKodeJabatan($akses_jabatan, $jabatan)->num_rows();
//
//        if ($cek > 0 ){
//            $result = $this->Master_user_model->getKodeJabatan($akses_jabatan, $jabatan)->result();
//            echo json_encode($result);
//        }else{
//            echo 'false';
//        }
//
//    }

    public function delete($kode_user){
//        $nama = str_replace('%20', ' ', $nama);

//        $logs = array(
//            'kode_user' => $_SESSION['kode_user'],
//            'kode_kelas' => $_SESSION['kode_kelas'],
//            'message' => 'Telah menghapus '.$nama.' dari anggota kelas',
//            'link' => 'MasterUser',
//            'icon' => 'mdi-account-minus',
//            'color' => 'danger'
//        );

        $this->Master_user_model->delete_data('master_mahasiswa', 'NRP', $kode_user);
        $this->Master_user_model->delete_data('master_login', 'kode_user', $kode_user);
//        $this->Logs_model->input_data('logs', $logs);
        $this->session->set_flashdata('msg', 'Berhasil dihapus!');

        echo site_url('MasterUser');
    }

    public function excel()
    {
        require(APPPATH.'third_party/PHPExcel-1.8/Classes/PHPExcel.php');
        require(APPPATH.'third_party/PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

        $excel = new PHPExcel();

        $excel->getProperties()->setCreator('TC18');
        $excel->getProperties()->setTitle('Data Angkatan');

        $excel->setActiveSheetIndex(0);

        $excel->getActiveSheet()->setCellValue('A1','No');
        $excel->getActiveSheet()->setCellValue('B1','NRP');
        $excel->getActiveSheet()->setCellValue('C1','Email');
        $excel->getActiveSheet()->setCellValue('D1','Nama');
        $excel->getActiveSheet()->setCellValue('E1','Jenis Kelamin');
        $excel->getActiveSheet()->setCellValue('F1','Tempat, Tanggal Lahir');
        $excel->getActiveSheet()->setCellValue('G1','Alamat');
        $excel->getActiveSheet()->setCellValue('H1','Alamat Surabaya');
        $excel->getActiveSheet()->setCellValue('I1','Nomor Telepon');
        $excel->getActiveSheet()->setCellValue('J1','Moto');
        $excel->getActiveSheet()->setCellValue('K1','Tujuan');
        $excel->getActiveSheet()->setCellValue('L1','MBTI');
        $excel->getActiveSheet()->setCellValue('M1','Makanan/Minuman Favorit');

        $data = $this->Master_user_model->cetak()->result();

        $row = 2;
        $no = 1;
        foreach ($data as $val){
            $excel->getActiveSheet()->setCellValue('A'.$row, $no);
            $excel->getActiveSheet()->setCellValue('B'.$row, $val->kode_user);
            $excel->getActiveSheet()->setCellValue('C'.$row, $val->email);
            $excel->getActiveSheet()->setCellValue('D'.$row, $val->nama);
            $excel->getActiveSheet()->setCellValue('E'.$row, $val->jenis_kelamin);
            $excel->getActiveSheet()->setCellValue('F'.$row, $val->tempat_lahir.','.$val->tanggal_lahir);
            $excel->getActiveSheet()->setCellValue('G'.$row, $val->alamat);
            $excel->getActiveSheet()->setCellValue('H'.$row, $val->alamat_sby);
            $excel->getActiveSheet()->setCellValue('I'.$row, $val->no_telp);
            $excel->getActiveSheet()->setCellValue('J'.$row, $val->moto);
            $excel->getActiveSheet()->setCellValue('K'.$row, $val->tujuan);
            $excel->getActiveSheet()->setCellValue('L'.$row, $val->mbti);
            $excel->getActiveSheet()->setCellValue('M'.$row, $val->fav);

            $row++;
            $no++;
        }

        $excel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
        $excel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
        $excel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
        $excel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
        $excel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
        $excel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
        $excel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
        $excel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
        $excel->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
        $excel->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
        $excel->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);
        $excel->getActiveSheet()->getColumnDimension('L')->setAutoSize(true);
        $excel->getActiveSheet()->getColumnDimension('M')->setAutoSize(true);


        $filename = 'Data Angkatan '.date('d-m-Y-H-i-s').'.xlsx';

        $excel->getActiveSheet()->setTitle("Data Angkatan");

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="'.$filename.'"');
        header('Cache-Control: max-age=0');

        $writer = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
        $writer->save('php://output');
        exit;
    }

    public function pdf()
    {
        $this->load->library('Pdf');
        $data['data'] = $this->Master_user_model->cetak()->result();
        $this->load->view('prints/Master_user_print', $data);
    }

    public function test(){
        var_dump($this->Master_user_model->tampil_data()->result());
    }
}
?>