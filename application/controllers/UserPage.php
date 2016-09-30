<?php
class UserPage extends CI_Controller {

        

        public function index(){
                $this->load->view('user/header');
                $this->load->view('user/home');
                $this->load->view('user/footer');
        }

        public function form_perorangan(){
                $this->load->view('user/header');
                $this->load->view('user/form_perorangan');
                $this->load->view('user/footer');
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
                $this->load->view('user/header');
                $this->load->view('user/login');
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
}