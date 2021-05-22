<?php

class M_subs extends CI_Model {

    private $_table = 'Subcriber';

    //Load Database
    public function _constuct(){
        $this->load->database();
    }

    function insert($data){
        return $this->db->insert($this->_table, $data);
    }
}