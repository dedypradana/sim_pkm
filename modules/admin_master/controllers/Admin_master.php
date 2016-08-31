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
        $data['title'] = 'Master Administrator';
        $data['administrator'] = $this->mgb->find('master_admin','','','','id_admin')->result();
        switch ($action){
            case 'add':
                $this->templates->admin('v_add_user', @$data);
                break;
            case 'view':
                $data['admin'] = $this->mgb->find('master_admin',array('id_admin' => $id,),'','','id_admin')->row();
                $data['id'] = $id;
                $this->templates->admin('v_view_user', @$data);
                break;
            case 'edit':
                $data['admin'] = $this->mgb->find('master_admin',array('id_admin' => $id,),'','','id_admin')->row();
                $data['edit'] = true;
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
            default:
                $this->templates->admin('v_user', @$data);
                break;
        }
    }
    public function master_dosen($action='',$id='') {
        $data['title'] = 'Master Dosen';
        $data['dosen'] = $this->mgb->find('master_dosen','','','','id_dosen');
        if($data['dosen']){
            $data['dosen'] = $this->mgb->find('master_dosen','','','','id_dosen')->result();
        }
        switch ($action){
            case 'add':
                $this->templates->admin('v_add_dosen', @$data);
                break;
            case 'view':
                $data['dosen'] = $this->mgb->find('master_dosen',array('id_dosen' => $id,),'','','id_dosen')->row();
                $data['id'] = $id;
                $this->templates->admin('v_view_dosen', @$data);
                break;
            case 'edit':
                $data['dosen'] = $this->mgb->find('master_dosen',array('id_dosen' => $id,),'','','id_dosen')->row();
                $data['edit'] = true;
                $this->templates->admin('v_add_dosen', @$data);
                break;
            case 'delete':
                $delete = $this->mgb->delete('master_dosen',array('id_dosen' => $id));
		if($delete){
                    $this->session->set_flashdata('flash_data', succ_msg('Dosen Successfuly Deleted'));
		}else{
                    $this->session->set_flashdata('flash_data', err_msg('Something Wrong. Check Again Later'));
		}
		redirect('admin_master/master_dosen');
                break;
            default:
                $this->templates->admin('v_dosen', @$data);
                break;
        }
    }
    public function master_mahasiswa($action='',$id='') {
        $data['title'] = 'Master Mahasiswa';
        $data['mhs'] = $this->mgb->find('master_mahasiswa','','','','id_mahasiswa');
        if($data['mhs']){
            $data['mhs'] = $this->mgb->find('master_mahasiswa','','','','id_mahasiswa')->result();
        }
        switch ($action){
            case 'add':
                $this->templates->admin('v_add_mahasiswa', @$data);
                break;
            case 'view':
                $data['mhs'] = $this->mgb->find('master_mahasiswa',array('id_mahasiswa' => $id,),'','','id_mahasiswa')->row();
                $data['id'] = $id;
                $this->templates->admin('v_view_mahasiswa', @$data);
                break;
            case 'edit':
                $data['mhs'] = $this->mgb->find('master_mahasiswa',array('id_mahasiswa' => $id,),'','','id_mahasiswa')->row();
                $data['edit'] = true;
                $this->templates->admin('v_add_mahasiswa', @$data);
                break;
            case 'delete':
                $delete = $this->mgb->delete('master_mahasiswa',array('id_mahasiswa' => $id));
		if($delete){
                    $this->session->set_flashdata('flash_data', succ_msg('Mahasiswa Successfuly Deleted'));
		}else{
                    $this->session->set_flashdata('flash_data', err_msg('Something Wrong. Check Again Later'));
		}
		redirect('admin_master/master_mahasiswa');
                break;
            default:
                $this->templates->admin('v_mahasiswa', @$data);
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
    public function doSaveMahasiswa(){
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('passwd', 'Password', 'required');
        $this->form_validation->set_rules('nama_mahasiswa', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('jenis_kelamin_mahasiswa', 'Gender', 'required');
        $this->form_validation->set_rules('email_mahasiswa', 'Email', 'required');
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
            $insert = $this->mgb->write('master_mahasiswa',$param);
            if($insert == TRUE){
                $this->session->set_flashdata('flash_data', succ_msg('Form successfully saved'));
            }else{
                $this->session->set_flashdata('flash_data', err_msg('Something went wrong, Please try again later.'));
            }
            redirect('admin_master/master_mahasiswa');
        }
    }
    public function doSaveDosen(){
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('passwd', 'Password', 'required');
        $this->form_validation->set_rules('nama_dosen', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('jenis_kelamin_dosen', 'Gender', 'required');
        $this->form_validation->set_rules('email_dosen', 'Email', 'required');
        if($this->form_validation->run()== FALSE){
            $this->session->set_flashdata('flash_data', warn_msg(validation_errors("<label class='error'>","</label>")));
            $this->session->set_flashdata('post_item', $this->input->post());
            redirect($_SERVER['HTTP_REFERER']);
        }else{
            $param = $this->input->post();
            $passwd = $this->input->post('passwd');
            $param['password'] = encode($passwd);
            unset($param['passwd']);
            $insert = $this->mgb->write('master_dosen',$param);
            if($insert == TRUE){
                $this->session->set_flashdata('flash_data', succ_msg('Form successfully saved'));
            }else{
                $this->session->set_flashdata('flash_data', err_msg('Something went wrong, Please try again later.'));
            }
            redirect('admin_master/master_dosen');
        }
    }
    
    public function doEditDosen(){
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('passwd', 'Password', 'required');
        $this->form_validation->set_rules('nama_dosen', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('jenis_kelamin_dosen', 'Gender', 'required');
        $this->form_validation->set_rules('email_dosen', 'Email', 'required');
        if($this->form_validation->run()== FALSE){
            $this->session->set_flashdata('flash_data', warn_msg(validation_errors("<label class='error'>","</label>")));
            $this->session->set_flashdata('post_item', $this->input->post());
            redirect($_SERVER['HTTP_REFERER']);
        }else{
            $param = $this->input->post();
            $passwd = $this->input->post('passwd');
            $param['password'] = encode($passwd);
            unset($param['passwd']);
            unset($param['id_dosen']);
            $update = $this->mgb->replace('master_dosen',$param,array('id_dosen' => $this->input->post('id_dosen')));
            if($update == TRUE){
                $this->session->set_flashdata('flash_data', succ_msg('Form successfully saved'));
            }else{
                $this->session->set_flashdata('flash_data', err_msg('Something went wrong, Please try again later.'));
            }
            redirect('admin_master/master_dosen');
        }
    }
    public function doEditMahasiswa(){
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('passwd', 'Password', 'required');
        $this->form_validation->set_rules('nama_mahasiswa', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('jenis_kelamin_mahasiswa', 'Gender', 'required');
        $this->form_validation->set_rules('email_mahasiswa', 'Email', 'required');
        if($this->form_validation->run()== FALSE){
            $this->session->set_flashdata('flash_data', warn_msg(validation_errors("<label class='error'>","</label>")));
            $this->session->set_flashdata('post_item', $this->input->post());
            redirect($_SERVER['HTTP_REFERER']);
        }else{
            $param = $this->input->post();
            $passwd = $this->input->post('passwd');
            $param['password'] = encode($passwd);
            unset($param['passwd']);
            unset($param['id_mahasiswa']);
            $update = $this->mgb->replace('master_mahasiswa',$param,array('id_mahasiswa' => $this->input->post('id_mahasiswa')));
            if($update == TRUE){
                $this->session->set_flashdata('flash_data', succ_msg('Form successfully saved'));
            }else{
                $this->session->set_flashdata('flash_data', err_msg('Something went wrong, Please try again later.'));
            }
            redirect('admin_master/master_mahasiswa');
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

}
