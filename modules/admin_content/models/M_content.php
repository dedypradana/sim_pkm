<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_content extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    
    public function get_img($param) {
        $this->db->select('*');
        switch ($param['uri']){
            case 'gallery': 
                $this->db->from('gallery'); break;
            case 'portofolio': 
                $this->db->from('portofolio'); break;
            default:
                break;
        }
        $this->db->where('id',$param['id']);
        $data = $this->db->get();
        $res = $data->row();
        return $res;
    }
    
    public function get_kategori($param) {
        $this->db->select('*');
        $this->db->from('master_kategori');
        switch ($param['uri']){
            case 'gallery': 
                $this->db->where('pilihan',1); break;
            case 'portofolio': 
                $this->db->where('pilihan',2); break;
            default:
                break;
        }
        $data = $this->db->get();
        $res = $data->result();
        return $res;
    }
    
    public function do_insert($param){
        $data = array(
            'kategori' => $param['id_kategori'],
            'deskripsi' => $param['deskripsi']
        );
        $this->db->where('id', $param['id_gallery']);
        $this->db->update('gallery', $data); 
        return true;
    }
}