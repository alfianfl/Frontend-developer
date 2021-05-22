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
    }

    public function index()
    {
        $token = $this->session->userdata('admintoken');
        
        if ($token) {
            $data['user'] = AUTHORIZATION::validateToken($token)->username;
            $this->produk();
        } else {
            $this->load->view('v_admin_login');
        }
    }

    public function produk(){
        $token = $this->session->userdata('admintoken');
        if ($token) {
            $url = $this->API . '/product';
            $header = array(
                'Content-Type: application/json',
                'X-Authorization: '  . $token
            );
            $data['products'] = $this->mycurl->get($url, $header);

        
            $data['user'] = AUTHORIZATION::validateToken($token)->username;
            $this->load->view('_partials/v_admin_header', $data);
            $this->load->view('v_admin_produk', $data);
        } else {
            $this->load->view('v_admin_login');
        }
    }

    public function update_product($id)
    {
        $token = $this->session->userdata('admintoken');
        if ($token) {
            $url = $this->API . '/product/' . $id;
            $header = array('Content-Type: application/json');

            $data['product'] = $this->mycurl->get($url, $header);

            $url = $this->API . '/category';
            $data['category'] = $this->mycurl->get($url, $header);

            
            $data['user'] = AUTHORIZATION::validateToken($token)->username;
            $this->load->view('_partials/v_admin_header', $data);
            $this->load->view('v_admin_update', $data);
        } else {
            $this->load->view('v_admin_login');
        }


    }

    public function update_product_action()
    {
        $token = $this->session->userdata('admintoken');
        if ($token) {
            $id =$this->input->post('merchant');

            if (!empty($_FILES["gambar1"]["name"])) {
                $image = $this->_uploadPict($id);
            } else {
                $image = $this->input->post('old_gambar1');
            }

            $url = $this->API . '/adminproduk';
            $data = array(
                'merchant' => $id,
                'id_produk' => $this->input->post('id_produk'),
                'nama_produk' => $this->input->post('nama_produk'),
                'ket_produk' => $this->input->post('ket_produk'),
                'id_kategori' => $this->input->post('id_kategori'),
                'harga_produk' => $this->input->post('harga_produk'),
                'stok_produk' => $this->input->post('stok_produk'),
                'gambar1' => $image,
                'kondisi_produk' => $this->input->post('kondisi_produk')
            );
            $header = array(
                'Content-Type: application/json',
                'X-Authorization: '  . $token
            );

            $response = $this->mycurl->put($url, json_encode($data), $header);
            echo $response['msg'];

            redirect('admin/home/produk');
        } else{
            $this->load->view('v_admin_login');
        }
    }

    public function delete_product($id)
    {
        $token = $this->session->userdata('admintoken');
        if($token){

            $url = $this->API . '/adminproduk/' . $id;
            $header = array(
                'Content-Type: application/json',
                'X-Authorization: '  . $token
            );

            $response = $this->mycurl->delete($url, $header);
            echo $response['msg'];

            redirect('admin/home/produk');
        } else{
            $this->load->view('v_admin_login');
        }
    }

    private function _uploadPict($id)
    {
        $this->load->library('upload');

        $config['upload_path']          = './upload/' . $id . '/';
        $config['allowed_types']        = 'gif|jpg|jpeg|png';
        $config['file_name']            = $id . time();
		$config['overwrite']			= true;
        $config['max_size']             = 1024;

        $this->upload->initialize($config);

        if ($this->upload->do_upload('gambar1'))
        {
            return $this->upload->data("file_name");
        } else {
            // return $this->input->post("old_file");
            return $this->upload->display_errors();
        }
    }

    public function transaksi(){
        $token = $this->session->userdata('admintoken');
        if($token){
            $url = $this->API . '/admintransaksi';
            $header = array(
                'Content-Type: application/json',
                'X-Authorization: '  . $token
            );
            $data['transactions'] = $this->mycurl->get($url, $header);
            
            $data['user'] = AUTHORIZATION::validateToken($token)->username;
    
            $this->load->view('_partials/v_admin_header', $data);
            $this->load->view('v_admin_transaksi', $data);
        } else{
            $this->load->view('v_admin_login');
        }
    }

    public function merchant(){
        $token = $this->session->userdata('admintoken');
        if ($token) {
            $url = $this->API . '/adminmerchant';
            $header = array(
                'Content-Type: application/json',
                'X-Authorization: '  . $token
            );
            $data['merchants'] = $this->mycurl->get($url, $header);
            
            
            $data['user'] = AUTHORIZATION::validateToken($token)->username;
            $this->load->view('_partials/v_admin_header', $data);
            $this->load->view('v_admin_merchant', $data);
        } else {
            $this->load->view('v_admin_login');
        }
    }
}