<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_validasi extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    public function listPKM($nim='') {
        $this->db->select('*');
        $this->db->from('pendaftaran_pkm');
        $this->db->join('mahasiswa', 'mahasiswa.nim_mahasiswa = pendaftaran_pkm.nim');
        if($nim){$this->db->where('pendaftaran_pkm.nip_dn', $nim);}
        $this->db->where('pendaftaran_pkm.acc_dosen', 0);
        $this->db->order_by('pendaftaran_pkm.id_daftar', 'DESC');
        $query = $this->db->get();
        $return = $query->result();
        return $return;
    }
    public function listAdminPKM() {
        $this->db->select('*');
        $this->db->from('pendaftaran_pkm');
        $this->db->join('mahasiswa', 'mahasiswa.nim_mahasiswa = pendaftaran_pkm.nim');
        $this->db->where('pendaftaran_pkm.acc_dosen', 2);
        $this->db->where('pendaftaran_pkm.acc_admin', 0);
        $this->db->order_by('pendaftaran_pkm.id_daftar', 'DESC');
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
    public function doTolak($param=''){
        if($this->admin['tipe']=='administrator'){
            $this->db->set('note_admin', $param['note']);
            $this->db->set('acc_admin', 1);
            $this->db->where('id_daftar', $param['id']);
            $this->db->update('pendaftaran_pkm');   
        } else {
            $this->db->set('note_dosen', $param['note']);
            $this->db->set('acc_dosen', 1);
            $this->db->where('id_daftar', $param['id']);
            $this->db->update('pendaftaran_pkm'); 
        }
        return TRUE;
    }
    public function doTerima($id=''){
        if($this->admin['tipe']=='administrator'){
            $this->db->set('note_admin', 'Diterima');
            $this->db->set('acc_admin', 2);
            $this->db->where('id_daftar', $id);
            $this->db->update('pendaftaran_pkm');
        } else {
            $this->db->set('note_dosen', 'Diterima');
            $this->db->set('acc_dosen', 2);
            $this->db->where('id_daftar', $id);
            $this->db->update('pendaftaran_pkm');
        }
        return TRUE;
    }

}
