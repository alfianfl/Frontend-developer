<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");

class Category_listing extends REST_Controller {

    function __construct($config = 'rest') 
    {
        parent::__construct($config);
        $this->load->helper(['jwt', 'authorization']);
        $this->load->model(['m_category', 'm_product']);
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
            $response = ['status' => $status, 'msg' => 'Unauthorized Access!'];
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

    function index_get($name = '')
    {
        $status = parent::HTTP_OK;
        if ($name == '') {
            $data = $this->m_category->getAll();
        } else {
            $data = $this->m_category->getByName($name);
        }
        
        if (empty($data)){
            $this->response(array("msg" => "No Category Found!"), 404);
        } else {
            $this->response($data, $status);
        }
    }

    // Memilih Kategori Produk
    function my_get()
    {
        $auth = $this->verify_request();
        if (isset($auth)){
            $status = parent::HTTP_OK;
            $user = $auth->id_user;
            $data = $this->m_product->getCategory($user);

            $this->response($data, $status);
        }
    }

    // Menambahkan Kategori baru jika belum tersedia
    function index_post()
    {
        $auth = $this->verify_request();
        if (isset($auth)){
            $status = parent::HTTP_OK;

            $data = array(
                'nama_kategori' => $this->post('nama_kategori')
            );

            // check apakah sudah ada atau belum
            $check = $this->m_category->check($data['nama_kategori']);

            if ($check == 0){
                $insert = $this->m_category->insert($data);

                if ($insert) {
                    $this->response(array("msg" => "Added Category Success!"), $status);
                } else {
                    $this->response(array('status' => 'fail', 502));
                }

            } else {
                $this->response(array("msg" => "Category already exist"), 502);
            }

        } else {
            $status = parent::HTTP_UNAUTHORIZED;
            $this->response(array("msg" => "You Must Login First"), $status);
        }
    }
}