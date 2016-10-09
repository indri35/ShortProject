<?php
Class User extends CI_Model
{
  function login($email, $password)
  {
     $this -> db -> select('id, kode_skpd, nik, nama, alamat, no_tlpn, no_hp, email, ktp, password');
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

  function cekHakAkses($email){
      $query= $this->db->query("SELECT hak_akses FROM t_user WHERE email='$email'");
      if ($query->num_rows() > 0)  //Ensure that there is at least one result 
      {
         foreach ($query->result() as $row)  //Iterate through results
         {
            return $row->hak_akses;
         }
      }    
  }
}
?>