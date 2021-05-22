<?php

class M_tryout extends CI_Model {

    private $_table = 'Tryout';

    function __construct() 
    {
        $this->load->database();
    }

    function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    function getById($id)
    {
        $this->db->where('id_'.$this->_table, $id);
        return $this->db->get($this->_table)->result();
    }

    function insert($data)
    {
        return $this->db->insert($this->_table, $data);
    }

    function update($id, $data)
    {
        $this->db->where('id_'.$this->_table, $id);
        return $this->db->update($this->_table, $data);
    }

    function delete($id)
    {
        $this->db->where('id_'.$this->_table, $id);
        return $this->db->delete($this->_table);
    }
}