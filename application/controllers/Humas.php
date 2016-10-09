<?php
class Humas extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        // meload model skpd
        $this->load->model(array('model_humas'));
    }
    
    public function index(){
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

    public function tanggapi(){
        $this->load->model('model_skpd');
        $id = $this->uri->segment(3);
        $data['reqs'] = $this->model_skpd->request($id)->row_array();

        $this->load->view('humas/header');
        $this->load->view('humas/tanggapi',$data);
        $this->load->view('humas/footer');
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

        redirect('humas/index'); //redirect page ke halaman utama controller products   
    }

    public function create(){
        $data['skpd']=$this->model_humas->getAllSkpd();

        $this->load->view('humas/header');
        $this->load->view('humas/create',$data);
        $this->load->view('humas/footer');
    }

    public function store(){
        $data = array(
            'hak_akses'       =>  $this->input->post('hak_akses'),
            'kode_skpd'      =>  $this->input->post('kode_skpd'),
            'nik'    =>  $this->input->post('nik'),
            'nama'    =>  $this->input->post('nama'),
            'alamat'    =>  $this->input->post('alamat'),
            'no_tlpn'    =>  $this->input->post('no_tlpn'),
            'no_hp'    =>  $this->input->post('no_hp'),
            'email'    =>  $this->input->post('email'),
            'password'    =>  md5($this->input->post('password'))
            );
        $this->db->insert('t_user',$data);
        redirect('humas/user');    
    }

    public function edit(){
        $this->load->model('model_humas');
        $id = $this->uri->segment(3);
        $a = $this->model_humas->user($id)->row_array();
        $b=$this->model_humas->getAllSkpd();

        $data= array( 'user'=> $a, 'skpd' => $b);

        $this->load->view('humas/header');
        $this->load->view('humas/edit',$data);
        $this->load->view('humas/footer');
    }

    public function update(){
        $id         = $this->input->post('id');
        $data = array(
            'hak_akses'       =>  $this->input->post('hak_akses'),
            'kode_skpd'      =>  $this->input->post('kode_skpd'),
            'nik'    =>  $this->input->post('nik'),
            'nama'    =>  $this->input->post('nama'),
            'alamat'    =>  $this->input->post('alamat'),
            'no_tlpn'    =>  $this->input->post('no_tlpn'),
            'no_hp'    =>  $this->input->post('no_hp'),
            'email'    =>  $this->input->post('email')
            );
        $this->db->where('id',$id);
        $this->db->update('t_user',$data);
        redirect('humas/user');
    }

    public function delete(){
        $id = $this->uri->segment(3);
        $this->db->where('id',$id);
        $this->db->delete('t_user');
        redirect('humas/user');
    }

}
