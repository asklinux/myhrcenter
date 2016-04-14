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

class Panel extends CI_Controller {

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

	public function index() {

		$data['login'] = 1;
		$data['jenis'] = $this->session-> userdata['logged_in']['jenis'];
		$data['username'] = $this -> session -> userdata['logged_in']['username'];
		$data['email'] = $this -> session -> userdata['logged_in']['email'];
		$data['id_bahagian'] = $this -> ldap -> get_bahagian($this -> session -> userdata['logged_in']['username']);

		$this -> load -> view('header', $data);

		$this -> db -> where('username', $this -> session -> userdata['logged_in']['username']);
		if ($this -> db -> get('user') -> result() == NULL) {

			$this -> load -> view('form/menu_top', $data);
			$data['bahagian'] = $cawangan = $this -> ldap -> list_department();
			$this -> load -> view('form/changepassword', $data);
		} else {

			$this -> load -> view('menu_top', $data);
			$this -> load -> view('panel', $data);

		}
		$this -> load -> view('footer');

	}

	public function padam($user = null) {

		//$user = "";
		echo $this -> user -> delete($user);

	}

	public function checkusername() {

		$user = "hasnan";
		print_r($this -> ldap -> check_username($user));

	}

	public function tambah() {

		$info["givenName"] = "admin";
		$info["sn"] = "admin";
		$info["uid"] = "admin";
		$info["mail"] = "admin@mohr.gov.my";
		$info["displayName"] = "admin";
		$info["gidNumber"] = 500;
		$info["uidNumber"] = 500;
		$info["homeDirectory"] = "/home/admin";
		$info["cn"] = "admin";
		$info["userPassword"] = "";
		$info["objectclass"][0] = "top";
		$info["objectclass"][1] = "person";
		$info["objectclass"][2] = "inetOrgPerson";
		$info["objectclass"][3] = "organizationalPerson";
		$info["objectclass"][4] = "posixAccount";

		//echo $this->user->add('admin',$info);

	}

	public function ubah() {

		$user = "aainaa";
		$password = 'aainaa';
		$encoded_newPassword = "{SHA}" . base64_encode(pack("H*", sha1($password)));

		$info["givenName"] = "hasnan bin hasim";
		$info["sn"] = "hasnan";
		//$info["uid"]="tets";
		$info["mail"] = "hasnan@mohr.gov.my";
		$info["displayName"] = "tets";
		//$info["gidNumber"] = 500;
		//$info["uidNumber"] = 500;
		//$info["homeDirectory"] = "/home/hasnan";
		$info["cn"] = $user;
		$info["userPassword"] = $encoded_newPassword;
		$info["objectclass"][0] = "top";
		$info["objectclass"][1] = "person";
		$info["objectclass"][2] = "inetOrgPerson";
		$info["objectclass"][3] = "organizationalPerson";
		$info["objectclass"][4] = "posixAccount";

		//echo $this->user->edit($user,$info);

	}

	public function change_profile() {

		$user = $this -> input -> post('user');
		$password = $this -> input -> post('password');

		$encoded_newPassword = "{SHA}" . base64_encode(pack("H*", sha1($password)));

		if ($user == $this -> session -> userdata['logged_in']['username']) {

			$info["gidNumber"] = $this -> input -> post('bahagian');
			$info["userPassword"] = $encoded_newPassword;

			$info["telephoneNumber"] = $this -> input -> post('nophone');
			$info["mobileTelephoneNumber"] = $this -> input -> post('nophoneb');
			$info["employeeNumber"] = $this -> input -> post('noic');
			$info["initials"] = $this -> input -> post('grad');
			$info["title"] = $this -> input -> post('jawatan');

			$this -> user -> edit($user, $info);

			$e = array(
			'username' => $this -> session -> userdata['logged_in']['username'], 
			'status' => 1,
			'bahagian' => $this -> input -> post('bahagian')
			);

			$this -> db -> insert('user', $e);

			echo "berjaya";
		} else {
			echo "gagal";
		}

	}

	public function import() {

		$data = $this -> db -> get('mup26_users') -> result();

		foreach ($data as $d) {

			if ($d -> username !== "admin") {
				$pass = '';
				$encoded_newPassword = "{SHA}" . base64_encode(pack("H*", sha1($pass)));

				//$info["givenName"]= $d->name;
				//$info["sn"]= $d->name;
				//$info["uid"]= $d->username;
				$info["mail"] = $d -> email;
				//$info["displayName"]= $d->name;
				//$info["gidNumber"] = 500;
				//$info["uidNumber"] = $d->id;
				//$info["homeDirectory"] = "/home/users/Bahagian Khidmat Pengurusan/".$d->username;
				//$info["cn"] = $d->username;
				$info["userPassword"] = $encoded_newPassword;
				//$info["objectclass"][0] = "top";
				//$info["objectclass"][1] = "person";
				//$info["objectclass"][2] = "inetOrgPerson";
				//$info["objectclass"][3] = "organizationalPerson";
				//$info["objectclass"][4] = "posixAccount";
				//$info["admin"] = 0;

				echo $this -> user -> edit($d -> username, $info);
			}

		}

	}

	public function import_tambah() {

		$data = $this -> db -> get('mup26_users') -> result();

		foreach ($data as $d) {

			$info["employeeType"] = 0;

			echo $this -> ldap -> add_user_info($d -> username, $info);
			//echo $this->user->delete($d->username);

		}

	}

	public function senarai_user() {

		echo json_encode($this -> ldap -> list_user());

	}

	public function profile() {
		$data['login'] = 1;
		$data['jenis'] = $this -> session -> userdata['logged_in']['jenis'];
		$data['username'] = $this -> session -> userdata['logged_in']['username'];
		$data['email'] = $this -> session -> userdata['logged_in']['email'];
		$data['id_bahagian'] = $this -> ldap -> get_bahagian($this -> session -> userdata['logged_in']['username']);
		$data['profil'] = $this -> ldap -> get_userinfo($this -> session -> userdata['logged_in']['username'])[0];
		$data['bahagian'] = $cawangan = $this -> ldap -> list_department();
		$this -> load -> view('profile', $data);
	}

	public function dashboard() {

		
		
		$data['login'] = 1;
		$data['jenis'] = $this -> session -> userdata['logged_in']['jenis'];
		$data['username'] = $this -> session -> userdata['logged_in']['username'];
		$data['email'] = $this -> session -> userdata['logged_in']['email'];
		$data['id_bahagian'] = $this -> ldap -> get_bahagian($this -> session -> userdata['logged_in']['username']);
		
		$this -> load -> view('panel', $data);

	}

	public function pusatsistem() {

		$data['login'] = 1;
		$data['jenis'] = $this -> session -> userdata['logged_in']['jenis'];
		$data['username'] = $this -> session -> userdata['logged_in']['username'];
		$data['email'] = $this -> session -> userdata['logged_in']['email'];
		$data['id_bahagian'] = $this -> ldap -> get_bahagian($this -> session -> userdata['logged_in']['username']);

		$this -> load -> view('pusat', $data);

	}

	public function jadual() {

		$data['login'] = 1;
		$data['jenis'] = $this -> session -> userdata['logged_in']['jenis'];
		$data['username'] = $this -> session -> userdata['logged_in']['username'];
		$data['email'] = $this -> session -> userdata['logged_in']['email'];
		$data['id_bahagian'] = $this -> ldap -> get_bahagian($this -> session -> userdata['logged_in']['username']);

		$this -> load -> view('jadual', $data);

	}

	public function logout() {

		$this -> session -> unset_userdata('logged_in');
		header("location:".base_url());

	}

	public function test() {

		$cawangan = $this -> ldap -> list_department();

		for ($i = 0; $i < count($cawangan) - 1; $i++) {

			echo $cawangan[$i]['cn'][0] . "<br/>";

		}
	}

	public function ict() {
		$data['login'] = 1;
		$data['jenis'] = $this -> session -> userdata['logged_in']['jenis'];
		$data['username'] = $this->session->userdata['logged_in']['username'];
		$data['email'] = $this -> session -> userdata['logged_in']['email'];
		$data['id_bahagian'] = $this -> ldap -> get_bahagian($this -> session -> userdata['logged_in']['username']);
		$this->load->model('pinjam_ict');
		$data['stat'] = $this->pinjam_ict->list_ict($this->session->userdata['logged_in']['username'])->result();
		$this->load->model('user');
		$data['admin'] = $this->user->module_admin($this->session->userdata['logged_in']['username'],'ict')->num_rows();
		
		$data['ict_jenis'] = $this->pinjam_ict->jenis_list();
		
		$this -> load -> view('sistem/it/main', $data);
	}

	public function bilik() {
		$data['login'] = 1;
		$data['jenis'] = $this -> session -> userdata['logged_in']['jenis'];
		$data['username'] = $this -> session -> userdata['logged_in']['username'];
		$data['email'] = $this -> session -> userdata['logged_in']['email'];
		$data['id_bahagian'] = $this -> ldap -> get_bahagian($this -> session -> userdata['logged_in']['username']);

		$this -> load -> view('sistem/bilik/main', $data);
	}

	public function kenderaan() {
		$data['login'] = 1;
		$data['jenis'] = $this -> session -> userdata['logged_in']['jenis'];
		$data['username'] = $this -> session -> userdata['logged_in']['username'];
		$data['email'] = $this -> session -> userdata['logged_in']['email'];
		$data['id_bahagian'] = $this -> ldap -> get_bahagian($this -> session -> userdata['logged_in']['username']);

		$this -> load -> view('sistem/kenderaan/main', $data);
	}

	public function pergerakan() {
		$data['login'] = 1;
		$data['jenis'] = $this -> session -> userdata['logged_in']['jenis'];
		$data['username'] = $this -> session -> userdata['logged_in']['username'];
		$data['email'] = $this -> session -> userdata['logged_in']['email'];
		$data['id_bahagian'] = $this -> ldap -> get_bahagian($this -> session -> userdata['logged_in']['username']);

		$this -> load -> view('sistem/pergerakan/main', $data);
	}

	public function kedatangan() {
		$data['login'] = 1;
		$data['jenis'] = $this -> session -> userdata['logged_in']['jenis'];
		$data['username'] = $this -> session -> userdata['logged_in']['username'];
		$data['email'] = $this -> session -> userdata['logged_in']['email'];
		$data['id_bahagian'] = $this -> ldap -> get_bahagian($this -> session -> userdata['logged_in']['username']);

		$this -> load -> view('sistem/kedatangan/main', $data);
	}

	public function direktori() {
		$data['login'] = 1;
		$data['jenis'] = $this -> session -> userdata['logged_in']['jenis'];
		$data['username'] = $this -> session -> userdata['logged_in']['username'];
		$data['email'] = $this -> session -> userdata['logged_in']['email'];
		$data['id_bahagian'] = $this -> ldap -> get_bahagian($this -> session -> userdata['logged_in']['username']);
		//$data['senarai'] = $this->ldap->list_user();
		$this -> load -> view('sistem/dir/main', $data);
	}
	public function cari_dir(){
		
		$data['hasil'] = $this->ldap->cari_user($this->input->post('cari'));
		
		$this->load->view('sistem/dir/cari',$data);
		
	}

	public function alatulis() {
		$data['login'] = 1;
		$data['jenis'] = $this -> session -> userdata['logged_in']['jenis'];
		$data['username'] = $this -> session -> userdata['logged_in']['username'];
		$data['email'] = $this -> session -> userdata['logged_in']['email'];
		$data['id_bahagian'] = $this -> ldap -> get_bahagian($this -> session -> userdata['logged_in']['username']);

		$this -> load -> view('sistem/tempah/main', $data);
	}

	public function jadual_json() {
		echo '[
  {
    "title": "All Day Event",
    "start": "2016-01-01"
  },
  {
    "title": "Long Event",
    "start": "2016-01-07",
    "end": "2016-01-10"
  },
  {
    "id": "999",
    "title": "Repeating Event",
    "start": "2016-01-09T16:00:00-05:00"
  },
  {
    "id": "999",
    "title": "Repeating Event",
    "start": "2016-01-16T16:00:00-05:00"
  },
  {
    "title": "Conference",
    "start": "2016-01-11",
    "end": "2016-01-13"
  },
  {
    "title": "Meeting",
    "start": "2016-01-12T10:30:00-05:00",
    "end": "2016-01-12T12:30:00-05:00"
  },
  {
    "title": "Lunch",
    "start": "2016-01-12T12:00:00-05:00"
  },
  {
    "title": "Meeting",
    "start": "2016-01-12T14:30:00-05:00"
  },
  {
    "title": "Happy Hour",
    "start": "2016-01-12T17:30:00-05:00"
  },
  {
    "title": "Dinner",
    "start": "2016-01-12T20:00:00"
  },
  {
    "title": "Birthday Party",
    "start": "2016-01-13T07:00:00-05:00"
  },
  {
    "title": "Click for Google",
    "url": "http://google.com/",
    "start": "2016-01-28"
  }
]
			';
	}

	public function pinjaman_ict() {

		$this->load->model('pinjam_ict');

		$td= date('Y-m-d',strtotime($this->input->post('tarikh_dari')));
		$th = date('Y-m-d',strtotime($this->input->post('tarikh_hingga')));
		
		$data = array(
		'pinjam_uid' => $this->input->post('uid'),
		'jenis' => $this->input->post('jenis'),
		'tarikh_ambil' => $td,
		'masa_ambil' => $this->input->post('masa_dari'),
		'tarikh_hantar' => $th,
		'masa_hantar' => $this->input->post('masa_hingga'),
		'maklumat' => $this->input->post('maklumat')
		);
		
		
		
		echo $this->pinjam_ict->add_new($data);

		
	}
	public function cari_ict(){
			
		$this->load->model('pinjam_ict');
		
		$keputusan = $this->pinjam_ict->list_ict($this->input->post('uid'),$this->input->post('cari'))->result();
		
		//$jumlah = $this->pinjam_ict->list_ict($this->input->post('uid'),$this->input->post('cari'))->count_all();
		
		if ($keputusan == null ){
			echo "Data tidak dijumpai";
		}
		else {	
			?>
			<table id="sejarah" class="table table-hover table-bordered tablesorter">
					<thead>
						<tr>
							<th width="15%">Tarikh</th>
							<th>Nama Barang</th>
							<th class="td-actions" width="10%" >Status</th>
						</tr>
					</thead>
					<tbody>
						<?php
				
						foreach ($keputusan as $s) {
						?>
							
						<tr>
							<td><?=$s->tarikh_mohon?></td>
							<td><?=$s->maklumat?></td>
							<td class="td-actions">
								<a href="javascript:;" class="btn btn-small btn-info"> 
								<i class="btn-icon-only icon-ok"></i></a>
								<a href="javascript:;" class="btn btn-small btn-danger"> 
								<i class="btn-icon-only icon-remove"></i></a>
							</td>
						</tr>
						<?php
						}
				
						?>
						

					</tbody>
				</table>
			<?php
		}
		
		
	}
	public function perpustakaan(){
		echo "perpustakaan";
	}
	public function shop(){
		echo "shop";
	}
	public function makan(){
		
		$data['login'] = 1;
		$data['jenis'] = $this -> session -> userdata['logged_in']['jenis'];
		$data['username'] = $this -> session -> userdata['logged_in']['username'];
		$data['email'] = $this -> session -> userdata['logged_in']['email'];
		$data['id_bahagian'] = $this -> ldap -> get_bahagian($this -> session -> userdata['logged_in']['username']);

		$this -> load -> view('sistem/makan/main', $data);
		
	}
	public function latihan(){
		
		$data['login'] = 1;
		$data['jenis'] = $this -> session -> userdata['logged_in']['jenis'];
		$data['username'] = $this->session->userdata['logged_in']['username'];
		$data['email'] = $this -> session -> userdata['logged_in']['email'];
		$data['id_bahagian'] = $this -> ldap -> get_bahagian($this -> session -> userdata['logged_in']['username']);
		$this->load->model('latihan');
		$data['stat'] = $this->latihan->list_latihan($this->session->userdata['logged_in']['username'])->result();
		$this->load->model('user');
		$data['admin'] = $this->user->module_admin($this->session->userdata['logged_in']['username'],'latihan')->num_rows();
		$data['admin_jenis'] = $this->user->module_admin($this->session->userdata['logged_in']['username'],'latihan')->row()->jenis;
		
		$data['latihan_jenis'] = $this->latihan->jenis_latihan();
		$this -> load -> view('sistem/latihan/main', $data);
		
	}
	public function latihan_hadir(){

		$this->load->model('latihan');
		
		$jenis = $this->input->post('jenis');
		
		
		
		$data['jenis_id'] = $jenis;
		$data['hadir_tajuk'] = $this->input->post('tajuk');
		$data['user_id'] = $this->session->userdata['logged_in']['username'];
		
		//$data['bahagian_id'] = $this->ldap->get_bahagian($this->session->userdata['logged_in']['username']);
		if (($jenis == 1) || ($jenis == 2)){
				
			$td= date('Y-m-d',strtotime($this->input->post('tarikh_dari')));
			$th = date('Y-m-d',strtotime($this->input->post('tarikh_hingga')));
		
			$data['hadir_tempat'] = $this->input->post('tempat');
			$data['hadir_tarikh_dari'] = $td;
			$data['hadir_tarikh_hingga']  = $th;
			$data['hadir_hari'] = $this->input->post('jumhari_data');
		}
		if($jenis == 3){
			
			$td= date('Y-m-d',strtotime($this->input->post('tarikh_dari')));
			$th = date('Y-m-d',strtotime($this->input->post('tarikh_hingga')));
		
			$data['hadir_tempat'] = $this->input->post('tempat');
			$data['hadir_tarikh_dari'] = $td;
			$data['hadir_tarikh_hingga']  = $th;
			$data['hadir_jam'] = $this->input->post('jumjam_data');
			
		}
		if($jenis == 4){
			
			$td= date('Y-m-d',strtotime($this->input->post('tarikh_dari')));
			
			$data['sumber'] = $this->input->post('sumber_data');
			$data['hadir_tarikh_dari'] = $td;
			$data['tempat_pembentangan'] = $this->input->post('tempat_bentang_data');;
			$data['pegawai_penyelia']  = $this->input->post('pegawai_data');;
			$data['hadir_jam'] = $this->input->post('jumjam_data');
		}
			
			
		
		echo $this->latihan->add_new($data);
	}
	public function cari_latihan(){
		
		$this->load->model('latihan');
		
		$keputusan = $this->latihan->list_latihan($this->input->post('uid'),$this->input->post('cari'))->result();
		//$keputusan = null;
		
		
		if ($keputusan == null ){
			echo "Data tidak dijumpai";
		}
		else {	
		?>
			<table id="sejarah" class="table table-hover table-bordered tablesorter">
					<thead>
						<tr>
							<th width="15%">Tarikh</th>
							<th>Tajuk</th>
							<th class="td-actions" width="10%" >Status</th>
						</tr>
					</thead>
					<tbody>
						<?php
				
						foreach ($keputusan as $s) {
						?>
							
						<tr>
							<td><?=$s->hadir_tarikh_dari?></td>
							<td><?=$s->hadir_tajuk?></td>
							<td class="td-actions">
								<a href="javascript:;" class="btn btn-small btn-info"> 
								<i class="btn-icon-only icon-ok"></i></a>
								<a href="javascript:;" class="btn btn-small btn-danger"> 
								<i class="btn-icon-only icon-remove"></i></a>
							</td>
						</tr>
						<?php
						}
				
						?>
						

					</tbody>
				</table>
			<?php
		}
		
	}
	public function latihan_proses(){
		
		$data['login'] = 1;
		$data['jenis'] = $this -> session -> userdata['logged_in']['jenis'];
		$data['username'] = $this->session->userdata['logged_in']['username'];
		$data['email'] = $this -> session -> userdata['logged_in']['email'];
		$data['id_bahagian'] = $this -> ldap -> get_bahagian($this -> session -> userdata['logged_in']['username']);
		$this->load->model('latihan');
		$data['stat'] = $this->latihan->list_latihan($this->session->userdata['logged_in']['username'])->result();
		$this->load->model('user');
		$data['admin'] = $this->user->module_admin($this->session->userdata['logged_in']['username'],'latihan')->num_rows();
		
		$data['latihan'] = $this->latihan->list_latihan()->result();
		$this -> load -> view('module_admin/latihan/status', $data);
		
	}
	public function latihan_admin(){
		
		$this->load->model('user');
		$data['admin'] = $this->user->module_admin($this->session->userdata['logged_in']['username'],'latihan')->num_rows();
		$data['admin_jenis'] = $this->user->module_admin($this->session->userdata['logged_in']['username'],'latihan')->row()->jenis;
		
		
		$this->load->view('module_admin/latihan/main',$data);	
	
	}
	public function simpan_manual(){
		
		
		
			$data['latihan_conf_data'] = $this->input->post('rekod');
		
		  
		
		$this->load->model('latihan');
		$this->latihan->panduan_update($data ,$this->input->post('jenis'));
		
		echo $this->input->post('rekod');
		//echo "simpan";
	}
	public function latihan_useradmin(){
		echo "admin moduel";
	}
	public function latihan_report(){
		echo "repory";
	}
	public function latihan_stat(){
		
		$data['login'] = 1;
		$data['jenis'] = $this -> session -> userdata['logged_in']['jenis'];
		$data['username'] = $this->session->userdata['logged_in']['username'];
		$data['email'] = $this -> session -> userdata['logged_in']['email'];
		$data['id_bahagian'] = $this -> ldap -> get_bahagian($this -> session -> userdata['logged_in']['username']);
		$this->load->model('latihan');
		$data['stat'] = $this->latihan->list_latihan($this->session->userdata['logged_in']['username'])->result();
		$this->load->model('user');
		$data['admin'] = $this->user->module_admin($this->session->userdata['logged_in']['username'],'latihan')->num_rows();
		
		$data['latihan_jenis'] = $this->latihan->jenis_latihan();
		
		echo json_encode($this->latihan->kira_jenis());
		
		//$this -> load -> view('module_admin/latihan/stat',$data);
		
	}
	public function get_panduan(){
				
			$this->load->model('latihan');
			//echo "DASAR LATIHAN SUMBER MANUSIA SEKTOR AWAM";
			$maklumat = $this->latihan->panduan_latihan($this->input->post('conf'));
			echo $maklumat->latihan_conf_data;
	}
	public function latihan_edit_panduan(){
				
			$this->load->model('latihan');
			$data['rekod'] = $this->latihan->panduan_latihan($this->input->post('conf'))->latihan_conf_data;
			$this -> load -> view('module_admin/latihan/edit_bantuan',$data);
	}
	
	public function appcenter(){
		//echo "test";
	}
	public function sadmin(){
		
		$data['login'] = 1;
		$data['jenis'] = $this -> session -> userdata['logged_in']['jenis'];
		$data['username'] = $this->session->userdata['logged_in']['username'];
		$data['email'] = $this -> session -> userdata['logged_in']['email'];
		$data['id_bahagian'] = $this -> ldap -> get_bahagian($this -> session -> userdata['logged_in']['username']);
		$this->load->model('latihan');
		$data['stat'] = $this->latihan->list_latihan($this->session->userdata['logged_in']['username'])->result();
		$this->load->model('user');
		$data['admin'] = $this->user->module_admin($this->session->userdata['logged_in']['username'],'latihan')->num_rows();
		
			
		$this -> load -> view('admin/main',$data);
	}
	
	

}
