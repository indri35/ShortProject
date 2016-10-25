<?php
class Model_dokumen extends CI_model{
    
    
    function getAll(){
        // mereturn seluruh data dari tabel siswa
        $this->db->select('*');
		$this->db->from('t_dokumen AS t1');
		$this->db->where('t1.kategori !=','Dikecualikan');

		$query = $this->db->get();
        return $query;
    }


    function request($id){
        return $this->db->get_where('t_dokumen',array('id'=>$id));
    }
}


