<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Meet extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }

	public function index()
	{
		$this->load->model('meet_model');
		$data['apartments'] = $this->meet_model->getapartments();
		$data['rooms'] = $this->meet_model->getroomtypes();
		$this->load->view('xjhy',$data);
	}

	public function xjhy_1(){
		$this->load->view('xjhy_1');
	}
	
	public function xjhy_2(){
		// 获取部门
		include 'User.php';
		$user = new User;
		session_start();
		if(!isset($_SESSION['access_token'])){
			$access_token = $user->GetAccessToken();
		}else if($_SESSION['access_token']['time'] + 3600 < time()){
			$access_token = $user->GetAccessToken();
		}else {
			$access_token = $_SESSION['access_token']['access_token'];
		}
		$departments = $user->GetUserDepartment($access_token);
		$data['departments'] = $departments;
		$this->load->view('xjhy_2',$data);
	}

	public function xjhy_3(){
		// 获取部门 人员
		include 'User.php';
		$user = new User;
		session_start();
		if(!isset($_SESSION['access_token'])){
			$access_token = $user->GetAccessToken();
		}else if($_SESSION['access_token']['time'] + 3600 < time()){
			$access_token = $user->GetAccessToken();
		}else {
			$access_token = $_SESSION['access_token']['access_token'];
		}
		$departments = $user->GetUserDepartment($access_token);
		$data['departments'] = $departments;
		$data['users'] = $user->GetUserListByGroupId(2,$access_token);
		//按字母排序
		include "/pinyin/src/Pinyin/Pinyin.php";
		foreach ($data['users']['userlist'] as $key => $value) {
			$data['users']['userlist'][$key]['letter'] = substr( Pinyin::letter($value['name'], array('uppercase' => true)), 0, 1 );
		}
		$ages = array();
		foreach ($data['users']['userlist'] as $user) {
		    $ages[] = $user['letter'];
		}
		array_multisort($ages, SORT_ASC, $data['users']['userlist']);
		$this->load->view('xjhy_3',$data);
	}

	//my stay meetings' detail  
	public function mydetail($id=0)
	{
		if(!$id)
			exit('404 ERROR!');
		$this->load->model('meet_model');
		$data['list'] = $this->meet_model->getmeetdetail($id);
		$data['members'] = $this->meet_model->getmeetmember($id);
		$this->load->view('wdhyxq',$data);
	}

	//closed meetings' detail  
	public function closedetail($id=0)
	{
		if(!$id)
			exit('404 ERROR!');
		$this->load->helper('form');
		$this->load->model('meet_model');
		$data['list'] = $this->meet_model->getmeetdetail($id);
		$data['members'] = $this->meet_model->getmeetmember($id);
		$this->load->view('yjshyxq',$data);
	}

	//stay meetings
	public function stay($search=false)
	{
		$this->load->model('meet_model');
		if($search===false)
			$data['list'] = $this->meet_model->getmeetlist(false,0);
		else
			$data['list'] = $this->meet_model->getmeetlist($search,0);
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
				//var_dump("success");
				if($_POST['mfilename']){
					$id = $this->meet_model->getinsertid();
					$id = $id[0]['max(mid)'];
					$config['upload_path'] = './uploads_meet/';
			        $config['max_size'] = 10240;
			        $config['overwrite'] = TRUE;
			        $config['file_name'] = $id;
			        $config['allowed_types'] = 'gif|jpg|png|zip|rar';
			        //var_dump($id);
			        $this->load->library('upload', $config);
			    }
				if ( ! $this->upload->do_upload('userfile'))
				{
				    $error = array('error' => $this->upload->display_errors());
				    var_dump($error);
				}
				else
				{
				    $data = array('upload_data' => $this->upload->data());
					if($type)
						redirect(base_url("meet/stay"));
					else
						redirect(base_url("meet/draft"));
				}


			}
			else{
				//var_dump("expression");
				$this->load->view('xjhy');
			}
		}
	}

	//editdraft page
	public function editdraft($id=0)
	{
		if(!$id)
			exit('404 ERROR!');
		$this->load->model('meet_model');
		$data['list'] = $this->meet_model->getmeetdetail($id);
		$data['rooms'] = $this->meet_model->getroomtypes();
		$data['apartments'] = $this->meet_model->getapartments();
		$this->load->view('xjhy',$data);
	}

	//editdraft page
	public function meetchange($id=0)
	{
		if(!$id)
			exit('404 ERROR!');
		$this->load->model('meet_model');
		$data['list'] = $this->meet_model->getmeetdetail($id);
		$data['rooms'] = $this->meet_model->getroomtypes();
		$data['apartments'] = $this->meet_model->getapartments();
		$this->load->view('xghy',$data);
	}

	//post for change
	public function change_post($id,$type=1)
	{
		if($this->input->method()=='get'){
			$this->load->view('xjhy');
		}

		else{
			$this->load->model('meet_model');
			if($this->meet_model->change($type,$id)){
				if($type){
					redirect(base_url("meet/stay"));
				}
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

	//score
	public function score($id=0)
	{
		if(!$id)
			exit('404 ERROR!');
		$this->load->model('meet_model');
		$data['list'] = $this->meet_model->getmeetdetail($id);
		$data['members'] = $this->meet_model->getmeetmember($id);
		$data['over'] = $this->meet_model->getrankover($id);
		$this->load->view('djpf',$data);
	}

	//rank
	public function rank()
	{
		$this->load->model('meet_model');
		$data['list'] = $this->meet_model->rank();
		$this->load->view('cxqbhypf',$data);
	}

	public function latest()
	{
		$this->load->model('meet_model');
		//$data['list'] = $this->meet_model->latestuser();
		$this->load->view('zdchpm',$data);
	}

}
