<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST");

class Admin_tryout extends REST_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(['jwt', 'authorization']);
        $this->load->model('m_admin_tryout');
        $this->load->helper('string');
    }

    private function verify_request()
    {
        $headers = $this->input->request_headers();
        $token = $headers['X-Authorization'];

        // JWT library throws exception if the token is not valid
        try {
            // Validate the token
            // Successfull validation will return the decoded user data else returns false
            $data = AUTHORIZATION::validateToken($token);
            if ($data === false) {
                $status = parent::HTTP_UNAUTHORIZED;
                $response = ['status' => $status, 'msg' => 'Unauthorized Access!'];
                $this->response($response, $status);
                exit();
            } else {
                return $data;
            }
        } catch (Exception $e) {
            // Token is invalid
            // Send the unathorized access message
            $status = parent::HTTP_UNAUTHORIZED;
            $response = ['status' => $status, 'msg' => 'Unauthorized Access! '];
            $this->response($response, $status);
        }
    }

    // Login Admin Tryout
    public function login_post()
    {
        $username = $this->post('username');
        $password = $this->post('password');

        // Check with username or with email
        $admin_tryout = $this->m_admin_tryout->login_check($username);

        if ( $admin_tryout->num_rows() > 0){

            // Check password
            $admin_tryout = $admin_tryout->row();
            $check = $this->m_admin_tryout->valid_password(array('hash'=> substr(hash('sha256', $admin_tryout->salt . $password), 0, 45)))->num_rows();
    
            if ($check > 0) {
                $token = AUTHORIZATION::generateToken([
                    'id_admin_tryout'  => $admin_tryout->id_admin_tryout,
                    'username' => $username
                ]);
                $status = parent::HTTP_OK;
                $response = ['status' => $status, 'admintryouttoken' => $token];
                $this->response($response, $status);
            }
            else {
                $response = ['msg' => 'Username and password not match!'];
                $this->response($response, parent::HTTP_UNAUTHORIZED);
            }

        } else {
            $this->response(['msg' => 'Username not found!', 'test' => $username], parent::HTTP_UNAUTHORIZED);
        }
        
    }

    public function generate_post(){
        // Input data
        $email = $this->post('email');
        $username = $this->post('username');
        $password = $this->post('password');

        // Generate Password
        $salt = random_string('alnum');
        $hash = hash('sha256',$salt.$password);

        $data = array(
            'username'  => $username,
            'email'     => $email,
            'hash'      => $hash,
            'salt'      => $salt
        );

        $insert = $this->m_admin_tryout->generate($data);

        if ($insert) {
            // SET JWT
            $token = AUTHORIZATION::generateToken(['username' => $username]);
            $status = parent::HTTP_OK;
            $response = ['status' => $status, 'token' => $token];
            $this->response($response, $status);

        } else {
            $this->response(['msg' => 'Register Failed!'], parent::HTTP_BAD_GATEWAY);
        }

    }
    
    public function generate_univ_post(){
        // Input data
        $email = $this->post('email');
        $username = $this->post('username');
        $password = $this->post('password');
        $admin_of = $this->post('admin_of');

        // Generate Password
        $salt = random_string('alnum');
        $hash = hash('sha256',$salt.$password);

        $data = array(
            'username'  => $username,
            'email'     => $email,
            'admin_of'  => $admin_of,
            'hash'      => $hash,
            'salt'      => $salt
        );

        $insert = $this->m_admin_tryout->generateUniv($data);

        if ($insert) {
            // SET JWT
            $token = AUTHORIZATION::generateToken(['username' => $username]);
            $status = parent::HTTP_OK;
            $response = ['status' => $status, 'token' => $token];
            $this->response($response, $status);

        } else {
            $this->response(['msg' => 'Register Failed!'], parent::HTTP_BAD_GATEWAY);
        }

    }

    public function admin_get($id){
        $admin = $this->m_admin_tryout->getById($id);
        $verif = $this->verify_request();
        if(isset($verif)){
            $this->response($admin,200);
        }
    }

    public function peserta_tryout_get(){
        $auth = $this->verify_request();

        if (isset($auth)){

            $data = $this->m_admin_tryout->getPesertaTryout();

            if ($data) {
                $this->response($data, 200);
            } else {
                $this->response(array('status' => 'fail', 502));
            }

        }
    }

    public function transaksi_tryout_get(){
        $auth = $this->verify_request();

        if (isset($auth)){

            $data = $this->m_admin_tryout->getTransaksiTryout();

            if ($data) {
                $this->response($data, 200);
            } else {
                $this->response(array('status' => 'fail', 502));
            }

        }
    }

    public function total_transaksi_get(){
        $data = $this->m_admin_tryout->getTotalTransaksi();

            if ($data) {
                $this->response($data, 200);
            } else {
                $this->response(array('status' => 'fail', 502));
            }
    }

    public function status_peserta_get(){
        $data = $this->m_admin_tryout->getStatusPeserta();

            if ($data) {
                $this->response($data, 200);
            } else {
                $this->response(array('status' => 'fail', 502));
            }

    }

    public function universitas_peserta_get(){
        $data = $this->m_admin_tryout->getUniversitasPeserta();

            if ($data) {
                $this->response($data, 200);
            } else {
                $this->response(array('status' => 'fail', 502));
            }
    }

    public function change_password_put($id){
        $verif = $this->verify_request();
        if(isset($verif)){
        $password = $this->put('password');

        // Generate Password
        $salt = random_string('alnum');
        $hash = hash('sha256',$salt.$password);

        $data = array(
            'hash'      => $hash,
            'salt'      => $salt
        );
        
            $update = $this->m_admin_tryout->changePassword($id, $data);
            if ($update) {
                $this->response($data, 200);
            } else {
                $this->response(array('status' => 'fail', 502));
            }
        }
    }
}