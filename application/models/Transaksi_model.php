<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi_model extends CI_Model
{
	private $_table = "tbl_transaksi";

	public function getTransaksi()
	{
		$query = $this->db->select('*')
			->from($this->_table)
			->join('tbl_user', 'tbl_user.user_id = tbl_transaksi.user_id')
			->join('tbl_item', 'tbl_item.item_id = tbl_transaksi.item_id')
			->order_by('transaksi_id', 'DESC')
			->get();
		return $query;
	}

	public function getTransaksiById($transaksiId)
	{
		$query = $this->db->select('*')
			->from($this->_table)
			->where('transaksi_id', $transaksiId)
			->get();
		return $query;
	}

	public function cetakNotaTransaksi($transaksiId)
	{
		$query = $this->db->select('*')
			->from($this->_table)
			->join('tbl_user', 'tbl_user.user_id = tbl_transaksi.user_id')
			->join('tbl_item', 'tbl_item.item_id = tbl_transaksi.item_id')
			->where('transaksi_id', $transaksiId)
			->get();
		return $query;
	}

	// tampilkan data transaksi berdasarkan status
	public function getTransaksiByStatus($status)
	{
		$query = $this->db->select('*')
			->from($this->_table)
			->join('tbl_user', 'tbl_user.user_id = tbl_transaksi.user_id')
			->join('tbl_item', 'tbl_item.item_id = tbl_transaksi.item_id')
			->where('status', $status)
			->order_by('transaksi_id', 'DESC')
			->get();
		return $query;
	}


	public function insertTransaksi($tanggal, $pelanggan, $telp, $tipe, $berat, $item, $keterangan, $harga, $total, $userId)
	{
		$data = [
			'nama_pelanggan' => $pelanggan,
			'telp' => $telp,
			'status' => 1, // 1=Order
			'tanggal' => $tanggal,
			'item_tipe' => $tipe,
			'item_id' => $item,
			'user_id' => $userId,
			'keterangan' => $keterangan,
			'berat' => $berat,
			'harga' => $harga,
			'total' => $total
		];
		if ($this->db->insert($this->_table, $data)) {
			return true;
		}
	}

	public function updateTransaksi($tanggal, $pelanggan, $telp, $tipe, $berat, $item, $keterangan, $harga, $total, $userId, $transaksiId, $status)
	{
		$data = [
			'nama_pelanggan' => $pelanggan,
			'telp' => $telp,
			'status' => $status, // 1=Order
			'tanggal' => $tanggal,
			'item_tipe' => $tipe,
			'item_id' => $item,
			'user_id' => $userId,
			'keterangan' => $keterangan,
			'berat' => $berat,
			'harga' => $harga,
			'total' => $total
		];

		$this->db->where('transaksi_id', $transaksiId);
		if ($this->db->update($this->_table, $data)) {
			return true;
		}
	}


	public function updateStatusTransaksi()
	{
		$id = $this->input->post('transaksi_id');
		$status = $this->input->post('status');

		$this->db->set('status', $status);
		$this->db->where('transaksi_id', $id);

		if ($this->db->update($this->_table)) {
			return true;
		}
	}


	public function deleteTransaksi($transaksiId)
	{
		$this->db->where('transaksi_id', $transaksiId);
		if ($this->db->delete($this->_table)) {
			return true;
		}
	}
}

/* End of file Transaksi_model.php */
