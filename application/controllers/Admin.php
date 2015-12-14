<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
		$this->load->view('admin');
	}

	public function history($partition=1)
	{
		$data['month'] = $partition;
		$this->load->model('meet_model');
		$data['list'] = $this->meet_model->getadminmeet(0,0,$partition);
		$this->load->view('huiyilis',$data);
	}

	public function check()
	{
		$this->load->view('huiyishenhe');
	}

	public function room()
	{
		$this->load->view('huiyishigaoguanguanli');
	}

	public function user($partition=1)
	{
		$this->load->model('user_model');
		$data['list'] = $this->user_model->getlatestuser($partition);
		$data['month'] = $partition;
		$this->load->view('userinfo',$data);	
	}

}
