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
			  $this->load->library('form_validation');

			  $this->form_validation->set_rules('username','Username','trim|required|alpha_numaric|min_length[1]|xss_clean|strtolower');
			  $this->form_validation->set_rules('first_name','First Name','trim|required|alpha_numaric|min_length[1]|xss_clean');
			  $this->form_validation->set_rules('middle_name','Middle Name','trim|alpha_numaric|min_length[1]|xss_clean');
			  $this->form_validation->set_rules('last_name','Last Name','trim|required|alpha_numaric|min_length[1]|xss_clean');
              $this->form_validation->set_rules('email','Email','trim|required|xss_clean|valid_email');
              $this->form_validation->set_rules('password','Password','trim|required|alpha_numaric|min_length[3]|xss_clean');
			  $this->form_validation->set_rules('conf_password','Conformation Password','trim|required|alpha_numaric|min_length[3]|matches[password]|xss_clean');
			  $this->form_validation->set_rules('phone','phone','trim|required|numeric|min_length[10]');
			  $this->form_validation->set_rules('phone_ext','Phone Ext','trim|required|numeric|min_length[3]');
			  $this->form_validation->set_rules('company_id','Company ID','trim|required|required|numaric|min_length[3]');
			  $this->form_validation->set_rules('Usergroup','User Group','trim|required');
			  $this->form_validation->set_rules('Usertype','User Type','trim|required');

			  //$this->load->view('view_register',$this->view_data);

			  if($this->form_validation->run()==FALSE)
				{
				 $this->load->view('user_view',$this->view_data);
				}
			  else
				{
				  $username=$this->input->post('username');
				  $firstname=$this->input->post('first_name');
				  $middlename=$this->input->post('middle_name');
				  $lastname=$this->input->post('last_name');
				  $password=$this->input->post('password');
				  $this->load->library('encrypt');
                  $password=$this->encrypt->encode($password);
				  $companyid=$this->input->post('company_id');
				  $phone=$this->input->post('phone');
                  $phonext=$this->input->post('phone_ext');
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
	  $this->usermodel->register_user($username,$firstname,$middlename,$lastname,$password,$companyid,$phone,$phonext,$usergroup,$usertype);
				}
		}





}











?>