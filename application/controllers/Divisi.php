<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Divisi extends CI_Controller {
    // super method
    public function __construct()
    {
        parent::__construct();
        $this->load->model('divisi_model', 'divisi'); 
    }

    public function index()
    {
        $data['records'] = $this->divisi->find_all();
        // report bug to the log
        log_message('DEBUG', $this->db->last_query());
        $this->load->view('divisi/index', $data);
    }

    public function tambah()
    {
        $this->load->view('divisi/tambah');
    }

    public function tambah_save()
    {
        // field kesalahan
        $this->form_validation->set_rules('kode', 'Kode Divisi', 'required');
        $this->form_validation->set_rules('nama', 'Nama Divisi', 'required');

        if($this->form_validation->run() == FALSE)
        {
            $this->load->view('divisi/tambah');
        }else{
            $data = [
                'kode' => $this->input->post('kode'),
                'nama' => $this->input->post('nama')
            ];
            $this->divisi->insert($data);
            redirect(base_url('divisi'));
        }
    }

    public function detail()
    {
        $id = $this->uri->segment('3');
        $data['divisi'] = $this->divisi->find_by_id($id);
        $this->load->view('divisi/detail', $data); 
    }

    public function edit()
    {
        $id = $this->uri->segment('3');
        $data['divisi'] = $this->divisi->find_by_id($id);
        $this->load->view('divisi/edit', $data);
    }

    public function edit_save()
    {
        // field kesalahan
        $id = $this->input->post('id');
        $this->form_validation->set_rules('kode', 'Kode Divisi', 'required');
        $this->form_validation->set_rules('nama', 'Nama Divisi', 'required');

        if($this->form_validation->run() == FALSE)
        {
            $data['divisi'] = $this->divisi->find_by_id($id);
            $this->load->view('divisi/edit', $data);
        }else{
            $data = [
                'kode' => $this->input->post('kode'),
                'nama' => $this->input->post('nama')
            ];
            $this->divisi->update($id,$data);
            redirect(base_url('divisi'));
        }
    }

    public function hapus(){
        $id = $this->uri->segment(3);
        if($id)
        {
            $this->divisi->delete($id);
        }
        redirect(base_url('divisi'));
    }

    
   
}