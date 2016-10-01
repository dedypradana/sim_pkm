<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_master extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->_table = 'admin';
    }
    
}