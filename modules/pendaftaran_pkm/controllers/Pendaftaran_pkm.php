<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pendaftaran_pkm extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_pendaftaran', 'mp');
    }
    public function index() {
        $data['title'] = 'Pendaftaran PKM';
        $nim = $this->admin['nim'];
        $c_pkm = $this->mp->check_pkm($nim);
        if($c_pkm){
            $data['pkm'] = $c_pkm;
            switch ($c_pkm->acc_dosen){
                case 0:
                    $data['d_title'] = 'Validasi Dosen : Belum';
                    $data['d_content'] = 'Mohon konfirmasi ke dosen untuk validasi berkas PKM<br><br> Klik kembali untuk tutup notifikasi';
                    $data['d_warna'] = 'btn-info';
                    $data['d_status'] = 'Belum';
                    break;
                case 1:
                    $data['d_title'] = 'Validasi Dosen : Ditolak';
                    $data['d_content'] = @$c_pkm->note_dosen.'<br><br> Klik kembali untuk tutup notifikasi';
                    $data['d_warna'] = 'btn-warning';
                    $data['d_status'] = 'Ditolak';
                    break;
                case 2:
                    $data['d_title'] = 'Validasi Dosen : Diterima';
                    $data['d_content'] = @$c_pkm->note_dosen.'<br><br> Klik kembali untuk tutup notifikasi';
                    $data['d_warna'] = 'btn-success';
                    $data['d_status'] = 'Diterima';
                    break;
                default:
                    $data['d_warna'] = 'btn-info';
                    $data['d_status'] = 'Belum';
                    break;
            }
            switch ($c_pkm->acc_admin){
                case 0:
                    $data['a_title'] = 'Validasi CIC Student Center : Belum';
                    $data['a_content'] = 'Mohon konfirmasi ke CIC Student Center untuk validasi berkas PKM<br><br> Klik kembali untuk tutup notifikasi';
                    $data['a_warna'] = 'btn-info';
                    $data['a_status'] = 'Belum';
                    break;
                case 1:
                    $data['a_title'] = 'Validasi CIC Student Center : Ditolak';
                    $data['a_content'] = @$c_pkm->note_admin.'<br><br> Klik kembali untuk tutup notifikasi';
                    $data['a_warna'] = 'btn-warning';
                    $data['a_status'] = 'Ditolak';
                    break;
                case 2:
                    $data['a_title'] = 'Validasi CIC Student Center : Diterima';
                    $data['a_content'] = @$c_pkm->note_admin.'<br><br> Klik kembali untuk tutup notifikasi';
                    $data['a_warna'] = 'btn-success';
                    $data['a_status'] = 'Diterima';
                    break;
                default:
                    $data['a_warna'] = 'btn-info';
                    $data['a_status'] = 'Belum';
                    break;
            }
        }else{
            redirect('pendaftaran_pkm/view');
        }
        $this->templates->admin('list', $data);
    }
    public function view() {
        $data['title'] = 'Pendaftaran PKM';
        $nim = $this->admin['nim'];
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
        $this->templates->admin('index', $data);
    }
    
    public function edit($nim='') {
        $nim = decode($nim);
        $data['title'] = 'Pendaftaran PKM';
        $data['c_daftar'] = FALSE;
        $data['edit'] = TRUE;
        $data['mhs'] = $this->get_mahasiswa();
        $data['dosen'] = $this->getAllDosen();
        $c_pkm = $this->mp->check_pkm($nim);
        $c_anggota = $this->mp->check_anggota(@$c_pkm->id_daftar);
        $data['c_pkm'] = $c_pkm;
        $data['c_anggota'] = $c_anggota;
        $this->templates->admin('index', $data);
    }
    
    public function editStatus($id='') {
        $post = $this->input->post();
        $edit = $this->mp->changeStatus($post);
        return true;
    }
    
    public function deleteAnggota(){
        $id_map = $this->input->post('id_map');
        $delete = $this->mp->delAnggota($id_map);
        return TRUE;
    }
    
    public function get_dosen() {
        $nidn = $this->input->post('nidn');
        $dosen = $this->mp->get_dosen($nidn);
        echo json_encode($dosen[0]);
    }
    public function getAnggota() {
        $nim = $this->admin['nim'];
        $param = $this->input->post('nim');
        $mhs = $this->mp->get_mhs($nim,$param);
        echo json_encode($mhs[0]);
    }
    public function get_mahasiswa() {
        $nim = $this->admin['nim'];
        $mhs = $this->mp->get_mhs($nim);
        return $mhs;
    }
    public function getAllDosen() {
        $dsn = $this->mp->get_dosen();
        return $dsn;
    }
    
    public function deleteFile(){
        $post = $this->input->post();
        switch ($post['field']){
            case 'berkas':
                $form = '<div class="fileupload fileupload-new" data-provides="fileupload">
                    <div class="input-append">
                        <div class="uneditable-input">
                            <i class="fa fa-file fileupload-exists"></i>
                            <span class="fileupload-preview"></span>
                        </div>
                        <span class="btn btn-default btn-file">
                            <span class="fileupload-exists">Change</span>
                            <span class="fileupload-new">Select file</span>
                            <input type="file" name="u_berkas" />
                        </span>
                        <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
                    </div>
                </div>';
                $delete = $this->mp->delBerkas($post['param']);
                echo $form;
                break;
            case 'lampiran':
                $form = '<div class="fileupload fileupload-new" data-provides="fileupload">
                    <div class="input-append">
                        <div class="uneditable-input">
                            <i class="fa fa-file fileupload-exists"></i>
                            <span class="fileupload-preview"></span>
                        </div>
                        <span class="btn btn-default btn-file">
                            <span class="fileupload-exists">Change</span>
                            <span class="fileupload-new">Select file</span>
                            <input type="file" name="u_lampiran" />
                        </span>
                        <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
                    </div>
                </div>';
                echo $form;
                $delete = $this->mp->delLampiran($post['param']);
                break;
            default:
                return true;
                break;
        }
    }
    public function editPendaftaran($admin=''){
        $ber = $this->input->post('t_u_berkas');
        $lam = $this->input->post('t_u_lampiran');
        $this->form_validation->set_rules('nim', 'NIM', 'required|trim');
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('jurusan', 'Jurusan', 'required|trim');
        $this->form_validation->set_rules('telp', 'Telephone', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('nim_anggota[]', 'NIM Anggota', 'required|trim');
        $this->form_validation->set_rules('nip_dn', 'NIDN', 'trim');
        $this->form_validation->set_rules('nama_dn', 'Nama Dosen', 'required|trim');
        $this->form_validation->set_rules('email_dn', 'Email Dosen', 'required|trim|valid_email');
        $this->form_validation->set_rules('alamat_dn', 'Alamat Dosen', 'required|trim');
        $this->form_validation->set_rules('judul', 'Judul', 'required|trim');
        $this->form_validation->set_rules('bidang_pkm', 'Bidang Kegiatan PKM', 'required|trim');
        $this->form_validation->set_rules('bidang_ilmu', 'Bidang Ilmu', 'required|trim');
        $this->form_validation->set_rules('luaran', 'Luaran dana yang diharapkan', 'trim');
        if (empty($_FILES['u_berkas']['name']) && $ber==''){
            $this->form_validation->set_rules('u_berkas','Berkas PKM','required');
        }
        if (empty($_FILES['u_lampiran']['name']) && $lam==''){
            $this->form_validation->set_rules('u_lampiran','Lampiran PKM','required');
        }
        if($this->form_validation->run()== FALSE){
            $this->session->set_flashdata('flash_data', warn_msg(validation_errors("<label class='error'>","</label>")));
            $this->session->set_flashdata('post_item', $this->input->post());
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $param = $this->input->post();
            if($ber){
                $param['u_berkas'] = $ber;
            }else{
                $berkas = $this->lets_upload_berkas();
                $param['u_berkas'] = $berkas['file_name'];
            }
            if($lam){
                $param['u_lampiran'] = $lam;
            }else{
                $lampiran = $this->lets_upload_lampiran();
                $param['u_lampiran'] = $berkas['file_name'];
            }
            $param['admin'] = $admin;
            $insert = $this->mp->doUpdate($param);
            if($insert == TRUE){
                $this->session->set_flashdata('flash_data', succ_msg('Pendaftaran PKM berhasil Diupdate ..'));
            }else{
                $this->session->set_flashdata('flash_data', err_msg('Something went wrong, Please try again later.'));
            }
            if($admin){
                redirect('admin_master/berkas_pkm');
            }else{
                redirect('pendaftaran_pkm');
            }
        }
    }
    public function savePendaftaran($admin='') {
        $this->form_validation->set_rules('nim', 'NIM', 'required|trim');
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('jurusan', 'Jurusan', 'required|trim');
        $this->form_validation->set_rules('telp', 'Telephone', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('nim_anggota[]', 'NIM Anggota', 'required|trim');
        $this->form_validation->set_rules('nip_dn', 'NIDN', 'trim');
        $this->form_validation->set_rules('nama_dn', 'Nama Dosen', 'required|trim');
        $this->form_validation->set_rules('email_dn', 'Email Dosen', 'required|trim|valid_email');
        $this->form_validation->set_rules('alamat_dn', 'Alamat Dosen', 'required|trim');
        $this->form_validation->set_rules('judul', 'Judul', 'required|trim');
        $this->form_validation->set_rules('bidang_pkm', 'Bidang Kegiatan PKM', 'required|trim');
        $this->form_validation->set_rules('bidang_ilmu', 'Bidang Ilmu PKM', 'trim');
        if (empty($_FILES['u_berkas']['name'])){
            $this->form_validation->set_rules('u_berkas','Berkas PKM','required');
        }
        if (empty($_FILES['u_lampiran']['name'])){
            $this->form_validation->set_rules('u_lampiran','Lampiran PKM','required');
        }
        if($this->form_validation->run()== FALSE){
            $this->session->set_flashdata('flash_data', warn_msg(validation_errors("<label class='error'>","</label>")));
            $this->session->set_flashdata('post_item', $this->input->post());
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $param = $this->input->post();
            $berkas = $this->lets_upload_berkas();
            $lampiran = $this->lets_upload_lampiran();
            $param['u_berkas'] = $berkas['file_name'];
            $param['u_lampiran'] = $lampiran['file_name'];
            $param['admin'] = $admin;
            $insert = $this->mp->doInsert($param);
            if($insert == TRUE){
                $this->session->set_flashdata('flash_data', succ_msg('Pendaftaran PKM berhasil disimpan..'));
            }else{
                $this->session->set_flashdata('flash_data', err_msg('Something went wrong, Please try again later.'));
            }
            if($admin){
                redirect('admin_master/berkas_pkm');
            }else{
                redirect('pendaftaran_pkm');
            }
        }
    }

    function lets_upload_berkas() {
        if($_FILES['u_berkas']['name']){
            $filename = time().'-berkas-'.$_FILES['u_berkas']['name'];
        }else{
            $filename = '';
        }
        $config = array(
            'upload_path' => './assets/uploads/',
            'allowed_types' => '*',
            'max_size' => 5048,
            'file_name' => $filename,
            'overwrite' => 1,
        );
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('u_berkas')) {
            $notif = FALSE;
        } else {
            $notif = $this->upload->data();
        }
        return $notif;
    }
    function lets_upload_lampiran() {
        if($_FILES['u_lampiran']['name']){
            $filename1 = time().'-lampiran-'.$_FILES['u_lampiran']['name'];
        }else{
            $filename1 = '';
        }
        $config = array(
            'upload_path' => './assets/uploads/',
            'allowed_types' => '*',
            'max_size' => 5048,
            'file_name' => $filename1,
            'overwrite' => 1,
        );
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('u_lampiran')) {
            $notif = FALSE;
        } else {
            $notif = $this->upload->data();
        }
        return $notif;
    }
    
    public function getFormAnggota($nim='') {
        $init = $this->input->post('init');
        $str = '<div id"formAnggota"></div><div class="form-group" id="fd_'.$init.'">
                      <label class="col-md-3 control-label">Anggota</label>
                           <div class="col-sm-8">
                            <div class="row">
                                <div class="col-sm-5">
                                    <input type="text" name="nim_anggota[]" placeholder="Nim Anggota" id="fd_select'.$init.'" class="form-control">
                                </div>
                                <div class="col-sm-4">
                                    <button type="button" onclick="search('.$init.');" class="btn btn-info" title="Search">
                                        <i class="fa fa-search"></i> Search
                                    </button>
                                    <button type="button" onclick="rm('.$init.');" class="btn btn-danger" title="Hapus Anggota">
                                        <i class="fa fa-minus-circle"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>';
        echo $str;
        
    }

}
