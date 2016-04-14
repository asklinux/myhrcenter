<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model {


	function __construct()
    	{
        parent::__construct();
    	}

	public function add($user,$data){

	return $this->ldap->add_user($user,$data);

	}
	public function delete($user){

	return  $this->ldap->delete_user($user);

	}
	public function edit($user,$data){

	return  $this->ldap->edit_user($user,$data);

	}
	public function senarai(){

	//return  $this->ldap->list_user($bs);

	}
	public function module_admin($uid = null,$module = null){
		
		$this->db->where('admin_username',$uid);
		$this->db->where('module',$module);
		return $this->db->get('module_admin');
	}

}

	
