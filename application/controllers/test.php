<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

	
	public function index()
	{
		$this->load->view('lbb');
	}

	public function login()
	{
		$this->load->view('loginlbb');
	}

	public function daftar()
	{
		$this->load->view('daftarlbb');
	}

	public function penilaian()
	{
		$this->load->view('penilaian');
	}	

	public function getno($tim)
	{
		$this->load->model('model_peserta');
		$no_punggung = $this->model_peserta->getNoPunggung($tim);
		echo 'hello '.$no_punggung;
	}	
}
