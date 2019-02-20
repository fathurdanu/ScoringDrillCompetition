<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_juri extends CI_Model {

	public function insert_data($data)
	{
		$this->db->insert('juri',$data);
	}

    public function getJuri(){

        $this->db->select("id_juri, nama_juri, kategori, posisi_pos");
        $this->db->from('juri');
        $query = $this->db->get();        
        return $query->result_array();

    }

    public function getJuriPos($pos){

        $this->db->select("id_juri, nama_juri, kategori, posisi_pos");
        $this->db->from('juri');
        $this->db->where("posisi_pos = '$pos'");
        $query = $this->db->get();        
        return $query->result_array();

    }

    public function delAllJuri(){
        if ($this->session->userdata('who')=='admin') {
             $this->db->query('delete from juri');
        }
    }

    public function getJuriPos1($tingkat){

        $this->db->select("nama_juri, urutan, posisi_pos");
        $this->db->from('juri');
        $this->db->where(" posisi_pos= '1'");
        $query = $this->db->get();        
        return $query->result_array();

    }

    public function getUrutanJuri(){
        // $query = $this->db->query("select id_juri, posisi_pos, urutan from juri");
        $this->db->select("id_juri, posisi_pos, urutan");
        $this->db->from('juri');
        $query = $this->db->get();
        $data = $query->result_array();

        $temp = 0;
        foreach ($data as $key) {
            if($key['posisi_pos'] == $this->input->post('pos')){
                if ($temp < $key['urutan'] ){
                    $temp = $key['urutan'];
                }
            }
        }
        if($temp == 0){
            $temp = 1;
        }
        elseif($temp > 0 && $temp < 3){
            $temp++;
        }
        else{
            $temp = 5;   
        }
        return $temp;
    }

    public function login_juri($username, $password){
        // $query = $this->db->query("select * from juri where username = '$username'");
        $sql = "select * from juri where username = ".$this->db->escape($username);
        $query = $this->db->query($sql);
        $pass = $query->row_array();
        // echo $pass['password'];
        // echo password_verify($password,$pass['password']);

        
        echo $query->num_rows();

        if ($query->num_rows() > 0) {
            if (password_verify($password , $pass['password'])) {
                foreach ($query->result() as $row) {
                    $sess = array(
                     'id_juri' => $row->id_juri,
                     'nama_juri' => $row->nama_juri,
                     'posisi_pos' => $row->posisi_pos,
                     'kategori' => $row->kategori
                 );
                }

                $this->session->set_userdata($sess);
                echo "<script>console.log( 'session berhasi' );</script>";
                redirect('penilaian/index/smp');
            }
            else{
            $data = array('pesan' => 'username dan password tidak cocok' );
            $this->session->set_userdata($data);
            redirect('juri/login');
        }
        }
        else{
            $data = array('pesan' => 'username dan password tidak cocok' );
            $this->session->set_userdata($data);
            redirect('juri/login');
        }
        
    }

    public function delJuri($id){
        $this->db->where('id_juri = "'.$id.'"');
        $this->db->delete('juri');
    }

    public function logout(){
        $this->session->sess_destroy();
    }



}
