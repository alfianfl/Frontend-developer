<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {
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

    public function Searchmenu()
    {
        $url = $this->API . '/product';
        $header = array('Content-Type: application/json');

        $token = $this->session->userdata('token');

        if ($token) {
            $data['user'] = AUTHORIZATION::validateToken($token)->username;
        } else {
            $data['user'] = 'Guest';
        }

        $data['products'] = $this->mycurl->get($url, $header);
    
        $this->load->view('v_temp_search',$data);
            }
    
   
}