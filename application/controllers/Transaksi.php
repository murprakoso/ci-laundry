<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{

	public $userId;
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Transaksi_model');
		$this->load->model('Item_model');
		is_logged_in();

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
			'transaksi' => $this->Transaksi_model->getTransaksi(), //panggil fungsi select semua kas masuk
			// 'items' => $this->Item_model->getItemByTipe(), //panggil item
			'title' => 'Transaksi',
			'content' => 'transaksi/v_transaksi'
		];
		$this->load->view('layout/wrapper', $data);
	}

	// **
	// Ambil item berdasarkan tipe untuk ditampilkan di tambah transaksi
	// *
	public function getItem()
	{
		$tipe = $this->input->post('tipe');
		$items = $this->Item_model->getItemByTipe($tipe);
		echo json_encode($items);
	}


	public function save()
	{
		$tanggal = htmlspecialchars($this->input->post('tanggal'));
		$pelanggan = htmlspecialchars($this->input->post('nama'));
		$telp = htmlspecialchars($this->input->post('telp'));
		$tipe = htmlspecialchars($this->input->post('tipe')); // item_tipe
		$berat = htmlspecialchars($this->input->post('berat'));
		$itemId = $this->input->post('item'); //item_id
		$keterangan = htmlspecialchars($this->input->post('keterangan'));

		if ($tipe == 1) {
			$row = $this->Item_model->getItemById($itemId)->row_array();
			$harga = $row['item_harga'];
			$diskon = $row['item_diskon'];
			$berat = '';

			// cek apakah ada potongan harga
			if (!empty($diskon)) {
				$total = $harga - $diskon;
			} else {
				$total = $harga;
			}
		} elseif ($tipe == 2) {
			$row = $this->Item_model->getItemById($itemId)->row_array();
			$harga = $row['item_harga'];
			$diskon = $row['item_diskon'];

			// cek apakah ada potongan harga
			if (!empty($diskon)) {
				$total = $harga * $berat - $diskon;
			} else {
				$total = $harga * $berat;
			}
		}

		if ($this->Transaksi_model->insertTransaksi($tanggal, $pelanggan, $telp, $tipe, $berat, $itemId, $keterangan, $harga, $total, $this->userId)) {
			$this->session->set_flashdata('success', 'Transaksi baru berhasil ditambahkan!');
		}
		redirect('transaksi');
	}


	public function delete($transaksiId)
	{
		if ($this->Transaksi_model->deleteTransaksi($transaksiId)) {
			$this->session->set_flashdata('success', 'Transaksi berhasil dihapus!');
		}
		redirect('transaksi');
	}


	public function update_status()
	{
		if ($this->Transaksi_model->updateStatusTransaksi()) {
			$this->session->set_flashdata('success', 'Status transaksi diupdate!');
		}
		redirect('transaksi');
	}
}

/* End of file Transaksi.php */
