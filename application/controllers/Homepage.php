<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends CI_Controller {
	function __construct()
    {
		
		parent::__construct();
		$this->load->model('Homepage_model');
<<<<<<< HEAD
       
      
    }
	
	public function index()
	{
		$this->load->view('Homepage_view');
	}

	public function CheckRegister()
	{
		$this->Homepage_model->CheckRegister1();
            
=======
        $this->load->model('Keeper_model');
      
    }
	
	public function CheckRegister()
	{
		$this->Homepage_model->CheckRegister1();
        $this->load->view('Homepage_view');
>>>>>>> 3db60a7d5d3d981b19179bfb174bf1edf629b702
        redirect('Homepage','refresh');
	}
}
