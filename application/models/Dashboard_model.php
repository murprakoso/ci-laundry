<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{
	private $_kasMasuk = 'tbl_kas_masuk';
	private $_kasKeluar = 'tbl_kas_keluar';
	private $_transaksi = 'tbl_transaksi';
	public function total_kasmasuk()
	{
		$query = $this->db->order_by('kas_id', 'DESC');
		$query = $this->db->get_where('tbl_kas', array('kas_jenis' => 1));
		return $query;
	}


	public function getPemasukan()
	{
		$curr_month = date('m');

		$this->db->select_sum('total');
		$this->db->from($this->_kasMasuk);
		$this->db->where('MONTH(tanggal)', $curr_month);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function getPengeluaran()
	{
		$curr_month = date('m');

		$this->db->select_sum('total');
		$this->db->from($this->_kasKeluar);
		$this->db->where('MONTH(tanggal)', $curr_month);
		$query = $this->db->get();
		return $query->row_array();
	}

	// **
	// get order
	// *
	public function getOrderToday()
	{
		$date = new DateTime("now");
		$curr_date = $date->format('Y-m-d');

		$this->db->select('*');
		$this->db->from($this->_transaksi);
		$this->db->where('status', 1); //use date function
		$this->db->where('DATE(tanggal)', $curr_date); //use date function
		$query = $this->db->get();
		return $query;
	}
	public function getOrderAll()
	{
		$this->db->select('*');
		$this->db->from($this->_transaksi);
		$this->db->where('status', 1); //use date function
		$query = $this->db->get();
		return $query;
	}


	// **
	// get dikerjakan
	// *
	public function getDikerjakanToday()
	{
		$date = new DateTime("now");
		$curr_date = $date->format('Y-m-d');

		$this->db->select('*');
		$this->db->from($this->_transaksi);
		$this->db->where('DATE(tanggal)', $curr_date); //use date function
		$this->db->where('status', 2); //use date function
		$query = $this->db->get();
		return $query;
	}
	public function getDikerjakanAll()
	{
		$this->db->select('*');
		$this->db->from($this->_transaksi);
		$this->db->where('status', 2); //use date function
		$query = $this->db->get();
		return $query;
	}


	// **
	// get dikerjakan
	// *
	public function getSelesaiToday()
	{
		$date = new DateTime("now");
		$curr_date = $date->format('Y-m-d');

		$this->db->select('*');
		$this->db->from($this->_transaksi);
		$this->db->where('DATE(tanggal)', $curr_date); //use date function
		$this->db->where('status', 3); //use date function
		$query = $this->db->get();
		return $query;
	}
	public function getSelesaiAll()
	{
		$this->db->select('*');
		$this->db->from($this->_transaksi);
		$this->db->where('status', 3); //use date function
		$query = $this->db->get();
		return $query;
	}


	// **
	// get dikerjakan
	// *
	public function getDiambilToday()
	{
		$date = new DateTime("now");
		$curr_date = $date->format('Y-m-d');

		$this->db->select('*');
		$this->db->from($this->_transaksi);
		$this->db->where('DATE(tanggal)', $curr_date); //use date function
		$this->db->where('status', 4); //use date function
		$query = $this->db->get();
		return $query;
	}
	public function getDiambilAll()
	{
		$this->db->select('*');
		$this->db->from($this->_transaksi);
		$this->db->where('status', 4); //use date function
		$query = $this->db->get();
		return $query;
	}
}

/* End of file Dashboard_model.php */
