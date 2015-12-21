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

    public function adminlogin()
    {
        $sql = "SELECT id FROM admin WHERE pwd = ? limit 1";
        $query = $this->db->query($sql, array( md5($_POST['pwd']) ));
        if ($query->num_rows() > 0){
            return $query->result_array()[0];
        }
        else{
            return false;
        }
    }

    public function adminchangepass()
    {
        $sql = "SELECT * FROM admin WHERE pwd = ? limit 1";
        $query = $this->db->query($sql, array(md5($_POST['porigin'])));
        if ($query->result_array()){
            $sql = "UPDATE admin SET pwd = ? WHERE id=1";
            $query = $this->db->query($sql, array(md5($_POST['pnew'])));
            return true;
        }
        else{
            var_dump("Wrong Password!");
            return false;
        }
    }

}
