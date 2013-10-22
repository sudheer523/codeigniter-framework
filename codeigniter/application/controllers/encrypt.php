<?php
Class User extends CI_Controller
{
  function __construct()
  {

   parent::__construct();
   $this->view_data['base_url']=base_url();
   $this->load->model('Dbinsert');


  }
 function index()
 {
  $this->register();

 }
 function register()
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

		$username=$this->input->post('username');
		
		
		$this->load->library('encrypt');
$key='sirish';
		$eusername=$this->encrypt->encode($username);
		echo $eusername;
				$username=$this->encrypt->decode($eusername);
       echo "<br>".$username;
		exit;
		
		
		$name=$this->input->post('name');
		$email=$this->input->post('email');
		$password=$this->input->post('password');

		$this->Dbinsert->Insert($username,$name,$email,$password);
				//$this->Dbinsert->Select();

				//$config['base_url'] = '/index.php/test/page/';
				$this->load->library('pagination');
				$config['total_rows'] = 10;
				$config['per_page'] = 3;

				$this->pagination->initialize($config);

echo $this->pagination->create_links();


    }
 }



}
?>