<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{
    public function total_kasmasuk()
    {
        $query = $this->db->order_by('kas_id', 'DESC');
        $query = $this->db->get_where('tbl_kas', array('kas_jenis' => 1));
        return $query;
    }
    public function total_kaskeluar()
    {
    }
}

/* End of file Dashboard_model.php */
