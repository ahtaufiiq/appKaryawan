<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//1.Include Library
require APPPATH . 'libraries/REST_Controller.php';

//2. Extends Rest Controller
class Divisi extends REST_Controller{


    function __construct($config ='rest'){
        parent::__construct($config);
        //$this-?input->post() kalau extends Rest_controller $this->post()
        $token=$this->post('token');
        if(!$token){
            $token=$this->get('token');
        }

        if(!$token){
            $this->response('access denied', REST_Controller::HTTP_FORBIDDEN);
        }

        $this->load->model('users_model','users');

        $user=$this->users->find_by_token($token);
        if(!$user){
            $this->response('invalid token',REST_Controller::HTTP_FORBIDDEN);
        }
        $this->load->model('divisi_model','divisi');

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

    function detail_get(){
        $id=$this->uri->segment(4);
        $data=$this->divisi->find_by_id($id);
        if($data){
            $this->response($data);
        }
        $this->response(null,REST_Controller::HTTP_NO_CONTENT);
    }


    function update_post(){
        // field kesalahan
        $id = $this->input->post('id');
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
            $result=$this->divisi->update($id,$data);
            $this->response($result);
        }
    }
    function delete_post(){
        $id = $this->uri->segment(4);
        if($id)
        {
            $result=$this->divisi->delete($id);
            if(!$result){
                $this->response('Tidak dapat menghapus data',500);
            }
        $this->response($result);

        }
        $this->response('Tidak dapat menghapus data',500);
    }
}