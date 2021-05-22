<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tryout extends CI_Controller {

    var $API ="";

    function __construct() {
        parent::__construct();
        $this->API = base_url('api');
        $this->load->library('session');
        $this->load->library('mycurl');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('cookie');
        $this->load->helper(['jwt', 'authorization']);
        $this->load->model('api/m_subs');
    }

    public function details($id)
    {
        $data['title'] = "Buy-Yo!";
        if (!isset($_GET['type']) || !isset($_GET['search'])){
            $url = $this->API . '/product/';
        }else{
            $type = $_GET['type'];
            $search = $_GET['search'];
            $url = $this->API . '/product/search/'.$type.'/'.$search;
        }
        
        $header = array('Content-Type: application/json');

        $token = $this->session->userdata('token');

        if ($token) {
            $data['user'] = AUTHORIZATION::validateToken($token)->username;
        } else {
            $data['user'] = 'Guest';
        }

        $data['products'] = $this->mycurl->get($url, $header);
        $url = $this->API . '/category';
        $header = array('Content-Type: application/json');
        $data['category'] = $this->mycurl->get($url, $header);
        $data['merchant'] = $this->mycurl->get($this->API . '/merchant', $header);
        $data['jml'] = $this->session->userdata('jml');
        if (!$data['jml']) {
            $data['jml'] = 0;
        }

        // List Produk Tryout
        $data['list_to'] = $this->mycurl->get($this->API . '/tryout', $header);
        // Detail Paket Tryout
        $data['tryout'] = $this->mycurl->get($this->API . '/tryout/'.$id, $header);

        $this->load->view('_partials/v_header', $data);
        $this->load->view('v_temp_details', $data);
        $this->load->view('_partials/v_footer', $data);

    }

    public function do_payment($id){
        $token = $this->session->userdata('token');
        $header = array('Content-Type: application/json', 'X-Authorization: ' . $token);

        if ($token) {
            $data['user'] = AUTHORIZATION::validateToken($token)->username;
            $user = AUTHORIZATION::validateToken($token)->id_user;
            
            $dataSend = array(
                'uniq_num'  => rand(111, 999),
                'id_tryout' => $id
            );
            $send = $this->mycurl->post($this->API . '/trans_tryout', json_encode($dataSend), $header);

            if ($send){
                redirect(base_url()."customer/tryout/payment/".$id);
            } else {
                echo "Something Wrong";
            }            
            
        } else {
            $data['user'] = 'Guest';
            redirect(base_url().'customer/auth/login');
        }
    }
    
    public function payment($id)
    {
        $data['title'] = "Pembayaran";

        $header = array('Content-Type: application/json');
        if (!isset($_GET['type']) || !isset($_GET['search'])){
            $url = $this->API . '/product/';
        }else{
            $type = $_GET['type'];
            $search = $_GET['search'];
            $url = $this->API . '/product/search/'.$type.'/'.$search;
        }

        $token = $this->session->userdata('token');
        if ($token) {
            $data['user'] = AUTHORIZATION::validateToken($token)->username;
            $user = AUTHORIZATION::validateToken($token)->id_user;
        } else {
            $data['user'] = 'Guest';
            $this->session->set_userdata('referred_from', current_url());
            redirect(base_url().'customer/auth/login');
        }        

        $data['products'] = $this->mycurl->get($url, $header);
        $data['category'] = $this->mycurl->get($this->API . '/category', $header);
        $data['merchant'] = $this->mycurl->get($this->API . '/merchant', $header);
        // Detail Paket Tryout
        $data['tryout'] = $this->mycurl->get($this->API . '/tryout/'.$id, $header)[0];
        $data['trans'] = $this->mycurl->get($this->API . '/trans_tryout/search?tryout='.$id.'&user='.$user, $header)[0];

        $data['jml'] = $this->session->userdata('jml');
        if (!$data['jml']) {
            $data['jml'] = 0;
        }
        
        $this->load->view('_partials/v_header', $data);
        $this->load->view('v_temp_payment', $data);
        $this->load->view('_partials/v_footer', $data);
    }

    public function paymentStatus()
    {
        $data['title'] = "List Transaksi";
        if (!isset($_GET['type']) || !isset($_GET['search'])){
            $url = $this->API . '/product/';
        }else{
            $type = $_GET['type'];
            $search = $_GET['search'];
            $url = $this->API . '/product/search/'.$type.'/'.$search;
        }
        
        $header = array('Content-Type: application/json');

        $token = $this->session->userdata('token');

        if ($token) {
            $data['user'] = AUTHORIZATION::validateToken($token)->username;
        } else {
            $data['user'] = 'Guest';
            redirect(base_url().'customer/auth/login');
        }

        $data['products'] = $this->mycurl->get($url, $header);
        
        $url = $this->API . '/category';
        $header = array('Content-Type: application/json');
        $data['category'] = $this->mycurl->get($url, $header);

        $data['merchant'] = $this->mycurl->get($this->API . '/merchant', $header);

        $data['jml'] = $this->session->userdata('jml');

        if (!$data['jml']) {
            $data['jml'] = 0;
        }

        $header = array('Content-Type: application/json', 'X-Authorization: ' . $token);
        $data['my_trans'] = $this->mycurl->get($this->API . '/trans_tryout/my', $header);

        $this->load->view('_partials/v_header', $data);
        $this->load->view('v_temp_payment-status', $data);
        $this->load->view('_partials/v_footer', $data);

        // echo var_dump( $data['user'] );
    }

    public function _uploadBukti($id){
        $this->load->library('upload');

        $dir = './upload/' . $id . '/';
        if(!is_dir($dir)){
            mkdir($dir, 0777, true);
            $config['upload_path'] = $dir;
        } else{
            $config['upload_path'] = $dir;
        }
        $config['allowed_types']        = 'gif|jpg|jpeg|png';
        $config['file_name']            = $id . time();
		$config['overwrite']			= true;

        $this->upload->initialize($config);

        if ($this->upload->do_upload('bukti'))
        {
            $this->_resizeBukti($dir, $this->upload->data("file_name"));
            return $this->upload->data("file_name");
        } else {
            return $this->upload->display_errors();
        }
    }

    public function _resizeBukti($path, $filename){
        $this->load->library('image_lib');

        $config['image_library']    = 'gd2';
        $config['overwrite']		= TRUE;
        $config['maintain_ratio']   = TRUE;
        $config['source_image']     = $path . $filename;
        $config['width']            = 900;
        
        $this->image_lib->clear();
        $this->image_lib->initialize($config);

        if ( ! $this->image_lib->resize()){
            return $this->image_lib->display_errors();
        }

    }

    public function uploadBuktiAction(){
        $token = $this->session->userdata('token');
        $id = $this->input->post('id_user');
        $id_transaksi = $this->input->post('id_transaksi_tryout');
        $image = $this->_uploadBukti($id);

        $url = $this->API . '/trans_tryout/upload_bukti';
        $data = array(
            'id_transaksi_tryout'   => $id_transaksi,
            'bukti'                 => $image,
        );
        $header = array(
            'Content-Type: application/json',
            'X-Authorization: '  . $token
        );

        $response = $this->mycurl->put($url, json_encode($data), $header);
        echo $response['msg'];
        $url = $this->API . '/trans_tryout/' . $id_transaksi;
        $trans = $this->mycurl->get($url, $header)[0];
        $bukti = $trans['bukti'];

        if($bukti != NULL){
            $url = $this->API . '/trans_tryout/verify_trans';
            $dataSend = array(
                'id_transaksi_tryout'   => $id_transaksi,
                'status'                => "Checking"
            );
            $send = $this->mycurl->put($url, json_encode($dataSend), $header);
        }

        if ($send){
            redirect('customer/tryout/paymentStatus');
        } else {
            echo "Something Wrong";
        } 
    }
}