<?php

class M_user extends CI_Model {

    private $_table = 'User';

    //Load Database
    public function _constuct(){
        $this->load->database();
        $this->load->model('m_product');
    }

    //CRUD
    function getAll(){
        return $this->db->get($this->_table)->result();
    }

    function getById($id){
        $this->db->where('id_user', $id);
        return $this->db->get($this->_table)->result();
    }
    
    function insertData($data){
        return $this->db->insert($this->_table, $data);
    }
    
    function updateById($id, $data){
        $this->db->where('id_user', $id);
        return $this->db->update($this->_table, $data);
    }

    //Authentication
    function login_check($username)
    {
        return $this->db
                        ->from($this->_table)
                        ->where('username', $username)
                        ->or_where('email', $username)
                        ->get();
    }

    function valid_password($where)
    {
        return $this->db
                        ->get_where($this->_table, $where);
    }

    function getMerch(){
        $this->db->select(['id_user','nama_merchant']);
        $this->db->where('nama_merchant is not NULL');
        return $this->db->get($this->_table)->result();
    }

    function getMerchByCategory($categories){
        $merchs = $this->m_product->getMerchByCategory($categories);
        $i = 0;
        $res = array();
        foreach ($merchs as $merch){
            // var_dump(get_object_vars($merch));
            $this->db->where_in('id_user', get_object_vars($merch));
            $query = $this->db->get($this->_table)->result();
            array_push($res, $query);
        }
        return $res;
    }

    function get_previous($data = array()){
        $this->db->select(['id_user', 'username']);
		$con = array(
		    // 'oauth_provider' => $data['oauth_provider'],
            // 'oauth_uid' => $data['oauth_uid']
            'email' => $data['email']
		);
		$this->db->where($con);
        $query = $this->db->get($this->_table);
        return $query;
    }

    function checkUser($data = array()){
		$query = $this->get_previous($data);
        $check = $query->num_rows();

		// Return check
        return $check;
    }
}