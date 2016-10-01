<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin_master extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_master', 'mm');
        $this->load->model("admin_dashboard/m_dashboard",'md');
        $this->load->model("pendaftaran_pkm/m_pendaftaran",'mp');
        $this->load->library('grocery_CRUD');
    }

    public function index() {
        $data['title'] = 'Master Data';
        $data['subtitle'] = 'Semua Master Data';
        $this->templates->admin('index',$data);
    }
    public function master_informasi() {
        $crud = new grocery_CRUD();
        
        $crud->set_table('informasi');
//        $crud->columns('alamat', 'phone', 'email');
//        $crud->required_fields('about','alamat','email','phone');
        $data = (array)$crud->render();
        
        $data['title'] = 'Manage Footer';
        $data['subtitle'] = 'Semua yang Ada Dalam Footer';
        $data['theme'] = 'yellow';
        $this->templates->admin('v_informasi', @$data);
    }
    function del_berkas($file=''){
        $path = 'assets/uploads/'.$file;
        unlink($path);
    }
    public function berkas_pkm($action='',$id=''){
        $data['title'] = 'Berkas PKM';
        $data['berkas'] = $this->mm->get_all_pkm();
        $data['mhs'] = $this->mm->get_all_mhs();
        switch ($action) {
            case 'add':
                $data = $this->add_pkm($id);
                $this->templates->admin('form_pkm',@$data);
                break;
            case 'view':
                $id = decode($id);
                $data['pkm'] = $this->md->get_pkm($id);
                $data['anggota'] = $this->md->get_anggota($id);
                $this->templates->admin('detail',@$data);
                break;
            case 'edit':
                $data = $this->edit_pkm($id);
                $this->templates->admin('form_pkm',@$data);
                break;
            case 'delete':
                $id = decode($id);
                $pkm = $this->md->get_pkm($id);
                $delete_pkm = $this->mgb->delete('pendaftaran_pkm',array('id_daftar' => $id));
                $delete_agt = $this->mgb->delete('map_anggota',array('id_daftar' => $id));
                $this->del_berkas(@$pkm->u_berkas);
                $this->del_berkas(@$pkm->u_lampiran);
                if($delete_pkm || $delete_agt){
                    $this->session->set_flashdata('flash_data', succ_msg('Berkas PKM Successfuly Deleted'));
		}else{
                    $this->session->set_flashdata('flash_data', err_msg('Something Wrong. Check Again Later'));
		}
		redirect('admin_master/berkas_pkm');
                break;
            default:
                $this->templates->admin('v_berkas', @$data);
                break;
        }
    }
    public function edit_pkm($nim=''){
        $nim = decode($nim);
        $data['title'] = 'Pendaftaran PKM';
        $data['c_daftar'] = FALSE;
        $data['edit'] = TRUE;
        $data['mhs'] = $this->get_mahasiswa($nim);
        $data['dosen'] = $this->getAllDosen();
        $c_pkm = $this->mp->check_pkm($nim);
        $c_anggota = $this->mp->check_anggota(@$c_pkm->id_daftar);
        $data['c_pkm'] = $c_pkm;
        $data['c_anggota'] = $c_anggota;
        return $data;
    }
    public function getAllDosen() {
        $dsn = $this->mp->get_dosen();
        return $dsn;
    }
    public function get_mahasiswa($nim) {
        $mhs = $this->mp->get_mhs($nim);
        return $mhs;
    }
    function add_nim(){
        $nim = $this->input->post('nim');
        if($nim==''){
            $this->session->set_flashdata('flash_data', err_msg('Nim atau Nama mahasiswa belum diisi..'));
            redirect('admin_master/berkas_pkm');
        }else{
            redirect('admin_master/berkas_pkm/add/'.$nim);
        }
    }
    public function add_pkm($nim) {
        $data['title'] = 'Pendaftaran PKM';
        $c_pkm = $this->mp->check_pkm($nim);
        $c_mhs = $this->mp->check_mhs($nim);
        $data['c_daftar'] = FALSE;
        $data['edit'] = FALSE;
        $data['dosen'] = $this->mp->get_dosen();
        if($c_pkm){
            $c_anggota = $this->mp->check_anggota(@$c_pkm->id_daftar);
            $data['c_pkm'] = $c_pkm;
            $data['c_anggota'] = $c_anggota;
            $data['c_daftar'] = TRUE;
        }else{
            $data['c_pkm'] = $c_mhs;
        }
        return $data;
    }
    public function master_administrator($action='',$id='') {
        $data['title'] = 'Administrator';
        $data['administrator'] = $this->mgb->find('admin','','','','id_admin')->result();
        switch ($action){
            case 'add':
                $this->templates->admin('v_add_user', @$data);
                break;
            case 'view':
                $data['admin'] = $this->mgb->find('admin',array('id_admin' => $id,),'','','id_admin')->row();
                $data['id'] = $id;
                $this->templates->admin('v_view_user', @$data);
                break;
            case 'edit':
                $data['admin'] = $this->mgb->find('admin',array('id_admin' => $id,),'','','id_admin')->row();
                $data['edit'] = true;
                $this->templates->admin('v_add_user', @$data);
                break;
            case 'delete':
                $delete = $this->mgb->delete('admin',array('id_admin' => $id));
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
        $id = decode($id);
        $data['title'] = 'Dosen';
        $data['dosen'] = $this->mgb->find('dosen','','','','id_dosen');
        $data['sesi'] = $this->session->userdata('admin_login');
        if($data['dosen']){
            $data['dosen'] = $this->mgb->find('dosen','','','','id_dosen')->result();
        }
        switch ($action){
            case 'add':
                $this->templates->admin('v_add_dosen', @$data);
                break;
            case 'view':
                $data['dosen'] = $this->mgb->find('dosen',array('id_dosen' => $id,),'','','id_dosen')->row();
                $data['id'] = $id;
                $this->templates->admin('v_view_dosen', @$data);
                break;
            case 'edit':
                $data['dosen'] = $this->mgb->find('dosen',array('id_dosen' => $id,),'','','id_dosen')->row();
                $data['edit'] = true;
                $this->templates->admin('v_add_dosen', @$data);
                break;
            case 'delete':
                $delete = $this->mgb->delete('dosen',array('id_dosen' => $id));
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
        $id = decode($id);
        $data['title'] = 'Mahasiswa';
        $data['mhs'] = $this->mgb->find('mahasiswa','','','','id_mahasiswa');
        $data['sesi'] = $this->session->userdata('admin_login');
        if($data['mhs']){
            $data['mhs'] = $this->mgb->find('mahasiswa','','','','id_mahasiswa')->result();
        }
        switch ($action){
            case 'add':
                $this->templates->admin('v_add_mahasiswa', @$data);
                break;
            case 'view':
                $data['mhs'] = $this->mgb->find('mahasiswa',array('id_mahasiswa' => $id,),'','','id_mahasiswa')->row();
                $data['id'] = $id;
                $this->templates->admin('v_view_mahasiswa', @$data);
                break;
            case 'edit':
                $data['mhs'] = $this->mgb->find('mahasiswa',array('id_mahasiswa' => $id,),'','','id_mahasiswa')->row();
                $data['edit'] = true;
                $this->templates->admin('v_add_mahasiswa', @$data);
                break;
            case 'delete':
                $delete = $this->mgb->delete('mahasiswa',array('id_mahasiswa' => $id));
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
        $this->form_validation->set_rules('nip_admin', 'NIP', 'trim|is_unique[admin.nip_admin]');
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[admin.username]');
        $this->form_validation->set_rules('passwd', 'Password', 'required');
        $this->form_validation->set_rules('nama_admin', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('jenis_kelamin_admin', 'Gender', 'required');
        $this->form_validation->set_rules('email_admin', 'Email', 'required|trim|is_unique[admin.email_admin]');
        if($this->form_validation->run()== FALSE){
            $this->session->set_flashdata('flash_data', warn_msg(validation_errors("<label class='error'>","</label>")));
            $this->session->set_flashdata('post_item', $this->input->post());
            redirect($_SERVER['HTTP_REFERER']);
        }else{
            $param = $this->input->post();
            $passwd = $this->input->post('passwd');
            $param['password'] = encode($passwd);
            unset($param['passwd']);
            $insert = $this->mgb->write('admin',$param);
            if($insert == TRUE){
                $this->session->set_flashdata('flash_data', succ_msg('Form successfully saved'));
            }else{
                $this->session->set_flashdata('flash_data', err_msg('Something went wrong, Please try again later.'));
            }
            redirect('admin_master/master_administrator');
        }
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
                $this->session->set_flashdata('flash_data', succ_msg('Form successfully saved'));
            }else{
                $this->session->set_flashdata('flash_data', err_msg('Something went wrong, Please try again later.'));
            }
            redirect('admin_master/master_mahasiswa');
        }
    }
    public function doSaveDosen(){
        $this->form_validation->set_rules('nip_dosen', 'NIP', 'trim|is_unique[dosen.nip_dosen]');
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[dosen.username]');
        $this->form_validation->set_rules('passwd', 'Password', 'required');
        $this->form_validation->set_rules('nama_dosen', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('jenis_kelamin_dosen', 'Gender', 'required');
        $this->form_validation->set_rules('email_dosen', 'Email', 'required|trim|is_unique[dosen.email_dosen]');
        if($this->form_validation->run()== FALSE){
            $this->session->set_flashdata('flash_data', warn_msg(validation_errors("<label class='error'>","</label>")));
            $this->session->set_flashdata('post_item', $this->input->post());
            redirect($_SERVER['HTTP_REFERER']);
        }else{
            $param = $this->input->post();
            $passwd = $this->input->post('passwd');
            $param['password'] = encode($passwd);
            unset($param['passwd']);
            $insert = $this->mgb->write('dosen',$param);
            if($insert == TRUE){
                $this->session->set_flashdata('flash_data', succ_msg('Form successfully saved'));
            }else{
                $this->session->set_flashdata('flash_data', err_msg('Something went wrong, Please try again later.'));
            }
            redirect('admin_master/master_dosen');
        }
    }
    
    public function doEditDosen(){
        $data['sesi'] = $this->session->userdata('admin_login');
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
            $update = $this->mgb->replace('dosen',$param,array('id_dosen' => $this->input->post('id_dosen')));
            if($update == TRUE){
                $this->session->set_flashdata('flash_data', succ_msg('Form successfully saved'));
            }else{
                $this->session->set_flashdata('flash_data', err_msg('Something went wrong, Please try again later.'));
            }
            if($data['sesi']=='administrator'){
                redirect('admin_master/master_dosen');
            }else{
                redirect('admin_master/master_dosen/view/'.  encode($this->input->post('id_dosen')));
            }
        }
    }
    public function doEditMahasiswa(){
        $data['sesi'] = $this->session->userdata('admin_login');
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
            $update = $this->mgb->replace('mahasiswa',$param,array('id_mahasiswa' => $this->input->post('id_mahasiswa')));
            if($update == TRUE){
                $this->session->set_flashdata('flash_data', succ_msg('Form successfully saved'));
            }else{
                $this->session->set_flashdata('flash_data', err_msg('Something went wrong, Please try again later.'));
            }
            if($data['sesi']=='administrator'){
                redirect('admin_master/master_mahasiswa');
            }else{
                redirect('admin_master/master_mahasiswa/view/'.  encode($this->input->post('id_mahasiswa')));
            }
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
            $update = $this->mgb->replace('admin',$param,array('id_admin' => $this->input->post('id_admin')));
            if($update == TRUE){
                $this->session->set_flashdata('flash_data', succ_msg('Form successfully saved'));
            }else{
                $this->session->set_flashdata('flash_data', err_msg('Something went wrong, Please try again later.'));
            }
            redirect('admin_master/master_administrator');
        }
    }

}
