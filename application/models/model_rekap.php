<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_rekap extends CI_Model {

	public function insert_data($data)
	{
		$this->db->insert('rekap',$data);
	}

    public function getRekapPutra($tingkat){
        // $query = $this->db->query("
        //     SELECT *, 
        //     IFNULL(`pos1`.`kekompakan`, 0) + IFNULL(`pos2`.`kekompakan`, 0) + IFNULL(`pos3`.`kekompakan`,0) + IFNULL(`pos4`.`kekompakan`,0) as 'total_kekompakan', 
        //     IFNULL(`pos1`.`kerapian`, 0) + IFNULL(`pos2`.`kerapian`, 0) + IFNULL(`pos3`.`kerapian`, 0) + IFNULL(`pos4`.`kerapian`,0) as 'total_kerapian', 
        //     IFNULL(`pos1`.`teknik`, 0) + IFNULL(`pos2`.`teknik`,0) + IFNULL(`pos3`.`teknik`,0) + IFNULL(`pos4`.`teknik`, 0) as 'total_teknik', 
            
        //     IFNULL(`pos1`.`kekompakan`, 0) + IFNULL(`pos2`.`kekompakan`, 0) + IFNULL(`pos3`.`kekompakan`,0) + IFNULL(`pos4`.`kekompakan`,0) + 
        //     IFNULL(`pos1`.`kerapian`, 0) + IFNULL(`pos2`.`kerapian`, 0) + IFNULL(`pos3`.`kerapian`, 0) + IFNULL(`pos4`.`kerapian`,0) + 
        //     IFNULL(`pos1`.`teknik`, 0) + IFNULL(`pos2`.`teknik`,0) + IFNULL(`pos3`.`teknik`,0) + IFNULL(`pos4`.`teknik`, 0) as 'total_seluruh'
        //     FROM `rekap` 
        //     JOIN pos1 ON pos1.no_punggung = rekap.pos1 
        //     JOIN pos2 ON pos2.no_punggung = rekap.pos2 
        //     JOIN pos3 ON pos3.no_punggung = rekap.pos3
        //     JOIN pos4 ON pos4.no_punggung = rekap.pos4 
        //     JOIN tim ON pos1.no_punggung = tim.no_punggung
        //     WHERE `pos1`.`tingkat` = '$tingkat' order by total_seluruh desc ");

         $query = $this->db->query("
            SELECT *, 
            IFNULL(`pos1`.`kekompakan`, 0) + IFNULL(`pos1`.`kerapian`, 0) + IFNULL(`pos1`.`teknik`, 0) - IFNULL(`pos1`.`garis`, 0) as 'total_pos1', 
            IFNULL(`pos2`.`kekompakan`, 0) + IFNULL(`pos2`.`kerapian`, 0) + IFNULL(`pos2`.`teknik`, 0) - IFNULL(`pos2`.`garis`, 0) as 'total_pos2', 
            IFNULL(`pos3`.`kekompakan`, 0) + IFNULL(`pos3`.`kerapian`, 0) + IFNULL(`pos3`.`teknik`, 0) - IFNULL(`pos3`.`garis`, 0) as 'total_pos3',
            IFNULL(`pos4`.`kekompakan`, 0) + IFNULL(`pos4`.`kerapian`, 0) + IFNULL(`pos4`.`teknik`, 0) - IFNULL(`pos4`.`garis`, 0) as 'total_pos4',  
            IFNULL(`pos1`.`kekompakan`, 0) + IFNULL(`pos1`.`kerapian`,0) + IFNULL(`pos1`.`teknik`,0) - IFNULL(`pos1`.`garis`,0) + IFNULL(`pos2`.`kekompakan`, 0) + IFNULL(`pos2`.`kerapian`, 0) + IFNULL(`pos2`.`teknik`, 0) - IFNULL(`pos2`.`garis`, 0) + IFNULL(`pos3`.`kekompakan`, 0) + IFNULL(`pos3`.`kerapian`, 0) + IFNULL(`pos3`.`teknik`, 0) - IFNULL(`pos3`.`garis`, 0) + IFNULL(`pos4`.`kekompakan`, 0) + IFNULL(`pos4`.`kerapian`, 0) + IFNULL(`pos4`.`teknik`, 0) - IFNULL(`pos4`.`garis`, 0) as 'total_seluruh'
            FROM `rekap` 
            JOIN pos1 ON pos1.no_punggung = rekap.pos1 
            JOIN pos2 ON pos2.no_punggung = rekap.pos2 
            JOIN pos3 ON pos3.no_punggung = rekap.pos3
            JOIN pos4 ON pos4.no_punggung = rekap.pos4 
            JOIN tim ON pos1.no_punggung = tim.no_punggung
            WHERE `pos1`.`tingkat` = '$tingkat' && `tim`.`gender`='putra' order by total_seluruh desc ");
       
        // $query = $this->db->get();
        return $query->result_array();
    }

    public function getRekapPutri($tingkat){
         $query = $this->db->query("
            SELECT *, 
            IFNULL(`pos1`.`kekompakan`, 0) + IFNULL(`pos1`.`kerapian`, 0) + IFNULL(`pos1`.`teknik`, 0) - IFNULL(`pos1`.`garis`, 0) as 'total_pos1', 
            IFNULL(`pos2`.`kekompakan`, 0) + IFNULL(`pos2`.`kerapian`, 0) + IFNULL(`pos2`.`teknik`, 0) - IFNULL(`pos2`.`garis`, 0) as 'total_pos2', 
            IFNULL(`pos3`.`kekompakan`, 0) + IFNULL(`pos3`.`kerapian`, 0) + IFNULL(`pos3`.`teknik`, 0) - IFNULL(`pos3`.`garis`, 0) as 'total_pos3',
            IFNULL(`pos4`.`kekompakan`, 0) + IFNULL(`pos4`.`kerapian`, 0) + IFNULL(`pos4`.`teknik`, 0) - IFNULL(`pos4`.`garis`, 0) as 'total_pos4',  

            IFNULL(`pos1`.`kekompakan`, 0) 
            + IFNULL(`pos1`.`kerapian`,0)
            + IFNULL(`pos1`.`teknik`,0) 
            - IFNULL(`pos1`.`garis`,0) 

            + IFNULL(`pos2`.`kekompakan`, 0) 
            + IFNULL(`pos2`.`kerapian`, 0) 
            + IFNULL(`pos2`.`teknik`, 0) 
            - IFNULL(`pos2`.`garis`, 0) 

            + IFNULL(`pos3`.`kekompakan`, 0) 
            + IFNULL(`pos3`.`kerapian`, 0) 
            + IFNULL(`pos3`.`teknik`, 0) 
            - IFNULL(`pos3`.`garis`, 0) 
            
            + IFNULL(`pos4`.`kekompakan`, 0) 
            + IFNULL(`pos4`.`kerapian`, 0) 
            + IFNULL(`pos4`.`teknik`, 0) 
            - IFNULL(`pos4`.`garis`, 0) as 'total_seluruh'
            
            FROM `rekap` 
            JOIN pos1 ON pos1.no_punggung = rekap.pos1 
            JOIN pos2 ON pos2.no_punggung = rekap.pos2 
            JOIN pos3 ON pos3.no_punggung = rekap.pos3
            JOIN pos4 ON pos4.no_punggung = rekap.pos4 
            JOIN tim ON pos1.no_punggung = tim.no_punggung
            WHERE `pos1`.`tingkat` = '$tingkat' && `tim`.`gender`='putri' order by total_seluruh desc ");
       
        // $query = $this->db->get();
        return $query->result_array();
    }

    public function getRekapDantonPutra($tingkat){
        $query = $this->db->query("
            SELECT *, 
            IFNULL(`pos1`.`danton`, 0) as 'danton_pos1', IFNULL(`pos2`.`danton`, 0) as 'danton_pos2', IFNULL(`pos3`.`danton`,0) as 'danton_pos3', IFNULL(`pos4`.`danton`,0) as 'danton_pos4', 
            IFNULL(`pos1`.`danton`, 0) + IFNULL(`pos2`.`danton`, 0) + IFNULL(`pos3`.`danton`,0) + IFNULL(`pos4`.`danton`,0) as `total_danton` FROM `rekap` 
            JOIN pos1 ON pos1.no_punggung = rekap.pos1 
            JOIN pos2 ON pos2.no_punggung = rekap.pos2 
            JOIN pos3 ON pos3.no_punggung = rekap.pos3
            JOIN pos4 ON pos4.no_punggung = rekap.pos4 
            JOIN tim ON pos1.no_punggung = tim.no_punggung
            WHERE `pos1`.`tingkat` = '$tingkat' && `tim`.`gender`='putra' order by total_danton desc ");
       
        // $query = $this->db->get();
        return $query->result_array();
    }

    public function getRekapDantonPutri($tingkat){
        $query = $this->db->query("
            SELECT *, 
            IFNULL(`pos1`.`danton`, 0) as 'danton_pos1', IFNULL(`pos2`.`danton`, 0) as 'danton_pos2', IFNULL(`pos3`.`danton`,0) as 'danton_pos3', IFNULL(`pos4`.`danton`,0) as 'danton_pos4', 
            IFNULL(`pos1`.`danton`, 0) + IFNULL(`pos2`.`danton`, 0) + IFNULL(`pos3`.`danton`,0) + IFNULL(`pos4`.`danton`,0) as `total_danton` FROM `rekap` 
            JOIN pos1 ON pos1.no_punggung = rekap.pos1 
            JOIN pos2 ON pos2.no_punggung = rekap.pos2 
            JOIN pos3 ON pos3.no_punggung = rekap.pos3
            JOIN pos4 ON pos4.no_punggung = rekap.pos4 
            JOIN tim ON pos1.no_punggung = tim.no_punggung
            WHERE `pos1`.`tingkat` = '$tingkat' && `tim`.`gender`='putri' order by total_danton desc ");
       
        // $query = $this->db->get();
        return $query->result_array();
    }

    public function getRekapKostumPutra($tingkat){
        $query = $this->db->query("
            SELECT *, IFNULL(`pos1`.`kostum`, 0)  as `total_kostum` FROM `rekap` 
            JOIN pos1 ON pos1.no_punggung = rekap.pos1 
            JOIN tim ON pos1.no_punggung = tim.no_punggung
            WHERE `pos1`.`tingkat` = '$tingkat' && `tim`.`gender`='putra' order by total_kostum desc ");
       
        // $query = $this->db->get();
        return $query->result_array();
    }

    public function getRekapKostumPutri($tingkat){
        $query = $this->db->query("
            SELECT *, IFNULL(`pos1`.`kostum`, 0)  as `total_kostum` FROM `rekap` 
            JOIN pos1 ON pos1.no_punggung = rekap.pos1 
            JOIN tim ON pos1.no_punggung = tim.no_punggung
            WHERE `pos1`.`tingkat` = '$tingkat' && `tim`.`gender`='putri' order by total_kostum desc ");
       
        // $query = $this->db->get();
        return $query->result_array();
    }

    public function getPesertaSD(){
        $this->db->select('*');
        $this->db->from('tim');
        $this->db->where('tingkat = "SD"');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getPesertaSMP(){
        $this->db->select('*');
        $this->db->from('tim');
        $this->db->where('tingkat = "SMP"');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getPesertaSMA(){
        $this->db->select('*');
        $this->db->from('tim');
        $this->db->where('tingkat = "SMA"');
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

    public function delAllRekap(){
        if ($this->session->userdata('who')=='admin') {
             $this->db->query('delete from rekap');
        }
    }
}
