<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportModel extends CI_Model {

public function getReport(){
		$this->db->order_by('id_report', 'desc');
		$sql = $this->db->get('tbl_report');
		return $sql->result();
	}
	public function addData($data){
		$sql = $this->db->insert('tbl_report',$data);
		if($sql){
			return true;
		} else{
			return false;
		}
	}

	public function getReportById($id){
		$this->db->where('id_report',$id);
		$sql = $this->db->get('tbl_report')->row();
		return $sql;
	}

	public function changeStatus4($id){
		$data = array(
			'keterangan' => 'Korban Sudah Ditangani'
			);

		$this->db->where('id_report',$id);
		$sql = $this->db->update('tbl_report',$data);
		if($sql){
			return true;
		} else{
			return false;
		}
	}
}