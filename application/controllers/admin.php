<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->helper('form');
		$this->load->model('model_peserta');
		$this->load->model('model_rekap');
		$this->load->model('model_juri');
		$this->load->model('model_penilaian');
	}

	public function index()
	{	
		if($this->session->userdata('who') == 'admin'){
			$this->load->view('home_admin');
		}
		else{
			redirect('admin/login');
		}
	}

	public function login()
	{	
		$this->load->view('login_admin');
	}

	public function cek_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		if ($username == 'admin' && $password == 'adminLBB123' ) {
			$sess = array(
				'who' => 'admin',
			);
			
			$this->session->set_userdata($sess);
			echo "<script>console.log( 'session berhasi' );</script>";
			redirect('admin/');
		}
		else{
			$data = array('pesan' => 'username dan password tidak cocok' );
			$this->session->set_userdata($data);
			redirect('admin/login');
		}
	}

	public function edit_juri()
	{	
		if($this->session->userdata('who') == 'admin'){
			$juri = $this->model_juri->getJuri();
			$this->load->view('edit_juri',array('data' => $juri));
		}
		else{
			redirect('admin/login');
		}
	}



	public function edit_tim()
	{	
		if($this->session->userdata('who') == 'admin'){
			$sd1 = $this->model_peserta->getPesertaSDPutra();
			$sd2 = $this->model_peserta->getPesertaSDPutri();
			$smp1 = $this->model_peserta->getPesertaSMPPutra();
			$smp2 = $this->model_peserta->getPesertaSMPPutri();
			$sma1 = $this->model_peserta->getPesertaSMAPutra();
			$sma2 = $this->model_peserta->getPesertaSMAPutri();
			$this->load->view('edit_tim',array('sd1' => $sd1, 'sd2' => $sd2, 'smp1' => $smp1, 'smp2' => $smp2, 'sma1' => $sma1, 'sma2' => $sma2));
		}
		else{
			redirect('admin/login');
		}
	}

	public function detail($no_punggung){
		if($this->session->userdata('who') == 'admin'){
			$tim = $this->model_peserta->getTim($no_punggung);
			$peserta = $this->model_peserta->getPeserta($no_punggung);
			$this->load->view('detail', array('tim' => $tim, 'peserta'=> $peserta ));
		}
		else{
			redirect('admin/login');
		}
	}

	public function hapus($no_punggung)
	{	
		if($this->session->userdata('who') == 'admin'){
			$this->model_peserta->delRekap($no_punggung);
			$this->model_peserta->delPos1($no_punggung);
			$this->model_peserta->delPos2($no_punggung);
			$this->model_peserta->delPos3($no_punggung);
			$this->model_peserta->delPos4($no_punggung);
			$this->model_peserta->delPeserta($no_punggung);
			$this->model_peserta->delTim($no_punggung);
			redirect('admin/edit_tim');
		}
		else{
			redirect('admin/login');
		}
	}

	public function hapus_juri($id_juri)
	{	
		if($this->session->userdata('who') == 'admin'){
			$this->model_juri->delJuri($id_juri);
			redirect('admin/edit_juri');
		}
		else{
			redirect('admin/login');
		}
	}

	public function reset_all (){

		if ($this->session->userdata('who')=='admin') {
			$this->model_rekap->delAllRekap();
			$this->model_penilaian->delAllPos1();
			$this->model_penilaian->delAllPos2();
			$this->model_penilaian->delAllPos3();
			$this->model_penilaian->delAllPos4();
			$this->model_peserta->delAllPeserta();
			$this->model_peserta->delAllTim();
			$this->model_juri->delAllJuri();
			redirect('admin/');
		}
		else{
			redirect('admin/login');
		}

		
	}		

	public function keluar(){
		$this->session->sess_destroy();
		redirect('admin/login');
	}

}
