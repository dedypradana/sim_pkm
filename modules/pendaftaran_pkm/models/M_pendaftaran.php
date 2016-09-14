<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_pendaftaran extends CI_Model {

    public function doInsert($data) {
        print_r($data);exit;
        $data = array(
            'nim'       => $data['nim'],
            'nama'      => $data['nama'],
            'jurusan'   => $data['jurusan'],
            'telp'      => $data['telp'],
            'email'     => $data['email'],
            'alamat'    => $data['alamat'],
            'nip_dn'    => $data['nip_dn'],
            'nama_dn'   => $data['nama_dn'],
            'email_dn'  => $data['email_dn'],
            'alamat_dn' => $data['alamat_dn'],
            'judul'     => $data['judul'],
            'bidang'    => $data['bidang'],
            'd_hibah'   => $data['d_hibah'],
            'd_mas'     => $data['d_mas'],
            'created' => date('Y-m-d H:i:s'),
        );
        $this->db->insert('pendaftaran_pkm', $data);
    }

}
