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
        $this->load->helper(['jwt', 'authorization']);
    }

    public function index() 
    {
        $data['title'] = 'My Product';
        $token = $this->session->userdata('token');

        if (!isset($_GET['id'])){
            $url = $this->API . '/myproduct';
            $header = array(
                'Content-Type: application/json',
                'X-Authorization: '  . $token
            );
            $data['products'] = $this->mycurl->get($url, $header);
        } else {
            $id = $_GET['id'];
            $url = $this->API . '/myproduct/filter/id_kategori/' . $id;
            $header = array(
                'Content-Type: application/json',
                'X-Authorization: '  . $token
            );
            $data['products'] = $this->mycurl->get($url, $header);
        }
        
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

        $url = $this->API . '/category';
        $header = array('Content-Type: application/json');
        $data['category'] = $this->mycurl->get($url, $header);
          
        if (isset($data['products']['msg'])){
            $data['products'] = null;
        }

        $this->load->view('_partials/v_header', $data);
        $this->load->view('v_temp_home', $data);
        $this->load->view('_partials/v_footer', $data);
    }

    public function add_product()
    {
        $data['title'] = 'Add Product';
        $url = $this->API . '/category';
        $header = array('Content-Type: application/json');
        $data['category'] = $this->mycurl->get($url, $header);

        $data['jml'] = $this->session->userdata('jml');
        if (!$data['jml']) {
            $data['jml'] = 0;
        }

        $this->load->view('_partials/v_header', $data);
        $this->load->view('v_temp_add', $data);
        $this->load->view('_partials/v_footer', $data);
    }

    public function add_product_action()
    {
        $token = $this->session->userdata('token');
        $id = AUTHORIZATION::validateToken($token)->id_user;

        if (!is_dir('./upload/'. $id )) {
            mkdir('./upload/' . $id, 0777, TRUE);
        }

        $url = $this->API . '/product';
        $data = array(
            'nama_produk' => $this->input->post('nama_produk'),
            'ket_produk' => $this->input->post('ket_produk'),
            'id_kategori' => $this->input->post('id_kategori'),
            'harga_produk' => $this->input->post('harga_produk'),
            'stok_produk' => $this->input->post('stok_produk'),
            'gambar1' => $this->_uploadPict($id),
            // 'gambar2' =>
            // 'gambar3' =>
            'kondisi_produk' => $this->input->post('kondisi_produk')
        );
        $header = array(
            'Content-Type: application/json',
            'X-Authorization: '  . $token
        );

        $response = $this->mycurl->post($url, json_encode($data), $header);
        echo $response['msg'];

        redirect('merch/home/index');
    }

    public function update_product($id)
    {
        $url = $this->API . '/product/' . $id;
        $header = array('Content-Type: application/json');

        $data['product'] = $this->mycurl->get($url, $header);

        $url = $this->API . '/category';
        $data['category'] = $this->mycurl->get($url, $header);

        $data['jml'] = $this->session->userdata('jml');
        if (!$data['jml']) {
            $data['jml'] = 0;
        }

        $this->load->view('_partials/v_header', $data);
        $this->load->view('v_temp_update', $data);
        $this->load->view('_partials/v_footer', $data);
    }

    public function update_product_action()
    {
        $token = $this->session->userdata('token');
        $id = AUTHORIZATION::validateToken($token)->id_user;

        if (!empty($_FILES["gambar1"]["name"])) {
            $image = $this->_uploadPict($id);
        } else {
            $image = $this->input->post('old_gambar1');
        }

        $url = $this->API . '/product';
        $data = array(
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

        redirect('merch/home/index');
    }

    public function delete_product($id)
    {
        $token = $this->session->userdata('token');

        $url = $this->API . '/product/' . $id;
        $header = array(
            'Content-Type: application/json',
            'X-Authorization: '  . $token
        );

        $response = $this->mycurl->delete($url, $header);
        echo $response['msg'];

        redirect('merch/home/index');
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
    public function formdata()
    {
        $data['title'] = 'Add Product';
        $url = $this->API . '/category';
        $header = array('Content-Type: application/json');
        $data['category'] = $this->mycurl->get($url, $header);

        $data['jml'] = $this->session->userdata('jml');
        if (!$data['jml']) {
            $data['jml'] = 0;
        }

        $this->load->view('_partials/v_header', $data);
        $this->load->view('v_temp_form', $data);
        $this->load->view('_partials/v_footer', $data);
    }
}