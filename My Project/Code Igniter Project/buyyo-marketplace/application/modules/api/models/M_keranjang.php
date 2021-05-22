<?php

class M_keranjang extends CI_Model {

    private $_table = 'Keranjang';

    //Load Database
    public function _constuct(){
        $this->load->database();
    }

    //-----CRUD-----
    //GET
    function getAll($user){
        $this->db->where('id_user', $user);
        return $this->db->get($this->_table)->result();
    }

    function getById($id){
        $this->db->where('id_keranjang', $id);
        return $this->db->get($this->_table)->result();
    }

    //POST
    function insertData($data){
        return $this->db->insert($this->_table, $data);
    }

    //PUT
    function updateById($id, $data){
        $this->db->where('id_keranjang', $id);
        return $this->db->update($this->_table, $data);
    }
}