<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_dashboard','md');
    }

    public function index() {
        $data['title_1'] = 'Well Documented';
        $data['portofolio'] = array();
        $this->templates->display('index',$data);
    }
    public function addSubscriber() {
        $this->load->library('user_agent');
        $ins['ip'] = $this->input->ip_address();
        $ins['email'] = $this->input->post('email_subs');
        $ins['os'] = $this->agent->agent_string();
        $ins['date'] = date('Y-m-d H:i:s');
        if($ins['email']){
            $this->md->addSubscriber($ins);
            redirect('dashboard/thanks');
        }else{
            redirect('dashboard');
        }
        
    }
    public function thanks(){
        $data['title_1'] = 'Well Documented';
        $this->templates->display('thanks',$data);
    }
    
}
