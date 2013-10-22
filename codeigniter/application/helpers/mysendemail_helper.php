
<?php

	function mysend_email($from,$sendername,$to,$subject,$message)
	{
	    //$this->email->set_newline("\r\n");
		$CI =& get_instance();
		$CI->load->library('email');
		
	    $CI->email->from($from,$sendername);
	    $CI->email->to($to);
	    $CI->email->subject($subject);
	    $CI->email->message($message);
		if($CI->email->send())
		{
		echo 'Your email was sent, successfully.';
		}

		else
		{
		show_error($CI->email->print_debugger());
		}
	}






?>