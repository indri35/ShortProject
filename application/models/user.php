<?php
Class User extends CI_Model
{
  function login($email, $password)
  {
     $this -> db -> select('nik, nama, alamat, no_tlpn, no_hp, email, ktp, password');
     $this -> db -> from('t_user');
     $this -> db -> where('email', $email);
     $this -> db -> where('password', MD5($password));
     $this -> db -> limit(1);
   
     $query = $this -> db -> get();
   
     if($query -> num_rows() == 1)
     {
       return $query->result();
     }
     else
     {
       return false;
     }
  }
}
?>