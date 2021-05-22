<?php

class M_admin_tryout_univ extends CI_Model {

    private $_table = 'Admin_tryout_univ';
    

    //Load Database
    public function _constuct(){
        $this->load->database();
    }

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

    function getPesertaTryout($admin_of){
        $sql = "SELECT User.username, Transaksi_tryout.*, Tryout.paket FROM User RIGHT JOIN Transaksi_tryout ON User.id_user = Transaksi_tryout.id_user RIGHT JOIN Tryout ON Transaksi_tryout.id_tryout = Tryout.id_tryout WHERE Transaksi_tryout.id_tryout = $admin_of
        ";
        // WHERE id_user in (select id_user from transaksi_tryout)";
        return $this->db->query($sql)->result();
    }

    function getTransaksiTryout($admin_of){
        $sql = "SELECT User.username, User.email, Transaksi_tryout.*, Tryout.paket FROM User RIGHT JOIN Transaksi_tryout ON User.id_user = Transaksi_tryout.id_user RIGHT JOIN Tryout ON Transaksi_tryout.id_tryout = Tryout.id_tryout WHERE Transaksi_tryout.id_tryout = $admin_of
        ";
        return $this->db->query($sql)->result();
    }

    function getTotalTransaksi($admin_of){
        //$sql = "SELECT SUM(harga)FROM tryout RIGHT JOIN transaksi_tryout ON tryout.id_tryout = transaksi_tryout.id_tryout";
        $sql = "SELECT SUM(harga)FROM Tryout RIGHT JOIN Transaksi_tryout ON Tryout.id_tryout = Transaksi_tryout.id_tryout WHERE Transaksi_tryout.status = 'approved' AND Transaksi_tryout.id_tryout = $admin_of";
        return $this->db->query($sql)->result();
    }
    
    function countJmlPesertaofStatus($status, $admin_of){
        $sql = "SELECT COUNT(id_transaksi_tryout) FROM Transaksi_tryout WHERE status = '$status' AND id_tryout = $admin_of";
        $jml_peserta = $this->db->query($sql)->result();
        $key = key($jml_peserta[0]);
        $jml = (int)$jml_peserta[0]->$key;
        return $jml;

    }

    function getStatusPeserta($admin_of){
        $jml_status = 4;
        $q_status = "SELECT DISTINCT status FROM Transaksi_tryout";
        $result_status = $this->db->query($q_status)->result();
        for($i = 0;$i < $jml_status; $i++){
            $jml_peserta = $this->countJmlPesertaofStatus($result_status[$i]->status , $admin_of);
            $paket = $result_status[$i]->status;
            $result_object = (object) array("status" => $paket, "jml_peserta" => (string)$jml_peserta);
            $result[$i] = $result_object;
        }

        return $result;
    }


    function getJmlPaket(){
        $jml = array();
        $q_jml_paket = "SELECT COUNT(paket) FROM Tryout"; //query jumlah paket
        $jml_paket = $this->db->query($q_jml_paket)->result(); //array of object jumlah paket
        $key = key($jml_paket[0]);
        //var_dump((int)$jml_paket[0]->$key);
        $jml = (int)$jml_paket[0]->$key; //get value of jml_paket
        //(int)array_values(get_object_vars($jml_paket[0]))[0]; //array jumlah paket to int jumlah paket
        //var_dump($jml);
        return $jml;
    }

    function countJmlPesertaofUniv($id_tryout){
        $sql = "SELECT COUNT(id_transaksi_tryout) FROM Transaksi_tryout WHERE id_tryout = $id_tryout";
        $jml_peserta = $this->db->query($sql)->result();
        $key = key($jml_peserta[0]);
        $jml = (int)$jml_peserta[0]->$key;
        return $jml;
    }

    function getUniversitasPeserta($admin_of){
        $q_paket = "SELECT penyelenggara,id_tryout from Tryout WHERE id_tryout = $admin_of";
        $result_paket = $this->db->query($q_paket)->result();
        $result = array();
        $jml_peserta = $this->countJmlPesertaofUniv($admin_of);
            $paket = $result_paket[0]->penyelenggara;
            $result_object = (object) array("univ" => $paket, "jml_peserta" => (string)$jml_peserta);
            $result[0] = $result_object;

        return $result;
    }

    function changePassword($id, $data){
        $this->db->where('id_admin_tryout_univ', $id);
        return $this->db->update($this->_table, $data);
    }

}