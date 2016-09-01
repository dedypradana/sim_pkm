<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Bantuan extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data['title'] = 'Bantuan';
        $data['title_small'] = 'Hubungi Kami';
        $this->templates->display('index',$data);
    }
    
}
