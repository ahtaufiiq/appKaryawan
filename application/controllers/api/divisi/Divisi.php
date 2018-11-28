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
        $this->response($data);
    }

}