<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TestCookie extends CI_Controller {
    var $API = "";

    function __construct() {
        parent::__construct();
        $this->API = base_url('api');
        $this->load->library('session');
        $this->load->library('mycurl');
        $this->load->library('curl');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('cookie');
        $this->load->helper(['jwt', 'authorization']);
    }

    public function index(){
        $this->load->view('v_testCookie');
    }

    public function post(){
        $url = $this->API . '/login';
        $header = array('Content-Type: application/json');

        $data['datapembayaran'] = $_COOKIE['datapembayaran'];
        $data['datakeranjang'] = $_COOKIE['datakeranjang'];
        $data['datatransaksi'] = $_COOKIE['datatransaksi'];
        
        $this->mycurl->post($url, json_encode($data), $header);
    }

    public function cookie_action(){
        $id_user = $this->input->post('id_user');
        $metode_pembayaran = $this->input->post('metode_pembayaran');
        $id_pembayaran = $this->input->post('id_pembayaran');
        $kuantitas = $this->input->post('kuantitas');
        $catatan = $this->input->post('catatan');
        $id_produk = $this->input->post('id_produk');
        $id_keranjang = $this->input->post('id_keranjang');

        $pembayaran = array(
            'metode_pembayaran' => $metode_pembayaran
        );
        
        $keranjang = array(
            'id_user' => $id_user,
            'id_pembayaran' => $id_pembayaran
        );
        
        $transaksi = array(
            'kuantitas' => $kuantitas,
            'catatan' => $catatan,
            'id_produk' => $id_produk,
            'id_user' => $id_user,
            'id_keranjang' => $id_keranjang
        );

        $data['pembayaran'] = $pembayaran;
        $data['keranjang'] = $keranjang;
        $data['transaksi'] = $transaksi;

        $this->load->view('v_testCookie', $data);
        

    }
}