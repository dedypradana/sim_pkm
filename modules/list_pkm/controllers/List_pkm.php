<?php

defined('BASEPATH') or exit('No direct script access allowed');

class List_pkm extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_list','mi');
    }

    public function index() {
        $data['title'] = 'List PKM';
        $data['list_pkm'] = $this->mi->listPKM();
        $data['nim'] = $this->admin['nim'];
        $this->templates->admin('index',$data);
    }
    public function daftarAnggota($id_daftar){
        $pkm = $this->mi->listPKM($id_daftar);
        $daftar = $this->mi->doDaftar($pkm[0]);
        redirect('list_pkm');
    }
    public function view($id_mahasiswa) {
        $data['title'] = 'Detail List PKM';
        $id = $id_mahasiswa;
        $c_pkm = $this->mi->check_pkm($id);
        $data['c_daftar'] = FALSE;
        $data['edit'] = FALSE;
        $data['non_ketua'] = FALSE;
        if($c_pkm){
            $c_anggota = $this->mi->check_anggota(@$c_pkm->id_daftar);
            $data['c_pkm'] = $c_pkm;
            $data['c_anggota'] = $c_anggota;
            $data['c_daftar'] = TRUE;
        }else{
            $data['c_pkm'] = '';
        }
        $this->templates->admin('detail', $data);
    }
    
}
