<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Meet_model extends CI_Model {

    public $title;
    public $content;
    public $date;

    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
        // $this->load->database();
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


}