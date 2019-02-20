<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penilaian extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->helper('form');
		$this->load->model('model_penilaian');
	}
	
	public function index($tingkat)
	{
		if($this->session->userdata('posisi_pos') != ''){

			if($this->session->userdata('posisi_pos')==1 && $tingkat == 'sd'){
				$data1 = $this->model_penilaian->getDataPos1StatikPutra($tingkat);
				$data2 = $this->model_penilaian->getDataPos1StatikPutri($tingkat);
				$this->load->view('penilaian', array('data1' => $data1, 'data2' => $data2 ));
			}
			if($this->session->userdata('posisi_pos')==1 && $tingkat == 'smp'){
				$data1 = $this->model_penilaian->getDataPos1StatikPutra($tingkat);
				$data2 = $this->model_penilaian->getDataPos1StatikPutri($tingkat);
				$this->load->view('penilaian', array('data1' => $data1, 'data2' => $data2 ));
			}
			if($this->session->userdata('posisi_pos')==1 && $tingkat == 'sma'){
				$data1 = $this->model_penilaian->getDataPos1StatikPutra($tingkat);
				$data2 = $this->model_penilaian->getDataPos1StatikPutri($tingkat);
				$this->load->view('penilaian', array('data1' => $data1, 'data2' => $data2 ));
			}
			
			elseif($this->session->userdata('posisi_pos')==2 && $tingkat!='sd'){
				$data1 = $this->model_penilaian->getDataPos2StatikPutra($tingkat);
				$data2 = $this->model_penilaian->getDataPos2StatikPutri($tingkat);
				$this->load->view('penilaian', array('data1' => $data1, 'data2' => $data2 ));
			}
			elseif($this->session->userdata('posisi_pos')==3 && $tingkat!='sd'){
				$data1 = $this->model_penilaian->getDataPos3StatikPutra($tingkat);
				$data2 = $this->model_penilaian->getDataPos3StatikPutri($tingkat);
				$this->load->view('penilaian', array('data1' => $data1, 'data2' => $data2 ));
			}
			elseif($this->session->userdata('posisi_pos')==4 && $tingkat!='sd'){
				$data1 = $this->model_penilaian->getDataPos4StatikPutra($tingkat);
				$data2 = $this->model_penilaian->getDataPos4StatikPutri($tingkat);
				$this->load->view('penilaian', array('data1' => $data1, 'data2' => $data2 ));
			}
			elseif($this->session->userdata('posisi_pos')!=1 && $tingkat=='sd'){
				// $this->load->view('error_404');
				redirect('penilaian/index/smp');
			}
			

		}
		else{
			redirect('juri/login');	
		}
		
		
	}	

	public function update($no_punggung)
	{
		$kategori = $this->session->userdata('kategori');
		$punggung = $this->input->post('a');
		
		if ($kategori == 'kekompakan') {
			$nilai = array(
				'kekompakan' => $this->input->post('kekompakan')
			);
		}
		elseif ($kategori == 'kerapian') {
			$nilai = array(
				'kerapian' => $this->input->post('kerapian')
			);
		}
		elseif ($kategori == 'teknik') {
			$nilai = array(
				'teknik' => $this->input->post('teknik')
			);
		}
		elseif ($kategori == 'kostum') {
			$nilai = array(
				'kostum' => $this->input->post('kostum')
			);
		}
		elseif ($kategori == 'danton') {
			$nilai = array(
				'danton' => $this->input->post('danton')
			);
		}
		elseif ($kategori == 'garis') {
			$nilai = array(
				'garis' => $this->input->post('garis')
			);
		}

		// foreach ($query->result() as $row) {
		// 	$sess = array(
		// 		'pesan' => 'data telah diinputkan'
		// 	);
		// }

		// $this->session->set_userdata($sess);

		$this->db->where('no_punggung', $no_punggung);
		$this->db->update('pos'.$this->session->userdata('posisi_pos'), $nilai);
		// $respon = array('status' => 'success'); 		
		// $data[] = array('button' => "<input type='submit' name='update_$punggung' value='Update' class='btn btn-success' id='update_$punggung' style='width: 100px;'>", );
		// echo json_encode($data);
		// echo "<script>
		// alert('Data telah diupdate');
		// </script>";
		redirect('penilaian/index/'.$this->input->post('tingkat'));
	}	

}
