<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function index()
	{
		//$this->load->view('xjhy');
	}

	public function latest()
	{
		$this->load->model('user_model');
		$data['list'] = $this->user_model->getlatestuser();
		$this->load->view('zdchpm',$data);
	}

}
