<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin_dashboard extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_dashboard', 'md');
    }

    public function index() {
        $data['title'] = 'Dashboard';
        if($this->admin['tipe']=='dosen'){$id = @$this->admin['nidn'];}
        if($this->admin['tipe']=='mahasiswa'){$id = @$this->admin['nim'];}
        if($this->admin['tipe']=='administrator'){
            $data['admin'] = $this->md->check_admin();
            $data['info'] = '';
            $data['ketua'] = '';
            $data['dosen'] = '';
        }else{
            $data['admin']='';
            $data['info'] = $this->md->check_pkm($id);
            $data['ketua'] = $this->md->check_ketua($id);
            $data['dosen'] = $this->md->check_dosen($id);
        }
        $this->templates->admin('index',@$data);
    }
    
    public function detail_pkm($id_daftar=''){
        $data['title'] = 'Detail PKM';
        $id = decode($id_daftar);
        $data['pkm'] = $this->md->get_pkm($id);
        $data['anggota'] = $this->md->get_anggota($id);
//        print_r($data);exit;
        $this->templates->admin('detail',@$data);
    }

}
