<?php
class Jom_model extends CI_Model{
 
    public function Jomeditprofile()
    {
        $data = array
        (
            
        'member_password'  => $this->input->post('member_password'),
        'member_name'      => $this->input->post('member_name')   
           
        );
        $this->db->where('member_id',$this->input->post('member_id'));
        $query = $this->db->update('member',$data);
        if($query){
           echo "<script>"; 
           echo "alert('แก้ไขข้อมูลสำเร็จ');";
           
           echo "</script>";
       }else{
           echo "<script>";
           echo "alert('แก้ไขข้อมูลไม่สำเร็จ');";
           
           echo "</script>";
       }
    }

    public function read($member_id) 
    {
        $this->db->select('*');
        $this->db->from('member');
        $this->db->where('member_id',$member_id);
        $query = $this->db->get();
        if($query->num_rows()>0)
        {
            $data = $query->row();
            return $data;
        }
        return FALSE;
    }


    public function list_bookingjom()
    {
        $member_id = $_SESSION['member_id'];
        //  print_r($_SESSION);
        $this->db->select('*');
        $this->db->where('member_id',$this->session->userdata('member_id'));
        $query = $this->db->get('booking');
        return $query->result();
    }
   
    public function fetchtype()
    {
        $this->db->select('*');
        $this->db->from('type');
        $query = $this->db->get();
        return $query->result();
    }

    public function fetcham($type_id)
    {
        $this->db->select('*');
        $this->db->from('amountmonk');
        $this->db->where('type_id', $type_id);
        $query  = $this->db->get();
        $output = '<option value="">เลือกจำนวน</option>';
        foreach ($query->result() as $row)
        {
            $output .= '<option value="' . $row->amountmonk_id . '">' . $row->amount .'</option>';
        }
        return $output;
    }

    public function Jomaddbooking1() 
    {

    $data = array(

        'bookingdate'     => $this->input->post('bookingdate'),
        'timecomemonk'    => $this->input->post('timecomemonk'),
        'timestart'       => $this->input->post('timestart'),       
        'timeend'         => $this->input->post('timeend'),  
        // 'record_date'     => $this->input->post('record_date'),  
        'location'        => $this->input->post('location'),  
        'member_id'       => $this->input->post('member_id'),  
        'type_id'         => $this->input->post('type_id'),
        'amountmonk_id'   => $this->input->post('amountmonk_id'),
        'statusbooking_id'=> $this->input->post('statusbooking_id')
       
      
                );
                $query=$this->db->insert('booking',$data);
                if($query)
                {
                    echo "<script>"; 
                    echo "alert('เพิ่มข้อมูลสำเร็จ');";
                    
                    echo "</script>";
                }else
                {
                    echo "<script>";
                    echo "alert('เพิ่มข้อมูลไม่สำเร็จ');";
                    
                    echo "</script>";
                }
               
    }


   

} //ปีกสุดท้าย