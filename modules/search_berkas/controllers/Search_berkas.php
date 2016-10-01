<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Search_berkas extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_berkas','mb');
    }

    public function index() {
        $data['title'] = 'Search Berkas PKM';
        $data['pkm'] = $this->mb->listPKM();
        $this->templates->admin('index',$data);
    }

    public function detail_pkm($id_daftar) {
        $data['title'] = 'Detail PKM';  
        $id = decode($id_daftar);
        $data['pkm'] = $this->mb->get_pkm($id);
        $data['anggota'] = $this->mb->get_anggota($id);
        $this->templates->admin('detail',@$data);
    }
    
}
