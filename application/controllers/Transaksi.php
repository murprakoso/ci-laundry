<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{

	public $userId;
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Transaksi_model');
		$this->load->model('Kasmasuk_model');
		$this->load->model('Item_model');
		$this->load->library('dompdf_gen');
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
		if ($this->input->post('status')) {
			$status = $this->input->post('status');
			$transaksi = $this->Transaksi_model->getTransaksiByStatus($status);
		} else {
			$transaksi = $this->Transaksi_model->getTransaksi();
		}

		$data = [
			'transaksi' => $transaksi, //panggil fungsi select semua kas masuk
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

	public function getTransaksi()
	{
		$transaksiId = $this->input->post('transaksiId');
		$transaksi = $this->Transaksi_model->getTransaksiById($transaksiId)->row_array();
		echo json_encode($transaksi);
	}


	public function save()
	{
		// echo 'tambah';
		// die;
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

	public function update()
	{
		$transaksiId = $this->input->post('transaksi_id');
		$status = $this->input->post('status');
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

		if ($this->Transaksi_model->updateTransaksi($tanggal, $pelanggan, $telp, $tipe, $berat, $itemId, $keterangan, $harga, $total, $this->userId, $transaksiId, $status)) {
			$this->session->set_flashdata('success', 'Data transaksi berhasil diupdate!');
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
			$status = $this->input->post('status');
			if ($status == 4) {
				$data = [
					'tipe' => $this->input->post('tipe'),
					'berat' => $this->input->post('berat'),
					'nama_pelanggan' => $this->input->post('pelanggan'),
					'telp' => $this->input->post('telp'),
					'keterangan' => $this->input->post('keterangan'),
					'tanggal' => $this->input->post('tanggal'),
					'kas_user_id' => $this->input->post('user_id'),
					'harga' => $this->input->post('harga'),
					'total' => $this->input->post('total'),
				];
				$this->Kasmasuk_model->insertKas($data);
			}
			$this->session->set_flashdata('success', 'Status transaksi diupdate!');
		}
		redirect('transaksi');
	}



	// **
	// cetak nota transaksi
	// *
	public function cetak_nota()
	{
		$transaksiId = $this->input->post('transaksi_id');

		$data['transaksi'] = $this->Transaksi_model->cetakNotaTransaksi($transaksiId);

		$this->load->view('transaksi/export/cetak_nota', $data);

		$paper_size = 'A4';
		$orientation = 'potrait';
		$html = $this->output->get_output();

		$this->dompdf->set_paper($paper_size, $orientation);

		$this->dompdf->load_html($html);
		$this->dompdf->render();
		ob_end_clean();
		$this->dompdf->stream("nota_transaksi.pdf", array('Attachment' => 0));
	}
}

/* End of file Transaksi.php */
