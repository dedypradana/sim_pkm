<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_berkas extends CI_Model {

    public function listPKM() {
        $this->db->select('*');
        $this->db->from('pendaftaran_pkm');
        $this->db->join('mahasiswa','pendaftaran_pkm.nim = mahasiswa.nim_mahasiswa');
        $this->db->where('acc_dosen', 2);
        $this->db->where('acc_admin', 2);
        $this->db->order_by('id_daftar', 'DESC');
        $query = $this->db->get();
        $return = $query->result();
        return $return;
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

}
