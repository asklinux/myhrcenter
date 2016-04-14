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
		
		echo "edit";
		
	}	
	
	public function module_admin(){
		
		echo "admin";
	}
	public function cari_user(){
		echo "cari";
	}
	public function laporan(){
		echo "laporan";
	}
	public function log(){
		echo "log";
	}
	
}

