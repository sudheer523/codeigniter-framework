<?php

/**
* SENDS EMAIL WITH GMAIL
*/
class Emaileaxmple extends CI_Controller
{
	function __construct()
	{
				parent::__construct();
	}

	function index()
	{

/*
		$config['protocol'] = 'smtp';
		$config['smtp_host'] = 'ssl://smtp.googlemail.com';
		$config['smtp_port'] = 465;
		$config['smtp_user'] = 'sudheerkavitapu54@gmail.com';
		$config['smtp_pass'] = '';*/

	    $name = $this->input->post('name');
        $email = $this->input->post('email');
        $subject = $this->input->post('subject');
        $message = $this->input->post('message');
		$from='sudheer@gmail.com';
		$sendername='sudheer';
		$this->load->library('email');
		$this->load->helper('mysendemail');
		mysend_email($from,$sendername,$email,$subject,$message);


		/*
		$this->email->set_newline("\r\n");
		$this->email->from('sudheer@gmail.com', 'sudheer');
		$this->email->to($email);
		$this->email->subject($subject);
		$this->email->message($message);

		if($this->email->send())
		{
			echo 'Your email was sent, successfully.';
		}

		else
		{
			show_error($this->email->print_debugger());
		}*/
	}
}

?>
