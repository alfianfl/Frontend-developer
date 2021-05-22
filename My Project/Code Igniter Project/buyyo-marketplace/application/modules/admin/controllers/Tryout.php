<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tryout extends CI_Controller {
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
        $token = $this->session->userdata('admintryouttoken');
        
        if ($token) {
            $data['user'] = AUTHORIZATION::validateToken($token)->username;
            redirect('admin/tryout/dashboard');
        } else {
            redirect('admin/auth_tryout/login');
        }
    }

    public function peserta(){
        $token = $this->session->userdata('admintryouttoken');
        if($token){
            $header = array(
                'Content-Type: application/json',
                'X-Authorization: '  . $token
            );

            $url = $this->API . '/admintryoutpeserta';
            $data['peserta'] = $this->mycurl->get($url, $header);

            $url = $this->API . '/admintryoutpesertauniv';
            $data['univ'] = $this->mycurl->get($url, $header);

            $data['user'] = AUTHORIZATION::validateToken($token)->username;
            $this->load->view('_tryout/v_admin_tryout_peserta', $data);
        }else {
            redirect('admin/auth_tryout/login');
        }
        
    }
    
    public function transaksi(){
        $token = $this->session->userdata('admintryouttoken');
        if($token){
            $header = array(
                'Content-Type: application/json',
                'X-Authorization: '  . $token
            );
            $url = $this->API . '/admintryouttransaksi';
            $data['transaksi'] = $this->mycurl->get($url, $header);

            $url = $this->API . '/admintryoutjumlah';
            $data['jumlah_transaksi'] = $this->mycurl->get($url, $header);

            $url = $this->API . '/admintryoutstatus';
            $data['status'] = $this->mycurl->get($url, $header);

            $data['user'] = AUTHORIZATION::validateToken($token)->username;
            $this->load->view('_tryout/v_admin_tryout_transaksi', $data);
        }else {
            redirect('admin/auth_tryout/login');
        }
    }

    public function dashboard(){
        $token = $this->session->userdata('admintryouttoken');
        if($token){
            $header = array(
                'Content-Type: application/json',
                'X-Authorization: '  . $token
            );

            $url = $this->API . '/admintryoutpesertauniv';
            $data['univ'] = $this->mycurl->get($url, $header);
            
            $url = $this->API . '/admintryoutstatus';
            $data['status'] = $this->mycurl->get($url, $header);
            
            $url = $this->API . '/admintryoutjumlah';
            $data['jumlah_transaksi'] = $this->mycurl->get($url, $header);

            $data['user'] = AUTHORIZATION::validateToken($token)->username;
            $this->load->view('_tryout/v_admin_tryout_dashboard', $data);
        }else {
            redirect('admin/auth_tryout/login');
        }
    }

    public function approve_transaksi($transaksi_tryout_id){
        $token = $this->session->userdata('admintryouttoken');
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

            redirect('admin/tryout/transaksi');
        }

        else {
            redirect('admin/auth_tryout/login');
        }
    }

    public function reject_transaksi($id_transaksi_tryout){
        $token = $this->session->userdata('admintryouttoken');
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

            redirect('admin/tryout/transaksi');
        }

        else {
            redirect('admin/auth_tryout/login');
        }
    }

    public function setting(){
        $token = $this->session->userdata('admintryouttoken');
        if($token){
            $header = array(
                'Content-Type: application/json',
                'X-Authorization: '  . $token
            );

            $url = $this->API . '/tryout';
            $data['tryout'] = $this->mycurl->get($url, $header);

            $data['user'] = AUTHORIZATION::validateToken($token)->username;
            $this->load->view('_tryout/v_admin_tryout_setting', $data);
        }

        else {
            redirect('admin/auth_tryout/login');
        }
    }

    public function generate_action()
    {
        $token = $this->session->userdata('admintryouttoken');
        if ($token) {
            $header = array(
                'Content-Type: application/json',
                'X-Authorization: '  . $token
            );
            
            $url = $this->API . '/admin_tryout/generate';
            $data = array(
                'email' => $this->input->post('email'),
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
            );
            

            $response = $this->mycurl->post($url, json_encode($data), $header);

            if (isset($response['token'])) {
                redirect(base_url("admin/tryout/setting")); /////////
            } else {
                echo $response['msg'];
            }

        } else{
            redirect('admin/auth_tryout/login');
        }
    }

    public function generate_univ_action()
    {
        $token = $this->session->userdata('admintryouttoken');
        if ($token) {
            $header = array(
                'Content-Type: application/json',
                'X-Authorization: '  . $token
            );
            
            $url = $this->API . '/admin_tryout/generate_univ';
            $data = array(
                'email' => $this->input->post('email'),
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
                'admin_of' => $this->input->post('admin_of'),
            );
            

            $response = $this->mycurl->post($url, json_encode($data), $header);

            if (isset($response['token'])) {
                redirect(base_url("admin/tryout/setting")); /////////
            } else {
                echo $response['msg'];
            }

        } else{
            redirect('admin/auth_tryout/login');
        }
    }

    public function change_password_action(){ 
        $token = $this->session->userdata('admintryouttoken');
        if ($token) {
            $header = array(
                'Content-Type: application/json',
                'X-Authorization: '  . $token
            );
            $id = AUTHORIZATION::validateToken($token)->id_admin_tryout;

            $password1 = $this->input->post('password');
            $password2 = $this->input->post('password_confirm');

            if($password1 == $password2){
                $url = $this->API . '/admin_tryout/change_password/' . $id;
                $data = array(
                    'password' => $this->input->post('password'),
                    'admin_of' => $this->input->post('admin_of'),
                );
                

                $response = $this->mycurl->put($url, json_encode($data), $header);

                redirect(base_url("admin/tryout/setting"));
                
                echo $response['msg'];
        

            }else{
                echo "Password Didn't Match";
            }

        } else{
            redirect('admin/auth_tryout/login');
        }
    }

    public function mail($id_transaksi_tryout){
        $token = $this->session->userdata('admintryouttoken');

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
            redirect('admin/auth_tryout/login');
        }
    }

    public function broadcast_mail(){
        $token = $this->session->userdata('admintryouttoken');
        if($token){
            $header = array(
                'Content-Type: application/json',
                'X-Authorization: '  . $token
            );
            $url = $this->API . '/tryout';
            $data_tryouts = $this->mycurl->get($url, $header);

            foreach($data_tryouts as $data_tryout){
                $url = $this->API . '/admin_tryout_univ/transaksi_tryout/' . $data_tryout['id_tryout'];
                $data_transaksis = $this->mycurl->get($url, $header);
                foreach($data_transaksis as $data_transaksi){
                    $data_transaksi = (array) $data_transaksi;
                    $namapaket = $data_tryout['paket'];
                    $timestrmulai = strtotime($data_tryout['waktu_mulai']);
                    $remaining = $timestrmulai - time();
                    $days_remaining = floor($remaining / 86400);
                    if($days_remaining == 7 && $data_transaksi['status'] != "Approved" && $data_transaksi['remind_count'] == 0){
                        $email = $data_transaksi['email'];
                        $namapeserta = $data_transaksi['username'];

                        $this->load->library('email');

                        $this->email->set_newline("\r\n");

                        $this->email->to($email);
                        $this->email->from('buyyoid@gmail.com', 'Customer Service Buyyo id');
                        
                        $this->email->subject('Reminder Registration (Buyyo.id)');

                        $message = "
                        Dear, $namapeserta
        
                        Halo, Para pejuang Try out $namapaket.
                        Gimana nih kabarnya? udah H - $days_remaining lagi aja nih. Udah siap-siap belajar belum buat mantepin TO nya nih heheh. Selain belajar pastiin kamu punya Readylearn account yaaa. Dan bagi yang belum jangan lupa buat lakukan transaksi dan upload bukti kamu pada halaman my tryout di buyyo.id yaa. Pastikan bukti yang kamu upload sesuai persyaratan.
        
                        Namun, apabila kamu telah upload bukti transaksi dan belum mendapat ready learn account via email atau pada laman my tryout buyyo kamu bisa menghubungi helpdesk kami di :
        
                        • Marcell Antonius (0895401011469)
                        • Ariq Ragatra (089512422324 )
        
                        Terimakasih,
                        ";

                        $this->email->message($message);

                        $result = $this->email->send();

                        if($result){
                            $this->session->set_flashdata("email_sent","Email sent successfully."); 
                            $remind_count = $data_transaksi['remind_count'] + 1;
                            $data = array(
                                'id_transaksi_tryout' => $data_transaksi['id_transaksi_tryout'],
                                'remind_count' => $remind_count
                            );
                
                            $url = $this->API . '/trans_tryout/remind_count';
                            $this->mycurl->put($url, json_encode($data), $header);  
                        }
                        else{
                            $this->session->set_flashdata("email_sent","Error in sending Email.");
                        }
                    }
                }
            }
            redirect(base_url("admin/tryout/setting"));
        }else{
            redirect('admin/auth_tryout/login');
        }
    }
}