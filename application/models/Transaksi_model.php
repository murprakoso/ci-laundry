<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi_model extends CI_Model
{
	private $_table = "tbl_transaksi";

	public function getTransaksi()
	{
		// return true;
		$this->db->select('*');
		$this->db->from($this->_table);
		$this->db->join('tbl_user', 'tbl_user.user_id = tbl_transaksi.user_id');
		$this->db->join('tbl_item', 'tbl_item.item_id = tbl_transaksi.item_id');
		$this->db->order_by('transaksi_id', 'DESC');
		$query = $this->db->get();
		return $query;
	}

	// tampilkan data transaksi berdasarkan status
	public function getTransaksiByStatus($status)
	{
		// return true;
		$this->db->select('*');
		$this->db->from($this->_table);
		$this->db->join('tbl_user', 'tbl_user.user_id = tbl_transaksi.user_id');
		$this->db->join('tbl_item', 'tbl_item.item_id = tbl_transaksi.item_id');
		$this->db->where('status', $status);
		$this->db->order_by('transaksi_id', 'DESC');
		$query = $this->db->get();
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
