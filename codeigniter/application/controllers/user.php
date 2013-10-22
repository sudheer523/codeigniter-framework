<?php
Class User extends CI_Controller
{
  function __construct()
  {

   parent::__construct();
  $this->view_data['base_url']=base_url();
    //$this->load->view('email_template');


   $this->load->model('User_model');

  }
 function index()
 {
  $this->register();

 }
 function register()
 {
     	$this->load->library('session');
	  if($this->session->userdata('username'))
	  {
	    $this->valid();
	  }
	  else
		 {
			  $this->load->library('form_validation');
			  $this->form_validation->set_rules('username','Username','trim|required|alpha_numaric|min_length[3]|xss_clean|strtolower');
			  $this->form_validation->set_rules('name','Name','trim|required|alpha_numaric|min_length[3]|xss_clean');
			  $this->form_validation->set_rules('email','Email','trim|required|xss_clean|valid_email');
			  $this->form_validation->set_rules('password','Password','trim|required|alpha_numaric|min_length[3]|xss_clean');
			  $this->form_validation->set_rules('conf_password','Conformation Password','trim|required|alpha_numaric|min_length[3]|matches[password]|xss_clean');

			  //$this->load->view('view_register',$this->view_data);

			  if($this->form_validation->run()==FALSE)
				{
				 $this->load->view('view_register',$this->view_data);
				}
			  else
				{
				  echo"<h2>successfully registred</h2>";
				  $username=$this->input->post('username');
				  $name=$this->input->post('name');
				  $email=$this->input->post('email');
				  $password=$this->input->post('password');

				  //$this->User_model->register_user($username,$name,$email,$password);
				 $this->submit();
				}
			}
	}
  function submit()
	  {
	    //echo'submit';
		$this->load->library('session');

	    $username=$this->input->post('username');
	    $password=$this->input->post('password');
		$email=$this->input->post('email');


		  //if ( $this->session->set_userdata($newdata) )
		//if ( $username == "suresh"  && $password == "1234" )
		 //{

			$this->session->set_userdata('login_state', TRUE);

			$newdata = array(
                   'username'  => $username,
                   'email'     => $email,
                   'logged_in' => TRUE
               );
		 $this->session->set_userdata($newdata);

			$this->valid();
			// }
	   //else
		//  {

		//	redirect( '/' );
		 // }

	  }
  function valid()
    {
	 $username=$this->session->userdata('username');
	  $email=$this->session->userdata('email');

	 	echo "Welcome to " . $username . "<br>";
			echo "you are logged in as  " . $email . "<br>";

	 echo anchor('logout', 'Logout');
	}



}
?>