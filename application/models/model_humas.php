<?php
class Model_humas extends CI_model{
    
    
    function getAllPendingReq(){
        // mereturn seluruh data dari tabel t-request
         return $this->db->query("SELECT * FROM t_request WHERE response_at IS NULL;");
    }

    function getAllSentReq(){
         return $this->db->query("SELECT * FROM t_request WHERE response_at IS NOT NULL;");
    }

    function getAllReq(){
         return $this->db->get('t_request');
    } 

    function getAllDoc(){
         return $this->db->get('t_dokumen');
    }

    function getAllUser(){
         return $this->db->get('t_user');
    }

    function request($id){
        return $this->db->get_where('t_request',array('id'=>$id));
    }

    function tanggapi($id){
        return $this->db->get_where('t_request',array('id'=>$id));
    }
}

