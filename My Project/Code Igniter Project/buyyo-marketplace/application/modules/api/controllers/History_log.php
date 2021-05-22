<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");

class History_log extends REST_Controller {

    function __construct($config = 'rest') 
    {
        parent::__construct($config);
        $this->load->helper(['jwt', 'authorization']);
        // $this->load->model('m_product');
        $this->load->database();
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

        // Mengirim atau menambah data produk baru oleh Merchant
        function index_post() 
        {
    
            $auth = $this->verify_request();
            if (isset($auth)){
                $status = parent::HTTP_OK;
                $user = $auth->id_user;
                
                $data = array(
                    'id_transaksi' => $this->post('id_transaksi'),
                    'id_keranjang' => $this->post('id_keranjang'),
                    'kuantitas' => $this->post('kuantitas'),
                    'waktu' => $this->post('waktu'),
                    'catatan' => $this->post('catatan'),
                    'id_produk' => $this->post('id_produk'),
                    'customer' => $this->post('customer')
                );
    
                $insert = $this->db->insert('History_transaksi', $data);;
    
                if ($insert) {
                    $this->response(array("msg" => "Added Product Success!"), $status);
                } else {
                    $this->response(array('status' => 'fail', 502));
                }
            }
    
        }

}