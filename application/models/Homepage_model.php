<?php
class Homepage_model extends CI_Model{
 
    public function CheckRegister1() // ตรวจการเพิ่มข้อมูลซ้ำ เช็คจาก username
    
    {
        $member_username = $this->input->post('member_username');
        //num rows exp
        $this->db->select('member_username');
        $this->db->where('member_username',$member_username);
        $query = $this->db->get('member');
        $num = $query->num_rows(); //เช็คว่ามีข้อมูลนี้อยู่ในตารางไหม
        if($num > 0) // ถ้ามีมากกว่า 0 ขึ้นไป คือมีข้อมูลซ้ำ
        {
        echo "<script>"; // ถ้าซ้ำจะโชว์ตรงนี้
        echo "alert('ชื่อผู้ใช้งานซ้ำ กรุณาเพิ่มใหม่อีกครั้ง');";
        echo "window.history.back();";
        echo "</script>";

        }else{ // ถ้าไม่ซ้ำให้เพิ่มข้อมูลเข้าไปปกติ

                $data = array
                (
                    'member_username'  => $this->input->post('member_username'),
                    'member_password'  => $this->input->post('member_password'),
                    
                    'member_name'      => $this->input->post('member_name'),
                   
                    
                    'level_id'     => '6'

                );
                $query=$this->db->insert('member',$data);
                if($query)
                {
                echo "<script>"; 
                echo "alert('สมัครสมาชิกสำเร็จ');";

                echo "</script>";
                }else{
                echo "<script>";
                echo "alert('สมัครสมาชิกไม่สำเร็จ');";

                echo "</script>";
                    }

            }
    }

 
} //ปีกสุดท้าย