<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	
	public function index()
	{
		
		$data['login'] = 0;

		$this->load->view('header',$data);
		$this->load->view('login');
		$this->load->view('footer');
	}
	public function checklogin(){
		
		echo $this->ldap->check_login($this->input->post('user'),$this->input->post('pass'));

	}
}
