<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {
    
    var $API = "";

    function __construct(){
        parent::__construct();
        $this->API = base_url('api');
        $this->load->library('session');
        $this->load->library('curl');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('cookie');
    }

    public function transaksi(){
        
        $this->load->view('Customer/v_temp_transaksi');
    }

    public function dummyproductall(){
        $productdata['product'] = json_decode($this->curl->simple_get($this->API.'/product'));
        $this->load->view('v_temp_productall', $productdata);
    }

    public function dummyproduct(){
        $productdata['product'] = json_decode($this->curl->simple_get($this->API.'/product'));
        $this->load->view('v_temp_product', $productdata);
    }

    public function tambah_ke_keranjang(){

    }
   
}