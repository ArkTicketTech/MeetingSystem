<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {

	
	public function index()
	{
	}

	//meet start
	public function meetstart($id=0)
	{
		if(!$id)
			exit('404 ERROR!');
		$this->load->model('meet_model');
		$result = $this->meet_model->meetstart($id);
		return $result;
	}

	public function meetend($id=0)
	{
		if(!$id)
			exit('404 ERROR!');
		$this->load->model('meet_model');
		$result = $this->meet_model->meetend($id);
		$this->meet_model->postscore($id);
		return $result;
	}

	public function checkin($id=0)
	{
		if(!$id)
			exit("404 ERROR!");
		$this->load->model('meet_model');
		$result = $this->meet_model->checkin($id);
		return $result;
	}

	public function attend($id=0)
	{
		if(!$id)
			exit("404 ERROR!");
		$this->load->model('meet_model');
		$result = $this->meet_model->attend($id);
		return $result;
	}

	public function leave($id=0)
	{
		if(!$id)
			exit("404 ERROR!");
		$this->load->model('meet_model');
		$result = $this->meet_model->leave($id);
		var_dump($result);
		return $result;
	}

}
