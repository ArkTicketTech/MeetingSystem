<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends CI_Controller {

	public function index()
	{
	}

	//meet start
	public function myevent()
	{
		$this->load->model('event_model');
		$this->load->view('myevent');
	}

	public function getmyevent()
	{
		$this->load->model('event_model');
		$data = $this->event_model->getmyevent($_POST['date']);
		if($data){
		}
		else{
			return false;
		}
		return true;
	}

	public function manageevent()
	{
		$this->load->model('event_model');
		$this->load->view('manageevent');
	}

	public function getmanageevent()
	{
		$this->load->model('event_model');
		$data = $this->event_model->getmanageevent($_POST['date']);
		return $data;
		
	}

	public function addevent()
	{
		$this->load->model('event_model');
		$this->load->view('addevent');
	}

	public function add_post()
	{
		$this->load->model('event_model');
		
		if($this->event_model->add())
			redirect(base_url("event/myevent"));
		else
			redirect(base_url("event/addevent"));
	}
}
