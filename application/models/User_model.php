<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User_model extends CI_Model {

    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
    }

    public function getlatestuser($partition)
    {
        if($partition == 0){
        	$sql = "SELECT * FROM user ORDER BY ulatest desc";
        	$sql = $this->db->query($sql);
        	$result = $sql->result_array();
        	//var_dump($result);
            return $result;
        }
        else{
            $sql = "SELECT * FROM absent,user WHERE uid = abuid AND abmonth = ? ORDER BY abalnum desc";
            $sql = $this->db->query($sql,$partition);
            $result = $sql->result_array();
            //var_dump($result);
            return $result;
        }
    }

}
