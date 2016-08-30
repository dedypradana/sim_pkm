<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin_dashboard extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data['title'] = 'Dashboard';
        $this->templates->admin('index',@$data);
    }

}
