<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_dashboard','md');
        $this->sesi = $this->session->userdata('admin_login');
    }

    public function index() {
        $data['title'] = 'Dashboard';
        $data['title_small'] = 'Halaman Utama';
        $this->templates->display('index',$data);
    }
    
    public function auth_login(){
        $username = $this->input->post('username');
        $password = $this->input->post('passwd');
        if($username != '' && $password != ''){
            $check = $this->md->check_login($username, $password);
            if($check){
                if($check['tipe']=='mahasiswa'){
                    $sesi = array(
                        'id'  => $check['id_mahasiswa'],
                        'nama'=> $check['nama_mahasiswa'],
                        'username' => $check['username'],
                        'tipe' => 'mahasiswa'
                    );
                }else{
                    $sesi = array(
                        'id'  => $check['id_dosen'],
                        'nama'=> $check['nama_dosen'],
                        'username' => $check['username'],
                        'tipe' => 'dosen'
                    );
                }
                $this->session->set_userdata('admin_login', $sesi);
                $this->session->set_flashdata('msg', succ_msg('Selamat Datang <b>'.$sesi['nama'].'</b> ...'));
                redirect('dashboard');
            }else{
                redirect();
            }
        }else{
            redirect();
        }
    }
    
}
