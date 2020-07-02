<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{

    public function get_user($username)
    {
        $result = $this->db->get_where('tbl_user', ['user_name' => $username]);
        return $result;
    }
}

/* End of file Auth_model.php */
