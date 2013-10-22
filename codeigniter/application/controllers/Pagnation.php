<?php

	class Pagnation extends CI_Controller
	{
	  public function __construct() 
	  {
        parent:: __construct();
        $this->load->helper("url");
        $this->load->model("Pagedb");
        $this->load->library("pagination");
	  }
 
    public function example1() 
	{
        $config = array();
        $config["base_url"] = base_url() . "pagnation/example1";
        $config["total_rows"] = $this->Pagedb->record_count();
        $config["per_page"] = 5;
        $config["uri_segment"] = 3;
 
        $this->pagination->initialize($config);
 
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
       // $data["results"] = $this->Pagedb->fetch_countries($config["per_page"], $page);
		        $data["results"] = $this->Pagedb->fetch_countries($config["per_page"], $page);

			
        $data["links"] = $this->pagination->create_links();
 
        $this->load->view("pageview", $data);
    }
	}
?>