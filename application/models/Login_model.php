<?php
class Login_model extends CI_Model{
 
   public function Member($mem_username,$mem_password)
    {
       $this->db->where('mem_username',$mem_username);
       $this->db->where('mem_password',$mem_password);
       $result = $this->db->get('member');
       return $result;

      
    
    }

   public function Monk($monk_username,$monk_password)
    {
       $this->db->where('monk_username',$monk_username);
       $this->db->where('monk_password',$monk_password);
       $result = $this->db->get('monk');
       return $result;

      
    
    }


} //ปีกสุดท้าย