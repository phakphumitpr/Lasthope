<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keeper extends CI_Controller {
	function __construct()
    {
		parent::__construct();
        if( $this->session->userdata('level_id') != '2')
        {
			redirect('Login','refresh');
        }
		
		
		$this->load->model('Keeper_model');
        $this->load->model('Admin_model');
		//$this->load->model('jom_model');
	}
	

	

	public function Keeperdash()
	{
		$this->load->view('Keeper/Keeperdash_view');
	}

	public function Keepereditprofile()
	{
		$member_id = $_SESSION['member_id'];

		$data['edit']=$this->Admin_model->read($member_id);

		$this->load->view('Keeper/Keepereditprofile_view',$data);
	}

	public function Keepereditprofile1() 
    {
            $this->Keeper_model->Keepereditprofile();
            redirect('Keeper/Keepereditprofile','refresh');
	}

	public function Keepermgmonk()
	{
		$data['list_monk']=$this->Keeper_model->list_monk();
		$this->load->view('Keeper/Keepermgmonk_view',$data);
	}

	public function Keeperaddmonk()
	{
		$this->load->view('Keeper/Keeperaddmonk_view');
	}

	// public function CheckKeeperaddmonk()
	// {
	// 	$this->Keeper_model->CheckKeeperaddmonk1();
    //     $this->Keeper_model->upload();
    //     redirect('Keeper/Keepermgmonk','refresh');
	// }

	public function Keepereditmonk($monk_id)
	{
			$this->db->where('monk_id',$monk_id);
            $query = $this->db->get('monk');
            $fab = $query->row_array();
               
            if($fab['level_id'] != '5'){
    
                $this->load->view('Keeper/Keeperdash_view'); 
               
            }else{
            $data['edit']=$this->Admin_model->readm($monk_id); //โชว์ข้อมูลสมาชิก
           
            $this->load->view('Keeper/Keepereditmonk_view',$data);
    
            }
	}

	public function Keepereditmonk1() 
    {
            $this->Keeper_model->Keepereditmonk();
            redirect('Keeper/Keepermgmonk','refresh');
	}
	
	public function deletemonk($monk_id)
    {
             $this->Keeper_model->deletemonk($monk_id);
			 redirect('Keeper/Keepermgmonk','refresh');
	}
	
	public function Keepercheckmonk()
	{
		$data['list_monkcheck']=$this->Keeper_model->list_monkcheck();
		$data['list_jubjub']=$this->Keeper_model->list_jubjub();
		$this->load->view('Keeper/Keepercheckmonk_view',$data);
		
	}

	public function Keepermgbooking()
	{
		$data['list_bookingkeeper']=$this->Keeper_model->list_bookingkeeper();
		$this->load->view('Keeper/Keepermgbooking_view',$data);
	}

	public function Keeperjkbooking($booking_id)
	{
		$data['show']=$this->Keeper_model->readbk($booking_id);
		$data['statusjong']=$this->Keeper_model->list_statusbooking();
		$this->load->view('Keeper/Keeperjkbooking_view',$data);
	}

	public function adding($value='')
	{
		
            $config['upload_path'] = './upload/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']     = '40000';
			$config['max_width'] = '40000';
			$config['max_height'] = '35000';
			$this->upload->initialize($config);
                $this->load->library('upload', $config);
				
                if ( ! $this->upload->do_upload('image'))
                {
                        // $error = array('error' => $this->upload->display_errors());
                        echo $this->upload->display_errors();
                        // $this->load->view('upload_form', $error);
                }
                else
                {
                        
                        $data = $this->upload->data();

                        //print_r($data);
                        //$this->load->view('upload_success', $data);

                        $filename = $data['file_name'];
                        //$imgtype_name = $data['imgtype_name'];
						$monk_username = $this->input->post('monk_username');
						//num rows exp
						$this->db->select('monk_username');
						$this->db->where('monk_username',$monk_username);
						$query = $this->db->get('monk');
						$num = $query->num_rows(); //เช็คว่ามีข้อมูลนี้อยู่ในตารางไหม
						if($num > 0) // ถ้ามีมากกว่า 0 ขึ้นไป คือมีข้อมูลซ้ำ
						{
						echo "<script>"; // ถ้าซ้ำจะโชว์ตรงนี้
						echo "alert('ชื่อผู้ใช้งานซ้ำ กรุณาเพิ่มใหม่อีกครั้ง');";
						echo "window.history.back();";
						echo "</script>";
				
						}else{ // ถ้าไม่ซ้ำให้เพิ่มข้อมูลเข้าไปปกติ
                        $arr=array(
							
                            'monk_username' => $this->input->post('monk_username'),
                            'monk_password' => $this->input->post('monk_password'),
                            'monk_name' => $this->input->post('monk_name'),
							"image"=>$filename,
							'level_id' => 5
							);
							
                        $this->db->insert('monk',$arr);

                        $this->session->set_flashdata(
					array(
						'msginfo'=>'<div class="pad margin no-print"><div style="margin-bottom: 0!important;" class="callout callout-info"><h4><i class="fa fa-info"></i> ข้อความจากระบบ</h4>ทำรายการสำเร็จ</div></div>'
					)
				);

                        redirect('Keeper/Keepermgmonk', 'refresh');

				}	
	
			}
		}
	

		public function Keeperaddtype()
		{
			$data['list_category']=$this->Keeper_model->list_category();
			$this->load->view('Keeper/Keeperaddtype_view',$data);
		}

		public function Keeperaddtype1() 
    {
            $this->Keeper_model->Keeperaddtype1();
            redirect('Keeper/Keeperaddtype','refresh');
	}


		public function Keeperaddamountmonk()
	{
		$data['list_type']=$this->Keeper_model->list_type();
		$this->load->view('Keeper/Keeperaddamountmonk_view',$data);
	}

	public function Keeperaddamountmonk1() 
    {
            $this->Keeper_model->Keeperaddamountmonk1();
            redirect('Keeper/Keeperaddamountmonk','refresh');
	}









	
}//สุดท้าย