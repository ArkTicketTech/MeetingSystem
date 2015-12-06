<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User_model extends CI_Model {

    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
    }

    public function getlatestuser()
    {
    	$sql = "SELECT * FROM user ORDER BY ulatest desc limit 5";
    	$sql = $this->db->query($sql);
    	$result = $sql->result_array();
    	var_dump($result);
        return $result;
    }

}
