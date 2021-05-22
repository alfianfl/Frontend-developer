<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class User_crud extends REST_Controller{

    function __construct($config = 'rest'){
        parent::__construct($config);
        $this->load->helper(['jwt', 'authorization']);
        $this->load->model('m_user');
        $this->load->model('m_product');
    }

    // Verify Authorization
    private function verify_request()
    {
        $headers = $this->input->request_headers();

        // Check header 'Authorization' is exists or not
        if (isset($headers['X-Authorization'])){
            $token = $headers['X-Authorization'];
        } else {
            $status = parent::HTTP_UNAUTHORIZED;
            $response = ['status' => $status, 'msg' => 'Unauth Access!'];
            $this->response($response, $status);
            return;
        }
        
        // JWT library throws exception if the token is not valid
        try {
            // Validate the token
            // Successfull validation will return the decoded user data else returns false
            $data = AUTHORIZATION::validateToken($token);
            if ($data === false) {
                $status = parent::HTTP_UNAUTHORIZED;
                $response = ['status' => $status, 'msg' => 'horized Access!'];
                $this->response($response, $status);
                exit();
            } else {
                return $data;
            }
        } catch (Exception $e) {
            // Token is invalid
            // Send the unathorized access message
            $status = parent::HTTP_UNAUTHORIZED;
            $response = ['status' => $status, 'msg' => 'Unauzed Access! '];
            $this->response($response, $status);
        }
    }

    //menampilkan data user
    function index_get(){
        $id = $this->get('id_user');
        if ($id == ''){
            $user = $this->m_user->getAll();
        } else{
            $user = $this->m_user->getById($id);
        }
        $verif = $this->verify_request();
        if(isset($verif)){
            $this->response($user,200);
        }
    }

    //mengedit data user
    function index_put(){
        $verif = $this->verify_request();
        if(isset($verif)){
        $user = $verif->id_user;
        $data = array(
            'id_user' => $user,
            'nama_user' => $this->put('nama_user'),
            'nama_merchant' => $this->put('nama_merchant'),
            'alamat' => $this->put('alamat'),
            'alamat_pengiriman' => $this->put('alamat_pengiriman'),
            'alamat_penjemputan' => $this->put('alamat_penjemputan'),
            'foto' => $this->put('foto'),
            'no_hp' => $this->put('no_hp')
        );
        
            $update = $this->m_user->updateById($user, $data);
            if ($update) {
                $this->response($data, 200);
            } else {
                $this->response(array('status' => 'fail', 502));
            }
        }
    }

    //menampilkan data user
    function merchant_get(){
        $user = $this->m_user->getMerch();
        $this->response($user,200);
    }

    function merchant_by_categories_get($categories){
        $user = $this->m_user->getMerchByCategory($categories);
        $this->response($user,200);
    }
}