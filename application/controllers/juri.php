<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Juri extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->helper('form');
		$this->load->model('model_juri');
	}
	
	// public function daftar()
	// {	
	// 	$data = $this->model_juri->getJuri();
	// 	$this->load->view('daftarlbb', array('data' => $data));
	// }

	public function index(){
		$this->load->view('lbb');
	}

	public function mendaftar()
	{
		
		if ($this->input->post('NamaWasit') == '' ) {
			$sess = array(
				'pesan' => '<p class="text-danger">Nama Juri belum terisi!</p>',
			);
			$this->session->set_userdata($sess);
			// redirect('juri/daftar');
			redirect('admin/edit_juri');
		}
		elseif ($this->input->post('username') == '') {
			$sess = array(
				'pesan' => '<p class="text-danger">Username belum terisi!</p>',
			);
			$this->session->set_userdata($sess);
			// redirect('juri/daftar');
			redirect('admin/edit_juri');
		}
		elseif ($this->input->post('password1') == '' || $this->input->post('password2') == '' ) {
			$sess = array(
				'pesan' => '<p class="text-danger">Password belum terisi!</p>',
			);
			$this->session->set_userdata($sess);
			// redirect('juri/daftar');
			redirect('admin/edit_juri');
		}
		elseif($this->input->post('password1') != $this->input->post('password2')){
			$sess = array(
				'pesan' => '<p class="text-danger">Konfirmasi password tidak sama!</p>',
			);
			$this->session->set_userdata($sess);
			// redirect('juri/daftar');
			redirect('admin/edit_juri');
		}
		elseif ($this->input->post('kategori') == '0') {
			$sess = array('pesan' => '<p class="text-danger">kategori belum dipilih!</p>' );
			$this->session->set_userdata($sess);
			// redirect('juri/daftar');
			redirect('admin/edit_juri');
		}
		elseif ($this->input->post('pos') == '0') {
			$sess = array('pesan' => '<p class="text-danger">pos belum dipilih!</p>' );
			$this->session->set_userdata($sess);
			// redirect('juri/daftar');
			redirect('admin/edit_juri');
		}
		elseif ($this->input->post('password1') == $this->input->post('password2') && $this->input->post('kategori') != '0' && $this->input->post('pos') != '0' ) {
			$password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
			$juri = array(
				'id_juri' => '',
				'nama_juri' => $this->input->post('NamaWasit'),
				'username' => $this->input->post('username'),
				'password' => $password,
				'posisi_pos' => $this->input->post('pos'),
				'kategori' => $this->input->post('kategori')
			);
			$this->model_juri->insert_data($juri);

			$sess = array(
				'pesan' => '<p class="text-success">pendaftaran berhasil</p>',
			);
			$this->session->set_userdata($sess);
			// redirect('juri/daftar');
			redirect('admin/edit_juri');
			// else{

			// 	$sess = array(
			// 		'pesan' => 'pos tersebut penuh',
			// 	);
			// 	$this->session->set_userdata($sess);
			// 	redirect('juri/daftar');
			// }
		}
		else{
			$sess = array('pesan' => '<p class="text-danger">pendaftaran gagal</p>' );
			$this->session->set_userdata($sess);
			// redirect('juri/daftar');
			redirect('admin/edit_juri');
		}
	}

	public function keluar(){
		$this->model_juri->logout();
		redirect('juri/login');
	}

	public function cek_login(){
		
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$this->model_juri->login_juri($username,$password);
	}

	public function login()
	{
		if ($this->session->userdata('nama_juri') == '') {
			$this->load->view('loginlbb');
		} 
		else{
			redirect('penilaian/index/sd');
		}
		
	}	
	

}
