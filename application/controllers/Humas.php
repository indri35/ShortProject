<?php
class Humas extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        // meload model skpd
        $this->load->model(array('model_humas'));
    }
    
    public function index(){
        // menyimpan data permohonan dokumen untuk dipassing ke view
        $a = $this->model_humas->getAllPendingReq();
        $b = $this->model_humas->getAllSentReq();
        $c = $this->model_humas->getAllDoc();
        $d = $this->model_humas->getAllUser();

        $data= array( 'pending'=> $a, 'sent' => $b,'dokumen'=> $c, 'user' => $d);

        $this->load->view('humas/header');
        $this->load->view('humas/index',$data);
        $this->load->view('humas/footer');
    }

    public function pendingRequest(){
        $data['pending']=$this->model_humas->getAllPendingReq();

        $this->load->view('humas/header');
        $this->load->view('humas/pending',$data);
        $this->load->view('humas/footer');
    }

    public function sentRequest(){
        $data['sents']=$this->model_humas->getAllSentReq();
        
        $this->load->view('humas/header');
        $this->load->view('humas/sent',$data);
        $this->load->view('humas/footer');
    }

    public function document(){
        $data['docs']=$this->model_humas->getAlldoc();
        
        $this->load->view('humas/header');
        $this->load->view('humas/document',$data);
        $this->load->view('humas/footer');
    }
   
    public function user(){
        $data['users']=$this->model_humas->getAllUser();
        
        $this->load->view('humas/header');
        $this->load->view('humas/user',$data);
        $this->load->view('humas/footer');
    }
}
