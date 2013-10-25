<?php
/**
 * Controller: Users
 * Author:Maruthi
 *
 **/
class Userlistcontroller1 extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        //$this->load->library('jquery_ext');
        $this->load->helper(array('form'));
        $this->load->model('usermodel');
        //$this->load->library('form_validation');
/*
        if(!is_logged_in())
        {
            redirect('process-manager/login');
        }

        if(!is_access_permission($this->router->fetch_class()))
        {
            echo "You don't have permission to access this page"; exit();
        }*/

    }

    function index()
    {
        $this->load->view('user_list_view1');
    }
    function user_list_ajax()
    {
        //error_reporting(0);
        $this->load->model('usermodel');
        $columns=array("user_id","first_name","last_name","title","phone","email","department","actions");
        $columns = array( "Select","UserName","FirstName","LastName","Email","GroupDescription","CMSID","Status","LastLogin","actions");

        $search_string ='';
        $start=(isset($_REQUEST["iDisplayStart"]) ? (int) $_REQUEST["iDisplayStart"] : 0);
        $limit=(isset($_REQUEST["iDisplayLength"]) ? (int) $_REQUEST["iDisplayLength"] : 10);

        $order_by=array();
        foreach ( $_REQUEST as $key => $value ) {
            if ( substr($key,0,9) == "iSortCol_" ) {
                $col_num=$value;
                $order_by[$col_num]=($columns[$col_num] == "client_id" ? "client_id" : $columns[$col_num])  . " " . $_REQUEST["sSortDir_0"];
            }
        }
        ksort($order_by);

        if ( count($order_by) < 1 ) $order_by="'client_id','asc'";
        else $order_by=join(',',$order_by);


        if(!empty($_REQUEST["sSearch"]))
        {
            $search_string = trim($_REQUEST["sSearch"]);
        }
        $data['records'] = $this->usermodel->users_list($order_by,$limit, $start,$search_string);

        $count = $this->db->get('[dbo].[User]')->num_rows();
        $aaData=array();

        foreach($data['records'] as $info){

            $d_id=$info['UserID'];
            $ug_id=$info['UserGroupId'];
            $ug_name=$this->usermodel->urg_name($ug_id);
            $urg_name= $ug_name[0]['GroupDescription'];
            //echo '<br>user name is'.$urg_name;
            foreach ( $columns as $idx => $name ) {


                    $radio='<input type="radio" id="r1" name="r1">';
                    $row[0]= $radio;

                $row[0]= $radio;
                                             if($name == "actions"){
                    //$row[$idx]= "<a href='".base_url()."process-manager/users/edit/".$info['user_id']."' class='btn btn-info'> <i class='icon-edit icon-white'></i>Edit</a>&nbsp;&nbsp;<a href='".base_url()."process_manager/users/delete_user/".$info['user_id']."' onclick='return deletescript();' class='btn btn-danger'><i class='icon-trash icon-white'></i>Delete</a>";
                    //$row[$idx]= "<a href='".base_url()."process-manager/users/edit/".$info['user_id']."' class='btn btn-info'> <i class='icon-edit icon-white'></i>Edit</a>&nbsp;&nbsp;<a href='".base_url()."process_manager/users/delete_user/".$info['user_id']."' onclick='return deletescript();' class='btn btn-danger'><i class='icon-trash icon-white'></i>Delete</a>";


                     $edit_button='<a href='.site_url("usereditcontroller?id=".$d_id).' style="color:#ffffff" target="_self"><button class="btn btn-sm btn-primary"><i class="icon-edit"></i>
                     Edit
                     </button></a>';
                     $row[$idx]=$edit_button;

                }
                 elseif($name == "Status")
                 {
                     $row[$idx]= 'Active';
                 }
                 elseif($name == "LastLogin")
                 {
                     $row[$idx]=date('m/d/Y h:i:s a', time());
                 }
                 elseif($name == "GroupDescription")
                 {

                     $row[$idx]=$urg_name;

                 }
                else{
                    $row[$idx]=$info[$name];
                  //$row[7]= 'yes';

            }

            }


            reset($columns);
            //print_r($row);

            $aaData[]=$row;
            //print_r($aaData);

        }

        $output=array(
            "sEcho" => (int) $_REQUEST["sEcho"],
            "iTotalRecords" => $count,
            "iTotalDisplayRecords" => $count, //($count > $limit ? $count : $limit),
            "aaData" => $aaData
        );

        echo json_encode( $output, true );
    }


    /*
   function indexOLD()
   {
       $this->load->view('home/home');
   }

   function add()
   {

       $script = 'jQuery( document ).ready(function() {
                          jQuery("#acc_trigger_user").addClass("acc_trigger active");
                          jQuery("#acc_container_user").show();
                          jQuery("#user_form").validate();
                });';

       $this->jquery_ext->add_script($script);
       $data['users']=$this->usermodel->set_users();
       $data['departments']=$this->usermodel->get_departments();
       $data['adminlevels']=$this->usermodel->get_admin_levels();
       $data['phone_types']=$this->usermodel->get_phone_type();
       $data['supervisor']=$this->usermodel->set_users();
       $user_data = $this->input->post();
       if(!empty($user_data))
       {
           $status = $this->users_model->add_user_action();

           if($status===FALSE)
           {
               $this->session->set_flashdata('error', 'Error: Cannot add new user.');
               $this->load->view('/users/user_edit',$data);

           }else{

               //$this->session->set_flashdata('errorcontact', $contactmess);
               $this->session->set_flashdata('formtype','users');
               redirect(current_url());
           }
       }
       else
       {
           $this->load->view('/users/user_edit',$data);
       }

   }


    function edit($user_id="")
    {
        $user_data = $this->input->post();
        if(empty($user_data))
        {
            $this->edit_ajax($user_id);
        }
        else
        {
            $this->add();
        }
    }

    function edit_ajax_old()
    {
        $userid=$this->input->post('userid');
        $departments=$this->users_model->get_departments();
        $adminlevels=$this->users_model->get_admin_levels();
        $phone_type=$this->users_model->get_phone_type();
        $userdetail=$this->users_model->set_users();
        $users=$this->users_model->set_users($userid);
        $userinfo=array('users'=>$userdetail,'departments'=>$departments,'adminlevels'=>$adminlevels,'phone_types'=>$phone_type,'userid'=>$userid,'first_name'=>$users['first_name'],'last_name'=>$users['last_name'],'title'=>$users['title'],'email'=>$users['email'],'email2'=>$users['email2'],'email3'=>$users['email3'],'email_notification'=>$users['email_notification'],'email2_notification'=>$users['email2_notification'],'email3_notification'=>$users['email3_notification'],'skype'=>$users['skype'],'phone'=>$users['phone'],'phone2'=>$users['phone2'],'address'=>$users['address'],'city'=>$users['city'],'state'=>$users['state'],'zip'=>$users['zip'],'country'=>$users['country'],'notes'=>$users['notes'],'sms_reminder_on'=>$users['sms_reminder_on'],'sreminder'=>$users['sms_reminder'],'email_reminder_on'=>$users['email_reminder_on'],'ereminder'=>$users['email_reminder'],'username'=>$users['username'],'password'=>$users['password'],'admin_level'=>$users['admin_level'],'department'=>$users['department'],'supervisor'=>$users['supervisor'],'user_photo'=>$users['photo'],'user_phone_type'=>$users['phone_type'],'user_phone2_type'=>$users['phone2_type']);
        $this->load->view('users/add_user.php',$userinfo);
    }

    function edit_ajax($user_id="")
    {
        error_reporting(0);
        if($user_id=="")
        {
            $user_id = $this->input->post('userid');
            $view_to_load = 'users/add_user';
        }
        else
        {
            $view_to_load = 'users/user_edit';
        }
        //$userid=$this->input->post('userid');
        $departments=$this->users_model->get_departments();
        $adminlevels=$this->users_model->get_admin_levels();
        $phone_type=$this->users_model->get_phone_type();
        $supervisor=$this->users_model->set_users();
        echo '<pre>';echo 'manju';print_r($adminlevels);
        echo '<pre>';echo 'manju';print_r($userdetail_supervisor);
        $users=$this->users_model->set_users($user_id);
        $userinfo=array('users'=>$users,'departments'=>$departments,'adminlevels'=>$adminlevels,'phone_types'=>$phone_type,'userid'=>$user_id,'first_name'=>$users['first_name'],'last_name'=>$users['last_name'],'title'=>$users['title'],'email'=>$users['email'],'email2'=>$users['email2'],'email3'=>$users['email3'],'email_notification'=>$users['email_notification'],'email2_notification'=>$users['email2_notification'],'email3_notification'=>$users['email3_notification'],'skype'=>$users['skype'],'phone'=>$users['phone'],'phone2'=>$users['phone2'],'address'=>$users['address'],'city'=>$users['city'],'state'=>$users['state'],'zip'=>$users['zip'],'country'=>$users['country'],'notes'=>$users['notes'],'sms_reminder_on'=>$users['sms_reminder_on'],'sreminder'=>$users['sms_reminder'],'email_reminder_on'=>$users['email_reminder_on'],'ereminder'=>$users['email_reminder'],'username'=>$users['username'],'password'=>$users['password'],'admin_level'=>$users['admin_level'],'department'=>$users['department'],'supervisor'=>$supervisor,'user_photo'=>$users['photo'],'user_phone_type'=>$users['phone_type'],'user_phone2_type'=>$users['phone2_type']);
        $this->load->view($view_to_load,$userinfo);
        //$this->load->view('users/add_user.php',$userinfo);
    }

    function delete_user()
    {
        $this->load->model('users_model');
        $this->users_model->delete_user();
        $this->session->set_flashdata('success','user Deleted Successfully ');
        redirect('process_manager/users');
    }

    public function users_databox()
    {
        $search_string = $this->input->post('search_string');
        $data['users'] = $this->users_model->users_databox($search_string);
        $this->load->view('users/users_databox',$data);
    }*/
}