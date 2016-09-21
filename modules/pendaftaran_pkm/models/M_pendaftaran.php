<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_pendaftaran extends CI_Model {
    
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
    public function changeStatus($param) {
        $this->db->set('status', 1);
        $this->db->where('id_map', $param['id_map']);
        $this->db->update('map_anggota');
    }
    public function delAnggota($id){
        $this->db->delete('map_anggota', array('id_map' => $id));
        return true;
    }
    public function delGroupAnggota($id_daftar){
        $this->db->delete('map_anggota', array('id_daftar' => $id_daftar));
        return true;
    }
    public function delBerkas($param){
        $this->db->select('u_berkas');
        $this->db->from('pendaftaran_pkm');
        $this->db->where('id_daftar',$param);
        $res = $this->db->get();
        $return = $res->row();
        $path = 'assets/uploads/'.$return->u_berkas;
        unlink($path);
        $this->db->set('u_berkas', '');
        $this->db->where('id_daftar', $param);
        $this->db->update('pendaftaran_pkm');
        return TRUE;
    }
    public function delLampiran($param){
        $this->db->select('u_lampiran');
        $this->db->from('pendaftaran_pkm');
        $this->db->where('id_daftar',$param);
        $res = $this->db->get();
        $return = $res->row();
        $path = 'assets/uploads/'.$return->u_lampiran;
        unlink($path);
        $this->db->set('u_lampiran', '');
        $this->db->where('id_daftar', $param);
        $this->db->update('pendaftaran_pkm');
        return TRUE;
    }
    public function doUpdate($param) {
        $data = array(
            'nim'       => $param['nim'],
            'nama'      => $param['nama'],
            'jurusan'   => $param['jurusan'],
            'telp'      => $param['telp'],
            'email'     => $param['email'],
            'alamat'    => $param['alamat'],
            'nip_dn'    => $param['nip_dn'],
            'nama_dn'   => $param['nama_dn'],
            'email_dn'  => $param['email_dn'],
            'alamat_dn' => $param['alamat_dn'],
            'judul'     => $param['judul'],
            'bidang'    => $param['bidang'],
            'd_hibah'   => $param['d_hibah'],
            'd_mas'     => $param['d_mas'],
            'u_berkas'  => $param['u_berkas'],
            'u_lampiran'=> $param['u_lampiran'],
            'created'   => date('Y-m-d H:i:s'),
        );
        $this->db->where('id_daftar', $param['id_daftar']);
        $this->db->update('pendaftaran_pkm', $data);
        $this->delGroupAnggota($param['id_daftar']);
        if(isset($param['nim_anggota']) && !empty($param['nim_anggota'])){
            $idx = count($param['nim_anggota']);
            for($i=0;$i<$idx;$i++){
                $dt = array(
                    'id_daftar'     =>$param['id_daftar'],
                    'nim_anggota'   =>$param['nim_anggota'][$i],
                    'nama_anggota'  =>$param['nama_anggota'][$i],
                    'nim_ketua'     =>$param['nim'],
                    'status'        => 1,
                    'create'        => date('Y-m-d'),
                );
                $this->db->insert('map_anggota', $dt);
            }
        }else{
            return FALSE;
        }
        return true;
    }
    
    public function doInsert($param) {
        $data = array(
            'id_mahasiswa'=> $this->session->userdata('admin_login')['id'],
            'nim'       => $param['nim'],
            'nama'      => $param['nama'],
            'jurusan'   => $param['jurusan'],
            'telp'      => $param['telp'],
            'email'     => $param['email'],
            'alamat'    => $param['alamat'],
            'nip_dn'    => $param['nip_dn'],
            'nama_dn'   => $param['nama_dn'],
            'email_dn'  => $param['email_dn'],
            'alamat_dn' => $param['alamat_dn'],
            'judul'     => $param['judul'],
            'bidang'    => $param['bidang'],
            'd_hibah'   => $param['d_hibah'],
            'd_mas'     => $param['d_mas'],
            'u_berkas'  => $param['u_berkas'],
            'u_lampiran'=> $param['u_lampiran'],
            'created'   => date('Y-m-d H:i:s'),
        );
        $this->db->insert('pendaftaran_pkm', $data);
        $insert_id = $this->db->insert_id();
        if(isset($param['nim_anggota']) && !empty($param['nim_anggota'])){
            $idx = count($param['nim_anggota']);
            for($i=0;$i<$idx;$i++){
                $dt = array(
                    'id_daftar'     =>$insert_id,
                    'nim_anggota'   =>$param['nim_anggota'][$i],
                    'nama_anggota'  =>$param['nama_anggota'][$i],
                    'nim_ketua'     =>$param['nim'],
                    'status'        => 1,
                    'create'        => date('Y-m-d'),
                );
                $this->db->insert('map_anggota', $dt);
            }
        }else{
            return FALSE;
        }
        return true;
    }

}
