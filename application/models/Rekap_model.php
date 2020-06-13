<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rekap_model extends CI_Model
{
    // ambil data rekap masuk
    public function get_all_rekapmasuk()
    {
        $query = $this->db->order_by('rekap_id', 'DESC');
        $query = $this->db->get_where('tbl_kas_rekap', array('rekap_jenis' => 1));
        return $query;
    }
    // ambil data rekap keluar
    public function get_all_rekapkeluar()
    {
        $query = $this->db->order_by('rekap_id', 'DESC');
        $query = $this->db->get_where('tbl_kas_rekap', array('rekap_jenis' => 2));
        return $query;
    }

    // REKAP MASUK
    // filter data berdasarkan bulan dan tahun
    public function cariDataRekapMasuk($bulan, $tahun)
    {
        $query = $this->db->query("SELECT * FROM tbl_kas_rekap WHERE month(rekap_date)='$bulan' AND year(rekap_date)='$tahun' AND rekap_jenis='1'");
        return $query;
    }

    public function cariRekapMasukPerPeriode($tglAwal, $tglAkhir)
    {
        $query = $this->db->query("SELECT * FROM tbl_kas_rekap WHERE rekap_date BETWEEN '$tglAwal' AND '$tglAkhir' AND rekap_jenis='1'");
        return $query;
    }
    // REKAP KELUAR
    public function cariDataRekapKeluar($bulan, $tahun)
    {
        $query = $this->db->query("SELECT * FROM tbl_kas_rekap WHERE month(rekap_date)='$bulan' AND year(rekap_date)='$tahun' AND rekap_jenis='2'");
        return $query;
    }
    public function cariRekapKeluarPerPeriode($tglAwal, $tglAkhir)
    {
        $query = $this->db->query("SELECT * FROM tbl_kas_rekap WHERE rekap_date BETWEEN '$tglAwal' AND '$tglAkhir' AND rekap_jenis='2'");
        return $query;
    }

    public function cari_data_rekapkeluar($bulan, $tahun)
    {
        $query = $this->db->query("SELECT * FROM tbl_kas_rekap WHERE month(rekap_date)='$bulan' AND year(rekap_date)='$tahun' AND rekap_jenis='2'");
        return $query;
    } //

    // cek id rekap
    public function cek_rekapmasuk()
    {
        $query = $this->db->select_max('rekap_id');
        $query = $this->db->get_where('tbl_kas_rekap', ['rekap_jenis' => 1]);
        return $query;
    }
    public function cek_rekapkeluar()
    {
        $query = $this->db->select_max('rekap_id');
        $query = $this->db->get_where('tbl_kas_rekap', ['rekap_jenis' => 2]);
        return $query;
    }

    public function insert_rekap($data)
    {
        $this->db->insert('tbl_kas_rekap', $data);
    }

    // public function update_kas($data, $kas_id)
    // {
    //     $this->db->where('kas_id', $kas_id);
    //     $this->db->update('tbl_kas', $data);
    // }

    public function hapus_rekap($rekap_id)
    {
        $this->db->delete('tbl_kas_rekap', array('rekap_id' => $rekap_id));
    }

    // proses hapus dari checkbox
    public function delete($rekap_id)
    {
        $this->db->where_in('rekap_id', $rekap_id);
        $this->db->delete('tbl_kas_rekap');
    }
}

/* End of file Rekap_model.php */
