<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_dashboard extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getGallery() {
        $this->db->select('*');
        $this->db->from('gallery');
        $query = $this->db->get();
        $ret = $query->result();
        if ($ret) {
            return $ret;
        } else {
            return false;
        }
    }

}
