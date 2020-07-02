<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Akun_model extends CI_Model
{

    public function get_user_data($user_id)
    {
        // $result = $this->db->query("SELECT * FROM tbl_user WHERE user_id='$user_id'");
        $result = $this->db->get_where('tbl_user', array('user_id' => $user_id));
        return $result;
    }

    public function update_username_password($data, $user_id)
    {
        $this->db->where('user_id', $user_id);
        $this->db->update('tbl_user', $data);
    }

    public function update_user_data($data, $user_id)
    {
        $this->db->where('user_id', $user_id);
        $this->db->update('tbl_user', $data);
    }

    public function update_user_photo($photo, $user_id)
    {
        $this->db->set('user_photo', $photo);
        $this->db->where('user_id', $user_id);
        $this->db->update('tbl_user');
    }
}

/* End of file Profile_model.php */
