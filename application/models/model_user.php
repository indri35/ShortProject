<?php
class Model_user extends CI_model{
    
    
    function addUser($daba,$data)
	{
		//untuk insert data ke database
		if(isset($_POST['simpan'])) {
			$this->db->insert($daba, $data);
			$notif['info'] = 'Berhasil Menyimpan';
			
		}
		$notif['info'] = 'Gagal menyimpan';
	}

	function editProfil($daba,$data,$id)
	{	
		if(isset($_POST['simpan'])) {
			$this->db->where($id);
			$this->db->update($daba, $data);
			$notif['info'] = 'Berhasil Menyimpan';
			
		}
		$notif['info'] = 'Gagal menyimpan';
	}
	
}



