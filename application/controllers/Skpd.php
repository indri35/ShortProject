<?php
class Skpd extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        // meload model skpd
        $this->load->model(array('model_skpd'));
        $this->load->helper(array('form', 'url'));
    }
    
    public function index(){
        // menyimpan data permohonan dokumen untuk dipassing ke view
        $a = $this->model_skpd->getAllPendingReq();
        $b = $this->model_skpd->getAllSentReq();
        $c = $this->model_skpd->getAllReq();
        $d = $this->model_skpd->getAllDoc();
        $data= array( 'request'=> $a, 'sent' => $b,'all'=> $c,'dokumen'=> $d);
        
        $this->load->view('skpd/header');
        $this->load->view('skpd/index',$data);
        $this->load->view('skpd/footer');
    }

    public function document(){
        $data['document']=$this->model_skpd->getAllDoc();

        $this->load->view('skpd/header');
        $this->load->view('skpd/document',$data);
        $this->load->view('skpd/footer');
    }

    public function pendingRequest(){
        $data['pending']=$this->model_skpd->getAllPendingReq();

        $this->load->view('skpd/header');
        $this->load->view('skpd/pending',$data);
        $this->load->view('skpd/footer');
    }

    public function sentRequest(){
        $data['sents']=$this->model_skpd->getAllSentReq();
        
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
        $response_at=$this->input->post('response_at');   
        $id= $this->input->post('id');     
        $data = array(
                        'id' => $id,
                        'nik_pemohon' => $this->input->post('nik_pemohon'),
                        'request_at' => $this->input->post('request_at'),
                        'response_at' => $response_at,
                        'dokumen' => $gambar_value,
                        'kode_skpd' => $this->input->post('kode_skpd')
                     );
        $this->model_skpd->respon('t_doc_respon',$data); //passing variable $data ke products_model

        $this->db->query("UPDATE t_request SET response_at='$response_at' WHERE id='$id';");

        redirect('skpd/index'); //redirect page ke halaman utama controller products   
    }

}
