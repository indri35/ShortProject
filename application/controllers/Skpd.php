<?php
class Skpd extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        // meload model skpd
        $this->load->model(array('model_skpd'));
        $this->load->helper(array('form', 'url'));
    }
    
    public function index(){
        if($this->session->userdata('skpd'))
            {   
                $skpd= $this->session->userdata('kode_skpd');
                // menyimpan data permohonan dokumen untuk dipassing ke vie
                $a = $this->model_skpd->getAllPendingReq($skpd);
                $b = $this->model_skpd->getAllSentReq($skpd);
                $c = $this->model_skpd->getAllReq($skpd);
                $d = $this->model_skpd->getAllDoc($skpd);
                $e = $this->model_skpd->getAllCom($skpd);
                $data= array( 'request'=> $a, 'sent' => $b,'all'=> $c,'dokumen'=> $d,'complain'=> $e);
                
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
        if($this->session->userdata('skpd'))
            { 
            $skpd= $this->session->userdata('kode_skpd');
            $data['document']=$this->model_skpd->getAllDoc($skpd);
            
            $this->load->view('skpd/header');
            $this->load->view('skpd/document',$data);
            $this->load->view('skpd/footer');
            }
        else
            {
                //If no session, redirect to login page
                redirect('UserPage/login', 'refresh');
            }

    }

    public function profile(){
    if($this->session->userdata('skpd'))
        { 
            $this->load->model('model_skpd');
            $id = $this->uri->segment(3);
            $data['profile'] = $this->model_skpd->profile($id)->row_array();

            $this->load->view('skpd/header');
            $this->load->view('skpd/profile',$data);
            $this->load->view('skpd/footer');
        }
    else
            {
                //If no session, redirect to login page
                redirect('UserPage/login', 'refresh');
            }
    }

    public function pendingRequest(){
    if($this->session->userdata('skpd'))
        {   
            $skpd= $this->session->userdata('kode_skpd');
            $data['pending']=$this->model_skpd->getAllPendingReq($skpd);

            $this->load->view('skpd/header');
            $this->load->view('skpd/pending',$data);
            $this->load->view('skpd/footer');
        }
     else
        {
            //If no session, redirect to login page
            redirect('UserPage/login', 'refresh');
        }

    }

    public function sentRequest(){
    if($this->session->userdata('skpd'))
        { 
            $skpd= $this->session->userdata('kode_skpd');
            $data['sents']=$this->model_skpd->getAllSentReq($skpd);
            
            $this->load->view('skpd/header');
            $this->load->view('skpd/sent',$data);
            $this->load->view('skpd/footer');
        }
    else
        {
            //If no session, redirect to login page
            redirect('UserPage/login', 'refresh');
        }
    }

    public function complain(){
    if($this->session->userdata('skpd'))
        { 
            $skpd= $this->session->userdata('kode_skpd');
            $data['comp']=$this->model_skpd->getAllCom($skpd);
            
            $this->load->view('skpd/header');
            $this->load->view('skpd/complain',$data);
            $this->load->view('skpd/footer');
        }
    else
        {
            //If no session, redirect to login page
            redirect('UserPage/login', 'refresh');
        }
    }

    public function tanggapi(){
    if($this->session->userdata('skpd'))
        { 
            $this->load->model('model_skpd');
            $id = $this->uri->segment(3);
            $a['reqs'] = $this->model_skpd->tanggapi($id)->row_array();

            $skpd= $this->session->userdata('kode_skpd');
            $b['doc']=$this->model_skpd->getAllDoc($skpd);

            $data = array_merge($a, $b);

            $this->load->view('skpd/header');
            $this->load->view('skpd/tanggapi',$data);
            $this->load->view('skpd/footer');
        }
    else
        {
            //If no session, redirect to login page
            redirect('UserPage/login', 'refresh');
        }
    }

    public function tanggapi_keberatan(){
    if($this->session->userdata('skpd'))
        { 
            $this->load->model('model_skpd');
            $id = $this->uri->segment(3);
            $a['reqs'] = $this->model_skpd->tanggapi($id)->row_array();

            $skpd= $this->session->userdata('kode_skpd');
            $b['doc']=$this->model_skpd->getAllDoc($skpd);

            $data = array_merge($a, $b);

            $this->load->view('skpd/header');
            $this->load->view('skpd/tanggapi_keberatan',$data);
            $this->load->view('skpd/footer');
        }
    else
        {
            //If no session, redirect to login page
            redirect('UserPage/login', 'refresh');
        }
    }

    public function update(){
    if($this->session->userdata('skpd'))
        { 
            $id = $this->input->post('id');
            $data = array(
                ''=>$this->input->post('nik_pemohon'),
                'response_at'=>$this->input->post('response_at')
                );

            $this->db->where('id',$id);
            $this->db->update('t_request',$data);
            redirect('skpd');
        }
    else
        {
            //If no session, redirect to login page
            redirect('UserPage/login', 'refresh');
        }
    }

    public function tolak(){
    if($this->session->userdata('skpd'))
        { 
            $no_req = $this->input->post('no_req');
            $data = array(
                'date_upload'=> $this->input->post('date_upload'),
                'pesan_tolak' => $this->input->post('pesan')
                );

            $this->db->where('no_req',$no_req);
            $this->db->update('t_doc_req',$data);
            redirect('skpd');
        }
    else
        {
            //If no session, redirect to login page
            redirect('UserPage/login', 'refresh');
        }
    }

    public function do_upload(){
    if($this->session->userdata('skpd'))
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
                $gambar_value = FALSE;
                $this->session->set_flashdata('something', 'Tanggapi, Upload file gagal!');
            }
            else{
                $data = array('upload_data' => $this->upload->data());
                $gambar_value = $this->input->post('gambar_value');
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

            $this->db->query("UPDATE t_doc_req SET date_upload='$date_upload', berkas_upload='$gambar_value',  pesan='$pesan'  WHERE no_req='$no_req';");

            redirect('skpd'); //redirect page ke halaman utama controller products      
            
        }
    else
        {
            //If no session, redirect to login page
            redirect('UserPage/login', 'refresh');
        }
    }

    public function do_upload_keberatan(){
    if($this->session->userdata('skpd'))
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
                $data = array('upload_data' => $this->upload->data());
                $gambar_value = $this->input->post('gambar_value');
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

            $this->db->query("UPDATE t_doc_req SET date_upload_keberatan='$date_upload', berkas_upload='$gambar_value',  pesan='$pesan'  WHERE no_req='$no_req';");

            redirect('skpd'); //redirect page ke halaman utama controller products      
            
        }
    else
        {
            //If no session, redirect to login page
            redirect('UserPage/login', 'refresh');
        }
    }

    public function logout(){
    if($this->session->userdata('skpd'))
        {
            $this->session->unset_userdata('skpd');
            session_destroy();
            redirect('UserPage/', 'refresh');
        }
    else
        {
            //If no session, redirect to login page
            redirect('UserPage/login', 'refresh');
        }
    }


    public function show(){
    if($this->session->userdata('skpd'))
        {
            $this->load->model('model_skpd');
            $nik = $this->uri->segment(3);
            $a['data'] = $this->model_skpd->pemohon($nik)->row_array();

            $id = $this->uri->segment(4);
            $b['req'] = $this->model_skpd->show($id)->row_array();

            $merge = array_merge($a, $b);

            $this->load->view('skpd/headerform');
            $this->load->view('skpd/showdetail',$merge);
            $this->load->view('skpd/footerform');
        }
    else
        {
            //If no session, redirect to login page
            redirect('UserPage/login', 'refresh');
        }
    }

    public function create(){
    if($this->session->userdata('skpd'))
        {
            $this->load->view('skpd/header');
            $this->load->view('skpd/create');
            $this->load->view('skpd/footer');
        }
    else
        {
            //If no session, redirect to login page
            redirect('UserPage/login', 'refresh');
        }
    }

    public function store(){
    if($this->session->userdata('skpd'))
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
            }
            else{
                $data = array('upload_data' => $this->upload->data());
                $gambar_value = $this->input->post('gambar_value');
            }
                    
            // selesai upload foto, berikut adalah input database
            $data = array(
                'kode_berkas'       =>  $this->input->post('kode_berkas'),
                'upload_at'      =>  $this->input->post('upload_at'),
                'nama_berkas'    =>  $this->input->post('nama_berkas'),
                'berkas' => $gambar_value,
                'kategori'    =>  $this->input->post('kategori'),
                'deskripsi'    =>  $this->input->post('deskripsi'),
                'kode_skpd'    =>  $this->input->post('kode_skpd')
                );

            $this->db->insert('t_dokumen',$data);
            
            redirect('skpd/document'); 
        }
    else
        {
            //If no session, redirect to login page
            redirect('UserPage/login', 'refresh');
        } 
    }

    public function edit(){
    if($this->session->userdata('skpd'))
        {
            $this->load->model('model_skpd');
            $id = $this->uri->segment(3);
            $data['docs'] = $this->model_skpd->dokumen($id)->row_array();

            $this->load->view('skpd/header');
            $this->load->view('skpd/edit',$data);
            $this->load->view('skpd/footer');
        }
    else
        {
            //If no session, redirect to login page
            redirect('UserPage/login', 'refresh');
        }
    }

    public function updatee(){
    if($this->session->userdata('skpd'))
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
            }
            else{
                $data = array('upload_data' => $this->upload->data());
                $gambar_value = $this->input->post('gambar_value');
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
            redirect('skpd/document');
        }
    else
        {
            //If no session, redirect to login page
            redirect('UserPage/login', 'refresh');
        }
    }

    public function delete(){
    if($this->session->userdata('skpd'))
        {
            $id = $this->uri->segment(3);
            $this->db->where('id',$id);
            $this->db->delete('t_dokumen');
            redirect('skpd/document');
        }
    else
        {
            //If no session, redirect to login page
            redirect('UserPage/login', 'refresh');
        }
    }

    public function exportExcelDoc(){
    if($this->session->userdata('skpd'))
        {
            $skpd= $this->session->userdata('kode_skpd');
            $data=$this->model_skpd->getAllDoc($skpd);
          
            $this->load->library("PHPExcel/Classes/PHPExcel");
 
            //membuat objek PHPExcel
            $objPHPExcel = new PHPExcel();

            //membuat heading
            $heading=array('No','Kode berkas','Tanggal unggah','Nama berkas','Berkas','Kategori','Deskripsi','Milik SKPD');

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
                                        ->setCellValue('B'.$row, $dat->kode_berkas)
                                        ->setCellValue('C'.$row, $dat->upload_at)
                                        ->setCellValue('D'.$row, $dat->nama_berkas)
                                        ->setCellValue('E'.$row, $dat->berkas)
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
            header('Content-Disposition: attachment;filename="Excel_Document.xlsx"');
            //unduh file
            $objWriter->save("php://output");
        }
    else
        {
            //If no session, redirect to login page
            redirect('UserPage/login', 'refresh');
        }
    }

    public function exportExcelReq(){
    if($this->session->userdata('skpd'))
        {
            $skpd= $this->session->userdata('kode_skpd');
            $data=$this->model_skpd->getAllReq($skpd);
          
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
