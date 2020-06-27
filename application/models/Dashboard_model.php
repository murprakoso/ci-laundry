<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{
	private $_kasMasuk = 'tbl_kas_masuk';
	private $_transaksi = 'tbl_transaksi';
	public function total_kasmasuk()
	{
		$query = $this->db->order_by('kas_id', 'DESC');
		$query = $this->db->get_where('tbl_kas', array('kas_jenis' => 1));
		return $query;
	}


	public function getPemasukan()
	{
		// $curr_month = date(06);
		$curr_month = 06;

		$this->db->select('*');
		$this->db->from($this->_kasMasuk);
		$this->db->where('MONTH(tanggal)', $curr_month); //use date function
		$query = $this->db->get();
		// return $query->row_array();
		return $query;
	}

	public function getPengeluaran()
	{
		$date = new DateTime("now");
		$curr_date = $date->format('Y-m-d');

		$this->db->select('*');
		$this->db->from($this->_kasMasuk);
		$this->db->where('MONTH(tanggal)', $curr_date); //use date function
		$query = $this->db->get();
		return $query;
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
