<?php
class Model_request extends CI_model{
    
    
    function getAll(){
        // mereturn seluruh data dari tabel siswa
        return $this->db->get('t_request');
    }


    function request(){
    	$this->db->select('*');
		$this->db->from('t_request AS t1');
		$this->db->join('t_doc_req_data AS t2', 't1.id = t2.id_req');

		$query = $this->db->get();
        return $query;
    }

    function my_request($nik){

    	$this->db->select('*');
		$this->db->from('t_request AS t1');
		$this->db->join('t_doc_req_data AS t2', 't1.id = t2.id_req');
		$this->db->where('t1.nik_pemohon',$nik);
		

		$query = $this->db->get();
        return $query;
    }

    function addRequest($daba,$data)
	{
		//untuk insert data ke database
		if(isset($_POST['simpan'])) {
			$this->db->insert($daba, $data);
			$notif['info'] = 'Berhasil Menyimpan';
			
		}
		$notif['info'] = 'Gagal menyimpan';
	}
}


