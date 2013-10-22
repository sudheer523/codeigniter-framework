<?php
class Imgmanipulationnew extends CI_Controller{


var $img_path='C:/Users/Public/Pictures/Sample Pictures/Jellyfish.jpg';
    public function __construct()
	{    
   
        parent::__construct();
 
    }
   
    public function index()
	{
		  $this->load->view('imgmanipulationview');
	 $this->image_demo();
	}
	


  public function image_demo()
    {
        try
        {
            if($this->input->post("submit")){        
                $this->load->library("app/uploader");
                $config = $this->config->item("rules");
                $this->uploader->do_upload($config["image"]);
                
                $image_data                          =   $this->upload->data();
                $config["manipulation"]['source_image']      =   $image_data['full_path'];
                $this->load->library('image_lib', $config["manipulation"]); 
                
                
                switch($this->input->post("mode"))
                {
                    case "crop":
                        $this->image_lib->crop();
                        break;
                    case "resize":
                        $this->image_lib->resize();
                        break;
                    case "rotate":
                        $config["manipulation"]['rotation_angle'] = '90';
                        $this->image_lib->initialize($config["manipulation"]); 
                        $this->image_lib->rotate();
                        break;
                    case "watermark":
                        $config["manipulation"]['wm_text'] = 'Copyright 2013 - CodeSamplez.com';
                        $config["manipulation"]['wm_type'] = 'text';
                        $this->image_lib->initialize($config["manipulation"]); 
                        $this->image_lib->watermark();    
                }
            }
            // $this->view('');
			return $this->load->view('imgmanipulationview');
        }
        catch(Exception $err)
        {
            log_message("error",$err->getMessage());
            return show_error($err->getMessage());
        }
    }
}

?>