<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//1.Include Library
require APPPATH . 'libraries/REST_Controller.php';

//2. Extends Rest Controller
class Divisi extends REST_Controller{


    function __construct($config ='rest'){
        parent::__construct($config);
        $tes=$this->load->model('divisi_model', 'divisi');

    }

    //Buat function get atau post

    //Cara Manggilnya index aja gk perlu get
    //
    //jadi localhost/appkaryawan/api/index
    function index_get(){
        $data=$this->divisi->find_all();
        if($data){
            //Data Ada
            $this->response($data);
        }
        //Data Tidak Ada, beri status 204
        $this->response(null,REST_Controller::HTTP_NO_CONTENT);            
    }

    function pagination_get(){
        $data=array();
        //Jumlah Data Perhalaman
        $limit_per_page =2;
        //http://localhost/appkaryawan/api/divisi/pagination/0
        $start_index=$this->uri->segment(4) ? $this->uri->segment(4):0;
        $total_records=$this->divisi->get_total();
        if($total_records>0){
            $data=$this->divisi->pagination($limit_per_page,$start_index);
        }
        if($data){
            $this->response($data);
        }
        $this->response(null,REST_Controller::HTTP_NO_CONTENT);


    }

    function insert_post(){
                // field kesalahan
                $this->form_validation->set_rules('kode', 'Kode Divisi', 'required');
                $this->form_validation->set_rules('nama', 'Nama Divisi', 'required');
        
                if($this->form_validation->run() == FALSE)
                {
                    $this->response(validation_errors(),REST_Controller::HTTP_BAD_REQUEST);
                }else{
                    $data = [
                        'kode' => $this->input->post('kode'),
                        'nama' => $this->input->post('nama')
                    ];
                    $result=$this->divisi->insert($data);
                    $this->response($result);
                }
    }
}