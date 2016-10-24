<?php
class UserPage extends CI_Controller {
        function __construct(){
                parent::__construct();
                $this->load->model("model_user");
                $this->load->model("model_dokumen");
                $this->load->model("model_request");
                $this->load->model(array('model_skpd'));
                $this->load->model(array('model_humas')); //constructor yang dipanggil ketika memanggil products.php untuk melakukan pemanggilan pada model : products_model.php yang ada di folder models
                $this->load->helper(array('form', 'url'));
        }
        

        public function index(){
                if($this->session->userdata('logged_in')){
                        $email = $this->session->userdata('email');
                        $this->load->view('user/header_login');
                        $this->load->view('user/home');
                        $this->load->view('user/footer');
                }
                if($this->session->userdata('skpd')){   
                $skpd= $this->session->userdata('kode_skpd');
                // menyimpan data permohonan dokumen untuk dipassing ke vie
                $a = $this->model_skpd->getAllPendingReq($skpd);
                $b = $this->model_skpd->getAllSentReq($skpd);
                $c = $this->model_skpd->getAllReq($skpd);
                $d = $this->model_skpd->getAllDoc($skpd);
                $e = $this->model_skpd->getAllCom($skpd);
                $data= array( 'request'=> $a, 'sent' => $b,'all'=> $c,'dokumen'=> $d,'complain'=> $e);
                
                $this->load->view('skpd/header');
                $this->load->view('skpd/index',$data);
                $this->load->view('skpd/footer');
                }
                if($this->session->userdata('humas'))
                {  
                    // menyimpan data permohonan dokumen untuk dipassing ke view
                    $a = $this->model_humas->getAllSentReq();
                    $b = $this->model_humas->getAllPendingReq();
                    $c = $this->model_humas->getAllDoc();
                    $d = $this->model_humas->getAllUser();

                    $data= array( 'sent'=> $a, 'pending' => $b,'dokumen'=> $c, 'user' => $d);

                    $this->load->view('humas/header');
                    $this->load->view('humas/index',$data);
                    $this->load->view('humas/footer');
                }
                else{
                //If no session, redirect to login page
                $this->load->view('user/header');
                $this->load->view('user/home');
                $this->load->view('user/footer');
                }
        }

        public function form_perorangan(){
                if($this->session->userdata('logged_in')){
                        $this->load->model('model_dokumen');
                        $data = array (
                                'dokumen' => $this->model_dokumen->getAll(),
                        );
                        $this->load->view('user/header_login');
                        $this->load->view('user/form_perorangan', $data);
                        $this->load->view('user/footer');
                }
                else{
                //If no session, redirect to login page
                redirect('UserPage/login', 'refresh');
                }
        }

        public function form_berbadan_hukum(){
                if($this->session->userdata('logged_in')){
                        $this->load->model('model_dokumen');
                        $data = array (
                                'dokumen' => $this->model_dokumen->getAll(),
                        );
                        $this->load->view('user/header_login');
                        $this->load->view('user/form_berbadan_hukum', $data);
                        $this->load->view('user/footer');
                }
                else{
                //If no session, redirect to login page
                redirect('UserPage/login', 'refresh');
                }
        }

        public function form_tidak_berbadan_hukum(){
                if($this->session->userdata('logged_in')){
                        $this->load->model('model_dokumen');
                        $data = array (
                                'dokumen' => $this->model_dokumen->getAll(),
                        );
                        $this->load->view('user/header_login');
                        $this->load->view('user/form_tidak_berbadan_hukum', $data);
                        $this->load->view('user/footer');
                }
                else{
                //If no session, redirect to login page
                redirect('UserPage/login', 'refresh');
                }
        }

        public function dokumen()
        {
                if($this->session->userdata('logged_in')){
                    $this->load->model('model_dokumen');
                    $data = array (
                            'dokumen' => $this->model_dokumen->getAll(),
                    );
                    $this->load->view('user/header_login'); 
                    $this->load->view('user/dokumen', $data);
                    $this->load->view('user/footer');
                }
                else{
                    //If no session, redirect to login page
                    $this->load->model('model_dokumen');
                    $data = array (
                            'dokumen' => $this->model_dokumen->getAll(),
                    );
                    $this->load->view('user/header'); 
                    $this->load->view('user/dokumen', $data);
                    $this->load->view('user/footer');
                }
        }

        public function login(){
            if($this->session->userdata('logged_in'))
            {   
                $this->load->view('user/header_login');
                $this->load->view('user/home');
                $this->load->view('user/footer');
            }
            else
            {
                //If no session, redirect to login page
                $this->load->helper(array('form'));
                $this->load->view('user/header');
                $this->load->view('user/login');
                $this->load->view('user/footer');
            }
        }

        function logout(){
                $this->session->unset_userdata('logged_in');
                session_destroy();
                redirect('UserPage/', 'refresh');
        }

        public function register(){
            if($this->session->userdata('logged_in'))
            {   
                $this->load->view('user/header_login');
                $this->load->view('user/home');
                $this->load->view('user/footer');
            }
            else
            {
                //If no session, redirect to login page
                $this->load->view('user/header');
                $this->load->view('user/register');
                $this->load->view('user/footer');
            }
        }

        public function profil(){
            if($this->session->userdata('logged_in'))
            {   
                $this->load->view('user/header_login');
                $this->load->view('user/profil');
                $this->load->view('user/footer');
            }
            else
            {
                //If no session, redirect to login page
                redirect('UserPage/login', 'refresh');
            }
        }

        public function edit_profil()
        {
        if($this->session->userdata('logged_in'))
            {
                $this->load->view('user/header_login');
                $this->load->view('user/edit_profil');
                $this->load->view('user/footer');
            }
        else
           {
             //If no session, redirect to login page
             redirect('UserPage/login', 'refresh');
           }
         }

        public function about(){
                if($this->session->userdata('logged_in')){
                        $email = $this->session->userdata('email');
                        $this->load->view('user/header_login');
                        $this->load->view('user/about');
                        $this->load->view('user/footer');
                }
                else{
                    //If no session, redirect to login page
                    $this->load->view('user/header');
                    $this->load->view('user/about');
                    $this->load->view('user/footer');
                }    
        }

        public function kontak(){
            if($this->session->userdata('logged_in')){
                        $email = $this->session->userdata('email');
                        $this->load->view('user/header_login');
                        $this->load->view('user/kontak');
                        $this->load->view('user/footer');
                }
                else{
                    //If no session, redirect to login page
                    $this->load->view('user/header');
                    $this->load->view('user/kontak');
                    $this->load->view('user/footer');
                }
        }

        
        public function do_upload(){
                $config['upload_path'] = 'assets/ktp/';
                $config['allowed_types'] = 'jpg|png';
                $config['overwrite'] = TRUE;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload()){
                    $error = array('error' => $this->upload->display_errors());
                    echo "<script>window.alert('Format file ktp tidak sesuai')
           window.location.href='javascript:history.back()';</script>";

                }
                else{
                    $upload_data = $this->upload->data();
                    $gambar_value = $upload_data['file_name'];
                
                        
                    // selesai upload foto, berikut adalah input database
                    $this->load->library('form_validation');
                    $this->form_validation->set_rules(
                        'email', 'email', 'trim|required|valid_email|callback_isEmailExist'
                    );
                    $this->form_validation->set_rules(
                        'nik', 'nik', 'trim|required|callback_isNIKExist'
                    );

                
                if ($this->form_validation->run() == FALSE)
                {
                    // fails
                    $this->load->view('user/header');
                    $this->load->view('user/register');
                    $this->load->view('user/footer');
                }
                else
                {

                $data = array(
                                'hak_akses' => $this->input->post('hak_akses'),
                                'nik' => $this->input->post('nik'),
                                'nama' => $this->input->post('nama'),
                                'alamat' => $this->input->post('alamat'),
                                'no_tlpn' => $this->input->post('no_tlpn'),
                                'no_hp' => $this->input->post('no_hp'),
                                'email' => $this->input->post('email'),
                                'password' => md5($this->input->post('password')),
                                'ktp' => $gambar_value
                                );
                $this->model_user->addUser('t_user',$data); //passing variable $data ke products_model
                echo "<script>window.alert('Registrasi berhasil, silahkan lakukan login.')
           window.location.href='login/';</script>";//redirect page ke halaman utama controller products 
                }
            }  
        }

        public function isEmailExist($email) {
                $this->load->library('form_validation');
                $this->load->model('user');
                $is_exist = $this->user->isEmailExist($email);

                if ($is_exist) {
                    $this->form_validation->set_message(
                        'isEmailExist', '<font size="3" color=red>Email already registered.</font>'
                    );    
                    return false;
                } else {
                    return true;
                }
            }

        public function isNIKExist($nik) {
                $this->load->library('form_validation');
                $this->load->model('user');
                $is_exist = $this->user->isNIKExist($nik);

                if ($is_exist) {
                    $this->form_validation->set_message(
                        'isNIKExist', '<font size="3" color=red>NIK already registered.</font>'
                    );    
                    return false;
                } else {
                    return true;
                }
            }

        public function edit_profil_data(){
                $config['upload_path'] = 'assets/ktp/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['overwrite'] = TRUE;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload()){
                    $error = array('error' => $this->upload->display_errors());
                    echo "<script>window.alert('Format file ktp tidak sesuai')
           window.location.href='javascript:history.back()';</script>";
                }
                else{
                    $upload_data = $this->upload->data();
                    $gambar_value = $upload_data['file_name'];
                
                        
                // selesai upload foto, berikut adalah input database
                        
                $data = array(
                                'nik' => $this->input->post('dnik'),
                                'nama' => $this->input->post('dnama'),
                                'alamat' => $this->input->post('dalamat'),
                                'no_tlpn' => $this->input->post('dno_tlpn'),
                                'no_hp' => $this->input->post('dno_hp'),
                                'email' => $this->input->post('demail'),
                                'ktp' => $gambar_value
                                );
                $condition['id'] = $this->input->post('id');
                $this->model_user->editProfil('t_user',$data, $condition); //passing variable $data ke products_model
                
                $this->session->unset_userdata('logged_in');
                session_destroy();
                echo "<script>window.alert('Edit profil berhasil, silahkan lakukan login ulang.')
           window.location.href='login/';</script>"; //redirect page ke halaman utama controller products   
            }
        }

        public function input_form_perorangan(){
                
                $data = array(
                                'nik_pemohon' => $this->input->post('nik_pemohon'),
                                'request_at' => $this->input->post('request_at'),
                                'file_pendukung' => $this->input->post('file_pendukung'),
                                'jenis_request' => $this->input->post('jenis_request'),
                                'tujuan_permohonan_info' => $this->input->post('tujuan_permohonan_info')
                                );
                $this->model_request->addRequest('t_request',$data); //passing variable $data ke products_model
                $max = $this->db->query('select MAX(ID) as maax from t_request')->result();
                foreach($max as $row){
                    $max = $row->maax;
                }
                $file_list = $this->input->post('dokumen[]');
                foreach($file_list as $file) {
                $data = array(
                                'kode_berkas' => $file,
                                'id_req' => $max
                                );
                $this->model_request->addRequest('t_doc_req',$data); //passing variable $data ke products_model
            }
                echo "<script>window.alert('Permohonan berhasil')
           window.location.href='my_request/';</script>"; //redirect page ke halaman utama controller products   
        }

        public function input_form_berbadan_hukum(){
                $config['upload_path'] = 'assets/file_pendukung/';
                $config['allowed_types'] = 'pdf|jpg|png';
                $config['overwrite'] = TRUE;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload()){
                    $error = array('error' => $this->upload->display_errors());
                    echo "<script>window.alert('Format file ktp tidak sesuai')
           window.location.href='javascript:history.back()';</script>";
                }
                else{
                    $upload_data = $this->upload->data();
                    $gambar_value = $upload_data['file_name'];
                
                        
                // selesai upload foto, berikut adalah input database
                $data = array(
                                'nik_pemohon' => $this->input->post('nik_pemohon'),
                                'request_at' => $this->input->post('request_at'),
                                'file_pendukung' => $gambar_value,
                                'jenis_request' => $this->input->post('jenis_request'),
                                'tujuan_permohonan_info' => $this->input->post('tujuan_permohonan_info')
                                );
                $this->model_request->addRequest('t_request',$data); //passing variable $data ke products_model
                $max = $this->db->query('select MAX(ID) as maax from t_request')->result();
                foreach($max as $row){
                    $max = $row->maax;
                }
                $file_list = $this->input->post('dokumen[]');
                foreach($file_list as $file) {
                $data = array(
                                'kode_berkas' => $file,
                                'id_req' => $max
                                );
                $this->model_request->addRequest('t_doc_req',$data); //passing variable $data ke products_model
                echo "<script>window.alert('Permohonan berhasil')
           window.location.href='my_request/';</script>";
                }
            }
        }

        public function input_form_keberatan(){
                $config['upload_path'] = 'assets/file_pendukung/';
                $config['allowed_types'] = 'doc|docx';
                $config['overwrite'] = TRUE;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload()){
                    $error = array('error' => $this->upload->display_errors());
                    echo "<script>window.alert('Format file ktp tidak sesuai')
           window.location.href='javascript:history.back()';</script>";
                }
                else{
                    $upload_data = $this->upload->data();
                    $gambar_value = $upload_data['file_name'];
                
                        
                // selesai upload foto, berikut adalah input database
                $data = array(
                                'form_keberatan' => $gambar_value,
                                'date_upload_keberatan' => $this->input->post('date_upload_keberatan')
                                );
                $condition['no_req'] = $this->input->post('no_req');
                $this->model_request->RequestKeberatan('t_doc_req',$data, $condition); //passing variable $data ke products_model
            
                echo "<script>window.alert('Input form keberatan berhasil')
           window.location.href='my_request/';</script>";
                }   
        }

        public function upload_form_keberatan($no_req){
                if($this->session->userdata('logged_in')){
                        $this->load->model('model_request');
                        $data = array (
                                'request' => $this->model_request->request_detail($no_req),
                        );
                        $this->load->view('user/header_login');
                        $this->load->view('user/upload_form_keberatan',$data);
                        $this->load->view('user/footer');
                }
                else{
                //If no session, redirect to login page
                redirect('UserPage/login', 'refresh');
                }
        }
        public function request()
        {
                if($this->session->userdata('logged_in')){
                    $this->load->model('model_request');
                    $data = array (
                            'request' => $this->model_request->request(),
                    );
                    $this->load->view('user/header_login'); 
                    $this->load->view('user/request', $data);
                    $this->load->view('user/footer');
                }
                else{
                    //If no session, redirect to login page
                    $this->load->view('user/header'); 
                    $this->load->view('user/login');
                    $this->load->view('user/footer');
                }
        }

        public function my_request()
        {       
                $nik =  $this->session->userdata('nik');
                if($this->session->userdata('logged_in')){
                    $this->load->model('model_request');
                    $data['request_all'] = $this->model_request->request_all($nik);
                    $data['request_ditanggapi'] = $this->model_request->request_ditanggapi($nik);
                    $data['request_belum_ditanggapi'] = $this->model_request->request_belum_ditanggapi($nik);
                    $data['request_ditolak'] = $this->model_request->request_ditolak($nik);
                    
                    $this->load->view('user/header_login'); 
                    $this->load->view('user/my_request', $data);
                    $this->load->view('user/footer');
                }
                else{
                    //If no session, redirect to login page
                    $this->load->view('user/header'); 
                    $this->load->view('user/login');
                    $this->load->view('user/footer');
                }
        }

        public function request_detail($no_req)
        {       
                if($this->session->userdata('logged_in')){
                    $this->load->model('model_request');
                    $data['request_detail'] = $this->model_request->request_detail($no_req);
                    
                    $this->load->view('user/header_login'); 
                    $this->load->view('user/detail_request', $data);
                    $this->load->view('user/footer');
                }
                else{
                    //If no session, redirect to login page
                    $this->load->view('user/header'); 
                    $this->load->view('user/login');
                    $this->load->view('user/footer');
                }
        }

        public function recover(){
            //Loads the view for the recover password process.
            $this->load->view('user/header'); 
            $this->load->view('user/forgot');
            $this->load->view('user/footer');
        }

        public function recover_password(){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('email', 'Email', 'required|trim|xss_clean|callback_validate_credentials');

                    //check if email is in the database
                $this->load->model('user');
                if($this->user->email_exists()){
                    //$password is the varible to be sent to the user's email 
                    $temp_pass = md5(uniqid());
                    //send email with #password as a link
                    $this->load->library('email');
                    $config = Array(
                        'protocol' => 'smtp',
                        'smtp_host' => 'ssl://smtp.gmail.com',
                        'smtp_port' => 465,
                        'smtp_user' => 'shortproject1@gmail.com', # Change this
                        'smtp_pass' => 'short123', # Change this too
                        'mailtype'  => 'html', 
                        'charset'   => 'utf-8'
                    );
                    $this->email->initialize($config);
                    $this->email->set_newline("\r\n");
                    $this->email->clear();
                    $this->email->from('shortproject1@gmail.com');
                    $this->email->to($this->input->post('email'));
                    $this->email->subject("Reset your Password");

                    $message = "<p>This email has been sent as a request to reset our password</p>";
                    $message .= "<p><a href=".base_url()."UserPage/reset_password/".$temp_pass.">Click here </a>if you want to reset your password,
                                if not, then ignore</p>";
                    $this->email->message($message);

                    if($this->email->send()){
                        $this->load->model('user');
                        if($this->user->temp_reset_password($temp_pass)){
                            echo "check your email for instructions, thank you";
                        }
                    }
                    else{
                        echo "email was not sent, please contact your administrator";
                    }

                }else{
                    echo "your email is not in our database";
                }
        }
        public function reset_password($temp_pass){
            $this->load->model('user');
            $data['listTable'] = $this->user->getUserPass($temp_pass);
            if($this->user->is_temp_pass_valid($temp_pass)){

                $this->load->view('user/header'); 
                $this->load->view('user/reset_password', $data);
                $this->load->view('user/footer');

            }else{
                echo "the key is not valid";    
            }

        }
        public function update_password(){
            $this->load->library('form_validation');
                $this->form_validation->set_rules('password', 'Password', 'required|trim');
                $this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|trim|matches[password]');
                    if($this->form_validation->run()){
                    $data = array(
                                'password' => md5($this->input->post('password'))
                                );
                    $condition['reset_pass'] = $this->input->post('reset_pass');
                    $this->load->model('user');
                    $this->user->editNewPass('t_user',$data, $condition); //passing variable $data ke products_model
                    echo "<script>window.alert('reset password berhasil, silahkan lakukan login.')
           window.location.href='login/';</script>";
                    }else{
                    echo "<script>window.alert('password do not match')
           window.location.href='javascript:history.back()';</script>"; 
                    }
        }
}