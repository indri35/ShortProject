<?php
class UserPage extends CI_Controller {
        function __construct(){
                parent::__construct();
                $this->load->model("model_user"); //constructor yang dipanggil ketika memanggil products.php untuk melakukan pemanggilan pada model : products_model.php yang ada di folder models
                $this->load->helper(array('form', 'url'));
        }
        

        public function index(){
                $this->load->view('user/header');
                $this->load->view('user/home');
                $this->load->view('user/footer');
        }

        public function form_perorangan(){
                if($this->session->userdata('logged_in')){
                        $session_data = $this->session->userdata('logged_in');
                        $data['email'] = $session_data['email'];
                        $this->load->view('user/header_login');
                        $this->load->view('user/form_perorangan');
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

                $this->load->model('model_dokumen');
                $data = array (
                        'dokumen' => $this->model_dokumen->getAll(),
                );
                $this->load->view('user/header'); 
                $this->load->view('user/dokumen', $data);
                $this->load->view('user/footer');
        }

        public function login(){
                $this->load->helper(array('form'));
                $this->load->view('user/header');
                $this->load->view('user/login');
                $this->load->view('user/footer');
        }

        function logout(){
                $this->session->unset_userdata('logged_in');
                session_destroy();
                redirect('UserPage/login', 'refresh');
        }

        public function register(){
                $this->load->view('user/header');
                $this->load->view('user/register');
                $this->load->view('user/footer');
        }

        public function about(){
                $this->load->view('user/header');
                $this->load->view('user/about');
                $this->load->view('user/footer');
        }

        public function kontak(){
                $this->load->view('user/header');
                $this->load->view('user/kontak');
                $this->load->view('user/footer');
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
}