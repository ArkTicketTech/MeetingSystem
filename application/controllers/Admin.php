<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct() {  
        parent::__construct ();  
        $this->load->helper ( array (  
                'form',  
                'url'   
        ) );  
        $this->load->library('session');  
    } 

	public function index()
	{
		if(!$this->session->id){
			redirect(base_url("admin/login"));
		}else{
			$this->load->view('admin');
		}
		
	}

	public function login()
	{
		if(!$this->session->id){
			$this->load->model('user_model');
			if($this->input->method()=='get'){
				$this->load->view('login');
			}else{
				if($res=$this->user_model->adminlogin()){
					$this->session->set_userdata($res);
					redirect(base_url("admin"));
				}else{
					$this->load->view('login');
				}
			}
		}
		else{
			redirect(base_url("admin"));
		}
	}

	public function history($partition=1,$search=0,$type=0)
	{
		if(!$this->session->id){
			redirect(base_url("admin/login"));
		}
		else{
			$data['month'] = $partition;
			$this->load->model('meet_model');
			$data['list'] = $this->meet_model->getadminmeet($search,$type,$partition);
			$this->load->view('huiyilis',$data);
		}

	}

	public function check()
	{
		if(!$this->session->id){
			redirect(base_url("admin/login"));
		}
		else{
			$this->load->model('meet_model');
			$data['list'] = $this->meet_model->getconfirmmeet();
			$this->load->view('huiyishenhe',$data);
		}

	}

	public function room()
	{
		if(!$this->session->id){
			redirect(base_url("admin/login"));
		}
		else{
			$this->load->model('meet_model');
			$data['list'] = $this->meet_model->allroom();
			$this->load->view('huiyishigaoguanguanli',$data);
		}

	}

	public function user($partition=1)
	{
		if(!$this->session->id){
			redirect(base_url("admin/login"));
		}
		else{
			$this->load->model('user_model');
			$data['list'] = $this->user_model->getlatestuser($partition);
			$data['month'] = $partition;
			$this->load->view('userinfo',$data);
		}
	
	}

	public function changepass()
	{
		if($this->session->id){
			$this->load->model('user_model');
			$result = $this->user_model->adminchangepass();
			if($result)
				var_dump("success");
			else
				var_dump("failed");
		}else{
			redirect(base_url("admin/login"));
		}
	}

//新添加退出功能
	public function logout()
	{
		session_destroy();
		redirect(base_url("admin/login"));
	}
//新添加下载附件功能(没用到 直接通过a标签的href下载了)
	public function download($fileid,$filetype)
	{
		if($this->session->id){
			$this->load->model('user_model');
			$this->load->helper('download');
		}else{
			redirect(base_url("admin/login"));
		}	
	}
//新添加会议审核功能
	public function confirm($mid,$confirm)
	{
		if($this->session->id){
			$this->load->model('meet_model');
			$this->meet_model->meetconfirm($mid,$confirm);
		}else{
			redirect(base_url("admin/login"));
		}	
	}
//新添加清空会议室
	public function removeroom($rid)
	{
		if($this->session->id){
			$this->load->model('meet_model');
			if($this->meet_model->removeroom($rid))
				redirect(base_url('admin/room'));
			else
				var_dump("Error!");

		}else{
			redirect(base_url("admin/login"));
		}	
	}
//新添加添加会议室
	public function createroom()
	{
		if($this->session->id){
			$this->load->model('meet_model');
			if($this->meet_model->createroom())
				redirect(base_url('admin/room'));
			else
				var_dump("Error!");
		}else{
			redirect(base_url("admin/login"));
		}	
	}

}
