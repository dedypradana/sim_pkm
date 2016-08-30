<?php

defined('BASEPATH') or exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_global','mgb');
        $this->admin = $this->session->userdata('admin_login');
        $this->s1 = $this->uri->segment(1);
        $this->s2 = $this->uri->segment(2);
        $this->s3 = $this->uri->segment(3);

        if($this->admin ==''){
          redirect('dashboard');
        }
    }

}

/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */
