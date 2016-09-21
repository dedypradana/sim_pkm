<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_list extends CI_Model {

    public function listPKM($id_daftar='') {
        $this->db->select('*');
        $this->db->from('pendaftaran_pkm');
        if($id_daftar){
            $this->db->where('id_daftar',$id_daftar);
        }
        $this->db->order_by('id_daftar', 'DESC');
        $query = $this->db->get();
        $return = $query->result();
        return $return;
    }
    public function doDaftar($param){
        $data = array(
            'id_daftar' => $param->id_daftar,
            'nim_anggota' => $this->admin['nim'],
            'nama_anggota' => $this->admin['nama'],
            'nim_ketua' => $param->nim,
            'status' => 0,
            'create' => date('Y-m-d'),
        );
        $this->db->insert('map_anggota', $data);
    }
    public function checkAnggota($nim,$id_daftar){
        $this->db->select('*');
        $this->db->from('map_anggota');
        $this->db->where('id_daftar',$id_daftar);
        $this->db->where('nim_anggota',$nim);
        $res = $this->db->get();
        $return = $res->result();
        if($return){return true;}else{return false;}
    }
    public function check_pkm($id) {
        $this->db->select('*');
        $this->db->from('pendaftaran_pkm');
        $this->db->where('id_mahasiswa',$id);
        $res = $this->db->get();
        $return = $res->row();
        if($return){return $return;}else{return false;}
    }
    public function check_anggota($id) {
        $this->db->select('master_mahasiswa.*, map_anggota.status, map_anggota.id_daftar, map_anggota.id_map');
        $this->db->from('map_anggota');
        $this->db->join('master_mahasiswa', 'master_mahasiswa.nim_mahasiswa = map_anggota.nim_anggota');
        $this->db->where('map_anggota.id_daftar',$id);
        $res = $this->db->get();
        $return = $res->result();
        if($return){return $return;}else{return false;}
    }

}
