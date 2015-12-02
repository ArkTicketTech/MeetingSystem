<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Meet extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('xjhy');
	}

	//coming meetings
	public function stay()
	{
		$this->load->view('djxhy');
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
