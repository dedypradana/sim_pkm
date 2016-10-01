<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Daftar_akun extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_akun','ma');
        $this->load->model('M_global','mgb');
    }

    public function index() {
        $data['title'] = 'Daftar Akun';
        $data['title_small'] = 'Daftar Untuk Login Sistem';
        $this->templates->display('index',$data);
    }
    
    public function doSaveMahasiswa(){
        $this->form_validation->set_rules('nim_mahasiswa', 'NIM', 'trim|is_unique[mahasiswa.nim_mahasiswa]');
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[mahasiswa.username]');
        $this->form_validation->set_rules('passwd', 'Password', 'required');
        $this->form_validation->set_rules('nama_mahasiswa', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('jenis_kelamin_mahasiswa', 'Gender', 'required');
        $this->form_validation->set_rules('email_mahasiswa', 'Email', 'required|trim|is_unique[mahasiswa.email_mahasiswa]');
        if($this->form_validation->run()== FALSE){
            $this->session->set_flashdata('flash_data', warn_msg(validation_errors("<label class='error'>","</label>")));
            $this->session->set_flashdata('post_item', $this->input->post());
            redirect($_SERVER['HTTP_REFERER']);
        }else{
            $param = $this->input->post();
            $passwd = $this->input->post('passwd');
            $param['password'] = encode($passwd);
            $param['status'] = 1;
            unset($param['passwd']);
            $insert = $this->mgb->write('mahasiswa',$param);
            if($insert == TRUE){
                $this->session->set_flashdata('flash_data', succ_msg('Akun berhasil disimpan, silahkan login dengan username dan password anda..'));
            }else{
                $this->session->set_flashdata('flash_data', err_msg('Something went wrong, Please try again later.'));
            }
            redirect('daftar_akun');
        }
    }
    
}
