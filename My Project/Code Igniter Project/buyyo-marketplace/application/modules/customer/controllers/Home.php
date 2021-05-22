<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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

        $this->load->library('google');
    }

    public function index()
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
        $data['tryouts'] = $this->mycurl->get($this->API . '/tryout', $header);

        $this->load->view('_partials/v_header', $data);
        $this->load->view('v_temp_merchcategory', $data);
        $this->load->view('_partials/v_footer', $data);
    }

    public function check_guest()
    {
        $token = $this->session->userdata('token');
        if ($token) {
            
            return 0;
        }
        else{
            $data['user'] = 'Guest';
            $this->load->view('v_temp_login');
            return 1;
        }

    }

    public function single($id)
    {
        $data['title'] = "Product";
        $url = $this->API . '/product/' . $id;
        $header = array('Content-Type: application/json');

        $data['product'] = $this->mycurl->get($url, $header);
        $data['merchant'] = $this->mycurl->get($this->API . '/merchant', $header);
        $token = $this->session->userdata('token');

        if ($token) {
            $data['user'] = AUTHORIZATION::validateToken($token)->username;
        } else {
            $data['user'] = 'Guest';
        }

        $url = $this->API . '/category';
        $header = array('Content-Type: application/json');
        $data['category'] = $this->mycurl->get($url, $header);
        $data['jml'] = $this->session->userdata('jml');
        if (!$data['jml']) {
            $data['jml'] = 0;
        }
        // $data['status'] = $this->check_guest();

        //echo var_dump($data['product']);
        $this->load->view('_partials/v_header', $data);
        $this->load->view('v_temp_single', $data);
        $this->load->view('_partials/v_footer', $data);
    }

    public function return_cart(){
        $chart = array();
        foreach ($_COOKIE as $key => $value){
            if (substr($key, 0, 9) == 'purchase_'){
                array_push($chart, json_decode($value, true));
            }
        }
        return $chart;
    }

    public function check_chart()
    {
        $data['chart'] = $this->return_cart();
        $data['total'] = 0;
        $data['jml']= 0;
        foreach ($data['chart'] as $item) {
            $data['total'] += $item['price']*$item['quantity'];
        }

        foreach ($data['chart'] as $item) {
            $data['jml'] += $item['quantity'];
        }
        $url = $this->API . '/category';
        $header = array('Content-Type: application/json');
        $data['category'] = $this->mycurl->get($url, $header);
        $data['merchant'] = $this->mycurl->get($this->API . '/merchant', $header);
        $this->session->set_userdata(array('jml'=>$data['jml']));

    $token = $this->session->userdata('token');

        if ($token) {
            $data['user'] = AUTHORIZATION::validateToken($token)->username;
            $this->load->view('_partials/v_header', $data);
            $this->load->view('v_temp_chart', $data);
            $this->load->view('_partials/v_footer', $data);
        } else {
            $data['user'] = 'Guest';
            redirect(base_url("customer/auth/login"));
        }

       

    }

    public function checkout()
    {
        $carts = $this->return_cart();
        $token = $this->session->userdata('token');

        if (!empty($carts)){
            $url = $this->API . '/transaction_crud/keranjang';
            $data = array(
                
            );
            $header = array('Content-Type: application/json', 'X-Authorization: ' . $token);
    
            $response = $this->mycurl->post($url, json_encode($data), $header);
    
            $url = $this->API . '/transaction_crud/transaksi';
            foreach($carts as $cart):
                $data = array(
                    'id_keranjang' => $response,
                    'kuantitas' => $cart['quantity'],
                    'catatan' => $cart['note'],
                    'id_produk' => $cart['id'],
                );
                $this->mycurl->post($url, json_encode($data), $header);
            endforeach;
    
            // $data['keranjang'] = $response;
    
            $token = $this->session->userdata('token');
    
            if ($token) {
                $data['user'] = AUTHORIZATION::validateToken($token)->username;
            } else {
                $data['user'] = 'Guest';
            }
    
            // echo var_dump($data['keranjang']);
            $this->wait_order($response);
            // Ketika beck checkout di ulang
        } else {
            redirect(base_url());
        }
    }

    public function wait_order($cart){
        $token = $this->session->userdata('token');

        if ($token) {
            $data['user'] = AUTHORIZATION::validateToken($token)->username;
        } else {
            $data['user'] = 'Guest';
        }
        $data['keranjang'] = $cart;
        $data['jml'] = $this->session->userdata('jml');
        if (!$data['jml']) {
            $data['jml'] = 0;
        }
        $url = $this->API . '/category';
        $header = array('Content-Type: application/json');
        $data['category'] = $this->mycurl->get($url, $header);
        $data['merchant'] = $this->mycurl->get($this->API . '/merchant', $header);

        $this->load->view('_partials/v_header', $data);
        $this->load->view('v_temp_order', $data);
        $this->load->view('_partials/v_footer', $data);
    }

    public function pembayaran(){
        $token = $this->session->userdata('token');

        $url = $this->API . '/transaksi_crud/pembayaran';
        $data = array(
            'metode_pembayaran' => $this->input->post('metode_pembayaran'),
            'id_keranjang' => $this->input->post('id_keranjang'),
        );
        $header = array('Content-Type: application/json', 'X-Authorization: ' . $token);

        $response = $this->mycurl->post($url, json_encode($data), $header);

        if ($response){
            echo "Success";
        } else{
            echo "Fail";
        }
    }

    public function profile(){
        $this->load->view('v_temp_profile');
    }
    public function cooming_soon(){
        $this->load->view('_partials/v_cooming_soon');
    }

    public function add_subscriber(){
        $email = $this->input->post('email');
        $data = array('email'=>$email);
        
        $subs = $this->m_subs->insert($data);
        if($subs) {
            echo 'Sukses';
        } else {
            echo 'Gagal';
        }
    }   

    public function profile_action(){
        $token = $this->session->userdata('token');
        $id = AUTHORIZATION::validateToken($token)->id_user;

        $url = $this->API . '/user_crud';
        $data = array(
            'nama_user' => $this->input->post('nama_user'),
            'nama_merchant' => $this->input->post('nama_merchant'),
            'alamat' => $this->input->post('alamat'),
            'alamat_pengiriman' => $this->input->post('alamat_pengiriman'),
            'alamat_penjemputan' => $this->input->post('alamat_penjemputan'),
            'foto' => $this->_uploadPict($id),
            'no_hp' => $this->input->post('no_hp')
            
        );
        $header = array('Content-Type: application/json', 'X-Authorization: ' . $token);

        $response = $this->mycurl->put($url, json_encode($data), $header);

        echo var_dump($response);

    }

    // public function redirect_guest($status){
    //     if($status){
    //         $data['user'] = 'Guest';
    //         $this->load->view('v_temp_login');
    //     }
    // }

    private function _uploadPict($id)
    {
        $this->load->library('upload');

        $config['upload_path']          = './upload/' . $id . '/';
        $config['allowed_types']        = 'gif|jpg|jpeg|png';
        $config['file_name']            = 'foto';
        $config['overwrite']            = true;
        $config['max_size']             = 1024;

        $this->upload->initialize($config);

        if ($this->upload->do_upload('foto'))
        {
            return $this->upload->data("file_name");
        } else {
            // return $this->input->post("old_file");
            return $this->upload->display_errors();
        }
    }
    
    public function category(){
        
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

        $this->load->view('_partials/v_header', $data);
        $this->load->view('v_temp_merchcategory', $data);
        $this->load->view('_partials/v_footer', $data);
    }
    
    public function list(){
        $data['title'] = "Buy-Yo!";
        if (!isset($_GET['type']) || !isset($_GET['search'])){
            $url = $this->API . '/product/';
        }else{
            $type = $_GET['type'];
            $search = $_GET['search'];
            $url = $this->API . '/product/search/'.$type.'/'.$search;
        }
        $data['chart'] = $this->return_cart();
        $data['jml']= 0;
        foreach ($data['chart'] as $item) {
            $data['jml'] += $item['quantity'];
        }
        $this->session->set_userdata(array('jml'=>$data['jml']));
        
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

        $this->load->view('_partials/v_header', $data);
        $this->load->view('v_temp_listproduk', $data);
        $this->load->view('_partials/v_footer', $data);
    }

    public function offline(){
        $this->load->view('v_temp_offline');
    }
    public function edit()
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

        $this->load->view('_partials/v_header', $data);
        $this->load->view('v_temp_editprofile', $data);
        $this->load->view('_partials/v_footer', $data);
    }
}
