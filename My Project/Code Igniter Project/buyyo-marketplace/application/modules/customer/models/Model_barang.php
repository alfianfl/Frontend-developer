<?php 

class Model_barang extends CI_Model{

	public function find($id){
		$result = $this->db->where('id_produk',$id)
						   ->limit(1)
						   ->get('produk');
		if($result->num_rows()>0){
			return $result->row();
		}else{
			return array();
		}
	}

}