<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Meet_model extends CI_Model {

    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
    }

    public function create()
    {
    	$pbt=strtotime($_POST['mplanbt']);
		$pet=strtotime($_POST['mplanet']);
		$pbt=date('Y-m-d H:i:s',$pbt);
		$pet=date('Y-m-d H:i:s',$pet);
        $sql = "INSERT INTO meeting (muid,mplanbt,mplanet,mrid,mremind) VALUES (1,?,?,?,?)";
		$sql = $this->db->compile_binds($sql,array($pbt,$pet,$_POST['mrid'],$_POST['mremind']));
		if($this->db->simple_query($sql)){
			return true;
		}
		else{
			return false;
		}
    }

    public function getmeetlist($search)
    {
    	if($search===false){
    		$sql = "SELECT mid,muid,mplanbt,mplanet,mrid,mname,rname FROM meeting,room WHERE room.rid=meeting.mrid";
    		$sql = $this->db->query($sql);
    	}
		else{
			$sql = "SELECT mid,muid,mplanbt,mplanet,mrid,mname,rname FROM meeting,room WHERE room.rid=meeting.mrid AND mname=?";
			if($search===0) $search = '0';
			$sql = $this->db->query($sql,$search);
		}
		$list = $sql->result_array();
		return $list;
    }

}