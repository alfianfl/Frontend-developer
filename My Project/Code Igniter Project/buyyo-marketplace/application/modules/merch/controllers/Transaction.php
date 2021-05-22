<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction extends CI_Controller {

    var $API ="";

    function __construct() {
        parent::__construct();
        $this->API = base_url('api');
        $this->load->library('session');
        $this->load->library('mycurl');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper(['jwt', 'authorization']);
    }

    public function index()
    {
        $data['title'] = 'My Product';
        $token = $this->session->userdata('token');

        // if (!isset($_GET['id'])){
        //     $url = $this->API . '/myproduct';
        //     $header = array(
        //         'Content-Type: application/json',
        //         'X-Authorization: '  . $token
        //     );
        //     $data['products'] = $this->mycurl->get($url, $header);
        // } else {
        //     $id = $_GET['id'];
            $url = $this->API . '/transaction_crud';
            $header = array(
                'Content-Type: application/json',
                'X-Authorization: '  . $token
            );
            $data['transactions'] = $this->mycurl->get($url, $header);

            $url = $this->API . '/keranjang_crud';
            $header = array(
                'Content-Type: application/json',
                'X-Authorization: '  . $token
            );
            $data['carts'] = $this->mycurl->get($url, $header);
        // }
        $data['jml'] = $this->session->userdata('jml');
        if (!$data['jml']) {
            $data['jml'] = 0;
        }
        
        if ($token) {
            $data['user'] = AUTHORIZATION::validateToken($token)->username;
        } else {
            $data['user'] = 'Guest';
            redirect(base_url("customer/auth/login"));
        }

        // $url = $this->API . '/category';
        // $header = array('Content-Type: application/json');
        // $data['category'] = $this->mycurl->get($url, $header);
          
        if (isset($data['transactions']['msg'])){
            $data['transactions'] = null;
        }
        if (isset($data['cart']['msg'])){
            $data['carts'] = null;
        }

        // echo var_dump($data['transactions']);
        $this->load->view('_partials/v_header', $data);
        $this->load->view('v_list_transaction', $data);
        $this->load->view('_partials/v_footer', $data);
    }

    public function pay_now($id) {
        $token = $this->session->userdata('token');
        $url = $this->API . '/transaction_crud?id_transaksi=' . $id;
        $header = array(
            'Content-Type: application/json',
            'X-Authorization: '  . $token
        );
        $data = $this->mycurl->get($url, $header);

        $url = $this->API . '/history_log';
        $data = array(
            'id_transaksi' => $data[0]['id_transaksi'],
            'id_keranjang' => $data[0]['id_keranjang'],
            'kuantitas' => $data[0]['kuantitas'],
            'waktu' => $data[0]['waktu'],
            'catatan' => $data[0]['catatan'],
            'id_produk' => $data[0]['id_produk'],
            'customer' => $data[0]['customer']
        );
        $this->mycurl->post($url, json_encode($data), $header);

        $this->not_pay($id);

        redirect('merch/transaction/index');
    }

    public function not_pay($id) {
        $token = $this->session->userdata('token');

        $url = $this->API . '/transaction_crud/' . $id;
        $header = array(
            'Content-Type: application/json',
            'X-Authorization: '  . $token
        );

        $response = $this->mycurl->delete($url, $header);

        redirect('merch/transaction/index');
    }
}