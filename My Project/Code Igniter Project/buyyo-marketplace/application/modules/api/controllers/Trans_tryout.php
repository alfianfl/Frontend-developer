<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");

class Trans_tryout extends REST_Controller {

    function __construct($config = 'rest') 
    {
        parent::__construct($config);
        $this->load->helper(['jwt', 'authorization']);
        $this->load->helper('string');
        $this->load->model('m_trans_tryout');
        $this->load->model('m_user');
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
            $data = $this->m_trans_tryout->getAll();
        } else {
            $data = $this->m_trans_tryout->getById($id);
        }
        $this->response($data, 200);
    }

    // Mencari nama produk di search bar
    function search_get() 
    {
        $to = $this->get('tryout');
        $user = $this->get('user');
        if ($to == '' || $user == '') {
            $data = $this->m_trans_tryout->getAll();
        } else {
            $data = $this->m_trans_tryout->getSearch($to, $user);
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
        $auth = $this->verify_request();
        if (isset($auth)){
            $status = parent::HTTP_OK;
            $user = $auth->id_user;
            
            $data = $this->m_trans_tryout->getMyTrans($user);
            
            foreach($data as $item){
                $item->w_beli = strtotime($item->insert_on) + 24 * 60 *60;
                $item->w_sekarang = time();
                $item->sisa = $item->w_beli - $item->w_sekarang;
                if ($item->sisa<0 && $item->status != 'Approved'){
                    $item->status = 'Rejected';
                    $dataReject = array(
                        'id_transaksi_tryout'   => $item->id_transaksi_tryout,
                        'status'                => 'Rejected'
                    );
                    $this->index_put($item->id_transaksi_tryout, $dataReject);
                }
                
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
                $data = $this->m_trans_tryout->getMyAll($user, $cat, $page);
            } else {
                $data = $this->m_trans_tryout->getMyWhere($user, $field, $item);
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
                'uniq_num'    => $this->post('uniq_num'),
                'id_tryout'   => $this->post('id_tryout'),
                'id_user'     => $user
            );

            $insert = $this->m_trans_tryout->insert($data);

            if ($insert) {
                $this->response(array("msg" => "Buy Tryout's Ticket Success!"), $status);
            } else {
                $this->response(array('status' => 'fail', 502));
            }
        }

    }

    //Memperbarui data produk yang telah ada
    private function index_put($id, $data) {

        $auth = $this->verify_request();
        if (isset($auth)){
            $status = parent::HTTP_OK;
            $user = $auth->id_user;
        
            // $id = $this->put('id_tryout');
            
            // $data = array(
            //     'id_transaksi_tryout'   => $id,
            //     'bukti'                 => $bukti,
            //     'status'                => $status
            // );

            $update = $this->m_trans_tryout->update($id, $data);

            if ($update) {
                $this->response(array("msg" => "Update Tryout Transaction Success!"), $status);
            } else {
                $this->response(array('status' => 'fail', 502));
            }
        }
    }

    function upload_bukti_put(){
        $id = $this->put('id_transaksi_tryout');
        $data = array(
            'id_transaksi_tryout'   => $id,
            'bukti'                 => $this->put('bukti'),
        );
        $this->index_put($id, $data);
    }

    function verify_trans_put(){
        $id = $this->put('id_transaksi_tryout');
        $data = array(
            'id_transaksi_tryout'   => $id,
            'status'                => $this->put('status')
        );
        $this->index_put($id, $data);
    }

    function remind_count_put(){
        $id = $this->put('id_transaksi_tryout');
        $data = array(
            'id_transaksi_tryout'   => $id,
            'remind_count'          => $this->put('remind_count')
        );
        $this->index_put($id, $data);
    }

    //Menghapus salah satu data produk
    function index_delete($id) {

        // $id = $this->delete('id_produk');
        
        $auth = $this->verify_request();
        if (isset($auth)){
            
            $delete = $this->m_trans_tryout->delete($id);
        
            if ($delete) {
                $this->response(array("msg" => "Delete Product Success!"), 201);
            } else {
                $this->response(array('status' => 'fail', 502));
            }
        }
    }

    // generate readylearn account
    function readylearn_get() {
        
        $to = $this->get('id_transaksi_tryout');
        $auth = $this->verify_request();
        if (isset($auth)){
            $status = parent::HTTP_OK;
            $user = $auth->id_user;

            $account = $this->m_user->getById($user);
            $data = $this->m_trans_tryout->getById($to);

            if ($account) {
                $dataRl = array(
                    "email"     => $account[0]->email,
                    "password"  => $data[0]->pass_rl
                );
                $this->response(array(
                    "msg" => "Get Readylearn Account Success!", 
                    "data"=> $dataRl
                ), $status);
            } else {
                $this->response(array('status' => 'fail', 502));
            }
        }
    }

    // make readylearn account
    function readylearn_put(){
        $id = $this->put('id_transaksi_tryout');
        $data = array(
            'id_transaksi_tryout'   => $id,
            'pass_rl'                 => $id.random_string('alnum', 12)
        );
        $this->index_put($id, $data);
    }

    // get token
    function test_get(){
        $token = AUTHORIZATION::generateToken([
            'id_user'  => 34,
            'username' => 'Budiyana'
        ]);
        $status = parent::HTTP_OK;
        $response = ['status' => $status, 'token' => $token];
        $this->response($response, $status);
    }

    // Menampilkan semua produk berdasarkan kategori
    function account_get($id = '')
    {
        $data = $this->m_trans_tryout->getAllAccount();
        $this->response($data, 200);
    }

}