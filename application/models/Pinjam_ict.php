<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pinjam_ict extends CI_Model {
	

	public function add_new($data = null){
		
		$this->db->insert('ict_peminjam',$data);
		
		return $this->db->insert_id();
	}
	public function edit($id= null,$data = null){
		
	}
	public function list_ict($id = null,$cari = null){
		
		if ($cari !== null){
		$this->db->like('pinjam_uid',$cari);
		$this->db->or_like('maklumat', $cari);	
		}	
		
		$this->db->where('pinjam_uid',$id);
		return $this->db->get('ict_peminjam');
		
	}
	public function jenis_list(){
		return $this->db->get('ict_jenis')->result();
	}
		
	
}
