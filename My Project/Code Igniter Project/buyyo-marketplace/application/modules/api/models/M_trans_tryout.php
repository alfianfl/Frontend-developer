<?php

class M_trans_tryout extends CI_Model {

    private $_table = 'Transaksi_tryout';

    function __construct() 
    {
        $this->load->database();
    }

    function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    function getAllAccount()
    {
        $this->db->select('email, pass_rl');
        $this->db->join('User', $this->_table.'.id_user = User.id_user');
        return $this->db->get($this->_table)->result();
    }

    function getById($id)
    {
        $this->db->where('id_'.$this->_table, $id);
        return $this->db->get($this->_table)->result();
    }
    
    function getSearch($to, $user)
    {
        $this->db->where('id_tryout', $to);
        $this->db->where('id_user', $user);
        return $this->db->get($this->_table)->result();
    }

    function getMyTrans($user)
    {
        $this->db->select($this->_table.'.*');
        $this->db->select('Tryout.paket, Tryout.harga, Tryout.nama_rekening, Tryout.no_rekening, Tryout.nama_bank');
        $this->db->join('Tryout', $this->_table.'.id_tryout = Tryout.id_tryout');
        $this->db->where('id_user', $user);
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