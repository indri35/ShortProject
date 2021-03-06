<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dokumen extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Dokumen_model','dokumen');
	}

	public function index()
	{
		$this->load->helper('url');
		$this->load->view('dokumen_view');
	}

	public function ajax_list()
	{
		$this->load->helper('url');

		$list = $this->dokumen->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $dokumen) {
			$no++;
			$row = array();
			$row[] = '<input type="checkbox" class="data-check" value="'.$dokumen->id.'">';
			$row[] = $dokumen->kode_berkas;
			$row[] = $dokumen->nama_berkas;
			$row[] = $dokumen->kategori;
			$row[] = $dokumen->deskripsi;
			$row[] = $dokumen->kode_skpd;

			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_dokumen('."'".$dokumen->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_dokumen('."'".$dokumen->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->dokumen->count_all(),
						"recordsFiltered" => $this->dokumen->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->dokumen->get_by_id($id);
		$data->kode_skpd = ($data->kode_skpd == '0000-00-00') ? '' : $data->kode_skpd; // if 0000-00-00 set tu empty for datepicker compatibility
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$this->_validate();
		
		$data = array(
				'kode_berkas' => $this->input->post('kode_berkas'),
				'nama_berkas' => $this->input->post('nama_berkas'),
				'kategori' => $this->input->post('kategori'),
				'deskripsi' => $this->input->post('deskripsi'),
				'kode_skpd' => $this->input->post('kode_skpd'),
			);

		$insert = $this->dokumen->save($data);

		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$this->_validate();
		$data = array(
				'kode_berkas' => $this->input->post('kode_berkas'),
				'nama_berkas' => $this->input->post('nama_berkas'),
				'kategori' => $this->input->post('kategori'),
				'deskripsi' => $this->input->post('deskripsi'),
				'kode_skpd' => $this->input->post('kode_skpd'),
			);
		$this->dokumen->update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->dokumen->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_bulk_delete()
	{
		$list_id = $this->input->post('id');
		foreach ($list_id as $id) {
			$this->dokumen->delete_by_id($id);
		}
		echo json_encode(array("status" => TRUE));
	}

	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('kode_berkas') == '')
		{
			$data['inputerror'][] = 'kode_berkas';
			$data['error_string'][] = 'First name is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('nama_berkas') == '')
		{
			$data['inputerror'][] = 'nama_berkas';
			$data['error_string'][] = 'Last name is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('kode_skpd') == '')
		{
			$data['inputerror'][] = 'kode_skpd';
			$data['error_string'][] = 'Date of Birth is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('kategori') == '')
		{
			$data['inputerror'][] = 'kategori';
			$data['error_string'][] = 'Please select kategori';
			$data['status'] = FALSE;
		}

		if($this->input->post('deskripsi') == '')
		{
			$data['inputerror'][] = 'deskripsi';
			$data['error_string'][] = 'Addess is required';
			$data['status'] = FALSE;
		}

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}

}
