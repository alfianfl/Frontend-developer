<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST");

class User_auth extends REST_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(['jwt', 'authorization']);
        $this->load->model('m_user'); 
        $this->load->helper('string');
    }

    // Register User
    public function register_post()
    {
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

        $insert = $this->m_user->insertData($data);

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

    // Login User
    public function login_post()
    {

        $username = $this->post('username');
        $password = $this->post('password');

        // Check with username or with email
        $user = $this->m_user->login_check($username);

        if ( $user->num_rows() > 0){

            // Check password
            $user = $user->row();
            $check = $this->m_user->valid_password(array('hash'=> substr(hash('sha256', $user->salt . $password), 0, 45)))->num_rows();
    
            if ($check > 0) {
                $token = AUTHORIZATION::generateToken([
                    'id_user'  => $user->id_user,
                    'username' => $username
                ]);
                $status = parent::HTTP_OK;
                $response = ['status' => $status, 'token' => $token];
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

    public function google_post()
    {
        // Input data
        $provider = $this->post('oauth_provider');
        $uid = $this->post('oauth_uid');
        $nama_user = $this->post('nama_depan') . ' ' . $this->post('nama_belakang');
        $photo = $this->post('photo');
    
        $username = $this->post('nama_depan');
        $email = $this->post('email');
    
        $data = array(
            'username'  => $username,
            'email'     => $email,
            'oauth_provider'  => $provider,
            'oauth_uid'  => $uid,
            'nama_user' => $nama_user,
            'foto'      => $photo
        );

        $check = $this->m_user->checkUser(array('email'=>$email));
        if($check > 0){
            // Ambil data sebelumnya
            $result = $this->m_user->get_previous(array('email'=>$email))->row_array();
			// Update data pengguna
            $data['update_on'] = date("Y-m-d H:i:s");
            unset($data['username']);
            $update = $this->m_user->updateById($result['id_user'], $data);
            // id pengguna
            $userID = $result['id_user'];
            
            // SET JWT
            $token = AUTHORIZATION::generateToken([
                'id_user'  => $result['id_user'],
                'username' => $result['username']
            ]);
            $status = parent::HTTP_OK;
            $response = ['status' => $status, 'token' => $token];
            $this->response($response, $status);
		}else{
			// Insert data pengguna
			$data['insert_on'] = date("Y-m-d H:i:s");
			$data['update_on'] = date("Y-m-d H:i:s");
			$insert = $this->m_user->insertData($data);
			// id pengguna
            $userID = $this->db->insert_id();

            $result = $this->m_user->get_previous($data)->row_array();
            
            // SET JWT
            $token = AUTHORIZATION::generateToken([
                'id_user'  => $result['id_user'],
                'username' => $result['username']
            ]);
            $status = parent::HTTP_OK;
            $response = ['status' => $status, 'token' => $token];
            $this->response($response, $status);
		}
    }

    // Verify Authorization
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

    // Get Data
    public function get_me_data_post()
    {
        $data = $this->verify_request();
        if (isset($data)){
            $status = parent::HTTP_OK;
            $response = ['status' => $status, 'data' => $data];
            $this->response($response, $status);
        }
    }

}