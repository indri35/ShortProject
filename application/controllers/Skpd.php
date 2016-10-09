<?php
class Skpd extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        // meload model skpd
        $this->load->model(array('model_skpd'));
        $this->load->helper(array('form', 'url'));
    }
    
    public function index(){
        if($this->session->userdata('logged_in'))
            {   
                $skpd= $this->session->userdata('kode_skpd');
                // menyimpan data permohonan dokumen untuk dipassing ke vie
                $a = $this->model_skpd->getAllPendingReq($skpd);
                $b = $this->model_skpd->getAllSentReq($skpd);
                $c = $this->model_skpd->getAllReq($skpd);
                $d = $this->model_skpd->getAllDoc($skpd);
                $data= array( 'request'=> $a, 'sent' => $b,'all'=> $c,'dokumen'=> $d);
                
                $this->load->view('skpd/header');
                $this->load->view('skpd/index',$data);
                $this->load->view('skpd/footer');
            }
            else
            {
                //If no session, redirect to login page
                redirect('UserPage/login', 'refresh');
            }
    }

    public function document(){
        $skpd= $this->session->userdata('kode_skpd');
        $data['document']=$this->model_skpd->getAllDoc($skpd);
        
        $this->load->view('skpd/header');
        $this->load->view('skpd/document',$data);
        $this->load->view('skpd/footer');
    }

    public function profile(){
        $this->load->model('model_skpd');
        $id = $this->uri->segment(3);
        $data['profile'] = $this->model_skpd->profile($id)->row_array();

        $this->load->view('skpd/header');
        $this->load->view('skpd/profile',$data);
        $this->load->view('skpd/footer');
    }

    public function pendingRequest(){   
        $skpd= $this->session->userdata('kode_skpd');
        $data['pending']=$this->model_skpd->getAllPendingReq($skpd);

        $this->load->view('skpd/header');
        $this->load->view('skpd/pending',$data);
        $this->load->view('skpd/footer');
    }

    public function sentRequest(){
        $skpd= $this->session->userdata('kode_skpd');
        $data['sents']=$this->model_skpd->getAllSentReq($skpd);
        
        $this->load->view('skpd/header');
        $this->load->view('skpd/sent',$data);
        $this->load->view('skpd/footer');
    }

    public function tanggapi(){
        $this->load->model('model_skpd');
        $id = $this->uri->segment(3);
        $data['reqs'] = $this->model_skpd->tanggapi($id)->row_array();

        $this->load->view('skpd/header');
        $this->load->view('skpd/tanggapi',$data);
        $this->load->view('skpd/footer');
    }

    public function update(){
        $id = $this->input->post('id');
        $data = array(
            'nik_pemohon'=>$this->input->post('nik_pemohon'),
            'response_at'=>$this->input->post('response_at')
            );

        $this->db->where('id',$id);
        $this->db->update('t_request',$data);
        redirect('skpd');
    }

    public function do_upload(){
        $config['upload_path'] = 'assets/dokumen/';
        $config['allowed_types'] = 'gif|jpg|png|pdf|csv|xls|xlsx|doc|docx';
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
        $date_upload=$this->input->post('date_upload');   
        $no_req= $this->input->post('no_req');     
        $data = array(
                        'no_req' => $no_req,
                        'date_upload' => $date_upload,
                        'berkas_upload' => $gambar_value
                     );

        $this->db->query("UPDATE t_doc_req SET date_upload='$date_upload', berkas_upload='$gambar_value'  WHERE no_req='$no_req';");

        redirect('skpd/index'); //redirect page ke halaman utama controller products      
    }

    public function logout(){
                $this->session->unset_userdata('logged_in');
                session_destroy();
                redirect('UserPage/', 'refresh');
    }

    public function create(){
        $this->load->view('skpd/header');
        $this->load->view('skpd/create');
        $this->load->view('skpd/footer');
    }

    public function store(){
        $data = array(
            'kode_berkas'       =>  $this->input->post('kode_berkas'),
            'upload_at'      =>  $this->input->post('upload_at'),
            'nama_berkas'    =>  $this->input->post('nama_berkas'),
            'kategori'    =>  $this->input->post('kategori'),
            'deskripsi'    =>  $this->input->post('deskripsi'),
            'kode_skpd'    =>  $this->input->post('kode_skpd')
            );
        $this->db->insert('t_dokumen',$data);
        redirect('skpd/document');    
    }

    public function edit(){
        $this->load->model('model_skpd');
        $id = $this->uri->segment(3);
        $data['docs'] = $this->model_skpd->dokumen($id)->row_array();

        $this->load->view('skpd/header');
        $this->load->view('skpd/edit',$data);
        $this->load->view('skpd/footer');
    }

    public function updatee(){
        $id = $this->input->post('id');
        $data = array(
            'kode_berkas'      =>  $this->input->post('kode_berkas'),
            'upload_at'    =>  $this->input->post('upload_at'),
            'nama_berkas'    =>  $this->input->post('nama_berkas'),
            'kategori'    =>  $this->input->post('kategori'),
            'deskripsi'    =>  $this->input->post('deskripsi'),
            'kode_skpd'    =>  $this->input->post('kode_skpd')
            );
        $this->db->where('id',$id);
        $this->db->update('t_dokumen',$data);
        redirect('skpd/document');
    }

    public function delete(){
        $id = $this->uri->segment(3);
        $this->db->where('id',$id);
        $this->db->delete('t_dokumen');
        redirect('skpd/document');
    }

}
