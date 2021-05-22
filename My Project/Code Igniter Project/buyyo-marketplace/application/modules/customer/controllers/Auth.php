<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    var $API ="";

    function __construct() {
        parent::__construct();
        $this->API = base_url('api');
        $this->load->library('session');
        $this->load->library('mycurl');
        $this->load->helper('form');
        $this->load->helper('url');

        $this->load->library('google');
        $this->load->library('form_validation'); // ditambahkan adi (sama di autoload.php)
    }

    public function register()
    {
        if($this->session->userdata('token')){      // ditambahkan adi
            redirect(base_url());
        }
        $data['loginURL'] = $this->google->createAuthUrl();  // ditambahkan adi
        $this->load->view('v_temp_register', $data);
    }

    public function register_action()
    {
        // form validation tambahan (adi)
        $this->form_validation->set_rules('email', 'Email', 'trim|is_unique[User.email]', [
            'is_unique' => 'This email has already registered!'
        ]);
        $this->form_validation->set_rules('username', 'Username', 'trim|min_length[3]|is_unique[User.username]', [
            'is_unique' => 'This username has already registered!'
        ]);
        

        if($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <p>Email or Username has already registered!</p>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect("customer/auth/register");
        } else {
        
            $email = $this->input->post('email');
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $url = $this->API . '/register';
            $data = array(
                'email' => $email,
                'username' => $username, 
                'password' => $password
            );
            $header = array('Content-Type: application/json');

            $response = $this->mycurl->post($url, json_encode($data), $header);

            if (isset($response['token'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <p>Register success! Please login.</p>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect(base_url("customer/auth/login")); // flashdata (adi)
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <p>' . $response['msg'] . '</p>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect("customer/auth/register"); // flashdata (adi)
            }
        }
    }

    public function login()
    {
        if($this->session->userdata('token')){
            redirect(base_url());
        }
        if(isset($_GET['code'])){
            // otentikasi user dengan google
            $client = $this->google;
            $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
            $client->setAccessToken($token['access_token']);
            
            // get profile info
            $google_oauth = new Google_Service_Oauth2($client);
            $profile = $google_oauth->userinfo->get();

            $url = $this->API . '/google';
            $userdata = array(
                'oauth_provider' => 'google',
                'oauth_uid'      => $profile->id,
                'nama_depan'     => $profile->familyName,
                'nama_belakang'  => $profile->givenName,
                'email'          => $profile->email,
                'photo'          => !empty($profile->picture)?$profile->picture:''
            );
            $header = array('Content-Type: application/json');
            $response = $this->mycurl->post($url, json_encode($userdata), $header);
            
            // simpan session
            $this->session->set_userdata(array('token'=>$response['token']));
            redirect(base_url());
        }
        // Google authentication url
        $data['loginURL'] = $this->google->createAuthUrl();

        $this->load->view('v_temp_login', $data);
    }

    public function login_action()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $url = $this->API . '/login';
        $data = array(
            'username' => $username, 
            'password' => $password
        );
        $header = array('Content-Type: application/json');

        $response = $this->mycurl->post($url, json_encode($data), $header);

        if (isset($response['token'])) {
            $this->session->set_userdata(array('token'=>$response['token']));
            redirect(base_url("customer/home"));
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <p>' . $response['msg'] . '</p>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect("customer/auth/login");
        }
    }

    public function logout()
    {
        // Reset OAuth access token
        $this->google->revokeToken();
        $this->session->unset_userdata('token'); 
        $this->session->sess_destroy();
        redirect(base_url("customer/home"));
    }
}