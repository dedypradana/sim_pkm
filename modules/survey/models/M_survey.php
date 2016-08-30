<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_survey extends CI_Model {
    
    function __construct() {
        parent::__construct();
    }
    
    function doInsert($param) {
        $curr = date('Y-m-d H:i:s');
        $data = array(
           'nama'   => $param['nama'],
           'email'  => $param['email'],
           'pesan'  => $param['pesan'],
           'date'   => $curr
        );
        $ret = $this->db->insert('contact', $data); 
        if ($ret) {
            return true;
        } else {
            return false;
        }
    }

}
