<?php

class Humas extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        // meload model skpd
        $this->load->model(array('model_humas'));
    }
    
    public function index(){
    if($this->session->userdata('humas'))
        {  
            // menyimpan data permohonan dokumen untuk dipassing ke view
            $a = $this->model_humas->getAllSentReq();
            $b = $this->model_humas->getAllPendingReq();
            $c = $this->model_humas->getAllDoc();
            $d = $this->model_humas->getAllUser();
            $e = $this->model_humas->getAllCom();
            $data= array( 'sent'=> $a, 'pending' => $b,'dokumen'=> $c, 'user' => $d, 'complain' => $e);

            $this->load->view('humas/header');
            $this->load->view('humas/index',$data);
            $this->load->view('humas/footer');
        }
    else
        {
            //If no session, redirect to login page
            redirect('UserPage/login', 'refresh');
        }
    }

    public function pendingRequest(){
    if($this->session->userdata('humas'))
        {
            $data['pending']=$this->model_humas->getAllPendingReq();

            $this->load->view('humas/header');
            $this->load->view('humas/pending',$data);
            $this->load->view('humas/footer');
        }
    else
        {
            //If no session, redirect to login page
            redirect('UserPage/login', 'refresh');
        }
    }

    public function sentRequest(){
    if($this->session->userdata('humas'))
        {
            $data['sents']=$this->model_humas->getAllSentReq();
            
            $this->load->view('humas/header');
            $this->load->view('humas/sent',$data);
            $this->load->view('humas/footer');
        }
    else
        {
            //If no session, redirect to login page
            redirect('UserPage/login', 'refresh');
        }
    }

    public function document(){
    if($this->session->userdata('humas'))
        {
            $data['docs']=$this->model_humas->getAlldoc();
            
            $this->load->view('humas/header');
            $this->load->view('humas/document',$data);
            $this->load->view('humas/footer');
        }
    else
        {
            //If no session, redirect to login page
            redirect('UserPage/login', 'refresh');
        }
    }
   
    public function user(){
    if($this->session->userdata('humas'))
        {
            $data['users']=$this->model_humas->getAllUser();
            
            $this->load->view('humas/header');
            $this->load->view('humas/user',$data);
            $this->load->view('humas/footer');
        }
    else
        {
            //If no session, redirect to login page
            redirect('UserPage/login', 'refresh');
        }
    }

    public function complain(){
    if($this->session->userdata('humas'))
        { 
            $data['comp'] = $this->model_humas->getAllCom();
            
            $this->load->view('humas/header');
            $this->load->view('humas/complain',$data);
            $this->load->view('humas/footer');
        }
    else
        {
            //If no session, redirect to login page
            redirect('UserPage/login', 'refresh');
        }
    }

    public function profile(){
    if($this->session->userdata('humas'))
        { 
            $id = $this->session->userdata('id');
            $data['profile'] = $this->model_humas->profile($id)->row_array();;

            $this->load->view('humas/header');
            $this->load->view('humas/profile',$data);
            $this->load->view('humas/footer');
        }
    else
            {
                //If no session, redirect to login page
                redirect('UserPage/login', 'refresh');
            }
    }

    public function edit_profile()
        {
        if($this->session->userdata('humas'))
            {
                $id = $this->session->userdata('id');
                $data['profile'] = $this->model_humas->profile($id)->row_array();

                $this->load->view('humas/header');
                $this->load->view('humas/edit_profile',$data);
                $this->load->view('humas/footer');
            }
        else
           {
             //If no session, redirect to login page
             redirect('UserPage/login', 'refresh');
           }
         }

    public function edit_profile_data(){
                $config['upload_path'] = 'assets/ktp/';
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
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
                                'kode_skpd' => $this->input->post('kode_skpd'),
                                'nik' => $this->input->post('nik'),
                                'nama' => $this->input->post('nama'),
                                'alamat' => $this->input->post('alamat'),
                                'no_tlpn' => $this->input->post('no_tlpn'),
                                'no_hp' => $this->input->post('no_hp'),
                                'email' => $this->input->post('email'),
                                'ktp' => $gambar_value
                                );

                $id= $this->input->post('id');

                $this->db->where('id',$id);
                $this->db->update('t_user', $data);

                $this->session->unset_userdata('logged_in');
                session_destroy();
                echo "<script>window.alert('Edit profil berhasil, silahkan lakukan login ulang.')
                window.location.href='profile';</script>"; //redirect page ke halaman utama controller products
            }
        }

    public function show(){
    if($this->session->userdata('humas')){

            $this->load->model('model_skpd');
            $nik = $this->uri->segment(3);
            $a['data'] = $this->model_skpd->pemohon($nik)->row_array();

            $id = $this->uri->segment(4);
            $b['req'] = $this->model_skpd->show($id)->row_array();

            $merge = array_merge($a, $b);

            $this->load->view('humas/headerform');
            $this->load->view('humas/showdetail',$merge);
            $this->load->view('humas/footerform');
        }
    else
        {
            //If no session, redirect to login page
            redirect('UserPage/login', 'refresh');
        }
    }

    public function tanggapi(){
    if($this->session->userdata('humas'))
        {
            $this->load->model('model_skpd');
            $id = $this->uri->segment(3);
            $a['reqs'] = $this->model_skpd->request($id)->row_array();

            $b['doc']=$this->model_humas->getAllDoc();

            $data = array_merge($a, $b);

            $this->load->view('humas/header');
            $this->load->view('humas/tanggapi',$data);
            $this->load->view('humas/footer');
        }
    else
        {
            //If no session, redirect to login page
            redirect('UserPage/login', 'refresh');
        }
    }

    public function tanggapi_keberatan(){
    if($this->session->userdata('humas'))
        { 
            $this->load->model('model_humas');
            $id = $this->uri->segment(3);
            $a['reqs'] = $this->model_humas->tanggapi($id)->row_array();

            $b['doc']=$this->model_humas->getAllDoc();

            $data = array_merge($a, $b);

            $this->load->view('humas/header');
            $this->load->view('humas/tanggapi_keberatan',$data);
            $this->load->view('humas/footer');
        }
    else
        {
            //If no session, redirect to login page
            redirect('UserPage/login', 'refresh');
        }
    }

    public function do_upload(){
    if($this->session->userdata('humas'))
        {
        if($this->input->post('doc') != 'NULL'){
            $gambar_value = $this->input->post('doc');
        }
        else{

            $config['upload_path'] = 'assets/dokumen/';
            $config['allowed_types'] = 'gif|jpg|png|pdf|csv|xls|xlsx|doc|docx';
            $config['max_size']     = '1000';
            $config['max_width']  = '1024';
            $config['max_height']  = '768';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload()){
                $error = array('error' => $this->upload->display_errors());
                $gambar_value = NULL;
                $this->session->set_flashdata('something', 'Tanggapi, Upload file gagal!');
            }
            else{
                $upload_data = $this->upload->data();
                $gambar_value = $upload_data['file_name'];
            }
        }          
            // selesai upload foto, berikut adalah input database
            $date_upload=$this->input->post('date_upload');   
            $no_req= $this->input->post('no_req');   
            $pesan= $this->input->post('pesan');     
            $data = array(
                            'no_req' => $no_req,
                            'date_upload' => $date_upload,
                            'berkas_upload' => $gambar_value,
                            'pesan' => $pesan
                         );

            $this->db->query("UPDATE t_doc_req SET date_upload='$date_upload', berkas_upload='$gambar_value', pesan='$pesan'  WHERE no_req='$no_req';");

            redirect('humas',$notif); //redirect page ke halaman utama controller products   
        }
    else
        {
            //If no session, redirect to login page
            redirect('UserPage/login', 'refresh');
        }
    }

    public function do_upload_keberatan(){
    if($this->session->userdata('humas'))
        {
            if($this->input->post('doc') != 'NULL'){
            $gambar_value = $this->input->post('doc');
        }
        else{
            $config['upload_path'] = 'assets/dokumen/';
            $config['allowed_types'] = 'jpg|png|pdf';
            $config['max_size']     = '1000';
            $config['max_width']  = '1024';
            $config['max_height']  = '768';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload()){
                $error = array('error' => $this->upload->display_errors());
                $gambar_value = FALSE;
                $this->session->set_flashdata('something', 'Upload file gagal!');
            }
            else{
                $upload_data = $this->upload->data();
                $gambar_value = $upload_data['file_name'];
            }
        }
                    
            // selesai upload foto, berikut adalah input database
            $date_upload=$this->input->post('date_upload');   
            $no_req= $this->input->post('no_req');     
            $pesan = $this->input->post('pesan');
            $data = array(
                            'no_req' => $no_req,
                            'date_upload' => $date_upload,
                            'pesan' => $pesan, 
                            'berkas_upload' => $gambar_value
                         );

            $this->db->query("UPDATE t_doc_req SET date_upload_keberatan='$date_upload',date_upload='$date_upload', berkas_upload='$gambar_value',  pesan='$pesan'  WHERE no_req='$no_req';");

            redirect('humas'); //redirect page ke halaman utama controller products      
            
        }
    else
        {
            //If no session, redirect to login page
            redirect('UserPage/login', 'refresh');
        }
    }

    //upload ketika isi list
    public function doc_upload(){
    if($this->session->userdata('humas'))
        {
            $config['upload_path'] = 'assets/dokumen/';
            $config['allowed_types'] = 'gif|jpg|png|pdf|csv|xls|xlsx|doc|docx';
            $config['max_size']     = '1000';
            $config['max_width']  = '1024';
            $config['max_height']  = '768';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload()){
                $error = array('error' => $this->upload->display_errors());
                $gambar_value = 'nopic.png';
                $this->session->set_flashdata('something', 'Upload file gagal!');
            }
            else{
                $upload_data = $this->upload->data();
                $gambar_value = $upload_data['file_name'];
            }
                    
            // selesai upload foto, berikut adalah input database   
            $data = array(
                            'kode_berkas' => $this->input->post('kode_berkas'),
                            'upload_at' => $this->input->post('upload_at'), 
                            'nama_berkas' => $this->input->post('nama_berkas'),  
                            'berkas' => $gambar_value,
                            'kategori' => $this->input->post('kategori'), 
                            'deskripsi' => $this->input->post('deskripsi'), 
                            'kode_skpd' => $this->input->post('kode_skpd'), 
                         );

            $this->db->insert('t_dokumen',$data);

            redirect('humas/document');
        }
    else
        {
            //If no session, redirect to login page
            redirect('UserPage/login', 'refresh');
        }
    }

    public function create(){
    if($this->session->userdata('humas'))
        {
            $data['skpd']=$this->model_humas->getAllSkpd();
            
            $this->load->view('humas/header');
            $this->load->view('humas/create',$data);
            $this->load->view('humas/footer');
        }
    else
        {
            //If no session, redirect to login page
            redirect('UserPage/login', 'refresh');
        }
    }

    public function createDoc(){
    if($this->session->userdata('humas'))
        {
        $data['skpd']=$this->model_humas->getAllSkpd();

            $this->load->view('humas/header');
            $this->load->view('humas/createDoc',$data);
            $this->load->view('humas/footer');
        }
    else
        {
            //If no session, redirect to login page
            redirect('UserPage/login', 'refresh');
        }
    }

    public function store(){
    if($this->session->userdata('humas'))
        {
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
    else
        {
            //If no session, redirect to login page
            redirect('UserPage/login', 'refresh');
        }
    }

    //edit untuk user list
    public function edit(){
    if($this->session->userdata('humas'))
        {
            $this->load->model('model_humas');
            $id = $this->uri->segment(3);
    $a = $this->model_humas->user($id)->row_array();
            $b=$this->model_humas->getAllSkpd();

            $data= array( 'user'=> $a, 'skpd' => $b);

            $this->load->view('humas/header');
            $this->load->view('humas/edit',$data);
            $this->load->view('humas/footer');
        }
    else
        {
            //If no session, redirect to login page
            redirect('UserPage/login', 'refresh');
        }
    }

    //edit untuk dokumen list
    public function editt(){
    if($this->session->userdata('humas'))
        {
            $this->load->model('model_humas');
            $id = $this->uri->segment(3);
            $data['docs'] = $this->model_humas->dokumen($id)->row_array();

            $this->load->view('humas/header');
            $this->load->view('humas/editt',$data);
            $this->load->view('humas/footer');
        }
    else
        {
            //If no session, redirect to login page
            redirect('UserPage/login', 'refresh');
        }
    }


    public function update(){
    if($this->session->userdata('humas'))
        {
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
    else
        {
            //If no session, redirect to login page
            redirect('UserPage/login', 'refresh');
        }
    }

    public function delete(){
    if($this->session->userdata('humas'))
        {
            $id = $this->uri->segment(3);
            $this->db->where('id',$id);
            $this->db->delete('t_user');
            redirect('humas/user');
        }
    else
        {
            //If no session, redirect to login page
            redirect('UserPage/login', 'refresh');
        }
    }

    public function logout(){
    if($this->session->userdata('humas'))
        {
            $this->session->unset_userdata('humas');
            session_destroy();
            redirect('UserPage/', 'refresh');
        }
    else
        {
            //If no session, redirect to login page
            redirect('UserPage/login', 'refresh');
        }
    }

    public function updatee(){
    if($this->session->userdata('humas'))
        {
            $config['upload_path'] = 'assets/dokumen/';
            $config['allowed_types'] = 'gif|jpg|png|pdf|csv|xls|xlsx|doc|docx';
            $config['max_size']     = '1000';
            $config['max_width']  = '1024';
            $config['max_height']  = '768';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload()){
                $error = array('error' => $this->upload->display_errors());
                $gambar_value = 'nopic.png';
                $this->session->set_flashdata('something', 'Upload file gagal!');
            }
            else{
                $upload_data = $this->upload->data();
                $gambar_value = $upload_data['file_name'];
            }
                    
            // selesai upload foto, berikut adalah input database
            $id = $this->input->post('id');
            $data = array(
                'kode_berkas'      =>  $this->input->post('kode_berkas'),
                'upload_at'    =>  $this->input->post('upload_at'),
                'nama_berkas'    =>  $this->input->post('nama_berkas'),
                'berkas' => $gambar_value,
                'kategori'    =>  $this->input->post('kategori'),
                'deskripsi'    =>  $this->input->post('deskripsi'),
                'kode_skpd'    =>  $this->input->post('kode_skpd')
                );

            $this->db->where('id',$id);
            $this->db->update('t_dokumen',$data);
            redirect('humas/document');
        }
    else
        {
            //If no session, redirect to login page
            redirect('UserPage/login', 'refresh');
        }
    }

    public function deletee(){
    if($this->session->userdata('humas'))
        {
            $id = $this->uri->segment(3);
            $this->db->where('id',$id);
            $this->db->delete('t_dokumen');
            redirect('humas/document');
        }
    else
        {
            //If no session, redirect to login page
            redirect('UserPage/login', 'refresh');
        }
    }

    public function exportExcel(){
    if($this->session->userdata('humas'))
        {
            $data=$this->model_humas->getAlldoc();
          
            $this->load->library("PHPExcel/Classes/PHPExcel");
 
            //membuat objek PHPExcel
            $objPHPExcel = new PHPExcel();

            //membuat heading
            $heading=array('No','Id','Kode berkas','Tercatat pada','Nama berkas','Kategori','Deskripsi','Kepemilikan');

            $rowNumberH = 1;
            $colH = 'A';
            foreach($heading as $h){
                $objPHPExcel->getActiveSheet(0)->setCellValue($colH.$rowNumberH,$h);
                $colH++;   
            }

            $totaln=$data->num_rows();
            $maxrow=$totaln+1;
            // Isi
            $no=1;
            $row=2;
            foreach ($data->result() as $dat) {
            //echo $dat->id;
            
            //set Sheet yang akan diolah 
            $objPHPExcel->setActiveSheetIndex(0)
                    //mengisikan value pada tiap-tiap cell, A1 cell 
                                        ->setCellValue('A'.$row, $no)
                                        ->setCellValue('B'.$row, $dat->id)
                                        ->setCellValue('C'.$row, $dat->kode_berkas)
                                        ->setCellValue('D'.$row, $dat->upload_at)
                                        ->setCellValue('E'.$row, $dat->nama_berkas)
                                        ->setCellValue('F'.$row, $dat->kategori)
                                        ->setCellValue('G'.$row, $dat->deskripsi)
                                        ->setCellValue('H'.$row, $dat->kode_skpd);
                                        $no++;
                                        $row++;
            }

            //border tabel
            $styleArray = array(
                'borders' => array(
                    'allborders' => array(
                        'style' => PHPExcel_Style_Border::BORDER_THIN
                    )
                )
            );
            $objPHPExcel->getActiveSheet()->getStyle('A1:H'.$maxrow)->applyFromArray($styleArray);
            $objPHPExcel->getActiveSheet()->getStyle('A1:H1')->getFont()->setBold(true);
            //set title pada sheet (me rename nama sheet)
            $objPHPExcel->getActiveSheet()->setTitle('Excel Pertama');
 
            //mulai menyimpan excel format xlsx, kalau ingin xls ganti Excel2007 menjadi Excel5          
            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
 
            //sesuaikan headernya 
            header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
            header("Cache-Control: no-store, no-cache, must-revalidate");
            header("Cache-Control: post-check=0, pre-check=0", false);
            header("Pragma: no-cache");
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            //ubah nama file saat diunduh
            header('Content-Disposition: attachment;filename="Excel_Dokumen.xlsx"');
            //unduh file
            $objWriter->save("php://output");
        }
    else
        {
            //If no session, redirect to login page
            redirect('UserPage/login', 'refresh');
        }
    }

    public function exportExcelUser(){
    if($this->session->userdata('humas'))
        {
            $data=$this->model_humas->getAllUser();
          
            $this->load->library("PHPExcel/Classes/PHPExcel");
 
            //membuat objek PHPExcel
            $objPHPExcel = new PHPExcel();

            //membuat heading
            $heading=array('No','Id','Hak akses','Kode SKPD','NIK','Nama','Alamat','Nomor telepon','No handphone','Email',);

            $rowNumberH = 1;
            $colH = 'A';
            foreach($heading as $h){
                $objPHPExcel->getActiveSheet(0)->setCellValue($colH.$rowNumberH,$h);
                $colH++;   
            }

            $totaln=$data->num_rows();
            $maxrow=$totaln+1;
            // Isi
            $no=1;
            $row=2;
            foreach ($data->result() as $dat) {
            //echo $dat->id;
            
            //set Sheet yang akan diolah 
            $objPHPExcel->setActiveSheetIndex(0)
                    //mengisikan value pada tiap-tiap cell, A1 cell 
                                        ->setCellValue('A'.$row, $no)
                                        ->setCellValue('B'.$row, $dat->id)
                                        ->setCellValue('C'.$row, $dat->hak_akses)
                                        ->setCellValue('D'.$row, $dat->kode_skpd)
                                        ->setCellValue('E'.$row, $dat->nik)
                                        ->setCellValue('F'.$row, $dat->nama)
                                        ->setCellValue('G'.$row, $dat->alamat)
                                        ->setCellValue('H'.$row, $dat->no_tlpn)
                                        ->setCellValue('I'.$row, $dat->no_hp)
                                        ->setCellValue('J'.$row, $dat->email);
                                        $no++;
                                        $row++;
            }

            //border tabel
            $styleArray = array(
                'borders' => array(
                    'allborders' => array(
                        'style' => PHPExcel_Style_Border::BORDER_THIN
                    )
                )
            );
            $objPHPExcel->getActiveSheet()->getStyle('A1:J'.$maxrow)->applyFromArray($styleArray);
            $objPHPExcel->getActiveSheet()->getStyle('A1:J1')->getFont()->setBold(true);
            //set title pada sheet (me rename nama sheet)
            $objPHPExcel->getActiveSheet()->setTitle('Excel Pertama');
 
            //mulai menyimpan excel format xlsx, kalau ingin xls ganti Excel2007 menjadi Excel5          
            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
 
            //sesuaikan headernya 
            header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
            header("Cache-Control: no-store, no-cache, must-revalidate");
            header("Cache-Control: post-check=0, pre-check=0", false);
            header("Pragma: no-cache");
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            //ubah nama file saat diunduh
            header('Content-Disposition: attachment;filename="Excel_User.xlsx"');
            //unduh file
            $objWriter->save("php://output");
        }
    else
        {
            //If no session, redirect to login page
            redirect('UserPage/login', 'refresh');
        }
    }

    public function exportExcelRequest(){
    if($this->session->userdata('humas'))
        {
            $data=$this->model_humas->getAllReq();
          
            $this->load->library("PHPExcel/Classes/PHPExcel");
 
            //membuat objek PHPExcel
            $objPHPExcel = new PHPExcel();

            //membuat heading
            $heading=array('No','No request','NIK pemohon','Kode berkas','Nama berkas','Kategori berkas','Deskripsi berkas','Tujuan permohonan','Jenis permohonan','Kode SKPD','Berkas','Pesan','Pesan apabila ditolak','Form keberatan','Tanggal upload','Tanggal upload untuk keberatan pemohon');

            $rowNumberH = 1;
            $colH = 'A';
            foreach($heading as $h){
                $objPHPExcel->getActiveSheet(0)->setCellValue($colH.$rowNumberH,$h);
                $colH++;   
            }

            $totaln=$data->num_rows();
            $maxrow=$totaln+1;
            // Isi
            $no=1;
            $row=2;
            foreach ($data->result() as $dat) {
            //echo $dat->id;
            
            //set Sheet yang akan diolah 
            $objPHPExcel->setActiveSheetIndex(0)
                    //mengisikan value pada tiap-tiap cell, A1 cell 
                                        ->setCellValue('A'.$row, $no)
                                        ->setCellValue('B'.$row, $dat->no_req)
                                        ->setCellValue('C'.$row, $dat->nik_pemohon)
                                        ->setCellValue('D'.$row, $dat->kode_berkas)
                                        ->setCellValue('E'.$row, $dat->nama_berkas)
                                        ->setCellValue('F'.$row, $dat->kategori_berkas)
                                        ->setCellValue('G'.$row, $dat->deskripsi_berkas)
                                        ->setCellValue('H'.$row, $dat->tujuan_permohonan_info)
                                        ->setCellValue('I'.$row, $dat->jenis_request)
                                        ->setCellValue('J'.$row, $dat->kode_skpd)
                                        ->setCellValue('K'.$row, $dat->berkas_upload)
                                        ->setCellValue('L'.$row, $dat->pesan)
                                        ->setCellValue('M'.$row, $dat->pesan_tolak)
                                        ->setCellValue('N'.$row, $dat->form_keberatan)
                                        ->setCellValue('O'.$row, $dat->date_upload)
                                        ->setCellValue('P'.$row, $dat->date_upload_keberatan);
                                        $no++;
                                        $row++;
            }

            //border tabel
            $styleArray = array(
                'borders' => array(
                    'allborders' => array(
                        'style' => PHPExcel_Style_Border::BORDER_THIN
                    )
                )
            );
            $objPHPExcel->getActiveSheet()->getStyle('A1:P'.$maxrow)->applyFromArray($styleArray);
            $objPHPExcel->getActiveSheet()->getStyle('A1:P1')->getFont()->setBold(true);
            //set title pada sheet (me rename nama sheet)
            $objPHPExcel->getActiveSheet()->setTitle('Excel Pertama');
 
            //mulai menyimpan excel format xlsx, kalau ingin xls ganti Excel2007 menjadi Excel5          
            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
 
            //sesuaikan headernya 
            header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
            header("Cache-Control: no-store, no-cache, must-revalidate");
            header("Cache-Control: post-check=0, pre-check=0", false);
            header("Pragma: no-cache");
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            //ubah nama file saat diunduh
            header('Content-Disposition: attachment;filename="Excel_Request.xlsx"');
            //unduh file
            $objWriter->save("php://output");
        }
    else
        {
            //If no session, redirect to login page
            redirect('UserPage/login', 'refresh');
        }
    }
}
