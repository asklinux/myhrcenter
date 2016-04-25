<?php
/**
 * skop system
 *
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2014 - 2016, British Columbia Institute of Technology
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package	CodeIgniter,jquery,ldap,bootstrap
 * @author	hasnan bin hasim
 * @copyright	Copyright (c) 2016, tunnelbiz, ent. (http://tunnelbiz.com/)
 * @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc. (https://ellislab.com/)
 * @copyright	Copyright (c) 2014 - 2016, British Columbia Institute of Technology (http://bcit.ca/)
 * @license	http://opensource.org/licenses/MIT	MIT License
 * @link http://opensource.tunnelbiz.com
 * @link	https://codeigniter.com
 * @since	Version 1.0.0
 * @filesource
 */
 
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct() {
		// Call the CI_Model constructor
		parent::__construct();

		$this -> load -> model('user');
		if (isset($this -> session -> userdata['logged_in'])) {
			$username = ($this -> session -> userdata['logged_in']['username']);
			$email = ($this -> session -> userdata['logged_in']['email']);
		} else {
			header("location: index.php");
		}

	}
	public function add_user(){
		
		$data['bahagian'] = $cawangan = $this -> ldap -> list_department();
		$this->load->view('admin/add_user',$data);
	}	
	public function edit_user(){
		
		$this->load->view('admin/edit_user');
		
	}	
	
	public function module_admin(){
		
		$this->load->view('admin/module_admin');
	}
	public function cari_user(){
		$this->load->view('admin/cari_user');
	}
	public function laporan(){
		$this->load->view('admin/laporan');
	}
	public function log(){
		$this->load->view('admin/log');
	}
	public function user_simpan(){
		
		echo "simpan";
	}
	public function module_admin_add(){
		
		
		//echo $this->input->post('mdi');
		
		$this->load->model('user');
		
		$data['senarai']  =  $this->user->module_admin(null,$this->input->post('mdi'))->result();
		
		
	
		$this->load->view("admin/module_admin_list",$data);
	
	}
	public function module_admin_user(){
		
		$data['users'] = $this->ldap->cari_user($this->input->post('cari')); 
		
		$this->load->view('admin/module_admin_alluser',$data);
	}
	public function remove_moduleadmin(){
		$id = $this->input->post('id');
		
		$this->load->model('user');
		
		$this->user->module_admin_delete($id);
	}
	public function add_moduleadmin(){
		//echo $this->input->post('id');
		
		$data =  array (
			'admin_username' => $this->input->post('id'),
			'module' => $this->input->post('module'),
			'jenis' => 0 
		);
		$this->load->model('user');
		
		echo $this->user->module_admin_add($data);
		
		
	}
}

