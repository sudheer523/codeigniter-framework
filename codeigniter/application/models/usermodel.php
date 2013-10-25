<?php
Class Usermodel extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function register_user($username,$firstname,$middlename,$lastname,$password,$cmsid,$phone,$phonext,$usertype,$usergroup,$company_id)
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
            'CMSID' => $cmsid,
            'Phone' => $phone,
            'PhoneExt' => $phonext,
            'CompanyId' => $company_id,
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
    function checkuser($username)
    {
        // $sha1_password=sha1($password);
           //$query="insert into user (username,name,email,password) values(?,?,?,?)";
            //$query="insert into User (UserName,FirstName,MiddleInt,LastName,Pwd,CompanyId,Phone,PhoneExt,UserTypeId,UserGroupId,CreateDate,CreatedBy,ModifiedDate,ModifiedBy) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $where = "UserName='$username'";

            $query = $this->db->select('*');
            $this->db->from('[User]');
            $this->db->where($where);
            $query = $this->db->get();
            $result=$query->result_array();
           // $resultcount= $this->db->count_all_results('User');

           // return $resultcount;


        return $query->num_rows();
    }
    function checkemail($email)
    {
        // $sha1_password=sha1($password);
        //$query="insert into user (username,name,email,password) values(?,?,?,?)";
        //$query="insert into User (UserName,FirstName,MiddleInt,LastName,Pwd,CompanyId,Phone,PhoneExt,UserTypeId,UserGroupId,CreateDate,CreatedBy,ModifiedDate,ModifiedBy) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $where = "Email='$email'";

        $query = $this->db->select('*');
        $this->db->from('[User]');
        $this->db->where($where);
        $query = $this->db->get();
        $result=$query->result_array();
        // $resultcount= $this->db->count_all_results('User');

        // return $resultcount;


        return $query->num_rows();
    }
            function userlist_db($start,$end)
            {
                $query = $this->db->get('[User]');
               // $query = $this->db->query(' SELECT * FROM ( SELECT *, ROW_NUMBER() OVER (ORDER BY name) as row FROM sys.databases ) a WHERE row >'.$start.' and row <= '.$end);

                $result=$query->result_array();

                //print_r($result);

               /*
                $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($result));
                    */


                $aColumns = array( 'UserID','UserName', 'FirstName', 'LastName', 'Email', 'UserGroupId','CMSID' );
                $output = array(
                   // "sEcho" => intval($_GET['sEcho']),
                    "iTotalRecords" =>count($result) ,
                    "iTotalDisplayRecords" =>10,
                    "aaData" => array()
                );
                foreach($result as $rst)
                {
                    $row = array();
                   //echo '<pre>'. print_r($result);
                    //echo "<br>columns are ";

                    //print_r($aColumns);
                   // echo "<br>";
                   // echo count($aColumns);
                    $radio='<input type="radio">';
                    $row[]=$radio;
                    $userid='';
                    for ( $i=0 ; $i<count($aColumns) ; $i++ )
                    {

                            /* General output */

                        $col=$aColumns[$i];
                        if($i==0)
                        {


                            $userid=$rst[$col];
                        }
                        //echo 'cplumn is'.$col;
                      //  echo 'resukt column is';
                       // echo 'username in result is';

                       // print_r($result[$i][$col]);

                           // $row[] = $result[$i][$col];
                        else{

                        $row[] = $rst[$col];

                       // echo "row is<br>";
                       // print_r($row);
                        }
                    }
                    $row[] ='yes';
                    $row[] =date('m/d/Y h:i:s a', time());
                    //$hrefloc='localhost:8080/github/codeigniter/index.php/usereditcontroller';
                    $hrefloc='http://localhost:8080/github/codeigniter/index.php/usereditcontroller';
                   // $edit_buutton='<button class="btn btn-sm btn-primary" onClick="location.href="'.$hrefloc.'><i class="icon-edit"></i> Edit</button>';
                    $edit_buutton='<button class="btn btn-sm btn-primary"><i class="icon-edit"></i><a href="http://localhost:8080/github/codeigniter/index.php/usereditcontroller?id='.$userid.'" style="color:#ffffff"> Edit</a></button>';

                    $row[] =$edit_buutton;
                 //print_r($row);

                    $output['aaData'][] = $row;
              // print_r($output);

            }

//echo 'final output';
               // print_r($output);


                echo json_encode( $output );
            }
    function useredit($id)
    {


        $query = $this->db->select('*');
        $this->db->from('[User]');
        $this->db->where('UserID', $id);
        $query = $this->db->get();
        $result=$query->result_array();

            return  $result;
    }
    function update_user($id,$userid,$firstname,$lastname,$cmsid,$phone,$usergroup,$usertype,$date)
    {
/*
                echo '<br> user id'.$id;
                echo '<br>username is'.$userid;
                echo '<br>'.$firstname;
                echo '<br>'.$lastname;
                echo '<br>'.$cmsid;
                echo '<br>'.$phone;
                echo '<br>'.$usergroup;
                echo '<br>'.$usertype;
*/
           $data = array(
                    'UserName' => $userid ,
                    'FirstName' => $firstname,
                    'LastName' => $lastname,
                    'CMSId' => $cmsid,
                    'Phone' => $phone,
                    //'PhoneExt' => $phonext,
                    'UserTypeId' => $usertype,
                    'UserGroupId' => $usergroup,
                    //'CreatedBy' => 'Admin',
                    'ModifiedDate' => $date,
                    'ModifiedBy' => 'Admin'
                );
                //print_r($data);

                    $this->db->where('UserID', $id);
                    $this->db->update('[dbo].[User]', $data);



               // $where = "UserID = '$id'";

              //  $str = $this->db->update_string('[dbo].[User]', $data, $where);
            //$this->db->update('[dbo].[User]', $data, "id =".$id);
       $this->db->where('UserID', $id);
       $this->db->update('[dbo].[User]', $data);


    }
    function users_list($order_by, $limit=0, $start, $search_string)
    {

     $end=($start+$limit);

       // echo 'start is'.$start;
        // echo 'end is'.$end;
        if(!empty($search_string))
        {
            /*
            $this->db->select("u.*,d.department_name as department", FALSE)
                ->from("users u")
                ->join("departments d","u.department = d.id","left")
                ->like('user_id',$search_string)
                ->or_like('first_name',$search_string)
                ->or_like('last_name',$search_string)
                ->or_like('title',$search_string)
                ->limit($limit, $start)
                ->order_by($order_by);
            */
            $query = $this->db->query("SELECT * FROM (SELECT *, ROW_NUMBER() OVER (ORDER BY UserName) as row FROM [dbo].[User] where UserName like '%$search_string%' OR FirstName like '%$search_string%' OR LastName like '%$search_string%'  OR Email like '%$search_string%' OR UserGroupId like '%$search_string%' OR CMSID like '%$search_string%') a WHERE row > ".$start.' and row <='. $end);

       }
        else
        {
            /*
            $this->db->select("u.*,d.department_name as department", FALSE)
                ->from("users u")
                ->join("departments d","u.department = d.id","left")
                ->limit($limit, $start)
                ->order_by($order_by);
*/




        $query = $this->db->query('SELECT * FROM (SELECT *, ROW_NUMBER() OVER (ORDER BY UserName) as row FROM [dbo].[User]) a WHERE row > '.$start.' and row <='. $end);
        }


      // echo 'SELECT * FROM (SELECT *, ROW_NUMBER() OVER (ORDER BY UserName) as row FROM [dbo].[User]) a WHERE row > '.$start.'and row <='. $end;

        $result = $query->result_array();
        return $result;
    }


    function urg_name($urg_id)
    {
        $where = "UserGroupId='$urg_id'";

        $query = $this->db->select('*');
        $this->db->from('[UserGroup]');
        $this->db->where($where);
        $query = $this->db->get();
        $result=$query->result_array();

        return $result;
    }


}
?>