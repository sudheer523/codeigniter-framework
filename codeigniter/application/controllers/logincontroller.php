<?php

class Logincontroller extends CI_Controller
{
    function __Construct()
    {
        parent :: __Construct();
        //$this->view_data['base_url']=base_url();

        //$this->load->view('user_view');
        $this->load->model('loginmodel');

    }
    function index()
    {
        //$data['usrgrp_result'] = $this->usermodel->usrgrpdata();
       // $data['usrtype_result'] = $this->usermodel->usrtype();
        //print_r($data);
        $this->load->view('loginview');
        // $this->register();
    }

    function logincheck()
    {

            $username=$this->input->post('username');
            $password=$this->input->post('password');
        $this->load->library('encrypt');

        $checkpassword=$this->loginmodel->checkpassword($username);
      // echo "from mydb".print_r($checkpassword);
        $checkpassword=$checkpassword[0];
        $checkpassword=$checkpassword['Pwd'];
       // echo "pass word for user is".$checkpassword;
        $checkpassword=$this->encrypt->decode($checkpassword);
      //  echo  'new'.$checkpassword;

            if($password===$checkpassword)
            {
                $this->load->view('afterlogin');

            }
        else
        {
            $this->load->view('loginview');

        }

    }





}











?>