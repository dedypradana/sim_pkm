<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pendaftaran_pkm extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_pendaftaran', 'mp');
    }

    public function index() {
        $data['title'] = 'Pendaftaran PKM';
        $this->templates->admin('index', $data);
    }

    public function savePendaftaran() {
        $post = $this->input->post();
        $berkas = $this->lets_upload_berkas();
        $lampiran = $this->lets_upload_lampiran();
        print_r($berkas);
        print_r($lampiran);exit;
        $insert = $this->mp->doInsert($post);
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

}
