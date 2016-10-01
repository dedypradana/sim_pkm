<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Validasi_pkm extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_validasi', 'mv');
    }

    public function index() {
        $data['title'] = 'Validasi PKM';
        if($this->admin['tipe']=='dosen'){
            $data['list_pkm'] = $this->mv->listPKM();
        }else{
            $data['list_pkm'] = $this->mv->listAdminPKM();
        }
        $this->templates->admin('index',$data);
    }
    
    public function detail_pkm($id_daftar=''){
        $data['title'] = 'Detail PKM';
        $id = decode($id_daftar);
        $data['pkm'] = $this->mv->get_pkm($id);
        $data['anggota'] = $this->mv->get_anggota($id);
        $this->templates->admin('detail',@$data);
    }
    
    public function tolak_pkm(){
        $post = $this->input->post();
        if($post['note']=='<p><br></p>'){
            $this->session->set_flashdata('flash_data', err_msg('Catatan Belum Diisi.'));
            redirect('validasi_pkm');
        }else{
            $param['note'] = $post['note'];
            $param['id'] = $post['id_daftar'];
            $terima = $this->mv->doTolak($param);
            if($terima == TRUE){
                $this->session->set_flashdata('flash_data', succ_msg('PKM ditolak dengan catatan'));
            }else{
                $this->session->set_flashdata('flash_data', err_msg('Something went wrong, Please try again later.'));
            }
            redirect('validasi_pkm');
        }
    }
    
    public function terima_pkm($id_daftar=''){
        $id = decode($id_daftar);
        $terima = $this->mv->doTerima($id);
        $this->session->set_flashdata('flash_data', succ_msg('PKM Diterima'));
        redirect('validasi_pkm');
    }

}
