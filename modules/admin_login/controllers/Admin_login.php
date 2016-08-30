<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin_login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_login', 'mlog');
    }

    public function index() {
        $data['false'] = false;
        $this->load->view('index',@$data);
    }
    
    public function auth(){
        $uname = $this->input->post('uname');
        $passwd = $this->input->post('passwd');
        $auth = $this->mlog->auth_user($uname,$passwd);
        if($auth){
            $sesi = array(
                'id'  => $auth->id_admin,
                'nama'=> $auth->nama_admin,
                'username' => $auth->username,
                'tipe' => 'administrator'
            );
            $this->session->set_userdata('admin_login', $sesi);
            $this->session->set_flashdata('msg', succ_msg('Selamat Datang <b>'.$sesi['nama'].'</b> ...'));
            redirect('admin_dashboard');
        }else{
            $this->session->set_flashdata('msg', err_msg('Username dan Password Tidak Valid'));
            redirect('admin_login');
        }
    }
    
    public function logout() {
        session_destroy();
        redirect('admin_login');
    }
    
}
