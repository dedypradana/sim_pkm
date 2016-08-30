<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

function encode($data) {
    return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
}

function decode($data) {
    return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT));
}

function succ_msg($msg) {
    return '<div class="alert alert-success alert-dismissable">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
								<strong>Berhasil !</strong><br>' . $msg . '
							</div>';
}

function warn_msg($msg) {
    return '<div class="alert alert-warning alert-dismissable">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
								<strong>Perhatian!</strong><br>' . $msg . '
							</div>';
}

function err_msg($msg) {
    return '<div class="alert alert-danger alert-dismissable">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
								<strong>Kesalahan!</strong><br>' . $msg . '
							</div>';
}

function toRupiah($data = '') {
    if ($data <= 0 || $data == '') {
        return 'Rp ' . '0,-';
    } else {
        return 'Rp ' . number_format($data, 0, ',', '.') . ',-';
    }
}

function changeDateFormat($format, $date) {
    if ($date == '') {
        return '';
    }
    switch ($format) {
        case 'full_database':
            return date('Y-m-d H:i:s', strtotime($date));
            break;
        case "database":
            return date('Y-m-d', strtotime($date));
            break;
        case "webview":
            return date('d M Y', strtotime($date));
            break;
        case "datepicker":
            return date('m/d/Y', strtotime($date));
            break;
        case "download":
            return date('d/m/Y', strtotime($date));
            break;
    }
}

function get_role($role_id = '') {
    $CI = &get_instance();
    $CI->load->model('M_user');

    $role = $CI->M_user->get_role();

    return @$role[$role_id]->module;
}

function roles_label($param) {
    // return $param;
    $CI = &get_instance();
    //return $param;
    // $id =settype($param, "integer");
    //$CI->load->model('M_user','mdb');
    //@$role_byID = $CI->mdb->get_role_id($param);
    //echo $CI->db->last_query();
    //print_r($role_byID);
    //exit();
    // // return  $role_byID;
    if ($param == '5') {
        return '<span class="label label-success label-xs">' . get_role(5) . '</span>';
    } else {
        // return $t;
        $t = explode(',', $param);
        print_r($t);
        exit();
        $jml_data = count($t);
        $html_roles = '';
        for ($i = 0; $i < $jml_data; $i++) {
            $html_roles .= $param . '<span class="label label-success label-xs">' . get_role($t[$i]) . '</span> ';
        }
        // echo $html_roles;
        return $html_roles;
    }
}

function bulanIndonesia($value = '') {
    $bulan = array('1' => 'Januari', // array bulan konversi
        '2' => 'Februari',
        '3' => 'Maret',
        '4' => 'April',
        '5' => 'Mei',
        '6' => 'Juni',
        '7' => 'Juli',
        '8' => 'Agustus',
        '9' => 'September',
        '10' => 'Oktober',
        '11' => 'November',
        '12' => 'Desember',
    );
    return $bulan[$value];
}

function nama_table($value = '') {
    $value = explode('-', $value);
    return $value[0];
}

function getJumlahSOP($id_jabatan) {
    $CI = &get_instance();
    $CI->load->model('M_global');

    $jumlah = $CI->M_global->getJumlahSOP($id_jabatan);

    return @$jumlah;
}

function placeholder($value = '') {
    $res = ucwords(str_replace('_', ' ', $value));
    return $res;
}

function small_placeholder($value = '') {
    $res = strtolower(placeholder($value));
    return $res;
}

function format_rupiah($value = '') {
    $value = intval($value);
    $res = number_format($value, 0, ',', '.');
    return $res;
}

function format_date($value = '') {
    $temp = explode('-', $value);
    return $temp['2'] . '-' . $temp['1'] . '-' . $temp['0'];
}

function get_day($d1, $d2) {
    return round(abs(strtotime($d1) - strtotime($d2)) / 86400);
}

function nilai_maks($tabel = '', $field = '') {
    $CI = &get_instance();
    $sql = "SELECT MAX(" . $field . ") as max FROM " . $tabel;
    $max = $CI->db->query($sql)->row()->max;
    // echo "<pre>";print_r($max);exit;
    $no = intval($max) + 1;
    return $no;
}

function tgl_indo($tgl) {
    $ubah = gmdate($tgl, time() + 60 * 60 * 8);
    $pecah = explode("-", $ubah);
    $tanggal = $pecah[2];
    $bulan = bulan($pecah[1]);
    $tahun = $pecah[0];
    return $tanggal . ' ' . $bulan . ' ' . $tahun;
}

function bulan($bln) {
    switch ($bln) {
        case 1:
            return "Januari";
            break;
        case 2:
            return "Februari";
            break;
        case 3:
            return "Maret";
            break;
        case 4:
            return "April";
            break;
        case 5:
            return "Mei";
            break;
        case 6:
            return "Juni";
            break;
        case 7:
            return "Juli";
            break;
        case 8:
            return "Agustus";
            break;
        case 9:
            return "September";
            break;
        case 10:
            return "Oktober";
            break;
        case 11:
            return "November";
            break;
        case 12:
            return "Desember";
            break;
    }
}

function getMateriLain($id = '', $materi) {
    $CI = &get_instance();
    $CI->db->where('id_jadwal_lain', $id);
    $CI->db->limit(1);
    $data = $CI->db->get('m_jadwal_lain')->result();

    if (@$data[0]->nama_jadwal == '') {
        return $materi;
    } else {
        return @$data[0]->nama_jadwal;
    }
}

function nama_hari($tanggal) {
    $ubah = gmdate($tanggal, time() + 60 * 60 * 8);
    $pecah = explode("-", $ubah);
    $tgl = $pecah[2];
    $bln = $pecah[1];
    $thn = $pecah[0];

    $nama = date("l", mktime(0, 0, 0, $bln, $tgl, $thn));
    $nama_hari = "";
    if ($nama == "Sunday") {
        $nama_hari = "Minggu";
    } else if ($nama == "Monday") {
        $nama_hari = "Senin";
    } else if ($nama == "Tuesday") {
        $nama_hari = "Selasa";
    } else if ($nama == "Wednesday") {
        $nama_hari = "Rabu";
    } else if ($nama == "Thursday") {
        $nama_hari = "Kamis";
    } else if ($nama == "Friday") {
        $nama_hari = "Jumat";
    } else if ($nama == "Saturday") {
        $nama_hari = "Sabtu";
    }
    return $nama_hari;
}

require 'PHPMailerAutoload.php';

function kirim_email($username, $password, $nama, $email_to, $nama_tujuan, $subject, $messages, $file = '') {
    $mail = new PHPMailer;

    $mail->isSMTP(); // Set mailer to use SMTP
    // $mail->SMTPDebug = 2; // debugging: 1 = errors and messages, 2 = messages only
    $mail->SMTPAuth = true; // authentication enabled
    $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
    $mail->Host = 'smtp.gmail.com'; // Specify main and backup SMTP servers
    $mail->SMTPAuth = true; // Enable SMTP authentication
    $mail->Username = $username; // SMTP username
    $mail->Password = $password; // SMTP password
    $mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587; // TCP port to connect to

    $mail->From = $username;
    $mail->FromName = $nama;
    $mail->addAddress($email_to, $nama_tujuan); // Add a recipient
    $mail->addReplyTo($username, $nama);

    if ($file) {

        for ($i = 0; $i < count($file); $i++) {

            if ($file[$i] != '') {
                $mail->addAttachment('assets/upload_dokumen/' . $file[$i], $file[$i]); // Optional name
            }
        }
    }

    $mail->isHTML(true); // Set email format to HTML

    $mail->Subject = $subject;
    $mail->Body = nl2br($messages);

    if (!$mail->send()) {
        return $mail->ErrorInfo;
    } else {
        return 'sent';
    }
}
