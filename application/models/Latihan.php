<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Latihan extends CI_Model {
	

	public function add_new($data = null){
		
		$this->db->insert('latihan_hadir',$data);
		
		return $this->db->insert_id();
	}
	public function edit($id= null,$data = null){
		
	}
	public function list_latihan($id = null,$cari = null,$bahagian = null){
		
		if ($cari !== null){
		$this->db->like('hadir_tajuk',$cari);
		$this->db->or_like('hadir_tempat', $cari);	
		}
		if ($id !== null){
		$this->db->where('user_id',$id);
		}
		if ($bahagian !== null){
		//$this->db->where('user_id',$id);
		}		
		$this->db->join('latihan_jenis','latihan_hadir.jenis_id=latihan_jenis.latihan_jenis_id', 'left');
		
		return $this->db->get('latihan_hadir');
		
	}
	public function jenis_latihan(){
		return $this->db->get('latihan_jenis')->result();
	}
	public function panduan_latihan($conf){
		$this->db->where('latihan_conf_nama',$conf);
		return $this->db->get('latihan_configure')->row();
	}
	public function panduan_update($data =null, $conf=null){
		
		$this->db->where('latihan_conf_nama',$conf);
		$this->db->update('latihan_configure',$data);
	}
	public function kira_jenis($id = null,$bahagian = null){
		
		if ($id !== null){
			$sql = "SELECT *, (select count(*) FROM latihan_hadir WHERE jenis_id=latihan_jenis_id AND user_id=$id ) AS jumlah FROM latihan_jenis";	
		}
		else if ($bahagian !== null){
				
			$sql = "SELECT *, (select count(*) FROM latihan_hadir WHERE jenis_id=latihan_jenis_id ) AS jumlah FROM latihan_jenis";
			
		}
		else {
		 
		
			$sql = "SELECT *, (select count(*) FROM latihan_hadir WHERE jenis_id=latihan_jenis_id ) AS jumlah FROM latihan_jenis";
		}
		
		return $this->db->query($sql)->result_array();
		
	}
		
	
}
