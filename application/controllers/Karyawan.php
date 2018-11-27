<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('divisi_model', 'divisi');
        $this->load->model('karyawan_model', 'karyawan');
    }

    function index() {
        $data['records'] = $this->karyawan->find_all();
        $this->load->view('karyawan/index', $data);
    }
    public function tambah() {
        $jabatan=[
            "Manajer" => "Manajer",
            "SuperVisor" => "SuperVisor",
            "Karyawan" => "Karyawan"
        ];
        $data['jabatan']=$jabatan;
        $data['divisi']=$this->divisi->find_all();

        $this->load->view('karyawan/tambah',$data);
    }

    public function detail() {
        $id = $this->uri->segment(3);
        $data['karyawan'] = $this->karyawan->find_by_id($id);
        $this->load->view('karyawan/detail', $data);
    }

    public function tambah_save() {
        //                               field,Pesan kesalahan,tipe validasi
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('karyawan/tambah');
        } else {
            $config= array(
                'upload_path' => "./assets/uploads/",
                'allowed_types' => "*",
                'overwrite'=> TRUE,
                'max_size'=> "2048000"
            );

            $file_name="";
            $this->load->library('upload',$config);
            if($this->upload->do_upload('foto')){
                $upload_data=$this->upload->data();
                $file_name = $upload_data['file_name'];
            }else{
                $error= array('error' => $this->upload->display_errors());
                print_r($error);
                exit;
            }
            $data = array(
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'telpon' => $this->input->post('telpon'),
                'jabatan' => $this->input->post('jabatan'),
                'jeniskelamin' => $this->input->post('jeniskelamin'),
                'iddivisi' => $this->input->post('iddivisi'),
                'tgl_lahir' => $this->input->post('tgllahir'),
                'foto'=>$file_name
            );
            $this->karyawan->insert($data);
            redirect(base_url('karyawan'));
        }
    }

    public function edit()
    {
        $id = $this->uri->segment(3);
        $data['karyawan'] = $this->karyawan->find_by_id($id);
        $jabatan=[
            "Manajer" => "Manajer",
            "SuperVisor" => "SuperVisor",
            "Karyawan" => "Karyawan"
        ];
        $data['jabatan']=$jabatan;
        $data['divisi']=$this->divisi->find_all();

        $this->load->view('karyawan/edit',$data);
    }

    public function edit_save() {
        $id =$this->input->post('id');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('karyawan/tambah');
        } else {
            $config= array(
                'upload_path' => "./assets/uploads/",
                'allowed_types' => "*",
                'overwrite'=> TRUE,
                'max_size'=> "2048000"
            );
            $file_name="";

            if($_FILES['foto']['name' !=""]){
                $this->load->library('upload',$config);
                if($this->upload->do_upload('foto')){
                    $upload_data=$this->upload->data();
                    $file_name = $upload_data['file_name'];
                }else{
                    $error= array('error' => $this->upload->display_errors());
                    print_r($error);
                    exit;
                }
            }else{
                $file_name=$this->input->post('foto_lama');
            }

            
            $data = array(
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'telpon' => $this->input->post('telpon'),
                'jabatan' => $this->input->post('jabatan'),
                'jeniskelamin' => $this->input->post('jeniskelamin'),
                'iddivisi' => $this->input->post('iddivisi'),
                'tgl_lahir' => $this->input->post('tgllahir'),
                'foto'=>$file_name
            );
            $this->karyawan->update($id,$data);
            redirect(base_url('karyawan'));
        }
    }

    public function hapus(){
        $id = $this->uri->segment(3);
        if($id)
        {
            $this->karyawan->delete($id);
        }
        redirect(base_url('karyawan'));
    }

}