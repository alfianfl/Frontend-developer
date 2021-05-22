<?php

class M_product extends CI_Model {

    private $_table = 'Produk';

    function __construct() 
    {
        $this->load->database();
    }

    // function getAll()
    // {
    //     return $this->db->get($this->_table)->result();
    // }

    // function getById($id)
    // {
    //     $this->db->where('id_produk', $id);
    //     return $this->db->get($this->_table)->result();
    // }

    // function insert($data)
    // {
    //     return $this->db->insert($this->_table, $data);
    // }

    // function update($id, $data)
    // {
    //     $this->db->where('id_produk', $id);
    //     return $this->db->update($this->_table, $data);
    // }

    // function delete($id)
    // {
    //     $this->db->where('id_produk', $id);
    //     return $this->db->delete($this->_table);
    // }

    function getAll()
    {
        $this->db->join('Kategori', 'Produk.id_kategori = Kategori.id_kategori');
        $this->db->join('User', 'User.id_user = ' . $this->_table . '.merchant');
        // $this->db->select(['id_produk', 'nama_produk', 'harga_produk', 'gambar1', 'nama_kategori', 'id_user']);
        // $this->db->order_by('nama_kategori ASC, nama_produk ASC');
        return $this->db->get($this->_table)->result();
    }

    function getById($id)
    {
        $this->db->join('Kategori', 'Produk.id_kategori = Kategori.id_kategori');
        $this->db->where('id_produk', $id);
        return $this->db->get($this->_table)->result();
    }

    function getWhere($field, $item)
    {
        $this->db->join('Kategori', 'Produk.id_kategori = Kategori.id_kategori');
        $this->db->join('User', 'User.id_user = ' . $this->_table . '.merchant');
        // $this->db->select(['id_produk', 'nama_produk', 'harga_produk', 'gambar1', 'Produk.id_kategori',  'nama_kategori', 'id_user']);
        $this->db->like($field, $item, 'both');
        return $this->db->get($this->_table)->result();
    }

    function getCategory($user)
    {
        $this->db->join('Kategori', 'Produk.id_kategori = Kategori.id_kategori');
        $this->db->where('merchant', $user);
        // $this->db->select(['Kategori.id_kategori', 'nama_kategori']);
        $this->db->group_by('nama_kategori');
        return $this->db->get($this->_table)->result();
    }

    function getMerchByCategory($categories)
    {
        $this->db->where('id_kategori', $categories);
        $this->db->distinct();
        $this->db->select('merchant');
        $query = $this->db->get($this->_table);
        $ret = $query->result();
        return $ret;
    }

    function getMyAll($user, $cat, $page)
    {
        if (empty($page)){
            $page = 1;
        }

        if (!empty($cat)){
            $this->db->where('nama_kategori', $cat);
            $this->db->or_where('Produk.id_kategori', $cat);
        }

        $item = 20;
        $offset = ($page - 1) * $item;

        $this->db->join('Kategori', 'Produk.id_kategori = Kategori.id_kategori');
        // $this->db->select(['id_produk', 'nama_produk', 'nama_kategori', 'ket_produk', 'harga_produk', 'stok_produk']);
        $this->db->limit($item, $offset);
        $this->db->where('merchant', $user);
        return $this->db->get($this->_table)->result();
    }

    function getMyById($user, $id)
    {
        $this->db->where('id_produk', $id);
        $this->db->where('merchant', $user);
        return $this->db->get($this->_table)->result();
    }
 
    function insert($data)
    {
        return $this->db->insert($this->_table, $data);
    }

    function getMyWhere($user, $field, $item)
    {
        // if (empty($page)){
        //     $page = 1;
        // }

        // $item = 20;
        // $offset = ($page - 1) * $item;

        $this->db->join('Kategori', 'Produk.id_kategori = Kategori.id_kategori');
        // $this->db->select(['id_produk', 'nama_produk', 'nama_kategori', 'ket_produk', 'harga_produk', 'stok_produk']);
        $this->db->where('merchant', $user);
        $this->db->like('Produk.' . $field, $item, 'both');
        // $this->db->limit($item, $offset);
        return $this->db->get($this->_table)->result();
    }

    function update($id, $data)
    {
        $this->db->where('id_produk', $id);
        return $this->db->update($this->_table, $data);
    }

    function delete($id)
    {
        $this->db->where('id_produk', $id);
        return $this->db->delete($this->_table);
    }
}