<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST");


class Pembayaran_crud extends REST_Controller{
    function __construct($config = 'rest'){
        parent::__construct($config);
        $this->load->helper(['jwt', 'authorization']);
        $this->load->model('m_pembayaran');
    }

    // Verify Authorization
    private function verify_request()
    {
        $headers = $this->input->request_headers();

        // Check header 'Authorization' is exists or not
        if (isset($headers['Authorization'])){
            $token = $headers['Authorization'];
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

    //menampilkan data Payment
    function index_get(){
        $id = $this->get('id_payment');
        if ($id == ''){
            $payment = $this->m_payment->getAll();
        }else{
            $payment = $this->m_payment->getById($id);
        }

        $verif = $this->verify_request();
        if(isset($verif)){
            $this->response($payment, 200);
        }
    }

    //menambah pembayaran baru
    function index_post(){
        $data = array(
            'metode_pembayaran' => $this->post('metode_pembayaran'),
            'status_pembayaran' => $this->post('status_pembayaran')
        );

        $verif = $this->verify_request();
        if(isset($verif)){
            $insert = $this->m_payment->insertData($data);
            if ($insert){
                $this->response($data, 200);
            } else{
                $this->response(array('status' => 'fail', 502));
            }
        }
    }

    //edit status pembayaran
    function index_put($id) {

        // $id = $this->put('id_produk');
        
        $data = array(
            'id_produk'     => $id,
            'status_pembayaran' => $this->post('status_pembayaran')
        );

        $verif = $this->verify_request();
        if(isset($verif)){
            $update = $this->m_pembayaran->updateById($id, $data);

            if ($update) {
                $this->response($data, 200);
            } else {
                $this->response(array('status' => 'fail', 502));
            }
        }
    }
}