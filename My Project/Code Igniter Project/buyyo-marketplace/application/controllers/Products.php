<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {
    public function product(){
        
        $this->load->view('product');
    }
   
}