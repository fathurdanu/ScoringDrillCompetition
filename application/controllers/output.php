<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Output extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->helper('form');
		$this->load->model('model_penilaian');
		$this->load->model('model_peserta');
		$this->load->model('model_rekap');
		$this->load->model('model_juri');
	}

	public function index(){
		$this->load->view('output');
	}

	public function coba()
	{
		$this->load->view('rekap_1');
	}
	
	public function overal($tingkat)
	{			

		$data1 = $this->model_rekap->getRekapPutra($tingkat);
		$data2 = $this->model_rekap->getRekapPutri($tingkat);
		$danton1 =  $this->model_rekap->getRekapDantonPutra($tingkat);
		$danton2 =  $this->model_rekap->getRekapDantonPutri($tingkat);
		$kostum1 =  $this->model_rekap->getRekapKostumPutra($tingkat);
		$kostum2 =  $this->model_rekap->getRekapKostumPutri($tingkat);
		$this->load->view('rekap',array('data1' => $data1, 'data2' => $data2, 'kostum1' => $kostum1, 'kostum2' => $kostum2, 'danton1' => $danton1, 'danton2' => $danton2 ));	

	}

	public function download_info_tim($no_punggung)
	{
		$tim = $this->model_peserta->getTim($no_punggung);
		$peserta = $this->model_peserta->getPeserta($no_punggung);
		
		foreach ($tim as $key) {
			$output = '


			<table>
			<thead>
			<tr>
			<td>Tim</td>
			<td>:</td>
			<td>'.$key['gender'].'</td>
			</tr>
			<tr>
			<td>Asal Sekolah</td>
			<td>:</td>
			<td>'.$key['asal_sekolah'].'</td>
			</tr>
			<tr>
			<td>Nama Tim</td>
			<td>:</td>
			<td>'.$key['nama_tim'].'</td>
			</tr>
			<tr>
			<td>Tingkat</td>
			<td>:</td>
			<td>'.$key['tingkat'].'</td>
			</tr>
			<tr>
			<td>Telepon</td>
			<td>:</td>
			<td>'.$key['telp'].'</td>
			</tr>
			<tr>
			<td>Kecamatan</td>
			<td>:</td>
			<td>'.$key['kecamatan'].'</td>
			</tr>
			</thead>
			</table>';
		}
		$output .='
		<table>
		<tr>
		</tr> 
		</table>';
		
		$output .='
		<table>
		<thead >

		<td>No.</td>
		<td>Nama</td>
		<td>Posisi</td>

		</thead>
		<tbody>';
		$i=1; foreach ($peserta as $row) {
			$output .='					<tr>
			<td>'.$i.'</td>
			<td>'. $row['nama_peserta'].'</td>
			<td>'. $row['posisi'].'</td>
			</tr>';
			$i++; 
		}
		$output .='			
		</tbody>
		</table>
		';

		header("Content-Type: application/xls");
		header("content-Disposition: Attachment; filename= data_tim.xls");
		echo $output;

	}	

	public function download_pos1($tingkat)
	{

		$data1 = $this->model_penilaian->getDataPos1Putra($tingkat);
		$kostum1 = $this->model_penilaian->getDataKostumPos1Putra($tingkat);
		$danton1 = $this->model_penilaian->getDataDantonPos1Putra($tingkat);
		$data2 = $this->model_penilaian->getDataPos1Putri($tingkat);
		$kostum2 = $this->model_penilaian->getDataKostumPos1Putri($tingkat);
		$danton2 = $this->model_penilaian->getDataDantonPos1Putri($tingkat);
		$juri = $this->model_juri->getJuriPos('1');
		// $query = $this->db->get()
		$output = '
		<table ><tr><td colspan=7 > Pos1 </td></tr><tr><td>Putra</td></tr></table>

		<table border=1 >
		<thead >

		<tr>	
		<th >No</th>
		<th >Asal Sekolah</th>
		<th >Nama Tim</th>
		<th >Kekompakan</th>
		<th >Kerapian</th>	
		<th >Teknik</th>
		<th >Total</th>
		</tr>

		</thead>';
		$i=1;
		foreach ($data1 as $key){
			$output .= '
			<tr>
			<th >'.$i.'</th>
			<th >'.$key['asal_sekolah'].'</th>
			<th >'.$key['nama_tim'].'</th>
			<th >'.$key['kekompakan'].'</th>
			<th >'.$key['kerapian'].'</th>
			<th >'.$key['teknik'].'</th>
			<th >'.$key['total'].'</th>
			</tr>';
			$i++; 
		}
		$output .= '
		</div>
		</div>
		</table>
		<table>
		<tr>
		<td></td>
		</tr>
		</table>
		';

		$output .= '
		<table border=1 >
		<thead >
		<tr>	
		<th>No</th>
		<th>Asal Sekolah</th>
		<th>Nama Tim</th>
		<th>Danton</th>
		</tr>

		</thead>';
		$i=1;
		foreach ($danton1 as $key){
			$output .= '
			<tr>
			<th >'.$i.'</th>
			<th >'.$key['asal_sekolah'].'</th>
			<th >'.$key['nama_tim'].'</th>
			<th >'.$key['danton'].'</th>
			</tr>';
			$i++; 
		}
		$output .= '
		</div>
		</div>
		</table>
		<table>
		<tr>
		<td></td>
		</tr>
		</table>';

		$output .= '
		<table border=1 >
		<thead >
		<tr>	
		<th >No</th>
		<th >Asal Sekolah</th>
		<th >Nama Tim</th>
		<th >Kostum</th>
		</tr>

		</thead>';
		$i=1;
		foreach ($kostum1 as $key){
			$output .= '
			<tr>
			<th >'.$i.'</th>
			<th >'.$key['asal_sekolah'].'</th>
			<th >'.$key['nama_tim'].'</th>
			<th >'.$key['kostum'].'</th>
			</tr>';
			$i++; 
		}
		$output .= '
		</div>
		</div>
		</table>
		<table>
		<tr>
		<td></td>
		</tr>
		</table>

		<table>
		<tr>
		</tr> 
		<tr>
		<td>Putri</td>
		</tr>
		</table>
		<table border=1 >
		<thead >
		<tr>	
		<th >No</th>
		<th >Asal Sekolah</th>
		<th >Nama Tim</th>
		<th >Kekompakan</th>
		<th >Kerapian</th>	
		<th >Teknik</th>
		<th >Total</th>
		</tr>

		</thead>';
		$i=1;
		foreach ($data2 as $key){
			$output .= '
			<tr>
			<th >'.$i.'</th>
			<th >'.$key['asal_sekolah'].'</th>
			<th >'.$key['nama_tim'].'</th>
			<th >'.$key['kekompakan'].'</th>
			<th >'.$key['kerapian'].'</th>
			<th >'.$key['teknik'].'</th>
			<th >'.$key['total'].'</th>
			</tr>';
			$i++; 
		}
		$output .= '
		</div>
		</div>
		</table>
		<table>
		<tr>
		<td></td>
		</tr>
		</table>
		';

		$output .= '
		<table border=1 >
		<thead >
		<tr>	
		<th>No</th>
		<th>Asal Sekolah</th>
		<th>Nama Tim</th>
		<th>Danton</th>
		</tr>

		</thead>';
		$i=1;
		foreach ($danton2 as $key){
			$output .= '
			<tr>
			<th >'.$i.'</th>
			<th >'.$key['asal_sekolah'].'</th>
			<th >'.$key['nama_tim'].'</th>
			<th >'.$key['danton'].'</th>
			</tr>';
			$i++; 
		}
		$output .= '
		</div>
		</div>
		</table>
		<table>
		<tr>
		<td></td>
		</tr>
		</table>';

		$output .= '
		<table border=1 >
		<thead >
		<tr>	
		<th >No</th>
		<th >Asal Sekolah</th>
		<th >Nama Tim</th>
		<th >Kostum</th>
		</tr>

		</thead>';
		$i=1;
		foreach ($kostum2 as $key){
			$output .= '
			<tr>
			<th >'.$i.'</th>
			<th >'.$key['asal_sekolah'].'</th>
			<th >'.$key['nama_tim'].'</th>
			<th >'.$key['kostum'].'</th>
			</tr>';
			$i++; 
		}
		$output .= '
		</div>
		</div>
		</table>
		<table>
		<tr>
		<td></td>
		</tr>
		</table>
		<table>
		<tr>
		<td colspan=3>Juri Pos 1</td>
		</tr>';
		$i=1;
		foreach ($juri as $key) {
			$output .= '	
			<tr>
			<td>'.$i.'</td>
			<td>'.$key['nama_juri'].'</td>
			<td>'.$key['kategori'].'</td>
			</tr>';
			$i++;
		}
		$output .= '
		</table>
		';



		header("Content-Type: application/xls");
		header("content-Disposition: Attachment; filename= Pos1_$tingkat.xls");
		echo $output;
	}

	public function download_pos2($tingkat)
	{

		$data1 = $this->model_penilaian->getDataPos2Putra($tingkat);
		$danton1 = $this->model_penilaian->getDataDantonPos2Putra($tingkat);
		$data2 = $this->model_penilaian->getDataPos2Putri($tingkat);
		$danton2 = $this->model_penilaian->getDataDantonPos2Putri($tingkat);
		$juri = $this->model_juri->getJuriPos('2');
		// $query = $this->db->get()
		$output = '
		<table ><tr><td colspan=7 > Pos2 </td></tr><tr><td>Putra</td></tr></table>
		<table border=1 >
		<thead >
		<tr>	
		<th >No</th>
		<th >Asal Sekolah</th>
		<th >Nama Tim</th>
		<th >Kekompakan</th>
		<th >Kerapian</th>	
		<th >Teknik</th>
		<th >Total</th>
		</tr>

		</thead>';
		$i=1;
		foreach ($data1 as $key){
			$output .= '
			<tr>
			<th >'.$i.'</th>
			<th >'.$key['asal_sekolah'].'</th>
			<th >'.$key['nama_tim'].'</th>
			<th >'.$key['kekompakan'].'</th>
			<th >'.$key['kerapian'].'</th>
			<th >'.$key['teknik'].'</th>
			<th >'.$key['total'].'</th>
			</tr>';
			$i++; 
		}
		$output .= '
		</div>
		</div>
		</table>
		<table>
		<tr>
		<td></td>
		</tr>
		</table>
		';

		$output .= '
		<table border=1 >
		<thead >
		<tr>	
		<th >No</th>
		<th >Asal Sekolah</th>
		<th >Nama Tim</th>
		<th >Danton</th>
		</tr>

		</thead>';
		$i=1;
		foreach ($danton1 as $key){
			$output .= '
			<tr>
			<th >'.$i.'</th>
			<th >'.$key['asal_sekolah'].'</th>
			<th >'.$key['nama_tim'].'</th>
			<th >'.$key['danton'].'</th>
			</tr>';
			$i++; 
		}
		$output .= '
		</div>
		</div>
		</table>
		<table>
		<tr>
		<td></td>
		</tr>
		</table>
		<table ></tr><tr><td>Putri</td></tr></table>
		<table border=1 >
		<thead >
		<tr>	
		<th >No</th>
		<th >Asal Sekolah</th>
		<th >Nama Tim</th>
		<th >Kekompakan</th>
		<th >Kerapian</th>	
		<th >Teknik</th>
		<th >Total</th>
		</tr>

		</thead>';
		$i=1;
		foreach ($data2 as $key){
			$output .= '
			<tr>
			<th >'.$i.'</th>
			<th >'.$key['asal_sekolah'].'</th>
			<th >'.$key['nama_tim'].'</th>
			<th >'.$key['kekompakan'].'</th>
			<th >'.$key['kerapian'].'</th>
			<th >'.$key['teknik'].'</th>
			<th >'.$key['total'].'</th>
			</tr>';
			$i++; 
		}
		$output .= '
		</div>
		</div>
		</table>
		<table>
		<tr>
		<td></td>
		</tr>
		</table>
		';

		$output .= '
		<table border=1 >
		<thead >
		<tr>	
		<th >No</th>
		<th >Asal Sekolah</th>
		<th >Nama Tim</th>
		<th >Danton</th>
		</tr>

		</thead>';
		$i=1;
		foreach ($danton2 as $key){
			$output .= '
			<tr>
			<th >'.$i.'</th>
			<th >'.$key['asal_sekolah'].'</th>
			<th >'.$key['nama_tim'].'</th>
			<th >'.$key['danton'].'</th>
			</tr>';
			$i++; 
		}
		$output .= '
		</div>
		</div>
		</table>
		<table>
		<tr>
		<td></td>
		</tr>
		</table>
		<table>
		<tr>
		<td colspan=2>Juri Pos 1</td>
		</tr>';
		$i=1;
		foreach ($juri as $key) {
			$output .= '	
			<tr>
			<td>'.$i.'</td>
			<td>'.$key['nama_juri'].'</td>
			<td>'.$key['kategori'].'</td>
			</tr>';
			$i++;
		}
		$output .= '
		</table>
		';

		header("Content-Type: application/xls");
		header("content-Disposition: Attachment; filename= Pos2_$tingkat.xls");
		echo $output;
	}

	public function download_pos3($tingkat)
	{

		$data1 = $this->model_penilaian->getDataPos3Putra($tingkat);
		$danton1 = $this->model_penilaian->getDataDantonPos3Putra($tingkat);
		$data2 = $this->model_penilaian->getDataPos3Putri($tingkat);
		$danton2 = $this->model_penilaian->getDataDantonPos3Putri($tingkat);
		$juri = $this->model_juri->getJuriPos('3');
		// $query = $this->db->get()
		$output = '
		<table ><tr><td colspan=7 > Pos3 </td></tr><tr><td>Putra</td></tr></table>
		<table border=1 >
		<thead >
		<tr>	
		<th >No</th>
		<th >Asal Sekolah</th>
		<th >Nama Tim</th>
		<th >Kekompakan</th>
		<th >Kerapian</th>	
		<th >Teknik</th>
		<th >Total</th>
		</tr>

		</thead>';
		$i=1;
		foreach ($data1 as $key){
			$output .= '
			<tr>
			<th >'.$i.'</th>
			<th >'.$key['asal_sekolah'].'</th>
			<th >'.$key['nama_tim'].'</th>
			<th >'.$key['kekompakan'].'</th>
			<th >'.$key['kerapian'].'</th>
			<th >'.$key['teknik'].'</th>
			<th >'.$key['total'].'</th>
			</tr>';
			$i++; 
		}
		$output .= '
		</div>
		</div>
		</table>
		<table>
		<tr>
		<td></td>
		</tr>
		</table>
		';

		$output .= '
		<table border=1 >
		<thead >
		<tr>	
		<th >No</th>
		<th >Asal Sekolah</th>
		<th >Nama Tim</th>
		<th >Danton</th>
		</tr>

		</thead>';
		$i=1;
		foreach ($danton1 as $key){
			$output .= '
			<tr>
			<th >'.$i.'</th>
			<th >'.$key['asal_sekolah'].'</th>
			<th >'.$key['nama_tim'].'</th>
			<th >'.$key['danton'].'</th>
			</tr>';
			$i++; 
		}
		$output .= '
		</div>
		</div>
		</table>
		<table>
		<tr>
		<td></td>
		</tr>
		</table>
		<table ></tr><tr><td>Putri</td></tr></table>
		<table border=1 >
		<thead >
		<tr>	
		<th >No</th>
		<th >Asal Sekolah</th>
		<th >Nama Tim</th>
		<th >Kekompakan</th>
		<th >Kerapian</th>	
		<th >Teknik</th>
		<th >Total</th>
		</tr>

		</thead>';
		$i=1;
		foreach ($data2 as $key){
			$output .= '
			<tr>
			<th >'.$i.'</th>
			<th >'.$key['asal_sekolah'].'</th>
			<th >'.$key['nama_tim'].'</th>
			<th >'.$key['kekompakan'].'</th>
			<th >'.$key['kerapian'].'</th>
			<th >'.$key['teknik'].'</th>
			<th >'.$key['total'].'</th>
			</tr>';
			$i++; 
		}
		$output .= '
		</div>
		</div>
		</table>
		<table>
		<tr>
		<td></td>
		</tr>
		</table>
		';

		$output .= '
		<table border=1 >
		<thead >
		<tr>	
		<th >No</th>
		<th >Asal Sekolah</th>
		<th >Nama Tim</th>
		<th >Danton</th>
		</tr>

		</thead>';
		$i=1;
		foreach ($danton2 as $key){
			$output .= '
			<tr>
			<th >'.$i.'</th>
			<th >'.$key['asal_sekolah'].'</th>
			<th >'.$key['nama_tim'].'</th>
			<th >'.$key['danton'].'</th>
			</tr>';
			$i++; 
		}
		$output .= '
		</div>
		</div>
		</table>
		<table>
		<tr>
		<td></td>
		</tr>
		</table>
		<table>
		<tr>
		<td colspan=2>Juri Pos 1</td>
		</tr>';
		$i=1;
		foreach ($juri as $key) {
			$output .= '	
			<tr>
			<td>'.$i.'</td>
			<td>'.$key['nama_juri'].'</td>
			<td>'.$key['kategori'].'</td>
			</tr>';
			$i++;
		}
		$output .= '
		</table>
		';

		header("Content-Type: application/xls");
		header("content-Disposition: Attachment; filename= Pos3_$tingkat.xls");
		echo $output;
	}

	public function download_pos4($tingkat)
	{

		$data1 = $this->model_penilaian->getDataPos4Putra($tingkat);
		$danton1 = $this->model_penilaian->getDataDantonPos4Putra($tingkat);
		$data2 = $this->model_penilaian->getDataPos4Putri($tingkat);
		$danton2 = $this->model_penilaian->getDataDantonPos4Putri($tingkat);
		$juri = $this->model_juri->getJuriPos('4');
		// $query = $this->db->get()
		$output = '
		<table ><tr><td colspan=7 > Pos4 </td></tr><tr><td>Putra</td></tr></table>
		<table border=1 >
		<thead >
		<tr>	
		<th >No</th>
		<th >Asal Sekolah</th>
		<th >Nama Tim</th>
		<th >Kekompakan</th>
		<th >Kerapian</th>	
		<th >Teknik</th>
		<th >Total</th>
		</tr>

		</thead>';
		$i=1;
		foreach ($data1 as $key){
			$output .= '
			<tr>
			<th >'.$i.'</th>
			<th >'.$key['asal_sekolah'].'</th>
			<th >'.$key['nama_tim'].'</th>
			<th >'.$key['kekompakan'].'</th>
			<th >'.$key['kerapian'].'</th>
			<th >'.$key['teknik'].'</th>
			<th >'.$key['total'].'</th>
			</tr>';
			$i++; 
		}
		$output .= '
		</div>
		</div>
		</table>
		<table>
		<tr>
		<td></td>
		</tr>
		</table>
		';

		$output .= '
		<table border=1 >
		<thead >
		<tr>	
		<th >No</th>
		<th >Asal Sekolah</th>
		<th >Nama Tim</th>
		<th >Danton</th>
		</tr>

		</thead>';
		$i=1;
		foreach ($danton1 as $key){
			$output .= '
			<tr>
			<th >'.$i.'</th>
			<th >'.$key['asal_sekolah'].'</th>
			<th >'.$key['nama_tim'].'</th>
			<th >'.$key['danton'].'</th>
			</tr>';
			$i++; 
		}
		$output .= '
		</div>
		</div>
		</table>
		<table>
		<tr>
		<td></td>
		</tr>
		</table>
		<table ></tr><tr><td>Putri</td></tr></table>
		<table border=1 >
		<thead >
		<tr>	
		<th >No</th>
		<th >Asal Sekolah</th>
		<th >Nama Tim</th>
		<th >Kekompakan</th>
		<th >Kerapian</th>	
		<th >Teknik</th>
		<th >Total</th>
		</tr>

		</thead>';
		$i=1;
		foreach ($data2 as $key){
			$output .= '
			<tr>
			<th >'.$i.'</th>
			<th >'.$key['asal_sekolah'].'</th>
			<th >'.$key['nama_tim'].'</th>
			<th >'.$key['kekompakan'].'</th>
			<th >'.$key['kerapian'].'</th>
			<th >'.$key['teknik'].'</th>
			<th >'.$key['total'].'</th>
			</tr>';
			$i++; 
		}
		$output .= '
		</div>
		</div>
		</table>
		<table>
		<tr>
		<td></td>
		</tr>
		</table>
		';

		$output .= '
		<table border=1 >
		<thead >
		<tr>	
		<th >No</th>
		<th >Asal Sekolah</th>
		<th >Nama Tim</th>
		<th >Danton</th>
		</tr>

		</thead>';
		$i=1;
		foreach ($danton2 as $key){
			$output .= '
			<tr>
			<th >'.$i.'</th>
			<th >'.$key['asal_sekolah'].'</th>
			<th >'.$key['nama_tim'].'</th>
			<th >'.$key['danton'].'</th>
			</tr>';
			$i++; 
		}
		$output .= '
		</div>
		</div>
		</table>
		<table>
		<tr>
		<td></td>
		</tr>
		</table>
		<table>
		<tr>
		<td colspan=2>Juri Pos 1</td>
		</tr>';
		$i=1;
		foreach ($juri as $key) {
			$output .= '	
			<tr>
			<td>'.$i.'</td>
			<td>'.$key['nama_juri'].'</td>
			<td>'.$key['kategori'].'</td>
			</tr>';
			$i++;
		}
		$output .= '
		</table>
		';

		header("Content-Type: application/xls");
		header("content-Disposition: Attachment; filename= Pos4_$tingkat.xls");
		echo $output;
	}

	public function download_rekap($tingkat)
	{

		$query1 = $this->model_rekap->getRekapPutra($tingkat);
		$danton1 = $this->model_rekap->getRekapDantonPutra($tingkat);
		$kostum1 = $this->model_rekap->getRekapKostumPutra($tingkat);
		$query2 = $this->model_rekap->getRekapPutri($tingkat);
		$danton2 = $this->model_rekap->getRekapDantonPutri($tingkat);
		$kostum2 = $this->model_rekap->getRekapKostumPutri($tingkat);
		$juri = $this->model_juri->getJuri();
		// $query = $this->db->get()
		$output = '
		<table ><tr><td colspan=7 > Rekap </td></tr><tr><td>Putra</td></tr></table>
		<table border=1 >
		<thead >
		<tr>	
		<th rowspan="2">No</th>
		<th rowspan="2">Asal Sekolah</th>
		<th rowspan="2">Nama Tim</th>
		<th rowspan="1" colspan="5">Nilai Total</th>
		</tr>	
		<tr>
		<th rowspan="1">Pos 1</th>
		<th rowspan="1">Pos 2</th>	
		<th rowspan="1">Pos 3</th>
		<th rowspan="1">Pos 4</th>
		<th rowspan="1">Total</th>
		</tr>

		</thead>';
		$i=1;
		foreach ($query1 as $key){
			$output .= '
			<tr>s
			<th colspan="1">'.$i.'</th>
			<th colspan="1">'.$key['asal_sekolah'].'</th>
			<th colspan="1">'.$key['nama_tim'].'</th>
			<th colspan="1">'.$key['total_pos1'].'</th>
			<th colspan="1">'.$key['total_pos2'].'</th>
			<th colspan="1">'.$key['total_pos3'].'</th>
			<th colspan="1">'.$key['total_pos4'].'</th>
			<th colspan="1">'.$key['total_seluruh'].'</th>
			</tr>';

			$i++; 
		}
		$output .= '
		</div>
		</div>
		</table>
		<table>
		<tr>
		<td></td>
		</tr>
		</table>
		';

		$output .= '
		<table border=1 >
		<thead >
		<tr>	
		<th rowspan="2">No</th>
		<th rowspan="2">Sekolah</th>
		<th rowspan="2">Nama Tim</th>
		<th colspan="5">Nilai Danton</th>
		</tr>	
		<tr>
		<th>Pos 1</th>
		<th>Pos 2</th>
		<th>Pos 3</th>
		<th>Pos 4</th>
		<th>Total</th>
		</tr>

		</thead>';
		$i=1;
		foreach ($danton1 as $key){
			$output .= '
			<tr>
			<th >'.$i.'</th>
			<th >'.$key['asal_sekolah'].'</th>
			<th >'.$key['nama_tim'].'</th>
			<th >'.$key['danton_pos1'].'</th>
			<th >'.$key['danton_pos2'].'</th>
			<th >'.$key['danton_pos3'].'</th>
			<th >'.$key['danton_pos4'].'</th>
			<th >'.$key['total_danton'].'</th>
			</tr>';
			$i++; 
		}
		$output .= '
		</div>
		</div>
		</table>
		<table>
		<tr>
		<td></td>
		</tr>
		</table>';

		$output .= '
		<table border=1 >
		<thead >
		<tr>	
		<th >No</th>
		<th >Asal Sekolah</th>
		<th >Nama Tim</th>
		<th >Total Kostum</th>
		</tr>

		</thead>';
		$i=1;
		foreach ($kostum1 as $key){
			$output .= '
			<tr>
			<th>'.$i.'</th>
			<th>'.$key['asal_sekolah'].'</th>
			<th>'.$key['nama_tim'].'</th>
			<th>'.$key['total_kostum'].'</th>
			</tr>';
			$i++; 
		}
		$output .= '
		</div>
		</div>
		</table>
		<table>
		<tr>
		<td></td>
		</tr>
		</table>';


		$output .= '
		<table ><tr><td>Putri</td></tr></table>
		<table border=1 >
		<thead >
		<tr>	
		<th rowspan="2">No</th>
		<th rowspan="2">Asal Sekolah</th>
		<th rowspan="2">Nama Tim</th>
		<th rowspan="1" colspan="5">Nilai Total</th>
		</tr>	
		<tr>
		<th rowspan="1">Pos 1</th>
		<th rowspan="1">Pos 2</th>	
		<th rowspan="1">Pos 3</th>
		<th rowspan="1">Pos 4</th>
		<th rowspan="1">Total</th>
		</tr>

		</thead>';
		$i=1;
		foreach ($query2 as $key){
			$output .= '
			<tr>s
			<th colspan="1">'.$i.'</th>
			<th colspan="1">'.$key['asal_sekolah'].'</th>
			<th colspan="1">'.$key['nama_tim'].'</th>
			<th colspan="1">'.$key['total_pos1'].'</th>
			<th colspan="1">'.$key['total_pos2'].'</th>
			<th colspan="1">'.$key['total_pos3'].'</th>
			<th colspan="1">'.$key['total_pos4'].'</th>
			<th colspan="1">'.$key['total_seluruh'].'</th>
			</tr>';

			$i++; 
		}
		$output .= '
		</div>
		</div>
		</table>
		<table>
		<tr>
		<td></td>
		</tr>
		</table>
		';

		$output .= '
		<table border=1 >
		<thead >
		<tr>	
		<th rowspan="2">No</th>
		<th rowspan="2">Sekolah</th>
		<th rowspan="2">Nama Tim</th>
		<th colspan="5">Nilai Danton</th>
		</tr>	
		<tr>
		<th>Pos 1</th>
		<th>Pos 2</th>
		<th>Pos 3</th>
		<th>Pos 4</th>
		<th>Total</th>
		</tr>

		</thead>';
		$i=1;
		foreach ($danton2 as $key){
			$output .= '
			<tr>
			<th >'.$i.'</th>
			<th >'.$key['asal_sekolah'].'</th>
			<th >'.$key['nama_tim'].'</th>
			<th >'.$key['danton_pos1'].'</th>
			<th >'.$key['danton_pos2'].'</th>
			<th >'.$key['danton_pos3'].'</th>
			<th >'.$key['danton_pos4'].'</th>
			<th >'.$key['total_danton'].'</th>
			</tr>';
			$i++; 
		}
		$output .= '
		</div>
		</div>
		</table>
		<table>
		<tr>
		<td></td>
		</tr>
		</table>';

		$output .= '
		<table border=1 >
		<thead >
		<tr>	
		<th >No</th>
		<th >Asal Sekolah</th>
		<th >Nama Tim</th>
		<th >Total Kostum</th>
		</tr>

		</thead>';
		$i=1;
		foreach ($kostum2 as $key){
			$output .= '
			<tr>
			<th>'.$i.'</th>
			<th>'.$key['asal_sekolah'].'</th>
			<th>'.$key['nama_tim'].'</th>
			<th>'.$key['total_kostum'].'</th>
			</tr>';
			$i++; 
		}
		$output .= '
		</div>
		</div>
		</table>
		<table>
		<tr>
		<td></td>
		</tr>
		</table>';


		header("Content-Type: application/xls");
		header("content-Disposition: Attachment; filename= Rekap_$tingkat.xls");
		echo $output;
	}

	public function pos1($tingkat)
	{

		$data1 = $this->model_penilaian->getDataPos1Putra($tingkat);
		$data2 = $this->model_penilaian->getDataPos1Putri($tingkat);
		$kostum1 = $this->model_penilaian->getDataKostumPos1Putra($tingkat);
		$kostum2 = $this->model_penilaian->getDataKostumPos1Putri($tingkat);
		$danton1 = $this->model_penilaian->getDataDantonPos1Putra($tingkat);
		$danton2 = $this->model_penilaian->getDataDantonPos1Putri($tingkat);
		$juri = $this->model_juri->getJuriPos('1');
		$this->load->view('rekap_1', array('data1' => $data1, 'data2' => $data2, 'kostum1' => $kostum1, 'kostum2' => $kostum2, 'danton1' => $danton1, 'danton2' => $danton2, 'juri' => $juri ));

	}

	public function pos2($tingkat)
	{
		$data1 = $this->model_penilaian->getDataPos2Putra($tingkat);
		$data2 = $this->model_penilaian->getDataPos2Putri($tingkat);
		$danton1 = $this->model_penilaian->getDataDantonPos2Putra($tingkat);
		$danton2 = $this->model_penilaian->getDataDantonPos2Putri($tingkat);
		$juri = $this->model_juri->getJuriPos('2');
		$this->load->view('rekap_2', array('data1' => $data1, 'data2' => $data2, 'danton1' => $danton1, 'danton2' => $danton2, 'juri' => $juri ));

	}

	public function pos3($tingkat)
	{
		$data1 = $this->model_penilaian->getDataPos3Putra($tingkat);
		$data2 = $this->model_penilaian->getDataPos3Putri($tingkat);
		$danton1 = $this->model_penilaian->getDataDantonPos3Putra($tingkat);
		$danton2 = $this->model_penilaian->getDataDantonPos3Putri($tingkat);
		$juri = $this->model_juri->getJuriPos('3');
		$this->load->view('rekap_3', array('data1' => $data1, 'data2' => $data2, 'danton1' => $danton1, 'danton2' => $danton2, 'juri' => $juri ));

	}

	public function pos4($tingkat)
	{
		$data1 = $this->model_penilaian->getDataPos4Putra($tingkat);
		$data2 = $this->model_penilaian->getDataPos4Putri($tingkat);
		$danton1 = $this->model_penilaian->getDataDantonPos4Putra($tingkat);
		$danton2 = $this->model_penilaian->getDataDantonPos4Putri($tingkat);
		$juri = $this->model_juri->getJuriPos('4');
		$this->load->view('rekap_4', array('data1' => $data1, 'data2' => $data2, 'danton1' => $danton1, 'danton2' => $danton2, 'juri' => $juri ));

	}
}
