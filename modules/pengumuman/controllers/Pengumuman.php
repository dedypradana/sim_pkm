<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pengumuman extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_pengumuman','mp');
    }

    public function index() {
        $data['title'] = 'Pengumuman';
        $data['title_small'] = 'Informasi Penting';
        $this->templates->display('index',$data);
    }
    
}
