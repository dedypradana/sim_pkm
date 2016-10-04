<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_pendaftaran extends CI_Model {
    
    public function check_pkm($nim) {
        $this->db->select('*,mahasiswa.id_mahasiswa id_mahasiswa, mahasiswa.nama_mahasiswa nama, mahasiswa.handphone_mahasiswa telp, mahasiswa.email_mahasiswa email, mahasiswa.alamat_mahasiswa alamat, dosen.nama_dosen nama_dn, dosen.email_dosen email_dn, dosen.alamat_dosen alamat_dn');
        $this->db->from('pendaftaran_pkm');
        $this->db->join('mahasiswa', 'mahasiswa.nim_mahasiswa = pendaftaran_pkm.nim', 'left');
        $this->db->join('dosen', 'dosen.nip_dosen = pendaftaran_pkm.nip_dn', 'left');
        $this->db->where('nim',$nim);
        $res = $this->db->get();
        $return = $res->row();
        if($return){return $return;}else{return false;}
    }
    public function get_dosen($nidn='') {
        $this->db->select('*');
        $this->db->from('dosen');
        if($nidn){$this->db->where('nip_dosen',$nidn);}
        $res = $this->db->get();
        $return = $res->result();
        if($return){return $return;}else{return false;}
    }
    public function get_agt($nim='') {
        $this->db->select('*');
        $this->db->from('mahasiswa');
        $this->db->where('nim_mahasiswa',$nim);
        $res = $this->db->get();
        $return = $res->result();
        if($return){return $return;}else{return false;}
    }
    public function get_mhs($nim='',$param='') {
        $this->db->select('nim_mahasiswa, nama_mahasiswa, jurusan');
        $this->db->from('mahasiswa');
        $this->db->where('nim_mahasiswa', $param);
        $this->db->where_not_in('nim_mahasiswa', $nim);
        $res = $this->db->get();
        $return = $res->result();
        if($return){return $return;}else{return false;}
    }
    public function check_anggota($id) {
        $this->db->select('mahasiswa.*, map_anggota.status, map_anggota.id_daftar, map_anggota.id_map');
        $this->db->from('map_anggota');
        $this->db->join('mahasiswa', 'mahasiswa.nim_mahasiswa = map_anggota.nim_anggota');
        $this->db->where('map_anggota.id_daftar',$id);
        $res = $this->db->get();
        $return = $res->result();
        if($return){return $return;}else{return false;}
    }
    public function check_mhs($id){
        $this->db->select('id_mahasiswa, nim_mahasiswa, jurusan, nama_mahasiswa nama, handphone_mahasiswa telp,email_mahasiswa email, alamat_mahasiswa alamat');
        $this->db->from('mahasiswa');
        $this->db->where('nim_mahasiswa',$id);
        $res = $this->db->get();
        $return = $res->row();
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
    public function get_status($id_daftar='') {
        $this->db->select('*');
        $this->db->from('pendaftaran_pkm');
        $this->db->where('id_daftar', $id_daftar);
        $res = $this->db->get();
        $return = $res->row();
        if($return){return $return;}else{return false;}
    }
    public function doUpdate($param) {
        $status = $this->get_status($param['id_daftar']);
        if($param['admin']=='admin'){
            $acc_d = $param['acc_dosen'];
            $acc_a = $param['acc_admin'];
        }else{
            if($status->acc_dosen==2){$acc_d = 2;}else{$acc_d = 0;}
            if($status->acc_admin==2){$acc_a = 2;}else{$acc_a = 0;}
        }
        $data = array(
            'nim'       => $param['nim'],
            'nip_dn'    => $param['nip_dn'],
            'judul'     => $param['judul'],
            'bidang_pkm'=> $param['bidang_pkm'],
            'bidang_ilmu'=> $param['bidang_ilmu'],
            'luaran'    => $param['luaran'],
            'u_berkas'  => $param['u_berkas'],
            'u_lampiran'=> $param['u_lampiran'],
            'acc_dosen'=> $acc_d,
            'acc_admin'=> $acc_a,
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
        if($param['admin']=='admin'){
            $acc_dosen = $param['acc_dosen'];
            $acc_admin = $param['acc_admin'];
        }else{
            $acc_dosen = 0;
            $acc_admin = 0;
        }
        $data = array(
            'id_mahasiswa'=> $this->session->userdata('admin_login')['id'],
            'nim'       => $param['nim'],
            'nip_dn'    => $param['nip_dn'],
            'judul'     => $param['judul'],
            'abstrak'   => $param['abstrak'],
            'bidang_pkm'=> $param['bidang_pkm'],
            'bidang_ilmu'=> $param['bidang_ilmu'],
            'luaran'    => $param['luaran'],
            'u_berkas'  => $param['u_berkas'],
            'u_lampiran'=> $param['u_lampiran'],
            'acc_dosen'=> $acc_dosen,
            'acc_admin'=> $acc_admin,
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
