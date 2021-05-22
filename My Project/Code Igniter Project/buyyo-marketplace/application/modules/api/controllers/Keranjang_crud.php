<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT");

class Keranjang_crud extends REST_Controller{
    function __construct($config = 'rest'){
        parent::__construct($config);
        $this->load->helper(['jwt', 'authorization']);
        $this->load->model('m_keranjang');
        $this->load->model('m_transaksi');
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

    //menampilkan data keranjang
    function index_get(){
        $id = $this->get('id_keranjang');
        $auth = $this->verify_request();
        if (isset($auth)){
            $status = parent::HTTP_OK;
            $user = $auth->id_user;
            
            if ($id == '') {
                $data = $this->m_keranjang->getAll($user);
            } else {
                $data = $this->m_keranjang->getById($user, $id);
            }

            if (empty($data)){
                $this->response(array("msg" => "No Cart Found!"), 404);
            } else {
                $this->response($data, $status);
            }
        }
    }

    //membuat keranjang baru
    function index_post(){
        $data = array(
            'list_transaksi' => $this->post('list_transaksi'),
            'id_user' => $this->post('id_user')
            );

            $verif = $this->verify_request();
            if(isset($verif)){
                $insert = $this->m_keranjang->insertData($data);
                if ($insert) {
                    $this->response($data, 200);
                } else {
                    $this->response(array('status' => 'fail', 502));
                }
            }
        }

    //menambah produk ke keranjang
    function index_put(){
        $id = $this->put('id_keranjang');
        $oldtransaksi = $this->put('old_transaksi');
        $newtransaksi = ','.$this->put('new_transaksi');
        $data = array(
            'id_keranjang' => $this->put('id_keranjang'),
            'list_transaksi' => $oldtransaksi .= $newtransaksi
            );
        
        $verif = $this->verify_request();
        if(isset($verif)){    
            $update = $this->m_keranjang->updateById($id, $data);
            if ($update) {
                $this->response($data, 200);
            } else {
                $this->response(array('status' => 'fail', 502));
            }
        }
    }
}