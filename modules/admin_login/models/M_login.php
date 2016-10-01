<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_login extends CI_Model {

    function auth_user($uname,$passwd){
        $this->db->select('*');
        $this->db->from('admin');
        $this->db->where('username',$uname);
        $this->db->where('password',encode($passwd));
        $data = $this->db->get();
        $res = $data->row();
        if($res){
            return $res;
        }else{
            return false;
        }
    }

}
