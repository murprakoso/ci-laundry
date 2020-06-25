<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Item extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Item_model');
	}

	public function index()
	{
		$data = [
			'title' => 'Data Item',
			'content' => 'datamaster/v_item',
			'items' => $this->Item_model->getItem()
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
		redirect('item');
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
		redirect('item');
	}

	public function delete($itemId)
	{
		if ($this->Item_model->deleteItem($itemId)) {
			$this->session->set_flashdata('success', 'Item berhasil dihapus!');
		}
		redirect('item');
	}
}

/* End of file Item.php */
