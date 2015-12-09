<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Event_model extends CI_Model {

    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
    }

    public function add($date)
    {
    	$ebt=strtotime($_POST['ebt']);
		$eet=strtotime($_POST['eet']);
		$ebt=date('Y-m-d H:i:s',$ebt);
		$eet=date('Y-m-d H:i:s',$eet);
        $sql = "INSERT INTO event (euid,ebt,eet,etype) VALUES (1,?,?,?)";
		$sql = $this->db->compile_binds($sql,array($ebt,$eet,$_POST['mrid'],$_POST['mremind'],$type,$_POST['mname'],$_POST['mconfirm'],$_POST['mchecktype']));
		if($this->db->simple_query($sql)){
			return true;
		}
		else{
			return false;
		}
    }

    public function getmyevent($date)
    {
        $euid = 1;
        $ebt = strtotime($date);
        $eet = $ebt+3600*24;
        
        $sql = "SELECT * FROM event WHERE euid = ? AND eet BETWEEN ".$ebt." AND ".$eet." ;";
        $sql = $this->db->query($sql,array($euid));
        
        if($sql)
            return $sql->result_array();
        else
            return false;
    }

    public function getmanageevent($date)
    {
        $ebt = strtotime($date);
        $eet = $ebt+3600*24;

        $sql = "SELECT * FROM event,user WHERE emanage = 1 AND euid = uid AND eet BETWEEN ".$ebt." AND ".$eet." ;";
        $sql = $this->db->query($sql);
        
        if($sql)
            return $sql->result_array();
        else
            return false;
    }
}
