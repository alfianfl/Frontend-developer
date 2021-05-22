<?php

class M_transaksi extends CI_Model{

    private $_table = 'Transaksi';

    //Load Database
    public function _construct(){
        $this->load->database();
    }

    //-----CRUD-----
    //GET
    function getAll($user){
        $this->db->join('Produk', 'Produk.id_produk = ' .  $this->_table . '.id_produk');
        $this->db->join('User', 'User.id_user = ' .  $this->_table . '.customer');
        $this->db->where('merchant', $user);
        return $this->db->get($this->_table)->result();
    }

    function getById($id){
        $this->db->where('id_transaksi', $id);
        return $this->db->get($this->_table)->result();
    }

    function getIdPembayaran($id){
        $this->db->select('id_pembayaran');
        $this->db->where('id_user', $id);
        return $this->db->get('Pembayaran')->result();
    }

    function getIdKeranjang($id){
        $this->db->select('id_keranjang');
        $this->db->where('id_user', $id);
        return $this->db->get('Keranjang')->result();
    }

    //POST
    function insertDataPembayaran($datapembayaran){
        return $this->db->insert('Pembayaran', $datapembayaran);
    }

    function insertDataKeranjang($datakeranjang){
        return $this->db->insert('Keranjang', $datakeranjang);
    }

    function insertDataTransaksi($datatransaksi){
        return $this->db->insert('Transaksi', $datatransaksi);
    }

    //DELETE
    function delete($id)
    {
        $this->db->where('id_transaksi', $id);
        return $this->db->delete($this->_table);
    }
}