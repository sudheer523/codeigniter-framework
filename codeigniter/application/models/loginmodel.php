<?php
Class Loginmodel extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function checkpassword($username)
    {
        // $sha1_password=sha1($password);
        try
        {
        //$query="insert into user (username,name,email,password) values(?,?,?,?)";
        //$query="insert into User (UserName,FirstName,MiddleInt,LastName,Pwd,CompanyId,Phone,PhoneExt,UserTypeId,UserGroupId,CreateDate,CreatedBy,ModifiedDate,ModifiedBy) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $where = "UserName='$username'";

        $query = $this->db->select('Pwd');
        $this->db->from('[User]');
        $this->db->where($where);
         $query = $this->db->get();
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