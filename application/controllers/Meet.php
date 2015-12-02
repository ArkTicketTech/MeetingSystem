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

	//draft meetings
	public function draft()
	{
		$this->load->view('djjxbjhy');
	}

	//post to create page
	public function create_post($type=1)
	{
		if($this->input->method()=='get'){
			$this->load->view('xjhy');
		}

		else{
			$this->load->model('meet_model');

			if($this->meet_model->create($type)){
				if($type)
					redirect(base_url("meet/stay"));
				else
					redirect(base_url("meet/draft"));
			}
			else{
				$this->load->view('xjhy');
			}
		}
	}

	//meet room
	public function room()
	{
		$this->load->model('meet_model');
		$data['list'] = $this->meet_model->getroomlist();
		$this->load->view('hyszt',$data);
	}


}
