<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_login', 'ms');
        $this->load->helper(array('form'));
        $this->load->library('form_validation');
        //$this->load->library('recaptcha');
    }

    public function index() {
        $data['title'] = '';
        $this->templates->display('index',$data);
    }

    public function addContact(){
        if ($this->input->post()) {
            $captcha_answer = $this->input->post('g-recaptcha-response');
            $response = $this->recaptcha->verifyResponse($captcha_answer);
            $this->form_validation->set_rules('nama', 'Nama', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('pesan', 'Message', 'required');
            if ($this->form_validation->run() == TRUE && $response['success']) {
                $post = $this->input->post();
                $insert = $this->ms->doInsert($post);
                $this->session->set_flashdata('flash_msg', succ_msg('Data Berhasil di insert, Terimakasih..'));
            }
            else{
                $this->session->set_flashdata('flash_msg', err_msg('Mohon Maaf, Lengkapi Semua Form'));
                redirect('contact');
            }
        }
        redirect('contact');
    }
    
}
