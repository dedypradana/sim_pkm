<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_dashboard extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    public function check_ketua($nim) {
        $this->db->select('*');
        $this->db->from('pendaftaran_pkm');
        $this->db->where('nim',$nim);
        $res = $this->db->get();
        $return = $res->row();
        if($return){return $return;}else{return false;}
    }
    public function check_admin() {
        $this->db->select('*');
        $this->db->from('pendaftaran_pkm');
        $this->db->where('acc_dosen',0);
        $res = $this->db->get();
        $return = $res->result();
        if($return){return $return;}else{return false;}
    }
    public function get_pkm($id_daftar='') {
        $this->db->select('*');
        $this->db->from('pendaftaran_pkm');
        $this->db->join('mahasiswa', 'mahasiswa.nim_mahasiswa = pendaftaran_pkm.nim');
        $this->db->where('pendaftaran_pkm.id_daftar',$id_daftar);
        $res = $this->db->get();
        $return = $res->row();
        if($return){return $return;}else{return false;}
    }
    public function get_anggota($id_daftar='') {
        $this->db->select('*');
        $this->db->from('map_anggota');
        $this->db->join('mahasiswa', 'mahasiswa.nim_mahasiswa = map_anggota.nim_anggota');
        $this->db->where('map_anggota.id_daftar',$id_daftar);
        $res = $this->db->get();
        $return = $res->result();
        if($return){return $return;}else{return false;}
    }
    public function check_dosen($nidn) {
        $this->db->select('*');
        $this->db->from('pendaftaran_pkm');
        $this->db->where('nip_dn',$nidn);
        $res = $this->db->get();
        $return = $res->result();
        if($return){return $return;}else{return false;}
    }
    public function check_pkm($nim) {
        $this->db->select('*');
        $this->db->from('map_anggota');
        $this->db->join('pendaftaran_pkm', 'map_anggota.id_daftar = pendaftaran_pkm.id_daftar', 'left');
        $this->db->where('map_anggota.nim_anggota',$nim);
        $res = $this->db->get();
        $return = $res->result();
        if($return){return $return;}else{return false;}
    }

}
