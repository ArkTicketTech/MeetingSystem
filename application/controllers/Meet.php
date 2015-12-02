<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Meet extends CI_Controller {

	public function index()
	{
		$this->load->view('xjhy');
	}

	//stay meetings
	public function stay($search=false)
	{
		$this->load->model('meet_model');
		if($search===false)
			$data['list'] = $this->meet_model->getmeetlist(false);
		else
			$data['list'] = $this->meet_model->getmeetlist($search);

		$this->load->view('djxhy',$data);
	}

	//post to create page
	public function create_post()
	{
		if($this->input->method()=='get'){
			$this->load->view('xjhy');
		}

		else{
			$this->load->model('meet_model');

			if($this->meet_model->create()){
				redirect(base_url("meet/stay"));
			}
			else{
				$this->load->view('xjhy');
			}
		}
	}


}
