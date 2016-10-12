<?php
Class User extends CI_Model
{
  function login($email, $password)
  {
     $this -> db -> select('id, hak_akses, kode_skpd, nik, nama, alamat, no_tlpn, no_hp, email, ktp, password');
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

  function isEmailExist($email) {
    $this->db->select('id');
    $this->db->where('email', $email);
    $query = $this->db->get('t_user');

    if ($query->num_rows() > 0) {
        return true;
      } else {
          return false;
      }
  }

  function isNIKExist($nik) {
    $this->db->select('id');
    $this->db->where('nik', $nik);
    $query = $this->db->get('t_user');

    if ($query->num_rows() > 0) {
        return true;
      } else {
          return false;
      }
  }

  public function temp_reset_password($temp_pass){
    $data =array(
                'email' =>$this->input->post('email'),
                'reset_pass'=>$temp_pass);
                $email = $data['email'];

    if($data){
        $this->db->where('email', $email);
        $this->db->update('t_user', $data);  
        return TRUE;
    }else{
        return FALSE;
    }
  }

  public function is_temp_pass_valid($temp_pass){
      $this->db->where('reset_pass', $temp_pass);
      $query = $this->db->get('t_user');
      if($query->num_rows() == 1){
          return TRUE;
      }
      else return FALSE;
  }

  public function email_exists(){
    $email = $this->input->post('email');
    $query = $this->db->query("SELECT email, password FROM t_user WHERE email='$email'");    
    if($row = $query->row()){
        return TRUE;
    }else{
        return FALSE;
    }
 }

  function getUserPass($temp_pass)
  {
    //select produk berdasarkan id yang dimiliki
    $this->db->where('reset_pass', $temp_pass); //Akan melakukan select terhadap row yang memiliki productId sesuai dengan productId yang telah dipilih
        $this->db->select("*");
        $this->db->from("t_user");
        
        return $this->db->get();
  }

  function editNewPass($daba,$data,$reset_pass)
  { 
      $this->db->where($reset_pass);
      $this->db->update($daba, $data);
  }
}
?>