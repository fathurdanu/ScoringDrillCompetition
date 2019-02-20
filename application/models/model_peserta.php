<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_peserta extends CI_Model {

	public function insert_data_tim($data)
	{
		$this->db->insert('tim',$data);
	}

    public function insert_data_peserta($data)
    {
        $this->db->insert('peserta',$data);
    }

    public function cek_tim($data){
        $data = $this->db->query("SELECT `nama_tim` FROM tim where nama_tim = '$data'");
        if ($data->num_rows()>0) {
            return 1;
        }
        else{
            return 0;
        }
    }

    public function delAllTim(){
        if ($this->session->userdata('who')=='admin') {
            $this->db->query('delete from Tim');
        }
    }

    public function delAllPeserta(){
        if ($this->session->userdata('who')=='admin') {
            $this->db->query('delete from Peserta');
        }
    }

    public function getTim($no_punggung){
        if ($this->session->userdata('who')=='admin') {
            $this->db->select("*");
            $this->db->from('tim');
            $this->db->where("no_punggung = '$no_punggung' ");
            $query = $this->db->get();
            return $query->result_array();
        }
    }

    public function getPeserta($no_punggung){
        if ($this->session->userdata('who')=='admin') {
            $this->db->select("*");
            $this->db->from('peserta');
            $this->db->where("no_punggung = '$no_punggung' ");
            $query = $this->db->get();
            return $query->result_array();
        }
    }

    public function getPesertaSDPutra(){
        $this->db->select('*');
        $this->db->from('tim');
        $this->db->where('tingkat = "SD" && gender="putra"');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getPesertaSDPutri(){
        $this->db->select('*');
        $this->db->from('tim');
        $this->db->where('tingkat = "SD" && gender="putri"');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getPesertaSMPPutra(){
        $this->db->select('*');
        $this->db->from('tim');
        $this->db->where('tingkat = "SMP" && gender="putra"');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getPesertaSMPPutri(){
        $this->db->select('*');
        $this->db->from('tim');
        $this->db->where('tingkat = "SMP" && gender="putri"');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getPesertaSMAPutra(){
        $this->db->select('*');
        $this->db->from('tim');
        $this->db->where('tingkat = "SMA" && gender="putra"');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getPesertaSMAPutri(){
        $this->db->select('*');
        $this->db->from('tim');
        $this->db->where('tingkat = "SMA" && gender="putri"');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getNoPunggung($tim){
        $this->db->select('no_punggung');
        $this->db->from('tim');
        $this->db->where('nama_tim = "'.$tim.'"');
        $query = $this->db->get()->row_array();
        //echo $query['no_punggung']; 
        //echo $this->db->last_query();
        return $query['no_punggung'];
    }

    public function delRekap($tim){ 
        $this->db->where('pos1 = "'.$tim.'"');
        $this->db->delete('rekap');
    }

    public function delPeserta($tim){ 
        $this->db->where('no_punggung = "'.$tim.'"');
        $this->db->delete('peserta');
    }

    public function delPos1($tim){

        $this->db->where('no_punggung = "'.$tim.'"');
        $this->db->delete('pos1');
    } 

    public function delPos2($tim){

        $this->db->where('no_punggung = "'.$tim.'"');
        $this->db->delete('pos2');
    }   

    public function delPos3($tim){

        $this->db->where('no_punggung = "'.$tim.'"');
        $this->db->delete('pos3');
    }     

    public function delPos4($tim){

        $this->db->where('no_punggung = "'.$tim.'"');
        $this->db->delete('pos4');
    }   

    public function delTim($tim){

        $this->db->where('no_punggung = "'.$tim.'"');
        $this->db->delete('tim');
    }   

    public function getLastNoPunggung(){
        $data = $this->db->query('SELECT `no_punggung` FROM tim ORDER BY no_punggung DESC LIMIT 1');
        if ($data->num_rows()>0) {
            $sql = $data->row_array();
            return $sql['no_punggung'];
        }
        else{
            return 0;
        }
    }

}
