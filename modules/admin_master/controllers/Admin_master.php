<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin_master extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_master', 'mm');
        $this->load->library('grocery_CRUD');
    }

    public function index() {
        $data['title'] = 'Master Data';
        $data['subtitle'] = 'Semua Master Data';
        $this->templates->admin('index',$data);
    }
    
    public function master_administrator($action='',$id='') {
        $data['title'] = 'Master Data';
        $data['administrator'] = $this->mgb->find('master_admin','','','','id_admin')->result();
        switch ($action){
            case 'add':
                $this->templates->admin('v_add_user', @$data);
                break;
            case 'delete':
                $delete = $this->mgb->delete('master_admin',array('id_admin' => $id));
		if($delete){
                    $this->session->set_flashdata('flash_data', succ_msg('Admin Successfuly Deleted'));
		}else{
                    $this->session->set_flashdata('flash_data', err_msg('Something Wrong. Check Again Later'));
		}
		redirect('admin_master/master_administrator');
                break;
            case 'edit':
                $data['admin'] = $this->mgb->find('master_admin',array('id_admin' => $id,),'','','id_admin')->row();
                $data['edit'] = true;
                $this->templates->admin('v_add_user', @$data);
                break;
            default:
                $this->templates->admin('v_user', @$data);
                break;
        }
    }
    public function doSaveAdmin(){
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('passwd', 'Password', 'required');
        $this->form_validation->set_rules('nama_admin', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('jenis_kelamin_admin', 'Gender', 'required');
        $this->form_validation->set_rules('email_admin', 'Email', 'required');
        if($this->form_validation->run()== FALSE){
            $this->session->set_flashdata('flash_data', warn_msg(validation_errors("<label class='error'>","</label>")));
            $this->session->set_flashdata('post_item', $this->input->post());
            redirect($_SERVER['HTTP_REFERER']);
        }else{
            $param = $this->input->post();
            $passwd = $this->input->post('passwd');
            $param['password'] = encode($passwd);
            unset($param['passwd']);
            $insert = $this->mgb->write('master_admin',$param);
            if($insert == TRUE){
                $this->session->set_flashdata('flash_data', succ_msg('Form successfully saved'));
            }else{
                $this->session->set_flashdata('flash_data', err_msg('Something went wrong, Please try again later.'));
            }
            redirect('admin_master/master_administrator');
        }
    }
    public function doEditAdmin(){
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('passwd', 'Password', 'required');
        $this->form_validation->set_rules('nama_admin', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('jenis_kelamin_admin', 'Gender', 'required');
        $this->form_validation->set_rules('email_admin', 'Email', 'required');
        if($this->form_validation->run()== FALSE){
            $this->session->set_flashdata('flash_data', warn_msg(validation_errors("<label class='error'>","</label>")));
            $this->session->set_flashdata('post_item', $this->input->post());
            redirect($_SERVER['HTTP_REFERER']);
        }else{
            $param = $this->input->post();
            $passwd = $this->input->post('passwd');
            $param['password'] = encode($passwd);
            unset($param['passwd']);
            unset($param['id_admin']);
            $update = $this->mgb->replace('master_admin',$param,array('id_admin' => $this->input->post('id_admin')));
            if($update == TRUE){
                $this->session->set_flashdata('flash_data', succ_msg('Form successfully saved'));
            }else{
                $this->session->set_flashdata('flash_data', err_msg('Something went wrong, Please try again later.'));
            }
            redirect('admin_master/master_administrator');
        }
    }
  
    public function master_subs() {
        $crud = new grocery_CRUD();
        $crud->set_table('master_subscriber');
        $data = (array)$crud->render();
        
        $data['title'] = 'Master Subscriber';
        $data['subtitle'] = 'Semua Master Subscriber';
        $this->templates->admin('v_subs',$data);
    }
    
    public function master_cat() {
        $crud = new grocery_CRUD();
        $crud->set_table('master_kategori');
        $data = (array)$crud->render();
        
        $data['title'] = 'Master Kategori';
        $data['subtitle'] = 'Semua Master Kategori';
        $this->templates->admin('v_cat',$data);
    }
    
    public function master_contact() {
        $crud = new grocery_CRUD();
        $crud->set_table('contact');
        $data = (array)$crud->render();
        
        $data['title'] = 'Master Contact';
        $data['subtitle'] = 'Semua Master Contact';
        $this->templates->admin('v_con',$data);
    }
    
    function encrypt_password_callback($post_array, $primary_key = null) {
        $post_array['password'] = encode($post_array['password']);
        return $post_array;
    }

    function decrypt_password_callback($value) {
        $decrypted_password = decode($value);
        return "<input type='password' name='password' value='$decrypted_password' />";
    }

}
