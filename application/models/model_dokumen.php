<?php
class Model_dokumen extends CI_model{
    
    
    function getAll(){
        // mereturn seluruh data dari tabel siswa
        return $this->db->get('t_dokumen');
    }


    function request($id){
        return $this->db->get_where('t_dokumen',array('id'=>$id));
    }
}


