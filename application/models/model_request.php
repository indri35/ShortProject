<?php
class Model_request extends CI_model{
    
    
    function getAll(){
        // mereturn seluruh data dari tabel siswa
        return $this->db->get('t_request');
    }
  
//request function
    function request(){
    	$this->db->select('*');
		$this->db->from('t_request AS t1');
		$this->db->join('t_doc_req_data AS t2', 't1.id = t2.id_req');

		$query = $this->db->get();
        return $query;
    }

    function request_detail($no_req){

    	$this->db->select('*');
		$this->db->from('t_request AS t1');
		$this->db->join('t_doc_req_data AS t2', 't1.id = t2.id_req');
		$this->db->where('t2.no_req',$no_req);

		$query = $this->db->get();
        return $query;
    }

    function request_all($nik){

    	$this->db->select('*');
		$this->db->from('t_request AS t1');
		$this->db->join('t_doc_req_data AS t2', 't1.id = t2.id_req');
		$this->db->where('t1.nik_pemohon',$nik);
		$this->db->order_by("t2.id_req","desc");

		$query = $this->db->get();
        return $query;
    }

    function request_ditanggapi($nik){

    	$this->db->select('*');
		$this->db->from('t_doc_req_data AS t1');
		$this->db->where('t1.nik_pemohon',$nik);
		$this->db->where('t1.berkas_upload is NOT NULL', NULL, FALSE);
		$this->db->where('t1.form_keberatan', NULL, TRUE);
		$this->db->order_by("t1.no_req","desc");		

		$query = $this->db->get();
        return $query;
    }

    function request_belum_ditanggapi($nik){

    	$this->db->select('*');
		$this->db->from('t_doc_req_data AS t1');
		$this->db->where('t1.nik_pemohon',$nik);
		$this->db->where('t1.berkas_upload', NULL, TRUE);
		$this->db->where('t1.form_keberatan', NULL, TRUE);
		$this->db->where('t1.pesan_tolak', NULL, TRUE);
		$this->db->order_by("t1.no_req","desc");		

		$query = $this->db->get();
        return $query;
    }

    function request_ditolak($nik){

    	$this->db->select('*');
		$this->db->from('t_doc_req_data AS t1');
		$this->db->where('t1.nik_pemohon',$nik);
		$this->db->where('t1.pesan_tolak is NOT NULL', NULL, FALSE);
		$this->db->where('t1.form_keberatan', NULL, TRUE);
		$this->db->order_by("t1.no_req","desc");		

		$query = $this->db->get();
        return $query;
    }

    function dengan_keberatan($nik){

    	$this->db->select('*');
		$this->db->from('t_doc_req_data AS t1');
		$this->db->join('t_doc_req AS t2', 't1.no_req = t2.no_req');
		$this->db->where('t1.nik_pemohon',$nik);
		$this->db->where('t1.form_keberatan is NOT NULL', NULL, FALSE);
		$this->db->order_by("t1.no_req","desc");		

		$query = $this->db->get();
        return $query;		

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

	function RequestKeberatan($daba,$data, $no_req)
	{
		//untuk insert data ke database
		if(isset($_POST['simpan'])) {
			$this->db->where($no_req);
			$this->db->update($daba, $data);
			$notif['info'] = 'Berhasil Menyimpan';
			
		}
		$notif['info'] = 'Gagal menyimpan';
	}
}


