<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paint_model extends CI_Model {

	public function get_progress($action){
		$this->db->distinct();
		if($action == 1){
			$this->db->where("Action", 1);
			$this->db->or_where("Action", 0);
			$this->db->order_by("Action","DESC");
			$this->db->limit(5);
		}else{
			$this->db->where("Action", $action);
		}
		$query = $this->db->get('tbl_paintjobs');
		return $result = $query->result();
	}

	public function mark_complete($plate_no){
		$this->db->where('Plate_No', $plate_no);
		$this->db->set('Action', 2);
		$this->db->update('tbl_paintjobs');
	}

	public function add_job($data){
		$this->db->insert('tbl_paintjobs',$data);
	}

	public function update_progress($data){
		foreach($data as $row){
			if($row->Action == 0){
				$this->db->where('Plate_No', $row->Plate_No);
				$this->db->set('Action', 1);
				$this->db->update('tbl_paintjobs');
			}
		}
	}
	

}
?>