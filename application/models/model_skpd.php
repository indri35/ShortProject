<?php
class Model_skpd extends CI_model{
    
    
    function getAll(){
        // mereturn seluruh data dari tabel siswa
        return $this->db->get('t_request');
    }


    function request($id){
        return $this->db->get_where('t_request',array('id'=>$id));
    }
}


