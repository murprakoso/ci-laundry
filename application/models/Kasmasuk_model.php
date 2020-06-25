<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kasmasuk_model extends CI_Model
{
	private $_table = "tbl_kas_masuk";

	// ambil data kas masuk
	public function getKasMasuk()
	{
		$this->db->select('*');
		$this->db->from($this->_table);
		$this->db->join('tbl_user', 'user_id = kas_user_id');
		$this->db->order_by('kasmasuk_id', 'DESC');
		$query = $this->db->get();

		return $query;
	}

	// tambah kas
	public function insertKas($data)
	{
		$this->db->insert($this->_table, $data);
	}

	// update kas masuk
	public function updateKas($data, $kas_id)
	{
		$this->db->where('kas_id', $kas_id);
		$this->db->update($this->_table, $data);
	}

	public function hapusKas($kas_id)
	{
		$this->db->delete($this->_table, array('kas_id' => $kas_id));
	}
	// proses hapus dari checkbox
	public function delete($kas_id)
	{
		$this->db->where_in('kas_id', $kas_id);
		$this->db->delete($this->_table);
	}


	// **
	// model untuk mencetak laporan
	// proses request data dari cetak laporan
	// *
	public function cariDataRekapMasuk($bulan, $tahun)
	{
		$query = $this->db->query("SELECT * FROM tbl_kas_masuk WHERE month(tanggal)='$bulan' AND year(tanggal)='$tahun'");
		return $query;
	}

	public function cariRekapMasukPerPeriode($tglAwal, $tglAkhir)
	{
		$query = $this->db->query("SELECT * FROM tbl_kas_masuk WHERE tanggal BETWEEN '$tglAwal' AND '$tglAkhir'");
		return $query;
	}
}

/* End of file Kasmasuk_model.php */
