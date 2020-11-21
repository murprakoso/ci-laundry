<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Item extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model('Item_model');
	}

	public function index()
	{
		// kodisi pilih kiloan atau satuan
		$keyword = $this->input->get('list');
		if ($keyword == 'semua') {
			$list = null;
		} elseif ($keyword == 'kilo') {
			$list = 2;
		} elseif ($keyword == 'satuan') {
			$list = 1;
		} else {
			$list = null;
		}

		$data = [
			'title' => 'Data Item',
			'active' => $list, // tombol aktif
			'content' => 'datamaster/v_item',
			'items' => $this->Item_model->getItem($list)
		];
		$this->load->view('layout/wrapper', $data);
	}

	public function save()
	{
		$nama = htmlspecialchars($this->input->post('nama'));
		$tipe = htmlspecialchars($this->input->post('tipe'));
		$harga = htmlspecialchars($this->input->post('harga'));
		$diskon = htmlspecialchars($this->input->post('diskon'));

		if ($this->Item_model->insertItem($nama, $tipe, $harga, $diskon)) {
			$this->session->set_flashdata('success', 'Item berhasil ditambahkan!');
		}
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function update()
	{
		$itemId = $this->input->post('id');
		$nama = htmlspecialchars($this->input->post('nama'));
		$tipe = htmlspecialchars($this->input->post('tipe'));
		$harga = htmlspecialchars($this->input->post('harga'));
		$diskon = htmlspecialchars($this->input->post('diskon'));

		if ($this->Item_model->updateItem($nama, $tipe, $harga, $diskon, $itemId)) {
			$this->session->set_flashdata('success', 'Item berhasil diupdate!');
		}
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function delete($itemId)
	{
		if ($this->Item_model->deleteItem($itemId)) {
			$this->session->set_flashdata('success', 'Item berhasil dihapus!');
		}
		redirect($_SERVER['HTTP_REFERER']);
	}
}

/* End of file Item.php */
