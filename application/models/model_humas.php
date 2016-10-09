<?php
class Model_humas extends CI_model{
    
    
    function getAllPendingReq(){
        // mereturn seluruh data dari tabel t-request
         return $this->db->query("SELECT * FROM t_doc_req_data WHERE berkas_upload IS NULL;");
    }

    function getAllSentReq(){
         return $this->db->query("SELECT * FROM t_doc_req_data WHERE berkas_upload IS NOT NULL;");
    }

    function tanggapi($id_req){
        return $this->db->get_where('t_doc_req',array('id_req'=>$id_req));
    }

    function getAllReq(){
         return $this->db->get('t_doc_req_data');
    } 

    function getAllDoc(){
         return $this->db->get('t_dokumen');
    }

    function getAllUser(){
         return $this->db->get('t_user');
    }

    function getAllSkpd(){
         return $this->db->get('t_skpd');
    }

    function request($id){
        return $this->db->get_where('t_request',array('id'=>$id));
    }

    function user($id){
        return $this->db->get_where('t_user',array('id'=>$id));
    }

}


