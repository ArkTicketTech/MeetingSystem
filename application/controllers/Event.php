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
		$test = $_POST['date'];
		$this->load->model('event_model');
		$data = $this->event_model->getmyevent($_POST['date']);
		
		// if($data)
		// 	echo json_encode($data);
		return true;

		//$ary['list']=$data;
		//echo json_encode($data);
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

	}

	public function addpost($date)
	{
		$this->load->model('event_model');
		$this->event_model->add($date);
	}
}
