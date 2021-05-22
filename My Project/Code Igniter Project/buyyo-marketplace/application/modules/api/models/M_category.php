<?php

class M_category extends CI_Model {

    private $_table = 'Kategori';

    function __construct() 
    {
        $this->load->database();
    }

    function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    function getByName($name)
    {
        $this->db->where('nama_kategori', $name);
        return $this->db->get($this->_table)->result();
    }

    function insert($data)
    {
        return $this->db->insert($this->_table, $data);
    }
 
    function check($name)
    {
        $this->db->where('nama_kategori', $name);
        return $this->db->get($this->_table)->num_rows();
    }
}