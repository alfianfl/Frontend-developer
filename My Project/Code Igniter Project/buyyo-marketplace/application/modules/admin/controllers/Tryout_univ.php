<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tryout_univ extends CI_Controller {
    var $API ="";

    function __construct() {
        parent::__construct();
        $this->API = base_url('api');
        $this->load->library('session');
        $this->load->library('mycurl');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('cookie');
        $this->load->helper(['jwt', 'authorization']);
    }

    public function index()
    {
        $token = $this->session->userdata('admintryoutunivtoken');
        
        if ($token) {
            $data['user'] = AUTHORIZATION::validateToken($token)->username;
            $data['admin_of'] = AUTHORIZATION::validateToken($token)->admin_of;
            redirect('admin/tryout_univ/dashboard');
        } else {
            redirect('admin/auth_tryout_univ/login');
        }
    }

    public function dashboard(){
        $token = $this->session->userdata('admintryoutunivtoken');
        if($token){
            $admin_of = AUTHORIZATION::validateToken($token)->admin_of;
            $header = array(
                'Content-Type: application/json',
                'X-Authorization: '  . $token
            );

            $url = $this->API . '/admin_tryout_univ/universitas_peserta/' . $admin_of;
            $data['univ'] = $this->mycurl->get($url, $header);
            
            $url = $this->API . '/admin_tryout_univ/status_peserta/' . $admin_of;
            $data['status'] = $this->mycurl->get($url, $header);
            
            $url = $this->API . '/admin_tryout_univ/total_transaksi/' . $admin_of;
            $data['jumlah_transaksi'] = $this->mycurl->get($url, $header);

            $data['user'] = AUTHORIZATION::validateToken($token)->username;
            $data['admin_of'] = $admin_of;

            
            $this->load->view('_tryout_univ/v_admin_tryout_univ_dashboard', $data);
        }else {
            redirect('admin/auth_tryout_univ/login');
        }
    }

    public function peserta(){
        $token = $this->session->userdata('admintryoutunivtoken');
        if($token){
            $admin_of = AUTHORIZATION::validateToken($token)->admin_of;
            $header = array(
                'Content-Type: application/json',
                'X-Authorization: '  . $token
            );

            $url = $this->API . '/admin_tryout_univ/peserta_tryout/' . $admin_of;
            $data['peserta'] = $this->mycurl->get($url, $header);

            $url = $this->API . '/admin_tryout_univ/universitas_peserta/' . $admin_of;
            $data['univ'] = $this->mycurl->get($url, $header);

            $data['user'] = AUTHORIZATION::validateToken($token)->username;
            $data['admin_of'] = $admin_of;
            
            $this->load->view('_tryout_univ/v_admin_tryout_univ_peserta', $data);
        }else {
            redirect('admin/auth_tryout_univ/login');
        }
    }

    public function transaksi(){
        $token = $this->session->userdata('admintryoutunivtoken');
        if($token){
            $admin_of = AUTHORIZATION::validateToken($token)->admin_of;
            $header = array(
                'Content-Type: application/json',
                'X-Authorization: '  . $token
            );

            $url = $this->API . '/admin_tryout_univ/transaksi_tryout/' . $admin_of;
            $data['transaksi'] = $this->mycurl->get($url, $header);

            $url = $this->API . '/admin_tryout_univ/total_transaksi/' . $admin_of;
            $data['jumlah_transaksi'] = $this->mycurl->get($url, $header);

            $url = $this->API . '/admin_tryout_univ/status_peserta/' . $admin_of;
            $data['status'] = $this->mycurl->get($url, $header);

            $data['user'] = AUTHORIZATION::validateToken($token)->username;
            $data['admin_of'] = $admin_of;
            
            $this->load->view('_tryout_univ/v_admin_tryout_univ_transaksi', $data);
        }else {
            redirect('admin/auth_tryout_univ/login');
        }
    }

    public function setting(){
        $token = $this->session->userdata('admintryoutunivtoken');
        if($token){
            $header = array(
                'Content-Type: application/json',
                'X-Authorization: '  . $token
            );

            $url = $this->API . '/tryout';
            $data['tryout'] = $this->mycurl->get($url, $header);

            $data['user'] = AUTHORIZATION::validateToken($token)->username;
            $this->load->view('_tryout_univ/v_admin_tryout_univ_setting', $data);
        }

        else {
            redirect('admin/auth_tryout_univ/login');
        }
    }

    public function approve_transaksi($transaksi_tryout_id){
        $token = $this->session->userdata('admintryoutunivtoken');
        if($token){
            $header = array(
                'Content-Type: application/json',
                'X-Authorization: '  . $token
            );

            $data = array(
                'id_transaksi_tryout' => $transaksi_tryout_id,
                'status' => 'Approved'
            );

            $url = $this->API . '/trans_tryout/verify_trans';
            $response = $this->mycurl->put($url, json_encode($data), $header);

            $url = $this->API. '/trans_tryout/readylearn';
            $pass_rl = $this->mycurl->put($url, json_encode($data), $header);

            $mail = $this->mail($transaksi_tryout_id);

            echo $mail;
            echo $response['msg'];
            echo $pass_rl['msg'];

            redirect('admin/tryout_univ/transaksi');
        }

        else {
            redirect('admin/auth_tryout_univ/login');
        }
    }

    public function reject_transaksi($id_transaksi_tryout){
        $token = $this->session->userdata('admintryoutunivtoken');
        if($token){
            $header = array(
                'Content-Type: application/json',
                'X-Authorization: '  . $token
            );

            $data = array(
                'id_transaksi_tryout' => $id_transaksi_tryout,
                'status' => 'Rejected'
            );

            $url = $this->API . '/trans_tryout/verify_trans';
            $response = $this->mycurl->put($url, json_encode($data), $header);
            echo $response['msg'];

            redirect('admin/tryout_univ/transaksi');
        }

        else {
            redirect('admin/auth_tryout_univ/login');
        }
    }

    public function change_password_action(){ 
        $token = $this->session->userdata('admintryoutunivtoken');
        if ($token) {
            $header = array(
                'Content-Type: application/json',
                'X-Authorization: '  . $token
            );
            $id = AUTHORIZATION::validateToken($token)->id_admin_tryout_univ;

            $password1 = $this->input->post('password');
            $password2 = $this->input->post('password_confirm');

            if($password1 == $password2){
                $url = $this->API . '/admin_tryout_univ/change_password/' . $id;
                $data = array(
                    'password' => $this->input->post('password'),
                    'admin_of' => $this->input->post('admin_of'),
                );
                

                $response = $this->mycurl->put($url, json_encode($data), $header);

                redirect(base_url("admin/tryout_univ/setting"));
                
                echo $response['msg'];
        

            }else{
                echo "Password Didn't Match";
            }

        } else{
            redirect('admin/auth_tryout_univ/login');
        }
    }

    public function mail($id_transaksi_tryout){
        $token = $this->session->userdata('admintryoutunivtoken');

        if ($token) {
            $header = array(
                'Content-Type: application/json',
                'X-Authorization: '  . $token
            );
            $url = $this->API . '/trans_tryout/' . $id_transaksi_tryout;
            $data_transaksi = $this->mycurl->get($url, $header);
            
            $password = $data_transaksi[0]['pass_rl'];

            $url = $this->API . '/tryout/' . $data_transaksi[0]['id_tryout'];
            $data_tryout = $this->mycurl->get($url, $header);
            $namapaket = $data_tryout[0]['paket'];
            $namapenyelenggara = $data_tryout[0]['penyelenggara'];

            $timestrmulai = strtotime($data_tryout[0]['waktu_mulai']);
            $timestrselesai = strtotime($data_tryout[0]['waktu_selesai']);
            $tanggalmulai = date("l, d/m/Y", $timestrmulai);
            $tanggalselesai = date("l, d/m/Y", $timestrselesai);
            $waktumulai = date("H:i", $timestrmulai);
            $waktuselesai = date("H:i", $timestrselesai);

            $url = $this->API . '/user/' . $data_transaksi[0]['id_user'] . '/?id_user=' . $data_transaksi[0]['id_user'];
            $data_user = $this->mycurl->get($url, $header);
            $email = $data_user[0]['email'];
            $namapeserta = $data_user[0]['username'];
            

            $this->load->library('email');

            $this->email->set_newline("\r\n");

            $this->email->to($email);
            $this->email->from('buyyoid@gmail.com', 'Customer Service Buyyo id');
            
            $this->email->subject('Registration Successfull ( Buyyo.id )');

            if($tanggalmulai == $tanggalselesai){
                $message= "
                Dear, $namapeserta

                Terimakasih, telah melakukan registrasi dan melakukan pembayaran $namapaket yang diselenggarakan oleh $namapenyelenggara bersama Readylearn. Pembayaran kamu telah sukses dan bisa mengakses website Readylearn ( readylearn.id ) pada :

                    Nama acara  : $namapaket
                    Tanggal     : $tanggalmulai
                    Waktu       : $waktumulai - $waktuselesai
                    
                    Dengan username dan password sebagai berikut :
                    Username    : $email
                    Password    : $password

                Pastikan kamu login ke website readylearn.id pada waktu tryout ya. Akun ini hanya berlaku untuk SATU pengguna pada hari yang telah ditentukan sesuai dengan pemilihan paket Tryout. \n
                Contact Person :
                • Marcell Antonius (0895401011469)
                • Ariq Ragatra (089512422324)
                ";
            }else{
                $message= "
                Dear, $namapeserta

                Terimakasih, telah melakukan registrasi dan melakukan pembayaran $namapaket yang diselenggarakan oleh $namapenyelenggara bersama Readylearn. Pembayaran kamu telah sukses dan bisa mengakses website Readylearn ( readylearn.id ) pada :

                    Nama acara  : $namapaket
                    Tanggal     : $tanggalmulai - $tanggalselesai
                    Waktu       : $waktumulai - $waktuselesai
                    
                    Dengan username dan password sebagai berikut :
                    Username    : $email
                    Password    : $password

                Pastikan kamu login ke website readylearn.id pada waktu tryout ya. Akun ini hanya berlaku untuk SATU pengguna pada hari yang telah ditentukan sesuai dengan pemilihan paket Tryout. \n
                Contact Person :
                • Marcell Antonius (0895401011469)
                • Ariq Ragatra (089512422324)
                ";
            }
            
            $this->email->message($message);

            $result = $this->email->send();

            if($result) 
            $this->session->set_flashdata("email_sent","Email sent successfully."); 
            else 
            $this->session->set_flashdata("email_sent","Error in sending Email."); 

            //$this->load->view('_tryout/email_test');
        } else{
            redirect('admin/auth_tryout_univ/login');
        }
    }

}