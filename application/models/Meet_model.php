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
        if(!$_POST['mfilename']){
            $sql = "INSERT INTO meeting (muid,mplanbt,mplanet,mrid,mremind,mstate,mname,mconfirm,mchecktype,mapartment) VALUES (1,?,?,?,?,?,?,?,?,?)";
            $sql = $this->db->compile_binds($sql,array($pbt,$pet,$_POST['mrid'],$_POST['mremind'],$type,$_POST['mname'],$_POST['mconfirm'],$_POST['mchecktype'],$_POST['mapartment']));
        }
        else {
            $time = date('Y-m-d H:i:s');
            $sql = "INSERT INTO meeting (muid,mplanbt,mplanet,mrid,mremind,mstate,mname,mconfirm,mchecktype,mapartment,mfiletime,mfilename) VALUES (1,?,?,?,?,?,?,?,?,?,?,?)";
    		$sql = $this->db->compile_binds($sql,array($pbt,$pet,$_POST['mrid'],$_POST['mremind'],$type,$_POST['mname'],$_POST['mconfirm'],$_POST['mchecktype'],$_POST['mapartment'],$time,$_POST['mfilename']));
		}
        if($this->db->simple_query($sql)){
			return true;
		}
		else{
			return false;
		}
    }

    public function getinsertid()
    {
        $sql = "SELECT max(mid) from meeting";
        $sql = $this->db->query($sql);
        $sql = $sql->result_array();
        return $sql; 
    }

    public function change($type,$id)
    {

        $pbt=strtotime($_POST['mplanbt']);
        $pet=strtotime($_POST['mplanet']);
        $pbt=date('Y-m-d H:i:s',$pbt);
        $pet=date('Y-m-d H:i:s',$pet);
        $sql = "UPDATE meeting SET muid=1,mplanbt=?,mplanet=?,mrid=?,mremind=?,mstate=?,mname=?,mconfirm=?,mchecktype=?,mapartment=? WHERE mid=?";
        $sql = $this->db->compile_binds($sql,array($pbt,$pet,$_POST['mrid'],$_POST['mremind'],$type,$_POST['mname'],$_POST['mconfirm'],$_POST['mchecktype'],$_POST['mapartment'],$id));
        
        if($this->db->simple_query($sql)){
            if($_POST['mdelay'] == 1)
            {
                $msg = "INSERT INTO msg (msgtype,msgmid,msguid) VALUES(1,?,1)";
                $msg = $this->db->query($msg,$id);
                if($msg)
                    return true;
            }
            else
                return true;
        }
        else{
            return false;
        }

    }

    public function getmeetdetail($mid)
    {
    	$sql = "SELECT mid,muid,mplanbt,mplanet,mrid,mremind,mstate,mname,mconfirm,mactbt,mactet,mchecktype,mfilename,user.uname,room.rname,mscore,mfiletime,mapartment FROM meeting,user,room WHERE mid = ? AND muid = user.uid AND mrid = room.rid";
		$sql = $this->db->query($sql,$mid);    	
		return $sql->result_array();
    }

    public function getroomtypes()
    {
        $sql = "SELECT * FROM room;";
        $sql = $this->db->query($sql);     
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
    			$sql = "SELECT mid,muid,mplanbt,mplanet,mrid,mname,rname FROM meeting,room WHERE room.rid=meeting.mrid AND mname like '%".$search."%' AND meeting.mstate=0";
                $sql = $this->db->query($sql);
    		}
    		else{
    				if($type==2)
    					$sql = "SELECT mid,muid,mplanbt,mplanet,mrid,mname,rname,uname FROM meeting,room,user WHERE user.uid=muid AND room.rid=meeting.mrid AND mname like '%".$search."%' AND meeting.mplanbt < ? AND meeting.mstate=1";
    				else
    					$sql = "SELECT mid,muid,mplanbt,mplanet,mrid,mname,rname FROM meeting,room WHERE room.rid=meeting.mrid AND mname like '%".$search."%'  AND meeting.mplanbt > ? AND meeting.mstate=1";
    				$sql = $this->db->query($sql,array($now));
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

    public function checkin($id)
    {
        $uid = 1;
        $now = date('Y-m-d H:i:s');
        $sql = "UPDATE meetmember SET mmchecktime=?, mmchecked=1 WHERE mmmid = ? AND mmuid = ? ";
        $sql = $this->db->query($sql,array($now,$id,$uid));
        if($this->db->simple_query($sql)){
            return true;
        }
        else{
            return false;
        }
    }

    public function attend($id)
    {
        $uid = 1;
        $sql = "UPDATE meetmember SET mmleave=0, mmattend=1 WHERE mmmid = ? AND mmuid = ? ";
        $sql = $this->db->query($sql,array($id,$uid));
        if($this->db->simple_query($sql)){
            return true;
        }
        else{
            return false;
        }
    }

    public function leave($id)
    {
        $uid = 1;
        $sql = "UPDATE meetmember SET mmleave=1, mmattend=0 WHERE mmmid = ? AND mmuid = ? ";
        $sql = $this->db->query($sql,array($id,$uid));
        if($sql){
            $msg = "INSERT INTO msg (msgtype,msgmid,msguid) VALUES(3,?,?)";
            $msg = $this->db->query($msg,array($id,$uid));
            if($msg)
                return true;
            else
                return false;
        }
        else{
            return false;
        }
    }

    public function getrankover($id)
    {
        $sql = "SELECT * FROM meeting";
        $sql = $this->db->query($sql);
        $baseline = "SELECT mscore FROM meeting WHERE mid = ?";
        $baseline = $this->db->query($baseline,$id);
        $baseline = $baseline->result_array();
        $result = $sql->result_array();
        $rank = 0;
        foreach ($result as $r) {
            if($r['mscore']){
                if($r['mscore']<$baseline[0]['mscore']){
                    $rank++;
                }
            }
        }
        return $rank;
    }

    public function rank()
    {
        $sql = "SELECT * FROM meeting,user WHERE mstate=1 AND user.uid = meeting.muid AND NOT ISNULL(mscore) ORDER BY mscore desc";
        $sql = $this->db->query($sql);
        $result = $sql->result_array();
        return $result;
        
    }

    public function postscore($mid)
    {
        $now = date('Y-m-d H:i:s');
        $later = strtotime($now);
        $sql = "SELECT * FROM meetmember,user WHERE mmmid = ? AND user.uid = mmuid";
        $sql = $this->db->query($sql,$mid); 
        $meet = "SELECT * FROM meeting WHERE mid = ?";
        $meet = $this->db->query($meet,$mid); 
        $meet = $meet->result_array();
        $members = $sql->result_array();
        $add = "";
        $absentnum=0;
        $latenum=0;
        $score=100;
        $month = date("m");
        var_dump($meet);
        if(count($members)){
                foreach ($members as $mem) {
                    if($mem['mmchecked'] == 0){
                        $add = "UPDATE user SET uabsentnum = uabsentnum + 1 WHERE uid = ?";
                        $add = $this->db->query($add,$mem['mmuid']);
                        $add = "UPDATE user SET ulatest = ulatest + 1 WHERE uid = ?";
                        $add = $this->db->query($add,$mem['mmuid']);
                        
                        $add = "UPDATE absent SET abalnum = abalnum + 1 WHERE abmonth = ? AND abuid = ?";
                        $add = $this->db->query($add,array($month,$mem['mmuid']));
                        
                        $absentnum++;
                    }
                    if($mem['mmchecked'] && ($mem['mmchecktime'] > $meet[0]['mplanbt']) ){
                        $add = "UPDATE user SET ulatenum = ulatenum + 1 WHERE uid = ?";
                        $add = $this->db->query($add,$mem['mmuid']);
                        $add = "UPDATE user SET ulatest = ulatest + 1 WHERE uid = ?";
                        $add = $this->db->query($add,$mem['mmuid']);

                        $add = "UPDATE absent SET abalnum = abalnum + 1 WHERE abmonth = ? AND abuid = ?";
                        $add = $this->db->query($add,array($month,$mem['mmuid']));
                        
                        $latenum++;
                    }
                }
        }
        $sum = $absentnum * 5 + $latenum * 2;
        if($sum>30) $sum = 30;
        $score = $score - $sum;

        if(!$meet[0]['mfiletime']){
            $sum = 30;
        }
        else{
            if((strtotime($meet[0]['mfiletime'])-$later)/3600<12)
                $sum=0;
            else{
                if((strtotime($meet[0]['mfiletime'])-$later)/3600<24)   
                    $sum=5;
                else{
                    if((strtotime($meet[0]['mfiletime'])-$later)/3600<36)   $sum=10;
                    else{
                        if((strtotime($meet[0]['mfiletime'])-$later)/3600<48)   $sum=15;
                        else{
                            if((strtotime($meet[0]['mfiletime'])-$later)/3600<60)   $sum=20;
                            else{
                                if((strtotime($meet[0]['mfiletime'])-$later)/3600<72)   $sum=25;
                                else{
                                    $sum=30;
                                }
                            }
                        }
                    }
                }
            }
        }

        $score = $score - $sum;
        $mine = 0;
        $minb = 0;
        $minb = (strtotime($meet[0]['mactbt'])-strtotime($meet[0]['mplanbt']))/60;
        $mine = (strtotime($meet[0]['mactet'])-strtotime($meet[0]['mplanet']))/60;

        if($minb<=0) $minb=0;
        if($mine<=0) $mine=0;

        $sum = (20/60)*$minb;
        if($sum>20) $sum=20;
        $score = $score - $sum;

        $sum = (20/60)*$mine;
        if($sum>20) $sum=20;
        $score = $score - $sum;

        $sql = "UPDATE meeting SET mscore = ? WHERE mid = ?";
        $sql = $this->db->query($sql,array($score,$mid)); 
        if($this->db->simple_query($sql)){
            return true;
        }
        else{
            return false;
        }
    }

    public function getapartments()
    {
        $sql = "SELECT * FROM apartment";
        $sql = $this->db->query($sql);
        $result = $sql->result_array();
        return $result;
        
    }
}
