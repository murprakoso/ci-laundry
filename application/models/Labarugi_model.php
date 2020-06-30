<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Labarugi_model extends CI_Model
{
	private $_kasMasuk = 'tbl_kas_masuk';
	private $_kasKeluar = 'tbl_kas_keluar';

	// **
	// Laba perbulan
	// *
	public function getDebitPerBulan($bulan, $tahun)
	{
		$where = "MONTH(tanggal)='$bulan' AND YEAR(tanggal)='$tahun'";
		$query = $this->db
			->select('tanggal,total')
			->from($this->_kasMasuk)
			->where($where)
			->get();
		return $query;
	}

	public function getKreditPerBulan($bulan, $tahun)
	{
		$where = "MONTH(tanggal)='$bulan' AND YEAR(tanggal)='$tahun'";
		$query = $this->db
			->select('tanggal,total')
			->from($this->_kasKeluar)
			->where($where)
			->get();
		return $query;
	}


	// **
	// Laba perperiode
	// *
	public function getDebitPerPeriode($tglAwal, $tglAkhir)
	{
		$where = "tanggal BETWEEN '$tglAwal' AND '$tglAkhir'";
		$query = $this->db
			->select('tanggal,total')
			->from($this->_kasMasuk)
			->where($where)
			->get();
		return $query;
	}
	public function getKreditPerPeriode($tglAwal, $tglAkhir)
	{
		$where = "tanggal BETWEEN '$tglAwal' AND '$tglAkhir'";
		$query = $this->db
			->select('tanggal,total')
			->from($this->_kasKeluar)
			->where($where)
			->get();
		return $query;
	}
}

/* End of file Labarugi_model.php */
