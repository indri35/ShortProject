<?php
class Humas extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        // meload model skpd
        $this->load->model(array('model_skpd'));
    }
    
    public function index(){
        // menyimpan data permohonan dokumen untuk dipassing ke view
        $a = $this->model_skpd->getAllReq();
        $b = $this->model_skpd->getAllDoc();
        $c = $this->model_skpd->getAllUser();
        $d = $this->model_skpd->getAllSkpd();
        $data= array( 'request'=> $a, 'dokumen' => $b,'user'=> $c, 'skpd' => $d);
        $this->load->view('admin-humas/index',$data);
    }

    public function show(){
        $this->load->model('model_siswa');
        $siswa_id = $this->uri->segment(3);
        $data['siswa'] = $this->model_siswa->siswa($siswa_id)->row_array();
        $this->load->view('siswa/show',$data);
    }

    public function create(){

        $this->load->view('siswa/create');
    }

    public function store(){
        $datasiswa = array(
            'nis'       =>  $this->input->post('nis'),
            'nama'      =>  $this->input->post('nama'),
            'gender'    =>  $this->input->post('gender'));
        $this->db->insert('siswa',$datasiswa);
        redirect('siswa');    
    }

    public function edit(){
        $this->load->model('model_siswa');
        $siswa_id = $this->uri->segment(3);
        $data['siswa'] = $this->model_siswa->siswa($siswa_id)->row_array();
        $this->load->view('siswa/edit',$data);
    }

    function update(){
        $siswa_id         = $this->input->post('siswa_id');
        $datasiswa = array(
            'nis'   =>  $this->input->post('nis'),
            'nama'   =>  $this->input->post('nama'),
            'gender'         =>  $this->input->post('gender'));
        $this->db->where('siswa_id',$siswa_id);
        $this->db->update('siswa',$datasiswa);
        redirect('siswa');
    }

    function delete(){
        $siswa_id = $this->uri->segment(3);
        $this->db->where('siswa_id',$siswa_id);
        $this->db->delete('siswa');
        redirect('siswa');
    }
           
}
