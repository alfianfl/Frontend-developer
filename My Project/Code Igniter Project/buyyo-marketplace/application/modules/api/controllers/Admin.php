<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST");

class Admin extends REST_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(['jwt', 'authorization']);
        $this->load->model('m_admin');
        $this->load->model('m_product'); 
        $this->load->helper('string');
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

    // Login Admin
    public function login_post()
    {

        $username = $this->post('username');
        $password = $this->post('password');

        // Check with username or with email
        $admin = $this->m_admin->login_check($username);

        if ( $admin->num_rows() > 0){

            // Check password
            $admin = $admin->row();
            $check = $this->m_admin->valid_password(array('hash'=> substr(hash('sha256', $admin->salt . $password), 0, 45)))->num_rows();
    
            if ($check > 0) {
                $token = AUTHORIZATION::generateToken([
                    'id_admin'  => $admin->id_admin,
                    'username' => $username
                ]);
                $status = parent::HTTP_OK;
                $response = ['status' => $status, 'admintoken' => $token];
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

    //Memperbarui data produk yang telah ada
    function produk_put() {

        $auth = $this->verify_request();
        if (isset($auth)){
            $status = parent::HTTP_OK;

            $user = $this->put('merchant');
            $id = $this->put('id_produk');
            
            $data = array(
                'id_produk'     => $id,
                'nama_produk'   => $this->put('nama_produk'),
                'ket_produk'    => $this->put('ket_produk'),
                'id_kategori'   => $this->put('id_kategori'),
                'harga_produk'  => $this->put('harga_produk'),
                'stok_produk'   => $this->put('stok_produk'),
                'gambar1'       => $this->put('gambar1'),
                'kondisi_produk'=> $this->put('kondisi_produk'),
                'merchant'       => $user

            );

            $update = $this->m_product->update($id, $data);

            if ($update) {
                $this->response(array("msg" => "Update Product Success!"), $status);
            } else {
                $this->response(array('status' => 'fail', 502));
            }
        }
    }

    //Menghapus salah satu data produk
    function produk_delete($id) {

        // $id = $this->delete('id_produk');
        
        $auth = $this->verify_request();
        if (isset($auth)){
            
            $delete = $this->m_product->delete($id);
        
            if ($delete) {
                $this->response(array("msg" => "Delete Product Success!"), 201);
            } else {
                $this->response(array('status' => 'fail', 502));
            }
        }
    }

    //GET history transaksi
    function transaksi_get(){
        $auth = $this->verify_request();
        if (isset($auth)){
            
            $data = $this->m_admin->getHistoryTransaksi();
        
            if ($data) {
                $this->response($data, 200);
            } else {
                $this->response(array('status' => 'fail', 502));
            }
        }
    }

    //GET List Merchant
    function merchant_get(){
        $auth = $this->verify_request();
        if (isset($auth)){
            
            $data = $this->m_admin->getMerchant();
        
            if ($data) {
                $this->response($data, 200);
            } else {
                $this->response(array('status' => 'fail', 502));
            }
        }

    }

}