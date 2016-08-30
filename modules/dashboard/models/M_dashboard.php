<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_dashboard extends CI_Model {

    function addSubscriber($param){
        $data = array(
           'email'  => $param['email'],
           'ip'     => $param['ip'],
           'os'     => $param['os'],
           'build'  => $param['date']
        );
        $this->db->insert('master_subscriber', $data); 
        return true;
    }
    function getPortofolio(){
        $this->db->select('*');
        $this->db->from('portofolio');
        $this->db->order_by("id", "desc"); 
        $this->db->limit(6);
        $query = $this->db->get();
        $ret = $query->result();
        if ($ret) {
            return $ret;
        } else {
            return false;
        }
    }

}
