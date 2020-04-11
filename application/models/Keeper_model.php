<?php
class Keeper_model extends CI_Model{
 
public function __construct(){
    parent::__construct();
}
   
    public function Keepereditprofile()
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

   

    public function list_monk()
        {
            $this->db->select('*');
            $this->db->where('level_id','5');
            $query = $this->db->get('monk');
            return $query->result();
        }
 
        // public function CheckKeeperaddmonk1() // ตรวจการเพิ่มข้อมูลซ้ำ เช็คจาก username
    
        // {
            
            // $monk_username = $this->input->post('monk_username');
            // //num rows exp
            // $this->db->select('monk_username');
            // $this->db->where('monk_username',$monk_username);
            // $query = $this->db->get('monk');
            // $num = $query->num_rows(); //เช็คว่ามีข้อมูลนี้อยู่ในตารางไหม
            // if($num > 0) // ถ้ามีมากกว่า 0 ขึ้นไป คือมีข้อมูลซ้ำ
            // {
            // echo "<script>"; // ถ้าซ้ำจะโชว์ตรงนี้
            // echo "alert('ชื่อผู้ใช้งานซ้ำ กรุณาเพิ่มใหม่อีกครั้ง');";
            // echo "window.history.back();";
            // echo "</script>";
    
            // }else{ // ถ้าไม่ซ้ำให้เพิ่มข้อมูลเข้าไปปกติ
    
        //     //         $data = array
        //     //         (
                //         'monk_username'  => $this->input->post('monk_username'),
                //         'monk_password'  => $this->input->post('monk_password'),
                        
                //         'monk_name'      => $this->input->post('monk_name'),
                        
                        
                        
                //         'level_id'     => '5'
    
                //     );
                //     $query=$this->db->insert('monk',$data);
                //     if($query)
                //     {
                //     echo "<script>"; 
                //     echo "alert('เพิ่มข้อมูลสำเร็จ');";
    
                //     echo "</script>";
                //     }else{
                //     echo "<script>";
                //     echo "alert('เพิ่มข้อมูลไม่สำเร็จ');";
    
                //     echo "</script>";
                //         }
    
                // }
        // }

        public function Keepereditmonk()
    {
        $data = array
        (
            
            'monk_password'  => $this->input->post('monk_password'),
            'monk_name'      => $this->input->post('monk_name'),
            
            
           
        );
        $this->db->where('monk_id',$this->input->post('monk_id'));
        $query = $this->db->update('monk',$data);
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

    public function deletemonk($monk_id) // ลบพระ
    {
        $query =  $this->db->delete('checkmonk',array('monk_id'=>$monk_id));
        $query =  $this->db->delete('monk',array('monk_id'=>$monk_id));
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

    public function list_monkcheck()
    {
        $this->db->select('*');
        $this->db->where('checkmonk_id',1);
        $query = $this->db->get('checkmonk');
        return $query->result();
    }

    public function list_jubjub()
    {
        $query = $this->db->query("SELECT `checkmonk_date`, COUNT(*) as total FROM checkmonk WHERE `mc_status`='1'GROUP BY `mc_date`");
            return $query->result();
    }


    public function list_bookingkeeper()
    {
        $query = $this->db->get('booking');
        return $query->result();
    }
    

    public function list_statusbooking()
    {
        $query = $this->db->get('statusbooking');
        return $query->result();
    }

    

   
    public function list_category()
    {
        $query = $this->db->get('category');
        return $query->result();
    }



    public function list_type()
    {
        $query = $this->db->get('type');
        return $query->result();
    }

    public function Keeperaddtype1() // ตรวจการเพิ่มข้อมูลซ้ำ เช็คจาก username
    
    {
        $type_name = $this->input->post('type_name');
        //num rows exp
        $this->db->select('type_name');
        $this->db->where('type_name',$type_name);
        $query = $this->db->get('type');
        $num = $query->num_rows(); //เช็คว่ามีข้อมูลนี้อยู่ในตารางไหม
        if($num > 0) // ถ้ามีมากกว่า 0 ขึ้นไป คือมีข้อมูลซ้ำ
        {
        echo "<script>"; // ถ้าซ้ำจะโชว์ตรงนี้
        echo "alert('ชื่อชนิดงานซ้ำ กรุณาเพิ่มใหม่อีกครั้ง');";
        echo "window.history.back();";
        echo "</script>";

        }else{ // ถ้าไม่ซ้ำให้เพิ่มข้อมูลเข้าไปปกติ

                $data = array
                (
                    'type_name'  => $this->input->post('type_name'),
                    'category_id'  => $this->input->post('category_id'),
                    
                   

                );
                $query=$this->db->insert('type',$data);
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


    public function Keeperaddamountmonk1() // ตรวจการเพิ่มข้อมูลซ้ำ เช็คจาก username
    
    {
        $amount = $this->input->post('amount');
        //num rows exp
        $this->db->select('amount');
        $this->db->where('amount',$amount);
        $query = $this->db->get('amountmonk');
        $num = $query->num_rows(); //เช็คว่ามีข้อมูลนี้อยู่ในตารางไหม
        if($num > 0) // ถ้ามีมากกว่า 0 ขึ้นไป คือมีข้อมูลซ้ำ
        {
        echo "<script>"; // ถ้าซ้ำจะโชว์ตรงนี้
        echo "alert('จำนวนซ้ำ กรุณาเพิ่มใหม่อีกครั้ง');";
        echo "window.history.back();";
        echo "</script>";

        }else{ // ถ้าไม่ซ้ำให้เพิ่มข้อมูลเข้าไปปกติ

                $data = array
                (
                    'amount'  => $this->input->post('amount'),
                    'type_id'  => $this->input->post('type_id'),
                    
                   

                );
                $query=$this->db->insert('amountmonk',$data);
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










} //ปีกสุดท้าย