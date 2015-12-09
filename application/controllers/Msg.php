<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Msg extends CI_Controller {

	public function index()
	{
		$this->load->model('msg_model');
		$data['msgs'] = $this->msg_model->getmsgtable();
		$this->load->view('zytz',$data);
	}

}