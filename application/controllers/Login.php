<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	
        function __construct(){ 
            parent::__construct();
            $this->load->model('Login_model');
    }
	
	public function index()
	{
		//  print_r($_SESSION);
		if($this->session->userdata('member_username')==''){ 
		$this->load->view('Homepage_view');
		}
		else{
			$level_id = $_SESSION['level_id'];
			// echo 'level'.$level_id;
		if      ($level_id === '1'){
				redirect('Admin/Admindash','refresh');
								
		    }elseif ($level_id === '2'){
				redirect('Keeper/Keeperdash','refresh');
			
        }elseif ($level_id === '3'){
				redirect('Wardencentral/Wardencentraldash','refresh');

        }elseif ($level_id === '4'){
        redirect('Wardenarea/Wardenareadash','refresh');

        }elseif ($level_id === '5'){
				redirect('Monk/Monkdash','refresh');

	    	}elseif ($level_id === '6'){
				redirect('Jom/Jomdash','refresh');
			}
		}
  }
  

	public function Checklogin()
    {
     $member_username =  $this->input->post('member_username');
     $member_password = $this->input->post('member_password');
           $result    = $this->Login_model->Member($member_username, $member_password);
           $result1   = $this->Login_model->Monk($member_username, $member_password);
           
           if ($result1->num_rows() > 0){
            $data  = $result1->row_array();
            $id    = $data['monk_id'];
            $member_username  = $data['monk_username'];
            $member_password  = $data['monk_password'];
            $level = $data['level_id'];
            $sess  = array(
                'monk_id'        => $id,
                'monk_username'  => $member_username,
                'monk_password'  => $member_password,
                'level_id'       => $level,
                'logged_in'      => true
            );
            $this->session->set_userdata($sess);
            // echo '<br>';
            // print_r($_SESSION);

            $level_id = $_SESSION['level_id'];

            // echo 'level'.$mb_level;

      if      ($level_id === '1'){
        redirect('Admin/Admindash','refresh');
             
      }elseif ($level_id === '2'){
        redirect('Keeper/Keeperdash','refresh');
   
      }elseif ($level_id === '3'){
        redirect('Wardencentral/Wardencentraldash','refresh');

      }elseif ($level_id === '4'){
        redirect('Wardenarea/Wardenareadash','refresh');
             
       }elseif ($level_id === '5'){
        redirect('Monk/Monkdash','refresh');
       
       }elseif ($level_id === '6'){
        redirect('Jom/Jomdash','refresh');
     }
           }else if($result->num_rows() > 0){
           // print_r($result);
           // exit;
           $data  = $result->row_array();
           $id    = $data['member_id'];
           $member_username  = $data['member_username'];
           $member_password  = $data['member_password'];
           $level = $data['level_id'];
           $sess  = array(
               'member_id'        => $id,
               'member_username'  => $member_username,
               'member_password'  => $member_password,
               'level_id'         => $level,
               'logged_in'        => true
           );
               $this->session->set_userdata($sess);
               // echo '<br>';
               // print_r($_SESSION);

               $level_id = $_SESSION['level_id'];

               // echo 'level'.$mb_level;

               if      ($level_id === '1'){
                redirect('Admin/Admindash','refresh');
                     
              }elseif ($level_id === '2'){
                redirect('Keeper/Keeperdash','refresh');
           
              }elseif ($level_id === '3'){
                redirect('Wardencentral/Wardencentraldash','refresh');
        
              }elseif ($level_id === '4'){
                redirect('Wardenarea/Wardenareadash','refresh');
                     
               }elseif ($level_id === '5'){
                redirect('Monk/Monkdash','refresh');
               
               }elseif ($level_id === '6'){
                redirect('Jom/Jomdash','refresh');
             }
        }else{
          $this->session->unset_userdata(array('member_id','member_username','member_password','level_id',));
           redirect('Login');
     }
  }

  public function Logout()
    {
      $this->session->sess_destroy();
      redirect('Login');
    }
	


} ////////////////////////////////////////////////////////////////////////////////////