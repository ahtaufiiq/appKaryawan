<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan_model extends CI_Model {

    public $table = 'karyawan';

    function __construct() {
        parent::__construct();
    }

    public function find_all() {
        // return $this->db->get($this->table)->result_array();
        return $this->db->query("SELECT `karyawan`.*,divisi.nama as namadivisi FROM karyawan INNER JOIN divisi ON divisi.id= karyawan.iddivisi")->result_array();
    }
    
    public function insert($data){
        return $this->db->insert($this->table,$data);
    }
    
    public function update($id,$data){
        $this->db->where('id',$id);
        return $this->db->update($this->table,$data);
    }
    
    public function find_by_id($id){
        $result = $this->db->query("SELECT `karyawan`.*,divisi.nama as namadivisi FROM karyawan INNER JOIN divisi ON divisi.id= karyawan.iddivisi  WHERE karyawan.id='$id'")->result_array();
        if($result){
            return $result[0];
        }else{
            return false;
        }
    }
    
    public function delete($id){
        $this->db->where('id',$id);
        return $this->db->delete($this->table);
    }

    public function find_by_name($name){
        $result = $this->db->query("SELECT `karyawan`.*,divisi.nama as namadivisi FROM karyawan INNER JOIN divisi ON divisi.id= karyawan.iddivisi  WHERE karyawan.nama LIKE '%$name%'")->result_array();
        if($result){
            return $result;
        }else{
            return false;
        }
    }

}
