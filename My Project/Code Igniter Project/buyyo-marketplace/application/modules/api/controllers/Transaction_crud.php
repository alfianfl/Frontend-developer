<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST");


class Transaction_crud extends REST_Controller{
    function __construct($config = 'rest'){
        parent::__construct($config);
        $this->load->helper(['jwt', 'authorization']);
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

    //menampilkan data transaksi
    function index_get(){
        $id = $this->get('id_transaksi');
        $auth = $this->verify_request();
        if (isset($auth)){
            $status = parent::HTTP_OK;
            $user = $auth->id_user;
            
            if ($id == '') {
                $data = $this->m_transaksi->getAll($user);
            } else {
                $data = $this->m_transaksi->getById($id);
            }

            if (empty($data)){
                $this->response(array("msg" => "No Product Found!"), 404);
            } else {
                $this->response($data, $status);
            }
        }
    }

    function index_delete($id){

        $auth = $this->verify_request();
        if (isset($auth)){
            
            $delete = $this->m_transaksi->delete($id);
        
            if ($delete) {
                $this->response(array("msg" => "Delete Transaction Success!"), 201);
            } else {
                $this->response(array('status' => 'fail', 502));
            }
        }
    }

    function test_get(){
        $id = 1;

        $idPembayaran = $this->m_transaksi->getIdPembayaran($id);
        $idKeranjang = $this->m_transaksi->getIdKeranjang($id);

       $this->response($idPembayaran, 200);
    }

    function keranjang_post(){
        $verif = $this->verify_request();
        if(isset($verif)){
            $user = $verif->id_user;
            $username = $verif->username;
            $time = time();
            $data = array(
                'id_user' => $user,
                'id_keranjang' => substr($username,0,3).substr($time,6,9)
            );

            $insert = $this->m_transaksi->insertDataKeranjang($data);

            if ($insert){
                $this->response($data['id_keranjang'], 200);
            } else{
                $this->response(array('status' => 'fail', 502));
            }
        }
    }


    function transaksi_post(){
        $verif = $this->verify_request();
        if(isset($verif)){
            $user = $verif->id_user;
            $data = array(
                'customer' => $user,
                'id_keranjang' => $this->post('id_keranjang'),
                'kuantitas' => $this->post('kuantitas'),
                'catatan' => $this->post('catatan'),
                'id_produk' => $this->post('id_produk'),
            );
            $insert =  $this->m_transaksi->insertDataTransaksi($data);

            if ($insert){
                $this->response($data, 200);
            } else{
                $this->response(array('status' => 'transaksi fail', 502));
            }
        }
    }

    function pembayaran_post(){
        $verif = $this->verify_request();
        if(isset($verif)){
            $user = $verif->id_user;
            $data = array(
                'customer' => $user,
                'metode_pembayaran' => $this->post('metode_pembayaran'),
                'id_keranjang' => $this->post('id_keranjang'),
            );
            $insert =  $this->m_transaksi->insertDataPembayaran($data);
            if ($insert){
                $this->response($data, 200);
            } else{
                $this->response(array('status' => 'Pembayaran fail', 502));
            }


        }
    }

    //menambah transaksi baru
    function index_post(){
        $verif = $this->verify_request();
        if(isset($verif)){
            $user = $verif->id_user;
            //pembayaran
            $datapembayaran = array(
                'metode_pembayaran' => $this->post('metode_pembayaran')
            );
            $insertpembayaran = $this->m_transaksi->insertDataPembayaran($datapembayaran);

            if ($insertpembayaran){
                $this->response($datapembayaran, 200);
            } else{
                $this->response(array('status' => 'pembayaran fail', 502));
            }

            $id_pembayaran = $this->m_transaksi->getIdPembayaran($user);

            //keranjang
            $datakeranjang = array(
                'customer' => $user,
                'id_pembayaran' => $id_pembayaran
            );

            $insertkeranjang =  $this->m_transaksi->insertDataKeranjang($datakeranjang);

            if ($insertkeranjang){
                $this->response($datakeranjang, 200);
            } else{
                $this->response(array('status' => 'keranjang fail', 502));
            }

            $id_keranjang = $this->m_transaksi->getIdKeranjang($user);

            //transaksi
            $datatransaksi = array(
                'kuantitas' => $this->post('kuantitas'),
                'catatan' => $this->post('catatan'),
                'id_produk' => $this->post('id_produk'),
                'customer' => $user,
                'id_keranjang' => $id_keranjang
            );
            
            $inserttransaksi =  $this->m_transaksi->insertDataTransaksi($datatransaksi);

            if ($inserttransaksi){
                $this->response($datatransaksi, 200);
            } else{
                $this->response(array('status' => 'transaksi fail', 502));
            }
        }
    }

}