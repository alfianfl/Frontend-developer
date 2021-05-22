<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");

class Tryout extends REST_Controller {

    function __construct($config = 'rest') 
    {
        parent::__construct($config);
        $this->load->helper(['jwt', 'authorization']);
        $this->load->model('m_tryout');
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

    // Menampilkan semua produk berdasarkan kategori
    function index_get($id = '')
    {
        if ($id == '') {
            $data = $this->m_tryout->getAll();
        } else {
            $data = $this->m_tryout->getById($id);
        }
        $this->response($data, 200);
    }

    // Mencari nama produk di search bar
    function search_get($type='', $name = '') 
    {
        if ($name == '') {
            $data = $this->m_tryout->getAll();
        } else {
            $data = $this->m_tryout->getWhere($type, $name);
        }

        if (empty($data)){
            $this->response(array("msg" => "No Product Found!"), 404);
        } else {
            $this->response($data, 200);
        }
    }

    // Menampilkan data produk merchant
    function my_get($id = '') 
    {
        $page = $this->get('page');
        $cat = $this->get('cat');

        $auth = $this->verify_request();
        if (isset($auth)){
            $status = parent::HTTP_OK;
            $user = $auth->id_user;
            
            if ($id == '') {
                $data = $this->m_tryout->getMyAll($user, $cat, $page);
            } else {
                $data = $this->m_tryout->getMyById($user, $id);
            }

            if (empty($data)){
                $this->response(array("msg" => "No Product Found!"), 404);
            } else {
                $this->response($data, $status);
            }
        }
    }

    // Mencari Spesifik Produk oleh Merchant
    function filter_get($field = '', $item = '') 
    {
        $page = $this->get('page');
        $cat = $this->get('cat');

        $auth = $this->verify_request();
        if (isset($auth)){
            $status = parent::HTTP_OK;
            $user = $auth->id_user;

            if ($field == '' || $item == '') {
                $data = $this->m_tryout->getMyAll($user, $cat, $page);
            } else {
                $data = $this->m_tryout->getMyWhere($user, $field, $item);
            }

            if (empty($data)){
                $this->response(array("msg" => "No Product Found!"), 404);
            } else {
                $this->response($data, $status);
            }
        } 
    }

    // Mengirim atau menambah data produk baru oleh Merchant
    function index_post() 
    {

        $auth = $this->verify_request();
        if (isset($auth)){
            $status = parent::HTTP_OK;
            $user = $auth->id_user;
            
            $data = array(
                'paket'         => $this->post('paket'),
                'harga'         => $this->post('harga'),
                'nama_bank'     => $this->post('nama_bank'),
                'nama_rekening' => $this->post('nama_rekening'),
                'no_rekening'   => $this->post('no_rekening'),
                'thumbnail'     => $this->post('thumbnail'),
                'waktu_mulai'   => $this->post('waktu_mulai'),
                'waktu_selesai' => $this->post('waktu_selesai')
            );

            $insert = $this->m_tryout->insert($data);

            if ($insert) {
                $this->response(array("msg" => "Added Product Success!"), $status);
            } else {
                $this->response(array('status' => 'fail', 502));
            }
        }

    }

    //Memperbarui data produk yang telah ada
    function index_put() {

        $auth = $this->verify_request();
        if (isset($auth)){
            $status = parent::HTTP_OK;
            $user = $auth->id_user;
        
            $id = $this->put('id_tryout');
            
            $data = array(
                'id_tryout'     => $id,
                'paket'         => $this->put('paket'),
                'harga'         => $this->put('harga'),
                'nama_bank'     => $this->put('nama_bank'),
                'nama_rekening' => $this->put('nama_rekening'),
                'no_rekening'   => $this->put('no_rekening'),
                'thumbnail'     => $this->put('thumbnail'),
                'waktu_mulai'   => $this->put('waktu_mulai'),
                'waktu_selesai' => $this->put('waktu_selesai')
            );

            $update = $this->m_tryout->update($id, $data);

            if ($update) {
                $this->response(array("msg" => "Update Product Success!"), $status);
            } else {
                $this->response(array('status' => 'fail', 502));
            }
        }
    }

    //Menghapus salah satu data produk
    function index_delete($id) {

        // $id = $this->delete('id_produk');
        
        $auth = $this->verify_request();
        if (isset($auth)){
            
            $delete = $this->m_tryout->delete($id);
        
            if ($delete) {
                $this->response(array("msg" => "Delete Product Success!"), 201);
            } else {
                $this->response(array('status' => 'fail', 502));
            }
        }
    }

}