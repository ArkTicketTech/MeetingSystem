<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Msg_model extends CI_Model {

    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
    }

    public function getmsgtable()
    {
    	$userid = 1;
        $sql = "SELECT mid,mname,msgtime,msgtype,msguid,mactet FROM ( SELECT * FROM ( SELECT DISTINCT(mmmid) FROM meetmember WHERE meetmember.mmuid = ? ) a JOIN msg ON msg.msgmid = a.mmmid ) b LEFT JOIN meeting ON msgmid = mid;";
    	$sql = $this->db->query($sql,$userid); 
        return $sql->result_array();
    }

}