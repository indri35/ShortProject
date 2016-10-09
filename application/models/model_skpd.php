<?php
class Model_skpd extends CI_model{
    
    
    function getAllPendingReq(){
        // mereturn seluruh data dari tabel t-request
         return $this->db->query("SELECT * FROM t_doc_req_data WHERE berkas_upload IS NULL;");
    }

    function getAllSentReq(){
         return $this->db->query("SELECT * FROM t_doc_req_data WHERE berkas_upload IS NOT NULL;");
    }

    function getAllReq(){
         return $this->db->get('t_request');
    } 

    function getAllDoc($kode_skpd){
         return $this->db->get_where('t_dokumen',array('kode_skpd'=>$kode_skpd));
    }

    function request($id){
        return $this->db->get_where('t_request',array('id'=>$id));
    }

    function tanggapi($id){
        return $this->db->get_where('t_request',array('id'=>$id));
    }

    function dokumen($id){
        return $this->db->get_where('t_dokumen',array('id'=>$id));
    }

    function profile($id){
        return $this->db->get_where('t_user',array('id'=>$id));
    }

    function respon($daba,$data)
    {
        //untuk insert data ke database
        if(isset($_POST['simpan'])) {
            $this->db->insert($daba, $data);
            $notif['info'] = 'Berhasil Menyimpan';
            
        }
        $notif['info'] = 'Gagal menyimpan';
    }
}


