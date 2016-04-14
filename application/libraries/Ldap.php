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
 * @package	CodeIgniter,jquery,ldap
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
 
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
//error_reporting(0);
class Ldap {

	private function connect() {
		/*
		 This function use for make connection to ldap server . the server will get configure from ci config.php

		 */

		$ci = &get_instance();

		$ldapconn = ldap_connect($ci -> config -> item('ldap_server'), $ci -> config -> item('ldap_port')) or die("Could not connect to $ldaphost");

		ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3);
		ldap_set_option($ldapconn, LDAP_OPT_REFERRALS, 0);

		$ldapbind = ldap_bind($ldapconn, $ci -> config -> item('ldap_admin'), $ci -> config -> item('ldap_password'));

		if ($ldapbind) {

			return $ldapconn;

		} else {
			return "LDAP bind server failed...";
		}

	}

	private function bind() {

		$ci = &get_instance();

		$e = $this -> connect();
		$ldapbind = @ldap_bind($e, $ci -> config -> item('ldap_admin'), $ci -> config -> item('ldap_password'));

		return $ldapbind;
	}

	public function test() {

		$e = $this -> connect();

		echo $e;

		ldap_close($e);

	}

	public function add_user($user = NULL, $data = NULL) {

		$ci = &get_instance();

		$e = $this -> connect();

		$bs_u = 'cn=' . $user . ',' . $ci -> config -> item('ldap_user');

		$p = $this -> bind();
		$p = ldap_add($e, $bs_u, $data);

		if ($p == 1) {
			return "sucess";
		} else {
			return "error";
		}

		ldap_close($e);

	}

	public function add_user_info($user = NULL, $data = NULL) {

		$ci = &get_instance();

		$e = $this -> connect();

		$bs_u = 'cn=' . $user . ',' . $ci -> config -> item('ldap_user');

		$p = $this -> bind();
		$p = ldap_mod_add($e, $bs_u, $data);

		if ($p == 1) {
			return "sucess";
		} else {
			return "error";
		}

		ldap_close($e);

	}

	public function edit_user($user = NULL, $data = NULL) {

		$ci = &get_instance();

		$e = $this -> connect();

		$bs_u = 'cn=' . $user . ',' . $ci -> config -> item('ldap_user');

		$p = $this -> bind();
		$p = ldap_modify($e, $bs_u, $data);

		if ($p == 1) {
			return "sucess";
		} else {
			return "error";
		}

		ldap_close($e);

	}

	public function delete_user($user = NULL) {

		$ci = &get_instance();

		$e = $this -> connect();

		$bs_u = 'cn=' . $user . ',' . $ci -> config -> item('ldap_user');

		$p = $this -> bind();
		$p = ldap_delete($e, $bs_u);

		if ($p == 1) {
			return "sucess";
		} else {
			return "error";
		}

		ldap_close($e);

	}

	public function list_user($id = null) {

		$ci = &get_instance();

		$e = $this -> connect();

		$justthese = array("ou");

		$p = $this -> bind();

		$filter = "(|(sn=*))";
		$justthese = array("ou", "sn", "givenname", "mail");

		$sr = ldap_search($e, $ci -> config -> item('ldap_user'), $filter, $justthese);
		$getlist = ldap_get_entries($e, $sr);

		return $getlist;
		ldap_close($e);

	}
	public function cari_user($id = null) {

		$ci = &get_instance();

		$e = $this -> connect();

		$justthese = array("ou");

		$p = $this -> bind();
		if ($id == ''){
		$filter = "(&(givenname=*))";	
		}
		else {
		$filter = "(&(givenname=*$id*)(|(cn=*$id*)))";
		}
		$justthese = array("ou", "sn", "givenname", "mail", "employeetype","employeenumber","mobile","title","telephonenumber","gidnumber","initials");

		$sr = ldap_search($e, $ci -> config -> item('ldap_user'), $filter, $justthese);
		$getlist = ldap_get_entries($e, $sr);

		return $getlist;
		ldap_close($e);

	}

	public function check_username($user = NULL) {

		$ci = &get_instance();

		$e = $this -> connect();

		$justthese = array("ou");

		$p = $this -> bind();

		$du = "cn=" . $user . "," . $ci -> config -> item('ldap_user');

		$filter = "(|(cn=$user))";

		$justthese = array("ou", "sn", "givenname", "mail", "employeetype");

		try {
			$sr = ldap_search($e, $du, $filter, $justthese);

			return ldap_get_entries($e, $sr);
		} catch (Exception $e) {
			return 0;
		}

		ldap_close($e);

	}

	public function get_bahagian($user = NULL) {

		$ci = &get_instance();

		$e = $this -> connect();

		$justthese = array("ou");

		$p = $this -> bind();

		$du = "cn=" . $user . "," . $ci -> config -> item('ldap_user');

		$filter = "(|(cn=$user))";

		$justthese = array("gidNumber");

		$sr = ldap_search($e, $du, $filter, $justthese);

		if ($sr === FALSE) {
			return 0;
		} else {
			//return ldap_get_entries($e, $sr);
			$getgroup = ldap_get_entries($e, $sr);
			$gid = $getgroup[0]['gidnumber'][0];

			$gn = "dc=dosh,dc=gov,dc=my";
			$fgn = "(|(gidNumber=$gid))";
			$jget = array("cn");
			$sgn = ldap_search($e, $gn, $fgn, $jget);
			$gname = ldap_get_entries($e, $sgn);

			return $gname[0]['cn'][0];

		}
		ldap_close($e);

	}

	public function check_login($user = NULL, $password = NULL) {

		$ci = &get_instance();

		$e = $this -> connect();

		$justthese = array("ou");

		$p = $this -> bind();

		if ($this -> check_username($user) !== 0) {

			$du = "cn=" . $user . "," . $ci -> config -> item('ldap_user');
			$attr = "userPassword";
			$encoded_newPassword = "{SHA}" . base64_encode(pack("H*", sha1($password)));

			$r = ldap_compare($e, $du, $attr, $encoded_newPassword);

			if ($r === -1) {
				return "Error";
			} elseif ($r === true) {

				$datauser = $this -> check_username($user);
				$session_data = array('username' => $user, 'email' => $datauser[0]['mail'][0], 'jenis' => $datauser[0]['employeetype'][0], );

				$ci -> session -> set_userdata('logged_in', $session_data);

				return "Successfully Logged in...";

			} elseif ($r === false) {
				return "Email or Password is wrong...!!!!";
			} else { echo "apa ko buat";
			}

		} else { echo "no user";
		}

		ldap_close($e);
	}

	public function list_department() {

		$ci = &get_instance();

		$e = $this -> connect();

		//$justthese = array("cn");

		$p = $this -> bind();

		$filter = "(|(objectClass=posixGroup))";
		$justthese = array("cn", "gidnumber");

		$sr = ldap_search($e, $ci -> config -> item('ldap_bs'), $filter, $justthese);
		$getlist = ldap_get_entries($e, $sr);

		return $getlist;
		ldap_close($e);

	}
	public function get_userinfo($user = NULL) {

		$ci = &get_instance();

		$e = $this -> connect();

		$justthese = array("ou");

		$p = $this -> bind();

		$du = "cn=" . $user . "," . $ci -> config -> item('ldap_user');

		$filter = "(|(cn=$user))";

		$justthese = array("ou", "sn", "givenname", "mail", "employeetype","employeenumber","mobile","title","telephonenumber","gidnumber","initials");

		try {
			$sr = ldap_search($e, $du, $filter, $justthese);

			return ldap_get_entries($e, $sr);
			
		} catch (Exception $e) {
			return 0;
		}

		ldap_close($e);

	}

}
