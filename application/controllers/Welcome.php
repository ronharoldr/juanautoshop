<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
		$this->load->model('paint_model');
	}

	public function index()
	{
		$this->load->helper('form');
		$this->load->helper('url');

		$this->load->view('welcome_message');
	}

	function get_jobs(){

		$data = $this->paint_model->get_progress(1);
		$this->paint_model->update_progress($data);
		echo json_encode($data);

	}

	function get_queue(){

		$data = $this->paint_model->get_progress(0);
		echo json_encode($data);

	}

	function get_completed(){

		$data = $this->paint_model->get_progress(2);
		echo json_encode($data);

	}

	function mark_complete(){

		$plate_no = $this->input->post('plate_no');
		$this->paint_model->mark_complete($plate_no);

	}

	function add_job(){

		$data['Plate_No'] = $this->input->post('plate_no');
		$data['Current_Color'] = $this->input->post('current_color');
		$data['Target_Color'] = $this->input->post('target_color');
		$data['Action'] = 0;
		$this->paint_model->add_job($data);

	}



}
