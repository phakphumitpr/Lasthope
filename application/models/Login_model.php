<?php
class Login_model extends CI_Model{
 
   public function Member($member_username,$member_password)
    {
       $this->db->where('member_username',$member_username);
       $this->db->where('member_password',$member_password);
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