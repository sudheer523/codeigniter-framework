<?php
class Dbinsert extends CI_Model
{
	function __construct()
	{
 	 parent::__construct();
  }


	function Insert($username,$name,$email,$password)
	{

		$password=sha1($password);
		$query='INSERT INTO users (username,name,email,password) values(?,?,?,?)';
		$this->db->query($query,array($username,$name,$email,$password));
		$this->Select();

	}

	function Select()
	{

		$this->load->library('table');

		$query = $this->db->query("SELECT id,username,password,email,name FROM users");
		$total=$query->num_rows();
		echo $this->table->generate($query);


	}

}

?>