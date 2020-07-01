<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Item_model extends CI_Model
{

	private $_table = "tbl_item";

	// ambil data kas masuk
	public function getItem()
	{
		$query = $this->db->order_by('item_id', 'DESC');
		$query = $this->db->get($this->_table);
		return $query;
	}


	public function getItemById($itemId)
	{
		return $this->db->get_where($this->_table, array('item_id' => $itemId));
	}


	public function getItemByTipe($tipe)
	{
		$query = $this->db->select('*')
			->from($this->_table)
			->where('item_tipe', $tipe)
			->get();
		return $query->result();
	}


	public function insertItem($nama, $tipe, $harga, $diskon)
	{
		$data = [
			'item_nama' => $nama,
			'item_tipe' => $tipe,
			'item_harga' => $harga,
			'item_diskon' => $diskon
		];
		if ($this->db->insert($this->_table, $data)) {
			return true;
		}
	}


	public function updateItem($nama, $tipe, $harga, $diskon, $itemId)
	{
		$data = [
			'item_nama' => $nama,
			'item_tipe' => $tipe,
			'item_harga' => $harga,
			'item_diskon' => $diskon
		];
		$this->db->where('item_id', $itemId);
		if ($this->db->update($this->_table, $data)) {
			return true;
		}
	}


	public function deleteItem($itemId)
	{
		$this->db->where('item_id', $itemId);
		if ($this->db->delete($this->_table)) {
			return true;
		}
	}
}

/* End of file Item_model.php */
