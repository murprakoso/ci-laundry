<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kas_keluar extends CI_Controller
{
	public $userId;
	public function __construct()
	{
		parent::__construct();
		error_reporting(0);
		is_logged_in();
		$this->load->model('Kaskeluar_model', 'kaskeluar_model');
		$this->load->model('Rekap_model', 'rekap_model');

		// ambil session user
		if (!empty($this->session->userdata('user_name'))) {
			$this->userId = $this->session->userdata('user_id');
		} else {
			is_logged_in();
		}
	}


	public function index()
	{
		$data = [
			'title' => 'Kas Keluar',
			'content' => 'datamaster/v_kas_keluar'
		];
		$data['kaskeluar'] = $this->kaskeluar_model->getKasKeluar();

		$this->load->view('layout/wrapper', $data);
	}


	public function save()
	{
		$tanggal = htmlspecialchars($this->input->post('tanggal', TRUE), ENT_QUOTES);
		$banyaknya = htmlspecialchars($this->input->post('banyaknya', TRUE), ENT_QUOTES);
		$namaToko = htmlspecialchars($this->input->post('nama_toko', TRUE), ENT_QUOTES);
		$telp = htmlspecialchars($this->input->post('telp', TRUE), ENT_QUOTES);
		$keterangan = htmlspecialchars($this->input->post('keterangan', TRUE), ENT_QUOTES);
		$harga = htmlspecialchars($this->input->post('harga', TRUE), ENT_QUOTES);

		if ($this->kaskeluar_model->insertKas($this->userId, $tanggal, $banyaknya, $namaToko, $telp, $keterangan, $harga)) {
			$this->session->set_flashdata('success', 'Data berhasil ditambahkan!');
		}
		redirect('kas-keluar');
	}


	public function update()
	{
		$kaskeluarId = $this->input->post('kas_id', TRUE);
		$tanggal = htmlspecialchars($this->input->post('tanggal', TRUE), ENT_QUOTES);
		$banyaknya = htmlspecialchars($this->input->post('banyaknya', TRUE), ENT_QUOTES);
		$namaToko = htmlspecialchars($this->input->post('nama_toko', TRUE), ENT_QUOTES);
		$telp = htmlspecialchars($this->input->post('telp', TRUE), ENT_QUOTES);
		$keterangan = htmlspecialchars($this->input->post('keterangan', TRUE), ENT_QUOTES);
		$harga = htmlspecialchars($this->input->post('harga', TRUE), ENT_QUOTES);

		if ($this->kaskeluar_model->updateKas($this->userId, $tanggal, $banyaknya, $namaToko, $telp, $keterangan, $harga, $kaskeluarId)) {
			$this->session->set_flashdata('success', 'Data berhasil diubah!');
		}
		redirect('kas-keluar');
	}


	public function delete($kaskeluarId)
	{
		if ($this->kaskeluar_model->deleteKas($kaskeluarId)) {
			$this->session->set_flashdata('success', 'Data berhasil dihapus!');
		}
		redirect('kas-keluar');
	}

	// hapus data dari checkbox
	public function deletes()
	{
		$kaskeluarId = $this->input->post('kaskeluar_id', TRUE);
		if (!empty($kaskeluarId)) {
			if ($this->kaskeluar_model->deleteMultiple($kaskeluarId)) {
				$this->session->set_flashdata('success', 'Data berhasil dihapus!');
			}
			redirect('kas-keluar');
		} else {
			$this->session->set_flashdata('warning', 'Harap pilih data!');
			redirect('kas-keluar');
		}
	}
}

/* End of file  */
