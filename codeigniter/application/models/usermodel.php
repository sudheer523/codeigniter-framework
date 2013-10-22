<?php
Class Usermodel extends CI_Model
{
 function __construct()
  {
     parent::__construct();
  }
 	function register_user($username,$firstname,$middlename,$lastname,$password,$companyid,$phone,$phonext,$usertype,$usergroup)
   {
    // $sha1_password=sha1($password);
	$date=date("Y-m-d H:i:s");
	
     //$query="insert into user (username,name,email,password) values(?,?,?,?)";
	     //$query="insert into User (UserName,FirstName,MiddleInt,LastName,Pwd,CompanyId,Phone,PhoneExt,UserTypeId,UserGroupId,CreateDate,CreatedBy,ModifiedDate,ModifiedBy) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
 
	 //$this->db->query($query,array($username,$firstname,$middlename,$lastname,$password,$companyid,$phone,$phonext,$usertype,$usergroup,$date,'Admin',$date,'Admin'));
       $data = array(
       'UserName' => $username ,
       'FirstName' => $firstname,
       'MiddleInt' => $middlename,
       'LastName' => $lastname,
       'Pwd' => $password,
       'CompanyId' => $companyid,
       'Phone' => $phone,
       'PhoneExt' => $phonext,
       'UserTypeId' => $usertype,
       'UserGroupId' => $usergroup,
       'CreateDate' => $date,
       'CreatedBy' => 'Admin',
       'ModifiedDate' => $date,
       'ModifiedBy' => 'Admin'
       );

      // $this->db->insert('User', $data);




       $query="INSERT INTO [dbo].[User]([UserName],[FirstName],[MiddleInt] ,[LastName],[Pwd],[CompanyId],[Phone],[PhoneExt],[UserTypeId],[UserGroupId],[CreateDate],[CreatedBy],[ModifiedDate],[ModifiedBy]) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
       $this->db->query($query,array($username,$firstname,$middlename,$lastname,$password,$companyid,$phone,$phonext,$usertype,$usergroup,$date,'Admin',$date,'Admin'));

   }
    function usrgrpdata()
    {
        $query = $this->db->get("UserGroup");
       // $query = $this->db->get('mytable');
        $result=$query->result_array();
        return $result;


    }
    function usrtype()
    {
        $query = $this->db->get("UserType");
        // $query = $this->db->get('mytable');
        $result=$query->result_array();
        return $result;


    }
}
?>