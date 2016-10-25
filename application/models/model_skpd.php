<?php
class Model_skpd extends CI_model{
    
    
    function getAllPendingReq($kode_skpd){
        // mereturn seluruh data dari tabel t-request
         return $this->db->query("SELECT * FROM t_doc_req_data WHERE NULLIF(berkas_upload, ' ') IS NULL AND pesan_tolak IS NULL AND kode_skpd='$kode_skpd';");
    }

    function getAllSentReq($kode_skpd){
         return $this->db->query("SELECT * FROM t_doc_req_data WHERE berkas_upload !='' AND kode_skpd='$kode_skpd' ;");
    }

    function getAllReq($kode_skpd){
         return $this->db->get_where('t_doc_req_data',array('kode_skpd'=>$kode_skpd));
    } 

    function getAllDoc($kode_skpd){
         return $this->db->get_where('t_dokumen',array('kode_skpd'=>$kode_skpd));
    }

    function getAllCom($kode_skpd){
         return $this->db->query("SELECT * FROM t_doc_req_data WHERE form_keberatan !='' AND date_upload_keberatan IS NULL AND kode_skpd='$kode_skpd' ;");
    }

    function request($id){
        return $this->db->get_where('t_request',array('id'=>$id));
    }

    function show($id){
        return $this->db->get_where('t_doc_req_data',array('no_req'=>$id));
    }

    function tanggapi($id){
        return $this->db->get_where('t_request',array('id'=>$id));
    }

    function dokumen($id){
        return $this->db->get_where('t_dokumen',array('id'=>$id));
    }

    function pemohon($nik){
        return $this->db->get_where('t_user',array('nik'=>$nik));
    }

    function profile($id){
        return $this->db->get_where('t_user',array('id'=>$id));
    }

    function editProfile($daba,$data,$id)
    {   
        if(isset($_POST['simpan'])) {
            $this->db->where($id);
            $this->db->update($daba, $data);
            $notif['info'] = 'Berhasil Menyimpan';
            
        }
        $notif['info'] = 'Gagal menyimpan';
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


