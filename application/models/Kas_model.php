<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kas_model extends CI_Model
{
    // ambil data kas masuk
    public function get_all_kasmasuk()
    {
        $query = $this->db->order_by('kas_id', 'DESC');
        $query = $this->db->get_where('tbl_kas', array('kas_jenis' => 1));
        return $query;
    }
    // ambil data kas keluar
    public function get_all_kaskeluar()
    {
        $query = $this->db->order_by('kas_id', 'DESC');
        $query = $this->db->get_where('tbl_kas', array('kas_jenis' => 2));
        return $query;
    }

    public function insert_kas($data)
    {
        $this->db->insert('tbl_kas', $data);
    }

    public function update_kas($data, $kas_id)
    {
        $this->db->where('kas_id', $kas_id);
        $this->db->update('tbl_kas', $data);
    }

    public function hapus_kas($kas_id)
    {
        $this->db->delete('tbl_kas', array('kas_id' => $kas_id));
    }
    // proses hapus dari checkbox
    public function delete($kas_id)
    {
        $this->db->where_in('kas_id', $kas_id);
        $this->db->delete('tbl_kas');
    }
}

/* End of file Kas_model.php */
