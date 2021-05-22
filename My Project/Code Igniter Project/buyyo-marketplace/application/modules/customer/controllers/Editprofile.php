<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Editprofile extends CI_Controller {


    public function edit()
    {
       
        $this->load->view('v_temp_editprofile');
        $this->load->view('_partials/v_footer');
    }
    
   
}