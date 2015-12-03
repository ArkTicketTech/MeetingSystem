<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Meet extends CI_Controller {

	public function index()
	{
		$this->load->view('xjhy');
	}

	public function mydetail($id=0)
	{
		$this->load->view('wdhyxq');
	}
	//stay meetings
	public function stay($search=false)
	{
		$this->load->model('meet_model');
		if($search===false)
			$data['list'] = $this->meet_model->getmeetlist(false,0);
		else
			$data['list'] = $this->meet_model->getmeetlist($search,0);
		var_dump($data);
		$this->load->view('djxhy',$data);
	}

	//draft meetings
	public function draft($search=false)
	{
		$this->load->model('meet_model');
		if($search===false)
			$data['list'] = $this->meet_model->getmeetlist(false,1);
		else
			$data['list'] = $this->meet_model->getmeetlist($search,1);
		$this->load->view('djjxbjhy',$data);
	}

	//close meetings
	public function closed($search=false)
	{
		$this->load->model('meet_model');
		if($search===false)
			$data['list'] = $this->meet_model->getmeetlist(false,2);
		else
			$data['list'] = $this->meet_model->getmeetlist($search,2);
		$this->load->view('yjshy',$data);
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
