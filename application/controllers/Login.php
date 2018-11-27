<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['nama'] = "Arya Wirasandi";
        $data['nomor'] = 12345;
        $this->load->view('login');
    }

    public function masuk(){
        $username= $this->input->post('username');
        $password= $this->input->post('password');
        if($this->ion_auth->login($username,$password)){
            redirect(base_url('divisi'));
        }else{
            $data['message']=$this->ion_auth->errors();
            $this->load->view('login',$data);
        }
    }

    function logout(){
        $this->ion_auth->logout();
        redirect(base_url('login'));
    }
}