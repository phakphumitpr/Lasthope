<?php
class Admin_model extends CI_Model{
 
    public function CheckAdminaddkeeper1() // ตรวจการเพิ่มข้อมูลซ้ำ เช็คจาก username
    
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
                    
                    
                    'level_id'     => '2'

                );
                $query=$this->db->insert('member',$data);
                if($query)
                {
                echo "<script>"; 
                echo "alert('เพิ่มข้อมูลสำเร็จ');";

                echo "</script>";
                }else{
                echo "<script>";
                echo "alert('เพิ่มข้อมูลไม่สำเร็จ');";

                echo "</script>";
                    }

            }
    }


    public function CheckAdminaddwardencentral1() // ตรวจการเพิ่มข้อมูลซ้ำ เช็คจาก username
    
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
                  
                    
                    'level_id'     => '3'

                );
                $query=$this->db->insert('member',$data);
                if($query)
                {
                echo "<script>"; 
                echo "alert('เพิ่มข้อมูลสำเร็จ');";

                echo "</script>";
                }else{
                echo "<script>";
                echo "alert('เพิ่มข้อมูลไม่สำเร็จ');";

                echo "</script>";
                    }

            }
    }

    public function CheckAdminaddwardenarea1() // ตรวจการเพิ่มข้อมูลซ้ำ เช็คจาก username
    
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
                   
                    
                    'level_id'     => '4'

                );
                $query=$this->db->insert('member',$data);
                if($query)
                {
                echo "<script>"; 
                echo "alert('เพิ่มข้อมูลสำเร็จ');";

                echo "</script>";
                }else{
                echo "<script>";
                echo "alert('เพิ่มข้อมูลไม่สำเร็จ');";

                echo "</script>";
                    }

            }
    }
    
        
        public function list_keeper()
        {
            $this->db->select('*');
            $this->db->where('level_id','2');
            $query = $this->db->get('member');
            return $query->result();
        }

        public function list_wardencentral()
        {
            $this->db->select('*');
            $this->db->where('level_id','3');
            $query = $this->db->get('member');
            return $query->result();
        }

        public function list_wardenarea()
        {
            $this->db->select('*');
            $this->db->where('level_id','4');
            $query = $this->db->get('member');
            return $query->result();
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

    public function readm($monk_id) 
    {
    $this->db->select('*');
    $this->db->from('tb_monk');
    $this->db->where('monk_id',$monk_id);
    $query = $this->db->get();
    if($query->num_rows()>0)
    {
        $data = $query->row();
        return $data;
    }
    return FALSE;
}

    public function Admineditkeeper()
    {
        $data = array
        (
            
            'member_password'  => $this->input->post('member_password'),
            
            'member_name'      => $this->input->post('member_name'),
           
            
           
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

    public function deletekeeper($member_id) // ลบสมาชิก
    {
        $query =  $this->db->delete('member',array('member_id'=>$member_id));
        if($query){
            echo "<script>"; 
            echo "alert('ลบข้อมูลสำเร็จ');";
            
            echo "</script>";
        }else{
            echo "<script>";
            echo "alert('ลบข้อมูลไม่สำเร็จ');";
            
            echo "</script>";
        }
    }

    public function Admineditwardencentral()
    {
        $data = array
        (
            
            'member_password'  => $this->input->post('member_password'),
            
            'member_name'      => $this->input->post('member_name'),
          
            
           
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

    public function deletewardencentral($member_id) // ลบสมาชิก
    {
        $query =  $this->db->delete('member',array('member_id'=>$member_id));
        if($query){
            echo "<script>"; 
            echo "alert('ลบข้อมูลสำเร็จ');";
            
            echo "</script>";
        }else{
            echo "<script>";
            echo "alert('ลบข้อมูลไม่สำเร็จ');";
            
            echo "</script>";
        }
    }

    public function Admineditwardenarea()
    {
        $data = array
        (
            
            'member_password'  => $this->input->post('member_password'),
            
            'member_name'      => $this->input->post('member_name'),
            
            
           
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

    public function deletewardenarea($member_id) // ลบสมาชิก
    {
        $query =  $this->db->delete('member',array('member_id'=>$member_id));
        if($query){
            echo "<script>"; 
            echo "alert('ลบข้อมูลสำเร็จ');";
            
            echo "</script>";
        }else{
            echo "<script>";
            echo "alert('ลบข้อมูลไม่สำเร็จ');";
            
            echo "</script>";
        }
    }
 
} //ปีกสุดท้าย