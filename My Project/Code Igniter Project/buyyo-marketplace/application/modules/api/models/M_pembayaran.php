<?php

class M_Payment extends CI_Model{

    private $_table = 'Pembayaran';

    //Load Database
    public function _construct(){
        $this->load->database();
    }

    //-----CRUD-----
    //GET
    function getAll(){
        return $this->db->get($this->_table)->result();
    }

    function getById($id){
        $this->db->where('id_pembayaran', $id);
        return $this->db->get($this->_table)->result();
    }

    //POST
    function insertData($data){
        return $this->db->insert($this->_table, $data);
    }

    //PUT
    function updateById($id, $data){
        $this->db->where('id_pembayaran', $id);
        return $this->db->update($this->_table, $data);
    }
}