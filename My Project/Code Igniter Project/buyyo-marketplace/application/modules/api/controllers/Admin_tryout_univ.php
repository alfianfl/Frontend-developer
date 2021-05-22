<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST");

class Admin_tryout_univ extends REST_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(['jwt', 'authorization']);
        $this->load->model('m_admin_tryout_univ');
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
        $admin_tryout_univ = $this->m_admin_tryout_univ->login_check($username);

        if ( $admin_tryout_univ->num_rows() > 0){

            // Check password
            $admin_tryout_univ = $admin_tryout_univ->row();
            $check = $this->m_admin_tryout_univ->valid_password(array('hash'=> substr(hash('sha256', $admin_tryout_univ->salt . $password), 0, 45)))->num_rows();
    
            if ($check > 0) {
                $token = AUTHORIZATION::generateToken([
                    'id_admin_tryout_univ'  => $admin_tryout_univ->id_admin_tryout_univ,
                    'admin_of' => $admin_tryout_univ->admin_of,
                    'username' => $username
                ]);
                $status = parent::HTTP_OK;
                $response = ['status' => $status, 'admintryoutunivtoken' => $token];
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

    public function peserta_tryout_get($admin_of){
        $auth = $this->verify_request();

        if (isset($auth)){
            $data = $this->m_admin_tryout_univ->getPesertaTryout($admin_of);

            if ($data) {
                $this->response($data, 200);
            } else {
                $this->response(array('status' => 'fail', 502));
            }
        }
    }

    public function transaksi_tryout_get($admin_of){
        $auth = $this->verify_request();

        if (isset($auth)){
            $data = $this->m_admin_tryout_univ->getTransaksiTryout($admin_of);

            if ($data) {
                $this->response($data, 200);
            } else {
                $this->response(array('status' => 'fail', 502));
            }

        }
    }

    public function total_transaksi_get($admin_of){
        $data = $this->m_admin_tryout_univ->getTotalTransaksi($admin_of);

            if ($data) {
                $this->response($data, 200);
            } else {
                $this->response(array('status' => 'fail', 502));
            }
    }

    public function status_peserta_get($admin_of){
        $data = $this->m_admin_tryout_univ->getStatusPeserta($admin_of);

            if ($data) {
                $this->response($data, 200);
            } else {
                $this->response(array('status' => 'fail', 502));
            }

    }

    public function universitas_peserta_get($admin_of){
        $data = $this->m_admin_tryout_univ->getUniversitasPeserta($admin_of);

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
        
            $update = $this->m_admin_tryout_univ->changePassword($id, $data);
            if ($update) {
                $this->response($data, 200);
            } else {
                $this->response(array('status' => 'fail', 502));
            }
        }
    }

}