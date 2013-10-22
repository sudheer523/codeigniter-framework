<?php
Class User_model extends CI_Model
{
 function __construct()
  {
  
   parent::__construct();
  }
 function register_user($username,$name,$email,$password)  
   {
     $sha1_password=sha1($password);
     $query="insert into user (username,name,email,password) values(?,?,?,?)";
	 $this->db->query($query,array($username,$name,$email,$sha1_password));
	 echo"<h2>successfully registred</h2>";

   }

}
?>