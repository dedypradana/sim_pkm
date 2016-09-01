<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Tentang_kami extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data['title'] = 'Tentang Kami';
        $data['title_small'] = 'Tentang SIM PKM';
        $this->templates->display('index',$data);
    }
    
}
