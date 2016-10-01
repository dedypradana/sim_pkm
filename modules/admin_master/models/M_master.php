<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_master extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->_table = 'admin';
    }
    public function get_all_pkm($param='') {
        $this->db->select('*');
        $this->db->from('pendaftaran_pkm');
        $this->db->join('mahasiswa', 'mahasiswa.nim_mahasiswa = pendaftaran_pkm.nim');
        $this->db->order_by('pendaftaran_pkm.id_daftar', 'DESC');
        $query = $this->db->get();
        $return = $query->result();
        return $return;
    }
    public function get_all_mhs($param='') {
        $sql = 'select * from mahasiswa where nim_mahasiswa not in (select nim from pendaftaran_pkm)';
        $query = $this->db->query($sql);
        $return = $query->result();
        return $return;
    }
    public function check_ketua($nim=''){
        $sql = 'select * from mahasiswa where nim_mahasiswa not in (select nim from pendaftaran_pkm)';
        $query = $this->db->query($sql);
        $return = $query->result();
        if($return){return true;}else{return false;}
    }
}