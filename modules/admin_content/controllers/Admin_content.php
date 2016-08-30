<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin_content extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_content', 'mc');
        $this->load->library('Image_crud');   
    }

    public function index() {
        $data['title'] = 'Master Content';
        $data['subtitle'] = 'Semua Master Content';
        $this->templates->admin('index',$data);
    }
    public function portofolio(){
        $image_crud = new image_CRUD();
        
        $image_crud->set_title_field('nama');
        $image_crud->set_table('portofolio');
        $image_crud->set_url_field('path');
        $image_crud->set_ordering_field('sort');
        $image_crud->set_image_path('assets/uploads/img/portofolio');
        $data = (array)$image_crud->render();
        
        $data['title'] = 'Manage Portofolio';
        $data['subtitle'] = 'Semua yang Ada Dalam Portofolio';
        $this->templates->admin('v_portofolio', $data);
    }
    public function gallery() {
        $image_crud = new image_CRUD();
        
        $image_crud->set_title_field('nama');
        $image_crud->set_table('gallery');
        $image_crud->set_url_field('path');
        $image_crud->set_ordering_field('sort');
        $image_crud->set_image_path('assets/uploads/img');
        $data = (array)$image_crud->render();
        
        $data['title'] = 'Manage Gallery';
        $data['subtitle'] = 'Semua yang Ada Dalam Gallery';
        $this->templates->admin('v_gallery', $data);
    }
    
    public function manage_gallery() {
        $data['title'] = 'Manage Gallery';
        $data['subtitle'] = 'Mengelola Detail Gallery';
        $this->templates->admin('v_manage',$data);
    }
    
    public function get_img() {
        $post = $this->input->post();
        $data['kategori'] = $this->mc->get_kategori($post);
        $data['image'] = $this->mc->get_img($post);
        $this->load->view('c_deskripsi',$data);
    }
    
    public function doInsert(){
        $post = $this->input->post();
        $doInsert = $this->mc->do_insert($post);
        if($doInsert){
            return true;
        }else{
            return false;
        }
    }

}
