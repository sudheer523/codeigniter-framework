
<?php

Class Zipencode extends CI_Controller
{
	function __Construct()
	{
		parent::__Construct();
	}
	function index()
	{
		$this->zipencoding();
	}
	
	function zipencoding()
	{
	$this->load->library('zip');
//echo '********************************888';
		
		/*
		$name = 'suheerr2/my_bio2.txt';
		//$name = 'C:/Users/Nunc-111/Desktop/my_bio1.pdf';
		$data = 'I was born in anddddddddddddddddddd ..';
		$this->zip->add_data($name,$data);
		$zip_file = $this->zip->get_zip();
		
		
		$this->zip->archive('E:/ENTRMNT/new.zip'); 
		
		$this->zip->clear_data();*/
		//echo anchor($this->zip->download('myphotos.zip'), 'Download');
		$name = 'C:/Users/Public/Pictures/Sample Pictures/Tulips.jpg';
				//$this->zip->read_file($name); // Read the file's contents
 $file_path = './uploads/';

		$name=array(1=>'C:/Users/Public/Pictures/Sample Pictures/Tulips.jpg',2=>'C:/Users/Public/Pictures/Sample Pictures/Desert.jpg',3=>'C:/Users/Public/Pictures/Sample Pictures/Penguins.jpg');
		  foreach($name as $key=>$file)
		  {
		 		  $this->zip->read_file($file);
		  }
	$this->zip->archive('E:/ENTRMNT/new1.zip'); 
		//$this->zip->download('myphotos.zip');
	
	
	}

}
?>