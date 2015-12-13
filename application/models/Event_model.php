<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Event_model extends CI_Model {

    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
    }

    public function add()
    {
    	$ebt=strtotime($_POST['ebt']);
		$eet=strtotime($_POST['eet']);
		$ebt=date('Y-m-d H:i:s',$ebt);
		$eet=date('Y-m-d H:i:s',$eet);
        $euid = 1;
        $emanage = 1;
        $sql = "INSERT INTO event (euid,emanage,ebt,eet,etype,eremind,econtent) VALUES (1,1,?,?,?,?,?)";
		$sql = $this->db->compile_binds($sql,array($ebt,$eet,$_POST['etype'],$_POST['eremind'],$_POST['econtent']));
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
        $ebt = date('Y-m-d H:i:s',$ebt);
        $eet = date('Y-m-d H:i:s',$eet);
        
        $sql = "SELECT * FROM event WHERE euid = ? AND eet > '".$ebt."' AND eet < '".$eet."' ;";
        $sql = $this->db->query($sql,array($euid));
        
        if($sql)
        {
            echo json_encode($sql->result_array());
            return $sql->result_array();
        }
        else
            return false;
    }

    public function getmanageevent($date)
    {
        $ebt = strtotime($date);
        $eet = $ebt+3600*24;
        $ebt = date('Y-m-d H:i:s',$ebt);
        $eet = date('Y-m-d H:i:s',$eet);

        $sql = "SELECT * FROM event,user WHERE emanage = 1 AND euid = uid AND eet > '".$ebt."' AND eet < '".$eet."' ;";
        $sql = $this->db->query($sql);
        
        if($sql)
        {
            echo json_encode($sql->result_array());
            return $sql->result_array();
        }
        else
            return false;
    }
}
