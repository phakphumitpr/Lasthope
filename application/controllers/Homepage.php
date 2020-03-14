<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends CI_Controller {
	function __construct()
    {
		
		parent::__construct();
		$this->load->model('Homepage_model');
       
      
    }
	
	public function index()
	{
		$this->load->view('Homepage_view');
	}

	public function CheckRegister()
	{
		$this->Homepage_model->CheckRegister1();
            
        redirect('Homepage','refresh');
	}
}
