<?php
class Skpd extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        // meload model skpd
        $this->load->model(array('model_skpd'));
    }
    
    public function index(){
        // menyimpan data permohonan dokumen untuk dipassing ke view
        $a = $this->model_skpd->getAllPendingReq();
        $b = $this->model_skpd->getAllSentReq();
        $c = $this->model_skpd->getAllReq();
        $d = $this->model_skpd->getAllDoc();
        $data= array( 'request'=> $a, 'sent' => $b,'all'=> $c,'dokumen'=> $d);
        $this->load->view('skpd/index',$data);
    }

    public function document(){
        $data['document']=$this->model_skpd->getAllDoc();
        $this->load->view('skpd/document',$data);
    }

    public function pendingRequest(){
        $data['pending']=$this->model_skpd->getAllPendingReq();
        $this->load->view('skpd/pending',$data);
    }

    public function sentRequest(){
        $data['sents']=$this->model_skpd->getAllSentReq();
        $this->load->view('skpd/sent',$data);
    }
}
