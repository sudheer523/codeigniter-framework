<?php
class Profile extends CI_Controller{
    public function __construct()
	{    
        // Load parent construct
        parent::__construct();
        // Load parser library
        $this->load->library('parser');
    }
    
    public function index()
	{
        $data = array();
		$user_name='sudheer';
        $data['user_name'] = $user_name;
        $data['separator'] = '|';
        $data['profile_title'] = 'Profile view';
        $data['home_url'] = 'www.yourdomain.com/';
        $data['home_header_text'] = 'Home Page';
          $data['wall_entries'] ='posts';
        // Get the user information from the model
        // First load model
        $this->load->model('user_model');
        // Grab user information
        /*
		$user_info = $this->user_model->get_user_info( $user_name );
        $data['profile_name'] = $user_info['first_name'].' '.$user_info['last_name'];
        $data['default_picture_view'] = $user_info['default_picture_view'];
        $data['default_pic_src'] = $user_info['default_pic_src'];
        
        $data['user_control_panel'] = 'Top Control Panel Menu';
        $data['wall_heading'] = 'Friends love =)';
        // Get wall entries
        // This model should return all messageson this users wall
        // including username and message body
        $data['wall_entries'] = $this->user->get_wall_posts( $user_name );    
		
		 $user_info = $this->user_model->get_user_info( $user_name );
        */
        $data['profile_name'] ='sudheer k';
        $data['default_picture_view'] = 'C:/Users/Public/Pictures/Sample Pictures/Desert.jpg';
        $data['default_pic_src'] = 'C:/Users/Public/Pictures/Sample Pictures/Desert.jpg';
        
        $data['user_control_panel'] = 'Top Control Panel Menu';
        $data['wall_heading'] = 'Friends  =)';
		$data['/wall_entries']='entries';
		$data['body']='wall body';
        // Get wall entries
        // This model should return all messageson this users wall
        // including username and message body
       
        // After all data has been found, parse
        $this->parser->parse( 'profile_view', $data );
        //$this->load->view($view_file);
    }
}
?>