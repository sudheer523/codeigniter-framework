<?php

class Usercontroller extends CI_Controller
{
		function __Construct()
		{
			parent :: __Construct();
		 //$this->view_data['base_url']=base_url();

		//$this->load->view('user_view');
		$this->load->model('usermodel');
		
		}
		function index()
		{
            $data['usrgrp_result'] = $this->usermodel->usrgrpdata();
            $data['usrtype_result'] = $this->usermodel->usrtype();
            //print_r($data);
            $this->load->view('user_view', $data);
		    // $this->register();
		}
		
		function register()
		{


            try {
               // $username=$this->input->post('username');
              //  if ($username)
               // {
               //     echo $username;
               // }




			     $this->load->library('form_validation');


                $this->form_validation->set_rules('userid','userid','trim|required|alpha_numaric|min_length[1]|xss_clean');

			  $this->form_validation->set_rules('first_name','First Name','trim|required|alpha_numaric|min_length[1]|xss_clean');
			 // $this->form_validation->set_rules('middle_name','Middle Name','trim|alpha_numaric|min_length[1]|xss_clean');
			  $this->form_validation->set_rules('last_name','Last Name','trim|required|alpha_numaric|min_length[1]|xss_clean');
              $this->form_validation->set_rules('email','Email','trim|required|xss_clean|valid_email');
             // $this->form_validation->set_rules('password','Password','trim|required|alpha_numaric|min_length[3]|xss_clean');
			//  $this->form_validation->set_rules('conf_password','Conformation Password','trim|required|alpha_numaric|min_length[3]|matches[password]|xss_clean');
			  $this->form_validation->set_rules('phone','phone','trim|required|numeric|min_length[10]|max_length[12]');
			 // $this->form_validation->set_rules('phone_ext','Phone Ext','trim|required|numeric|min_length[3]|max_length[4]');
			  $this->form_validation->set_rules('cms_id','CMS Id','trim|numaric|min_length[3]|max_length[10]');
			  $this->form_validation->set_rules('Usergroup','Group','trim|required');
			  $this->form_validation->set_rules('Usertype','User Type','trim|required');

			  //$this->load->view('view_register',$this->view_data);

			  if($this->form_validation->run()==FALSE)
				{
                   //echo "*************8";
                    $data['usrgrp_result'] = $this->usermodel->usrgrpdata();
                    $data['usrtype_result'] = $this->usermodel->usrtype();

                    $this->load->view('user_view', $data);
				}
			  else
				{

                  $username=$this->input->post('userid');
                    $usernamecount=$this->usermodel-> checkuser($username);
                    $email=$this->input->post('email');
                    $emailcheck=$this->usermodel-> checkemail($email);


                    if($usernamecount>0)
                    {
                        $data['usrgrp_result'] = $this->usermodel->usrgrpdata();
                        $data['usrtype_result'] = $this->usermodel->usrtype();
                        $data['usr_error'] ='The username is already taken';
                        //$this->form_validation->set_rules('username', 'Username', '');
                        //$this->form_validation->set_message('Username', 'The username is already taken');

                        $this->load->view('user_view', $data);

                    }

                   elseif($emailcheck>0)
                    {
                        $data['usrgrp_result'] = $this->usermodel->usrgrpdata();
                        $data['usrtype_result'] = $this->usermodel->usrtype();
                        $data['email_error'] ='The email is already exist';
                        //$this->form_validation->set_rules('username', 'Username', '');
                        //$this->form_validation->set_message('Username', 'The username is already taken');

                        $this->load->view('user_view', $data);

                    }
                    else
                    {
                          $firstname=$this->input->post('first_name');
                          $middlename='';
                          $lastname=$this->input->post('last_name');
                          $password='admin';
                          $this->load->library('encrypt');
                          $password=$this->encrypt->encode($password);
                          $cmsid=$this->input->post('cms_id');
                          $phone=$this->input->post('phone');
                          $phonext='1234';
                        $company_id='1234';
                          $usergroup=$this->input->post('Usergroup');
                          $usertype=$this->input->post('Usertype');
                          $checkbox=$this->input->post('send_email');

                            if($checkbox)
                            {

                                $email = $this->input->post('email');
                                $subject = '';
                                $message ='';
                                $from='sudheer@gmail.com';
                                $sendername='sudheer';
                                $this->load->library('email');
                                $this->load->helper('mysendemail');
                                mysend_email($from,$sendername,$email,$subject,$message);

                            }
                          $this->usermodel->register_user($username,$firstname,$middlename,$lastname,$password,$cmsid,$phone,$phonext,$usergroup,$usertype,$company_id);
                    }
                  }



            //else
                //{
                    //throw new Exception("user name is empty");
                //}


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