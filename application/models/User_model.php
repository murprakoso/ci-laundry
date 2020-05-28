<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

    public function get_all_user()
    {
        // $query = $this->db->get('tbl_user');
        $query = $this->db->get_where('tbl_user', array('user_level !=' => 1));
        return $query;
    }

    public function insert_user($data)
    {
        $this->db->insert('tbl_user', $data);
    }

    public function insert_user_noimg($data)
    {
        $this->db->insert('tbl_user', $data);
    }

    // ubah
    public function update_user_nopass($userid, $nama, $username, $email, $photo)
    {
        $data = array(
            'user_fullname' => $nama,
            'user_name' => $username,
            'user_email' => $email,
            'user_photo' => $photo
        );
        $this->db->where('user_id', $userid);
        $this->db->update('tbl_user', $data);
    }
    public function update_user_noimg($userid, $nama, $username, $email, $pass)
    {
        $data = array(
            'user_fullname' => $nama,
            'user_name' => $username,
            'user_email' => $email,
            'user_password' => password_hash(($pass), PASSWORD_DEFAULT)
        );
        $this->db->where('user_id', $userid);
        $this->db->update('tbl_user', $data);
    }
    public function update_user_nopassimg($userid, $nama, $username, $email)
    {
        $data = array(
            'user_fullname' => $nama,
            'user_name' => $username,
            'user_email' => $email
        );
        $this->db->where('user_id', $userid);
        $this->db->update('tbl_user', $data);
    }
    public function update_user($userid, $nama, $username, $email, $pass, $photo)
    {
        $data = array(
            'user_fullname' => $nama,
            'user_name' => $username,
            'user_email' => $email,
            'user_password' => password_hash(($pass), PASSWORD_DEFAULT),
            'user_photo' => $photo,
        );
        $this->db->where('user_id', $userid);
        $this->db->update('tbl_user', $data);
    }
    // /.ubah

    public function delete_user($user_id)
    {
        $this->db->where('user_id', $user_id);
        $this->db->delete('tbl_user');
    }

    public function validasi_username($username)
    {
        $query = $this->db->query("SELECT * FROM tbl_user WHERE user_name='$username'");
        return $query;
    }
}

/* End of file User_model.php */
