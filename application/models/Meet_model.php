<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Meet_model extends CI_Model {

    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
    }

    public function create($type)
    {
    	$pbt=strtotime($_POST['mplanbt']);
		$pet=strtotime($_POST['mplanet']);
		$pbt=date('Y-m-d H:i:s',$pbt);
		$pet=date('Y-m-d H:i:s',$pet);
        $sql = "INSERT INTO meeting (muid,mplanbt,mplanet,mrid,mremind,mstate,mname,mconfirm,mchecktype) VALUES (1,?,?,?,?,?,?,?,?)";
		$sql = $this->db->compile_binds($sql,array($pbt,$pet,$_POST['mrid'],$_POST['mremind'],$type,$_POST['mname'],$_POST['mconfirm'],$_POST['mchecktype']));
		if($this->db->simple_query($sql)){
			return true;
		}
		else{
			return false;
		}
    }

    public function change($type,$id)
    {
        $pbt=strtotime($_POST['mplanbt']);
        $pet=strtotime($_POST['mplanet']);
        $pbt=date('Y-m-d H:i:s',$pbt);
        $pet=date('Y-m-d H:i:s',$pet);
        $sql = "UPDATE meeting SET muid=1,mplanbt=?,mplanet=?,mrid=?,mremind=?,mstate=?,mname=?,mconfirm=?,mchecktype=? WHERE mid=?";
        $sql = $this->db->compile_binds($sql,array($pbt,$pet,$_POST['mrid'],$_POST['mremind'],$type,$_POST['mname'],$_POST['mconfirm'],$_POST['mchecktype'],$id));
        if($this->db->simple_query($sql)){
            return true;
        }
        else{
            return false;
        }
    }

    public function getmeetdetail($mid)
    {
    	$sql = "SELECT mid,muid,mplanbt,mplanet,mrid,mremind,mstate,mname,mconfirm,mactbt,mactet,mchecktype,user.uname,room.rname FROM meeting,user,room WHERE mid = ? AND muid = user.uid AND mrid = room.rid";
		$sql = $this->db->query($sql,$mid);    	
		return $sql->result_array();
    }

    public function getmeetmember($mid)
    {
    	$sql = "SELECT * FROM meetmember,user WHERE mmmid = ? AND user.uid = mmuid";
    	$sql = $this->db->query($sql,$mid); 
        return $sql->result_array();
    }

    /*$type
	// 0 : my stay meet 
	// 1 : my darft meet 
	// 2 : all close meet
    **/
    public function getmeetlist($search,$type)
    {
    	$now=date('Y-m-d H:i:s');
    	if($search===false){
    		if($type==1){
    			$sql = "SELECT mid,muid,mplanbt,mplanet,mrid,mname,rname FROM meeting,room WHERE room.rid=meeting.mrid AND meeting.mstate=0";
    			$sql = $this->db->query($sql);
    		}
    		else{
    				if($type==2)
    					$sql = "SELECT mid,muid,mplanbt,mplanet,mrid,mname,rname,uname FROM meeting,room,user WHERE user.uid=muid AND room.rid=meeting.mrid AND meeting.mplanbt < ? AND meeting.mstate=1";
    				else
    					$sql = "SELECT mid,muid,mplanbt,mplanet,mrid,mname,rname FROM meeting,room WHERE room.rid=meeting.mrid AND meeting.mplanbt > ? AND meeting.mstate=1";
    				$sql = $this->db->query($sql,$now);
    		}
    		
    	}
		else{

			if($search===0) $search = '0';
			
			if($type==1){
    			$sql = "SELECT mid,muid,mplanbt,mplanet,mrid,mname,rname FROM meeting,room WHERE room.rid=meeting.mrid AND mname=? AND meeting.mstate=0";
    			$sql = $this->db->query($sql,$search);
    		}
    		else{
    				if($type==2)
    					$sql = "SELECT mid,muid,mplanbt,mplanet,mrid,mname,rname,uname FROM meeting,room,user WHERE user.uid=muid AND room.rid=meeting.mrid AND mname=? AND meeting.mplanbt < ? AND meeting.mstate=1";
    				else
    					$sql = "SELECT mid,muid,mplanbt,mplanet,mrid,mname,rname FROM meeting,room WHERE room.rid=meeting.mrid AND mname=? AND meeting.mplanbt > ? AND meeting.mstate=1";
    				
    				$sql = $this->db->query($sql,array($search,$now));
    		}
		}
		$list = $sql->result_array();
		//var_dump($list);
		return $list;
    }

    public function getroomlist()
    {
    	$now=date('Y-m-d H:i:s');
    	$later = strtotime($now);
    	$later = $later + 30*60;
    	$later = date('Y-m-d H:i:s',$later);

    	$all = "SELECT rid,rname FROM room";
    	$all = $this->db->query($all);

    	$used = "SELECT DISTINCT mrid FROM meeting WHERE ( mplanbt < ? and mplanet > ? ) or ( mplanbt < ? and mplanet > ?)";
    	$used = $this->db->query($used,array($now,$now,$later,$later));
    	$flag = 0;
    	$list = array();
    	$tmp = array();
    	foreach ($all->result_array() as $r){
    		$flag = 0;
    		$tmp['rid'] = $r['rid'];
    		$tmp['rname'] = $r['rname'];
    		foreach ($used->result_array() as $m) {
    			if($r['rid'] == $m['mrid'])
    			{
    				$flag = 1;
    				break;
    			}
    		}
    		$tmp['flag'] = $flag;
    		array_push($list,$tmp);
    	}
    	return $list;

    }

    public function meetstart($id)
    {
        $now = date('Y-m-d H:i:s');
        $sql = "UPDATE meeting SET mactbt=? WHERE mid = ?";
        $sql = $this->db->query($sql,array($now,$id));
        if($this->db->simple_query($sql)){
            return true;
        }
        else{
            return false;
        }
    }

    public function meetend($id)
    {
        $now = date('Y-m-d H:i:s');
        $sql = "UPDATE meeting SET mactet=? WHERE mid = ?";
        $sql = $this->db->query($sql,array($now,$id));
        if($this->db->simple_query($sql)){
            return true;
        }
        else{
            return false;
        }
    }
}
