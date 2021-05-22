<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {
    
    var $API = "";

    function __construct(){
        parent::__construct();
        $this->API = base_url('api');
        $this->load->library('session');
        $this->load->library('curl');
        $this->load->library('mycurl');
        $this->load->helper('form');
        $this->load->helper('url');
    }

    public function product(){
        
        $this->load->view('product');
    }

    public function dummyproduct(){
        $url = $this->API . '/product';
        $header = array('Content-Type: application/json');

        $productdata['product'] = $this->mycurl->get($url, $header);
        $this->load->view('v_temp_productall', $productdata);
        
    }

    public function tambah_ke_keranjang(){
        if($this->session->userdata('token')) {
            $this->load->view('v_temp_login');
        } 

    }
   
}