<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class LoginVerify extends CI_Controller {
 
 function __construct()
 {
   parent::__construct();
   $this->load->model('user','',TRUE);
 }
 
 function index()
 {
   //This method will have the credentials validation
   $this->load->library('form_validation');
 
   $this->form_validation->set_rules('email', 'Email', 'trim|required');
   $this->form_validation->set_rules('password', 'Password', 'trim|required|callback_check_database');
  
   if($this->form_validation->run() == FALSE)
   {
     //Field validation failed.  User redirected to login page
     $this->load->view('user/header');
     $this->load->view('user/login');
     $this->load->view('user/footer');
   }
   else{
    $email = $this->input->post('email');
    $hak_akses= $this->user->cekHakAkses($email);

    if ($hak_akses == 1 ){
     redirect('UserPage/profil', 'refresh');
    }
   elseif ($hak_akses == 2 )
    {
     redirect('humas', 'refresh'); 
    }
   else 
    {
      redirect('skpd', 'refresh');
    }
  }
 }
 
 function check_database($password)
 {
   //Field validation succeeded.  Validate against database
   $email = $this->input->post('email');
 
   //query the database
   $result = $this->user->login($email, $password);
 
   if($result)
   {
     $sess_array = array();
     foreach($result as $row)
     {
      if($row->hak_akses==1){
            $sess_array = array(
             'id' => $row->id,
             'hak_akses' => $row->hak_akses,
             'kode_skpd' => $row->kode_skpd,
             'nik' => $row->nik,
             'email' => $row->email,
             'nama' => $row->nama,
             'alamat' => $row->alamat,
             'no_tlpn' => $row->no_tlpn,
             'no_hp' => $row->no_hp,
             'ktp' => $row->ktp,
             'logged_in' => TRUE
          );
          }
          elseif ($row->hak_akses==2) {
            $sess_array = array(
             'id' => $row->id,
             'hak_akses' => $row->hak_akses,
             'kode_skpd' => $row->kode_skpd,
             'nik' => $row->nik,
             'email' => $row->email,
             'nama' => $row->nama,
             'alamat' => $row->alamat,
             'no_tlpn' => $row->no_tlpn,
             'no_hp' => $row->no_hp,
             'ktp' => $row->ktp,
             'humas' => TRUE
          );
          }
          else{
            $sess_array = array(
             'id' => $row->id,
             'hak_akses' => $row->hak_akses,
             'kode_skpd' => $row->kode_skpd,
             'nik' => $row->nik,
             'email' => $row->email,
             'nama' => $row->nama,
             'alamat' => $row->alamat,
             'no_tlpn' => $row->no_tlpn,
             'no_hp' => $row->no_hp,
             'ktp' => $row->ktp,
             'skpd' => TRUE
          );
          }
       
       
       $this->session->set_userdata($sess_array);

     }
     return TRUE;
   }
   else
   {
     $this->form_validation->set_message('check_database', 'Invalid email or password');
     return false;
   }
 }
}
?>