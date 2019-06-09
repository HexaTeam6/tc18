<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('html','url','form'));
        $this->load->library('pagination');
        $this->load->model('Master_user_model');
    }

    public function index(){

        if(isset($_SESSION['kode_user'])){

            $dari      = (int)$this->uri->segment('3');
            $sampai = 8;
            $like      = '';

            //hitung jumlah row
            $jumlah= $this->Master_user_model->jumlah();

            //inisialisasi array
            $config = array();

            //set base_url untuk setiap link page
            $config['base_url'] = base_url().'index.php/Home/index/';

            //hitung jumlah row
            $config['total_rows'] = $jumlah;

            //mengatur total data yang tampil per page
            $config['per_page'] = $sampai;

            //mengatur jumlah nomor page yang tampil
            $config['num_links'] = $jumlah;

            //mengatur tag
            $config['first_link']       = 'First';
            $config['last_link']        = 'Last';
            $config['next_link']        = 'Next';
            $config['prev_link']        = 'Prev';
            $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
            $config['full_tag_close']   = '</ul></nav></div>';
            $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
            $config['num_tag_close']    = '</span></li>';
            $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
            $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
            $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
            $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
            $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
            $config['prev_tagl_close']  = '</span>Next</li>';
            $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
            $config['first_tagl_close'] = '</span></li>';
            $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
            $config['last_tagl_close']  = '</span></li>';

            //inisialisasi array 'config' dan set ke pagination library
            $this->pagination->initialize($config);

            //inisialisasi array
            $data = array();

            //ambil data buku dari database
            $data['data'] = $this->Master_user_model->homePreview($sampai, $dari, $like)->result();
            $data['search'] = $like;

            //Membuat link
            $str_links = $this->pagination->create_links();
            $data["links"] = explode('&nbsp;',$str_links );

//            var_dump($data['links']);
            $this->load->view('home',$data);


//            $data['data'] = $this->Master_user_model->cetak()->result();
//			$this->load->view('home', $data);
		}
		else{
			redirect(site_url().'/Auth/logout');
		}
    }
    public function cari(){

        if(isset($_SESSION['kode_user'])){

            //mengambil nilai keyword dari form pencarian
            $search = (trim($this->input->post('key',true)))? trim($this->input->post('key',true)) : '';

            //jika uri segmen 3 ada, maka nilai variabel $search akan diganti dengan nilai uri segmen 3
            $search = ($this->uri->segment(3)) ? $this->uri->segment(3) : $search;

            //mengambil nilari segmen 4 sebagai offset
            $dari      = (int)$this->uri->segment('4');

            //limit data yang ditampilkan
            $sampai = 8;

            //inisialisasi variabel $like
            $like      = '';

            //mengisi nilai variabel $like dengan variabel $search, digunakan sebagai kondisi untuk menampilkan data
//            if($search) $like = "(mm.NRP LIKE '%$search%')";

            //hitung jumlah row
            $jumlah= $this->Master_user_model->jumlah($search);

            //inisialisasi array
            $config = array();

            //set base_url untuk setiap link page
            $config['base_url'] = base_url().'index.php/Home/cari/'.$search;

            //hitung jumlah row
            $config['total_rows'] = $jumlah;

            //mengatur total data yang tampil per page
            $config['per_page'] = $sampai;

            //mengatur jumlah nomor page yang tampil
            $config['num_links'] = $jumlah;

            //mengatur tag
            $config['first_link']       = 'First';
            $config['last_link']        = 'Last';
            $config['next_link']        = 'Next';
            $config['prev_link']        = 'Prev';
            $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
            $config['full_tag_close']   = '</ul></nav></div>';
            $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
            $config['num_tag_close']    = '</span></li>';
            $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
            $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
            $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
            $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
            $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
            $config['prev_tagl_close']  = '</span>Next</li>';
            $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
            $config['first_tagl_close'] = '</span></li>';
            $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
            $config['last_tagl_close']  = '</span></li>';

            //inisialisasi array 'config' dan set ke pagination library
            $this->pagination->initialize($config);


            //inisialisasi array
            $data = array();

            //ambil data buku dari database
            $data['data'] = $this->Master_user_model->homePreview($sampai, $dari, $search)->result();
            $data['search'] = $search;

            //Membuat link
            $str_links = $this->pagination->create_links();
            $data["links"] = explode('&nbsp;',$str_links );

            $this->load->view('home',$data);
        }else{
            redirect(site_url().'/Auth/logout');
        }

    }

}
