<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_tryout extends CI_Controller {
    var $API ="";

    function __construct() {
        parent::__construct();
        $this->API = base_url('api');
        $this->load->library('session');
        $this->load->library('mycurl');
        $this->load->helper('form');
        $this->load->helper('url');
    }

    public function login()
    {
        $this->load->view('_tryout/v_admin_tryout_login');
    }

    public function login_action()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $url = $this->API . '/admintryoutlogin';
        $data = array(
            'username' => $username, 
            'password' => $password
        );
        $header = array('Content-Type: application/json');

        $response = $this->mycurl->post($url, json_encode($data), $header);

        if (isset($response['admintryouttoken'])) {
            $this->session->set_userdata(array('admintryouttoken'=>$response['admintryouttoken']));
            redirect(base_url("admin/tryout"));
        } else {
            echo $response['msg'];
            echo '<br><a href="' . base_url('admin/tryout') . '"><button type="button">back</button></a>';
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url("admin/tryout"));
    }
}