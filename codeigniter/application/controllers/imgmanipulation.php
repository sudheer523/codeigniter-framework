<?php
class Imgmanipulation extends CI_Controller{


var $img_path='C:/Users/Public/Pictures/Sample Pictures/Jellyfish.jpg';
    public function __construct()
	{    
   
        parent::__construct();
 
    }
   
    public function index()
	{
		//$this->img_resize();
		//$this->img_rotate();
		//$this->img_watermark();
		$this->img_crop();
	}
	
	
	function img_resize()
	{
		$config['image_library'] = 'gd2';
		$config['source_image']	= $this->img_path;
		$config['create_thumb'] = TRUE;
		$config['maintain_ratio'] = TRUE;
		$config['width'] = 75;
		$config['height'] = 50;
		$this->load->library('image_lib', $config); 

		$this->image_lib->resize();
	}
		
	
	
	function img_rotate()
	{
	/*
		$config['image_library'] = 'gd2';
		//$config['library_path'] = '/usr/bin/';
		$config['source_image']	= $this->img_path;
		$config['rotation_angle'] = 'hor';

		$this->load->library('image_lib', $config);
		$this->image_lib->rotate();



		if ( ! $this->image_lib->rotate())
		{
			echo $this->image_lib->display_errors();
		}*/
		
		
		
		$config['image_library']   = 'gd2';
		$config['new_image']       = $data['file_path'].'thumbs/'.$data['file_name'];
		$config['maintain_ratio']  = TRUE;
		$config['width']           = 235;
		$config['height']          = 235;
		$config['create_thumb'] = FALSE; //No thumbnail
		$config['source_image'] = $this->img_path;; 
		$config['rotation_angle'] = '180'; 
		$this->load->library('image_lib', $config);
		$this->image_lib->rotate();
	}
	function img_watermark()
	{
		$config['source_image']	= $this->img_path;
		$config['wm_text'] = 'Copyright 2006 - John Doe';
		$config['wm_type'] = 'text';
		$config['wm_font_path'] = './system/fonts/texb.ttf';
		$config['wm_font_size']	= '16';
		$config['wm_font_color'] = 'ffffff';
		$config['wm_vrt_alignment'] = 'bottom';
		$config['wm_hor_alignment'] = 'center';
		$config['wm_padding'] = '20';

		$this->load->library('image_lib', $config);

		$this->image_lib->watermark();
	
	}
	function img_crop()
	{
	/*
		$config['image_library'] = 'gd2';
		//$config['library_path'] = '/usr/X11R6/bin/';
		$config['source_image']	= $this->img_path;
		$config['x_axis'] = '100';
		$config['y_axis'] = '60';

		// 
				$this->load->library('image_lib');
				$this->image_lib->initialize($config);

$this->image_lib->crop();

		if ( ! $this->image_lib->crop())
		{
		echo $this->image_lib->display_errors();
		}
	*/
	
	
	
	$image_config['image_library'] = 'gd2';
$image_config['source_image'] = $this->img_path;
$image_config['new_image'] = './uploads/new.jpg';
$image_config['quality'] = "100%";
$image_config['maintain_ratio'] = FALSE;
$image_config['width'] = 231;
$image_config['height'] = 154;
$image_config['x_a./uploads/xis'] = '0';
$image_config['y_axis'] = '0';
 $this->load->library('image_lib');
$this->image_lib->clear();
$this->image_lib->initialize($image_config); 
 
if (!$this->image_lib->crop()){
        redirect("errorhandler"); //If error, redirect to an error page
}else{
    redirect("successpage");
}
	}
}
?>	
	
	
	
	
	
	
	
	
	
	