<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peserta extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->helper('form');
		$this->load->model('model_peserta');
		$this->load->model('model_rekap');
	}

	public function index()
	{	
		$this->load->view('peserta_home');
	}
	
	public function sd()
	{	
		$data1 = $this->model_peserta->getPesertaSDPutra();
		$data2 = $this->model_peserta->getPesertaSDPutri();
		$this->load->view('peserta_sd',array('data1' => $data1, 'data2' => $data2));
	}

	public function smp()
	{	
		$data1 = $this->model_peserta->getPesertaSMPPutra();
		$data2 = $this->model_peserta->getPesertaSMPPutri();
		$this->load->view('peserta_smp',array('data1' => $data1, 'data2' => $data2));
	}

	public function sma()
	{	
		$data1 = $this->model_peserta->getPesertaSMAPutra();
		$data2 = $this->model_peserta->getPesertaSMAPutri();
		$this->load->view('peserta_sma',array('data1' => $data1, 'data2' => $data2));
	}

	public function mendaftar()
	{
		$tingkat = $this->input->post('tingkat');
		$gender = $this->input->post('gender');
		$sekolah = $this->input->post('asal_sekolah');
		$tim = $this->input->post('nama_tim');
		$telp = $this->input->post('no_telp');
		$kecamatan = $this->input->post('kecamatan');
		
		$duplikasi = $this->model_peserta->cek_tim($tim);
		if ($duplikasi == 1){
			$sess = array(
				'pesan' => '<p class="text-danger">Nama tim '.$tim.' sudah terpakai</p>'
			);
			$this->session->set_userdata($sess);
			redirect('peserta/'.$tingkat);
		}

		for ($i=1; $i <41 ; $i++) { 
			if($this->input->post('nama_'.$i)==''){
				$sess = array(
					'pesan' => "Peserta nomor ".$i." belum terisi"
				);
				$this->session->set_userdata($sess);
				redirect('peserta/'.$tingkat);
			}
		}

		if ($tingkat == '' || $sekolah == '' || $tim == '' || $telp == '' || $kecamatan == '' || $gender == '') {
			$sess = array(
				'pesan' => '<p class="text-danger">Data tim tidak lengkap</p>',
			);
			$this->session->set_userdata($sess);
			redirect('peserta/'.$tingkat);
		}
		else{
			//menambahkan ke tim
			$data_tim = array(
				'no_punggung' => '',
				'tingkat' => $tingkat,
				'gender' => $gender,
				'nama_tim' => $tim,
				'asal_sekolah' => $sekolah,
				'kecamatan' => $kecamatan,
				'telp' => $telp,
				'tanggal' => date('Y-m-d')
			);
			$this->model_peserta->insert_data_tim($data_tim);
			$no_punggung = $this->model_peserta->getNoPunggung($tim);

			for ($i=1; $i <41 ; $i++) { 
				$data_peserta = array(
					'id_peserta' => '',
					'nama_peserta' => $this->input->post('nama_'.$i),
					'posisi' => $this->input->post('posisi_'.$i),
					'no_punggung' => $no_punggung
				);
				$this->model_peserta->insert_data_peserta($data_peserta);
			}

			for ($i=41; $i <46 ; $i++) {  
				if($this->input->post('nama_'.$i) != ''){
					$data_peserta = array(
						'id_peserta' => '',
						'nama_peserta' => $this->input->post('nama_'.$i),
						'posisi' => $this->input->post('posisi_'.$i),
						'no_punggung' => $no_punggung
					);
					$this->model_peserta->insert_data_peserta($data_peserta);
				}
			}
			

			//menambahkan ke pos
			// $no_punggung = $this->model_peserta->getNoPunggung($tim);

			$this->load->model('model_penilaian');
			$penilaian = array(
				'id_penilaian' => '',
				'no_punggung' => $no_punggung,
				'tingkat' => $tingkat
			);
			if($tingkat=='SD'){
				$this->model_penilaian->insert_data_sd($penilaian);
			}
			else{
				$this->model_penilaian->insert_data($penilaian);
			}

			//menambahkan ke rekap
			$rekap = array(
				'rekap' => '',
				'pos1' => $no_punggung,
				'pos2' => $no_punggung,
				'pos3' => $no_punggung,
				'pos4' => $no_punggung

			);
			$this->model_rekap->insert_data($rekap);

			$sess = array(
				'pesan' => '<p class="text-success">Pendaftaran berhasil</p>',
			);
			$this->session->set_userdata($sess);
			redirect('peserta/'.$tingkat);

		}

	}

}
