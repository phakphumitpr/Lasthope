<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jom extends CI_Controller {
	function __construct()
    {
		parent::__construct();
        if( $this->session->userdata('level_id') != '6')
        {
			redirect('Login','refresh');
        }
		
		//  $this->load->model('Admin_model');
         $this->load->model('Jom_model');
      
    }
	
	public function Jomdash()
	{
		$this->load->view('Jom/Jomdash_view');
	}

	public function Jomeditprofile()
	{
		$member_id = $_SESSION['member_id'];

		$data['edit']=$this->Jom_model->read($member_id);

		$this->load->view('Jom/Jomeditprofile_view',$data);
	}

	public function Jomeditprofile1() 
    {
            $this->Jom_model->Jomeditprofile();
            redirect('Jom/Jomeditprofile','refresh');
	}


	public function Jomshowbooking()
	{
		$data['list_bookingjom']=$this->Jom_model->list_bookingjom();
		$this->load->view('Jom/Jomshowbooking_view',$data);
	}

	public function Jomaddbooking()
	{
		
		$data['query']=$this->Jom_model->fetchtype();
		$this->load->view('Jom/Jomaddbooking_view',$data);
	}

	public function Jomaddbooking1()
	{
		$member_id = $_SESSION['member_id'];

		$this->Jom_model->Jomaddbooking1();	
        redirect('Jom/Jomshowbooking','refresh');
	}
	
	public function fetcham()
	{
		if ($this->input->post('type_id'))
		{
			echo $this->Jom_model->fetcham($this->input->post('type_id'));
		}
	}
	
	
}
