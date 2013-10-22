<?php
Class Errorlog extends CI_Controller
{
  function __construct()
  {

   parent::__construct();


 $this->load->view('new_template');


  }
 function index()
 {

  $this->register();

 }
 function register()
 {

		try {
			 $username=$this->input->post('username');
				if ($username)
				{
					echo $username;
				}
				else
				{
					throw new Exception("user name is empty");
                }
        }
		catch (Exception $e)
		{
            //log_message('error','LOG'.$e->getMessage());
			@trigger_error($e->getMessage(), E_USER_ERROR);
            return;
        }

 }



}
?>