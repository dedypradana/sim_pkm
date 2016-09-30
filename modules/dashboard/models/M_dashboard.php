<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_dashboard extends CI_Model {
    
    public function check_login($username = '', $password = '') {
        $this->db->where('username', $username);
        $this->db->where('password', encode($password));
        $exec = $this->db->get('mahasiswa');
        if ($exec->num_rows() > 0) {
            $dt = $exec->result_array();
            $data = $dt[0];
            $data['tipe'] = 'mahasiswa';
            return $data;
        } else {
            $this->db->where('username', $username);
            $this->db->where('password', encode($password));
            $exec1 = $this->db->get('dosen');
            if ($exec1->num_rows() > 0) {
                $dt = $exec1->result_array();
                $data = $dt[0];
                $data['tipe'] = 'dosen';
                return $data;
            } else {
                return FALSE;
            }
        }
    }

}
