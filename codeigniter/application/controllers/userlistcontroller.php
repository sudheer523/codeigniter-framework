<?php

class Userlistcontroller extends CI_Controller
{
    function __Construct()
    {
        parent :: __Construct();
        //$this->view_data['base_url']=base_url();


    }
    function index()
    {
        $this->load->view('user_list_view');


        // $this->register();
    }

    function userlist()
    {
        $this->load->model('usermodel');

        $this->usermodel->userlist_db();

    }





}











?>