<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kasmasuk_model extends CI_Model
{
    private $_table = "tbl_kas_masuk";

    // ambil data kas masuk
    public function getAllKasMasuk()
    {
        $query = $this->db->order_by('kas_id', 'DESC');
        $query = $this->db->get($this->_table);
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
}

/* End of file Kasmasuk_model.php */
