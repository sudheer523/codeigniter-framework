<?php
Class Usermodel extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function register_user($username,$firstname,$middlename,$lastname,$password,$companyid,$phone,$phonext,$usertype,$usergroup)
    {


        try{

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

       //$q=$this->db->insert('[dbo].[User1]', $data);
   // echo "result of insert is".$q;
            if(! $this->db->insert('[dbo].[User]', $data))
            {
                throw new Exception("query failed");
            }
            else
            {

               echo '<h2>Thanq for registering</h2>';
            }


        //$query="INSERT INTO [dbo].[Userdfdffdfd]([UserName],[FirstName],[MiddleInt] ,[LastName],[Pwd],[CompanyId],[Phone],[PhoneExt],[UserTypeId],[UserGroupId],[CreateDate],[CreatedBy],[ModifiedDate],[ModifiedBy]) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
       // $this->db->query($query,array($username,$firstname,$middlename,$lastname,$password,$companyid,$phone,$phonext,$usertype,$usergroup,$date,'Admin',$date,'Admin'));
        }


        catch (Exception $e)
        {
            //echo "we are in catch block";
            //log_message('error','LOG'.$e->getMessage());
            @trigger_error($e->getMessage(), E_USER_ERROR);
            return;
        }
    }
    function usrgrpdata()
    {
        try
        {
        $query = $this->db->get("UserGroup");
        $result=$query->result_array();
            if (!$result)
            {
                throw new Exception('error in query');
                return false;
            }
        return $result;
        }
        catch (Exception $e)
        {
            //echo "we are in catch block";
            //log_message('error','LOG'.$e->getMessage());
            @trigger_error($e->getMessage(), E_USER_ERROR);
            return;
        }


    }
    function usrtype()
    {
        try
        {
                $query = $this->db->get("UserType");
            // $query = $this->db->get('mytable');
            $result=$query->result_array();
            if (!$result)
            {
                throw new Exception('error in query');
                return false;
            }
            return $result;
        }
        catch (Exception $e)
        {
            //echo "we are in catch block";
            //log_message('error','LOG'.$e->getMessage());
            @trigger_error($e->getMessage(), E_USER_ERROR);
            return;
        }

    }
}
?>