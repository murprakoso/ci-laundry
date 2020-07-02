<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kaskeluar_model extends CI_Model
{
	private $_table = "tbl_kas_keluar";

	// ambil data kas keluar
	public function getKasKeluar()
	{
		$this->db->select('*');
		$this->db->from($this->_table);
		$this->db->join('tbl_user', 'user_id = kas_user_id');
		$this->db->order_by('kaskeluar_id', 'DESC');
		$query = $this->db->get();

		return $query;
	}

	// tambah kas
	public function insertKas($userId, $tanggal, $banyaknya, $namaToko, $telp, $keterangan, $harga)
	{
		$data = [
			'banyaknya' => $banyaknya,
			'nama_toko' => $namaToko,
			'telp' => $telp,
			'keterangan' => $keterangan,
			'tanggal' => $tanggal,
			'kas_user_id' => $userId,
			'harga' => $harga,
			'total' => $harga * $banyaknya
		];
		if ($this->db->insert($this->_table, $data)) {
			return true;
		}
	}

	// update kas keluar
	public function updateKas($userId, $tanggal, $banyaknya, $namaToko, $telp, $keterangan, $harga, $kaskeluarId)
	{
		$data = [
			'banyaknya' => $banyaknya,
			'nama_toko' => $namaToko,
			'telp' => $telp,
			'keterangan' => $keterangan,
			'tanggal' => $tanggal,
			'kas_user_id' => $userId,
			'harga' => $harga,
			'total' => $harga * $banyaknya
		];
		$this->db->where('kaskeluar_id', $kaskeluarId);
		if ($this->db->update($this->_table, $data)) {
			return true;
		}
	}


	public function deleteKas($kaskeluarId)
	{
		$this->db->where('kaskeluar_id', $kaskeluarId);
		if ($this->db->delete($this->_table)) {
			return true;
		}
	}

	// proses hapus dari checkbox
	public function deleteMultiple($kaskeluarId)
	{
		$this->db->where_in('kaskeluar_id', $kaskeluarId);
		if ($this->db->delete($this->_table)) {
			return true;
		}
	}


	// **
	// model untuk mencetak laporan
	// proses request data dari cetak laporan
	// *
	public function cariDataRekapKeluar($bulan, $tahun)
	{
		$query = $this->db->query("SELECT * FROM tbl_kas_keluar WHERE month(tanggal)='$bulan' AND year(tanggal)='$tahun'");
		return $query;
	}

	public function cariRekapKeluarPerPeriode($tglAwal, $tglAkhir)
	{
		$query = $this->db->query("SELECT * FROM tbl_kas_keluar WHERE tanggal BETWEEN '$tglAwal' AND '$tglAkhir'");
		return $query;
	}
}

/* End of file Kaskeluar_model.php */
