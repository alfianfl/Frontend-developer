<?php

class M_admin extends CI_Model {

    private $_table = 'Admin';
    private $_transaksi = 'History_transaksi';
    private $_merchant = 'User';
    

    //Load Database
    public function _constuct(){
        $this->load->database();
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


    //GET history table
    function getHistoryTransaksi(){
        return $this->db->get($this->_transaksi)->result();
    }

    //GET Merchant
    function getMerchant(){
        $sql = "SELECT * FROM User WHERE nama_merchant IS NOT NULL";
        return $this->db->query($sql)->result();
    }

}