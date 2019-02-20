<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_penilaian extends CI_Model {

	public function insert_data($data)
	{
		$this->db->insert('pos1',$data);
        $this->db->insert('pos2',$data);
        $this->db->insert('pos3',$data);
        $this->db->insert('pos4',$data);
	}
	
    public function insert_data_sd($data){
        $this->db->insert('pos1',$data);
    }

    public function delAllPos1(){
        if ($this->session->userdata('who')=='admin') {
             $this->db->query('delete from pos1');
        }
    }

    public function delAllPos2(){
        if ($this->session->userdata('who')=='admin') {
             $this->db->query('delete from pos2');
        }
    }

    public function delAllPos3(){
        if ($this->session->userdata('who')=='admin') {
             $this->db->query('delete from pos3');
        }
    }

    public function delAllPos4(){
        if ($this->session->userdata('who')=='admin') {
             $this->db->query('delete from pos4');
        }
    }

    public function getHasilSemuaPenilaian(){

        $this->db->select("*");
        $this->db->from('penilaian');
        $this->db->join('tim a','a.id_tim = penilaian.id_tim_A');
        $this->db->join('tim b','b.id_tim = penilaian.id_tim_B');

        // $this->db->query('SELECT *,a.asal_sekolah as 'sekolah_A', a.nama_tim as 'nama_tim_A', b.asal_sekolah as 'sekolah_B' ,b.nama_tim as 'nama_tim_B' FROM `penilaian` INNER JOIN tim a on a.id_tim = penilaian.id_tim_A INNER JOIN tim b on b.id_tim = penilaian.id_tim_B');

        $query = $this->db->get();
        return $query->result_array();
    }

    public function getDataPos1Putra($tingkat){ 
        

        $y = "IFNULL(kekompakan, 0)+ "
        ."IFNULL(kerapian, 0) + "
        ."IFNULL(teknik, 0) - "
        ."IFNULL(garis, 0) AS 'total' ";

        $this->db->select("*,$y");
        $this->db->from('pos1');
        $this->db->join('tim','pos1.no_punggung = tim.no_punggung');
        $this->db->where("pos1.tingkat = '$tingkat' && tim.gender='putra' order by total desc");
        $query = $this->db->get();
        // echo $this->db->last_query();        
        return $query->result_array();

    }

    public function getDataPos1Putri($tingkat){ 
        

        $y = "IFNULL(kekompakan, 0)+ "
        ."IFNULL(kerapian, 0) + "
        ."IFNULL(teknik, 0) - "
        ."IFNULL(garis, 0) AS 'total' ";

        $this->db->select("*,$y");
        $this->db->from('pos1');
        $this->db->join('tim','pos1.no_punggung = tim.no_punggung');
        $this->db->where("pos1.tingkat = '$tingkat' && tim.gender='putri' order by total desc");
        $query = $this->db->get();
        // echo $this->db->last_query();        
        return $query->result_array();

    }

    public function getDataPos1StatikPutra($tingkat){ 
        $this->db->select("*");
        $this->db->from('pos1');
        $this->db->join('tim','pos1.no_punggung = tim.no_punggung');
        $this->db->where("pos1.tingkat = '$tingkat' && tim.gender='putra' order by pos1.no_punggung asc");
        $query = $this->db->get();
        // echo $this->db->last_query();        
        return $query->result_array();
    }

    public function getDataPos1StatikPutri($tingkat){ 
        $this->db->select("*");
        $this->db->from('pos1');
        $this->db->join('tim','pos1.no_punggung = tim.no_punggung');
        $this->db->where("pos1.tingkat = '$tingkat' && tim.gender='putri' order by pos1.no_punggung asc");
        $query = $this->db->get();
        // echo $this->db->last_query();        
        return $query->result_array();
    }

    public function getDataPos2StatikPutra($tingkat){ 
        
        $this->db->select("*");
        $this->db->from('pos2');
        $this->db->join('tim','pos2.no_punggung = tim.no_punggung');
        $this->db->where("pos2.tingkat = '$tingkat' && tim.gender='putra' order by pos2.no_punggung asc");
        $query = $this->db->get();
        // echo $this->db->last_query();        
        return $query->result_array();

    }

    public function getDataPos2StatikPutri($tingkat){ 
        
        $this->db->select("*");
        $this->db->from('pos2');
        $this->db->join('tim','pos2.no_punggung = tim.no_punggung');
        $this->db->where("pos2.tingkat = '$tingkat' && tim.gender='putri' order by pos2.no_punggung asc");
        $query = $this->db->get();
        // echo $this->db->last_query();        
        return $query->result_array();

    }

    public function getDataPos3StatikPutra($tingkat){ 
        
        $this->db->select("*");
        $this->db->from('pos3');
        $this->db->join('tim','pos3.no_punggung = tim.no_punggung');
        $this->db->where("pos3.tingkat = '$tingkat' && tim.gender='putra' order by pos3.no_punggung asc");
        $query = $this->db->get();
        // echo $this->db->last_query();        
        return $query->result_array();

    }

    public function getDataPos3StatikPutri($tingkat){ 
        
        $this->db->select("*");
        $this->db->from('pos3');
        $this->db->join('tim','pos3.no_punggung = tim.no_punggung');
        $this->db->where("pos3.tingkat = '$tingkat' && tim.gender='putri' order by pos3.no_punggung asc");
        $query = $this->db->get();
        // echo $this->db->last_query();        
        return $query->result_array();

    }

    public function getDataPos4StatikPutra($tingkat){ 
        
        $this->db->select("*");
        $this->db->from('pos4');
        $this->db->join('tim','pos4.no_punggung = tim.no_punggung');
        $this->db->where("pos4.tingkat = '$tingkat' && tim.gender='putra' order by pos4.no_punggung asc");
        $query = $this->db->get();
        // echo $this->db->last_query();        
        return $query->result_array();

    }

    public function getDataPos4StatikPutri($tingkat){ 
        
        $this->db->select("*");
        $this->db->from('pos4');
        $this->db->join('tim','pos4.no_punggung = tim.no_punggung');
        $this->db->where("pos4.tingkat = '$tingkat' && tim.gender='putri' order by pos4.no_punggung asc");
        $query = $this->db->get();
        // echo $this->db->last_query();        
        return $query->result_array();

    }

    public function getDataKostumPos1Putra($tingkat){ 
        
        $this->db->select("*");
        $this->db->from('pos1');
        $this->db->join('tim','pos1.no_punggung = tim.no_punggung');
        $this->db->where("pos1.tingkat = '$tingkat' && tim.gender='putra' order by kostum desc");
        $query = $this->db->get();
        // echo $this->db->last_query();        
        return $query->result_array();

    }

    public function getDataKostumPos1Putri($tingkat){ 
        
        $this->db->select("*");
        $this->db->from('pos1');
        $this->db->join('tim','pos1.no_punggung = tim.no_punggung');
        $this->db->where("pos1.tingkat = '$tingkat' && tim.gender='putri' order by kostum desc");
        $query = $this->db->get();
        // echo $this->db->last_query();        
        return $query->result_array();

    }

    public function getDataDantonPos1Putra($tingkat){ 
        
        $this->db->select("*");
        $this->db->from('pos1');
        $this->db->join('tim','pos1.no_punggung = tim.no_punggung');
        $this->db->where("pos1.tingkat = '$tingkat' && tim.gender='putra' order by danton desc");
        $query = $this->db->get();
        // echo $this->db->last_query();        
        return $query->result_array();

    }

    public function getDataDantonPos1Putri($tingkat){ 
        
        $this->db->select("*");
        $this->db->from('pos1');
        $this->db->join('tim','pos1.no_punggung = tim.no_punggung');
        $this->db->where("pos1.tingkat = '$tingkat' && tim.gender='putri' order by danton desc");
        $query = $this->db->get();
        // echo $this->db->last_query();        
        return $query->result_array();

    }

    public function getDataDantonPos2Putra($tingkat){ 
        
        $this->db->select("*");
        $this->db->from('pos2');
        $this->db->join('tim','pos2.no_punggung = tim.no_punggung');
        $this->db->where("pos2.tingkat = '$tingkat' && tim.gender='putra' order by danton desc");
        $query = $this->db->get();
        // echo $this->db->last_query();        
        return $query->result_array();

    }

    public function getDataDantonPos2Putri($tingkat){ 
        
        $this->db->select("*");
        $this->db->from('pos2');
        $this->db->join('tim','pos2.no_punggung = tim.no_punggung');
        $this->db->where("pos2.tingkat = '$tingkat' && tim.gender='putri' order by danton desc");
        $query = $this->db->get();
        // echo $this->db->last_query();        
        return $query->result_array();

    }

    public function getDataDantonPos3Putra($tingkat){ 
        
        $this->db->select("*");
        $this->db->from('pos3');
        $this->db->join('tim','pos3.no_punggung = tim.no_punggung');
        $this->db->where("pos3.tingkat = '$tingkat' && tim.gender='putra' order by danton desc");
        $query = $this->db->get();
        // echo $this->db->last_query();        
        return $query->result_array();

    }

    public function getDataDantonPos3Putri($tingkat){ 
        
        $this->db->select("*");
        $this->db->from('pos3');
        $this->db->join('tim','pos3.no_punggung = tim.no_punggung');
        $this->db->where("pos3.tingkat = '$tingkat' && tim.gender='putri' order by danton desc");
        $query = $this->db->get();
        // echo $this->db->last_query();        
        return $query->result_array();

    }

    public function getDataDantonPos4Putra($tingkat){ 
        
        $this->db->select("*");
        $this->db->from('pos4');
        $this->db->join('tim','pos4.no_punggung = tim.no_punggung');
        $this->db->where("pos4.tingkat = '$tingkat' && tim.gender='putra' order by danton desc");
        $query = $this->db->get();
        // echo $this->db->last_query();        
        return $query->result_array();

    }

    public function getDataDantonPos4Putri($tingkat){ 
        
        $this->db->select("*");
        $this->db->from('pos4');
        $this->db->join('tim','pos4.no_punggung = tim.no_punggung');
        $this->db->where("pos4.tingkat = '$tingkat' && tim.gender='putri' order by danton desc");
        $query = $this->db->get();
        // echo $this->db->last_query();        
        return $query->result_array();

    }

    public function getDataPos2Putra($tingkat){

         $y = "IFNULL(kekompakan, 0)+ "
        ."IFNULL(kerapian, 0) + "
        ."IFNULL(teknik, 0) - "
        ."IFNULL(garis, 0) AS 'total' ";

        $this->db->select("*, $y, asal_sekolah");
        $this->db->from('pos2');
        $this->db->join('tim','pos2.no_punggung = tim.no_punggung');
        $this->db->where("pos2.tingkat = '$tingkat' && tim.gender='putra' order by total desc");
        $query = $this->db->get();        
        return $query->result_array();
        
    }

    public function getDataPos2Putri($tingkat){

         $y = "IFNULL(kekompakan, 0)+ "
        ."IFNULL(kerapian, 0) + "
        ."IFNULL(teknik, 0) - "
        ."IFNULL(garis, 0) AS 'total' ";

        $this->db->select("*, $y, asal_sekolah");
        $this->db->from('pos2');
        $this->db->join('tim','pos2.no_punggung = tim.no_punggung');
        $this->db->where("pos2.tingkat = '$tingkat' && tim.gender='putri' order by total desc");
        $query = $this->db->get();        
        return $query->result_array();
        
    }

    public function getDataPos3Putra($tingkat){

         $y = "IFNULL(kekompakan, 0)+ "
        ."IFNULL(kerapian, 0) + "
        ."IFNULL(teknik, 0) - "
        ."IFNULL(garis, 0) AS 'total' ";

        $this->db->select("*, $y, asal_sekolah");
        $this->db->from('pos3');
        $this->db->join('tim','pos3.no_punggung = tim.no_punggung');
        $this->db->where("pos3.tingkat = '$tingkat' && tim.gender='putra' order by total desc");
        $query = $this->db->get();        
        return $query->result_array();

    }

    public function getDataPos3Putri($tingkat){

         $y = "IFNULL(kekompakan, 0)+ "
        ."IFNULL(kerapian, 0) + "
        ."IFNULL(teknik, 0) - "
        ."IFNULL(garis, 0) AS 'total' ";

        $this->db->select("*, $y, asal_sekolah");
        $this->db->from('pos3');
        $this->db->join('tim','pos3.no_punggung = tim.no_punggung');
        $this->db->where("pos3.tingkat = '$tingkat' && tim.gender='putri' order by total desc");
        $query = $this->db->get();        
        return $query->result_array();

    }

    public function getDataPos4Putra($tingkat){

        $y = "IFNULL(kekompakan, 0)+ "
        ."IFNULL(kerapian, 0) + "
        ."IFNULL(teknik, 0) - "
        ."IFNULL(garis, 0) AS 'total' ";

        $this->db->select("*, $y, asal_sekolah");
        $this->db->from('pos4');
        $this->db->join('tim','pos4.no_punggung = tim.no_punggung');
        $this->db->where("pos4.tingkat = '$tingkat' && tim.gender='putra' order by total desc");
        $query = $this->db->get();        
        //echo $query->last_query();
        return $query->result_array();

    }

    public function getDataPos4Putri($tingkat){

        $y = "IFNULL(kekompakan, 0)+ "
        ."IFNULL(kerapian, 0) + "
        ."IFNULL(teknik, 0) - "
        ."IFNULL(garis, 0) AS 'total' ";

        $this->db->select("*, $y, asal_sekolah");
        $this->db->from('pos4');
        $this->db->join('tim','pos4.no_punggung = tim.no_punggung');
        $this->db->where("pos4.tingkat = '$tingkat' && tim.gender='putri' order by total desc");
        $query = $this->db->get();        
        //echo $query->last_query();
        return $query->result_array();

    }

}
