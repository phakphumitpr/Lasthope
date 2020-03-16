<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends CI_Controller {
	function __construct()
    {
		
		parent::__construct();
		$this->load->model('Homepage_model');
        $this->load->model('Keeper_model');
      
    }
	
	public function CheckRegister()
	{
		$this->Homepage_model->CheckRegister1();
        $this->load->view('Homepage_view');
        redirect('Homepage','refresh');
	}
}
