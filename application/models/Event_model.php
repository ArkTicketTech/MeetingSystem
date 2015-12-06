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
    	$ebt=strtotime($_POST['ebt']);
		$eet=strtotime($_POST['eet']);
		$ebt=date('Y-m-d H:i:s',$ebt);
		$eet=date('Y-m-d H:i:s',$eet);
        $sql = "INSERT INTO event (muid,mplanbt,mplanet,mrid,mremind,mstate,mname,mconfirm,mchecktype) VALUES (1,?,?,?,?,?,?,?,?)";
		$sql = $this->db->compile_binds($sql,array($pbt,$pet,$_POST['mrid'],$_POST['mremind'],$type,$_POST['mname'],$_POST['mconfirm'],$_POST['mchecktype']));
		if($this->db->simple_query($sql)){
			return true;
		}
		else{
			return false;
		}
    }

    public function getlist($date)
    {

    }
}
