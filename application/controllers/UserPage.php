<?php
class UserPage extends CI_Controller {
        function __construct(){
                parent::__construct();
                $this->load->model("model_user");
                $this->load->model("model_dokumen");
                $this->load->model("model_request"); //constructor yang dipanggil ketika memanggil products.php untuk melakukan pemanggilan pada model : products_model.php yang ada di folder models
                $this->load->helper(array('form', 'url'));
        }
        

        public function index(){
                if($this->session->userdata('logged_in')){
                        $email = $this->session->userdata('email');
                        $this->load->view('user/header_login');
                        $this->load->view('user/home');
                        $this->load->view('user/footer');
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

        public function form_keberatan(){
                $this->load->view('user/form_keberatan');
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

        public function relogin(){
                $this->session->unset_userdata('logged_in');
                session_destroy();
                //If no session, redirect to login page
                $this->load->helper(array('form'));
                $this->load->view('user/header');
                $this->load->view('user/relogin');
                $this->load->view('user/footer');
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
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '1000';
                $config['max_width']  = '1024';
                $config['max_height']  = '768';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload()){
                    $error = array('error' => $this->upload->display_errors());
                    $gambar_value = 'nopic.png';
                }
                else{
                    $data = array('upload_data' => $this->upload->data());
                    $gambar_value = $this->input->post('gambar_value');
                }
                        
                // selesai upload foto, berikut adalah input database
                        
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
                
                redirect('UserPage/form_perorangan'); //redirect page ke halaman utama controller products   
        }

        public function edit_profil_data(){
                $config['upload_path'] = 'assets/ktp/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '1000';
                $config['max_width']  = '1024';
                $config['max_height']  = '768';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload()){
                    $error = array('error' => $this->upload->display_errors());
                    $gambar_value = '$gambar_value';
                }
                else{
                    $data = array('upload_data' => $this->upload->data());
                    $gambar_value = $this->input->post('gambar_value');
                }
                        
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
                
                redirect('UserPage/relogin'); //redirect page ke halaman utama controller products   
        }

        public function input_form_perorangan(){
                
                $data = array(
                                'nik_pemohon' => $this->input->post('nik_pemohon'),
                                'request_at' => $this->input->post('request_at'),
                                'file_pendukung' => $this->input->post('file_pendukung'),
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
                redirect('UserPage/my_request'); //redirect page ke halaman utama controller products   
        }

        public function input_form_berbadan_hukum(){
                $config['upload_path'] = 'assets/file_pendukung/';
                $config['allowed_types'] = 'gif|jpg|png';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload()){
                    $error = array('error' => $this->upload->display_errors());
                    $gambar_value = 'nopic.png';
                }
                else{
                    $data = array('upload_data' => $this->upload->data());
                    $gambar_value = $this->input->post('gambar_value');
                }
                        
                // selesai upload foto, berikut adalah input database
                $data = array(
                                'nik_pemohon' => $this->input->post('nik_pemohon'),
                                'request_at' => $this->input->post('request_at'),
                                'file_pendukung' => $gambar_value,
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
                redirect('UserPage/my_request'); //redirect page ke halaman utama controller products   
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
                    $data = array (
                            'my_request' => $this->model_request->my_request($nik),
                    );
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
}