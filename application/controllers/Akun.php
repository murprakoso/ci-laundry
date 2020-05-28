<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Akun extends CI_Controller
{
    public $user_id;
    public function __construct()
    {
        parent::__construct();
        error_reporting(0);
        $this->load->model('Akun_model', 'akun_model');
        if (!empty($this->session->userdata('user_name'))) {
            $this->user_id = $this->session->userdata('user_id');
        } else {
            is_logged_in();
        }
    }

    public function index()
    {
        $result = $this->akun_model->get_user_data($this->user_id)->row_array();
        $data = [
            'user_email' => $result['user_email'],
            'user_fullname' => $result['user_fullname'],
            'user_name' => $result['user_name'],
            'user_photo' => $result['user_photo']
        ];
        $data['title'] = 'Pengaturan Akun';
        $data['footer'] = $this->load->view('footer', '', TRUE);
        $this->load->view('header', $data);
        $this->load->view('v_akun', $data);
    }

    public function update_userpass()
    {
        $username = $this->input->post('user_name', true);
        $cariUsername = $this->db->get_where('tbl_user', ['user_id' => $this->user_id])->row_array();
        $usernameLama = $cariUsername['user_name'];
        // cek username
        if ($username === $usernameLama) {
            $this->form_validation->set_rules('user_name', 'Username', 'required|trim');
        } else {
            $this->form_validation->set_rules('user_name', 'Username', 'required|trim|is_unique[tbl_user.user_name]', [
                'is_unique' => 'This Username has already registered!'
            ]);
        }
        $this->form_validation->set_rules('user_password', 'Password', 'required|trim|min_length[5]|matches[user_password2]', [
            'matches' => 'Password dont match!'
        ]);
        $this->form_validation->set_rules('user_password2', 'Password', 'required|trim|matches[user_password]');

        if ($this->form_validation->run() == false) {
            $this->index();
        } else {
            $data = [
                'user_name' => htmlspecialchars($username),
                'user_password' => password_hash($this->input->post('user_password'), PASSWORD_DEFAULT),
            ];
            $this->akun_model->update_username_password($data, $this->user_id);
            $this->session->unset_userdata('user_name');
            $this->session->unset_userdata('user_email');

            $this->session->set_flashdata('success', 'Akun berhasil diupdate. Silahkan login!');
            redirect('auth');
        }
    }

    public function update_userdata()
    {
        $email = $this->input->post('user_email', true);
        $cariEmail = $this->db->get_where('tbl_user', ['user_id' => $this->user_id])->row_array();
        $emailLama = $cariEmail['user_email'];

        if ($email === $emailLama) {
            $this->form_validation->set_rules('user_email', 'email', 'required|valid_email|trim');
        } else {
            $this->form_validation->set_rules('user_email', 'email', 'required|valid_email|trim|is_unique[tbl_user.user_email]', [
                'is_unique' => 'This Email has already registered!'
            ]);
        }
        // 
        if ($this->form_validation->run() == false) {
            $this->index();
        } else {
            $data = [
                'user_fullname' => htmlspecialchars($this->input->post('user_fullname', true)),
                'user_email' => htmlspecialchars($email)
            ];
            $this->akun_model->update_user_data($data, $this->user_id);
            $this->session->set_userdata($data);
            $this->session->set_flashdata('success', 'Data berhasil diubah!');
            redirect('akun');
        }
    }

    public function update_userphoto()
    {
        $cariphoto = $this->db->get_where('tbl_user', ['user_id' => $this->user_id])->row_array();
        $cekphoto = $cariphoto['user_photo'];
        // cek avatar lama
        if (!empty($cekphoto)) {
            unlink("./assets/images/" . $cekphoto);
            $this->_upload();
        } else {
            $this->_upload();
        }
    }

    private function _upload()
    {
        $config['upload_path'] = './assets/images'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

        $this->upload->initialize($config);

        if ($this->upload->do_upload('user_photo')) {
            $img = $this->upload->data();
            //Compress Image
            $config['image_library'] = 'gd2';
            $config['source_image'] = './assets/images/' . $img['file_name'];
            $config['create_thumb'] = FALSE;
            $config['maintain_ratio'] = FALSE;
            $config['quality'] = '60%';
            $config['width'] = 100;
            $config['height'] = 100;
            $config['new_image'] =  './assets/images/' . $img['file_name'];
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();

            $photo = $img['file_name'];
            $this->akun_model->update_user_photo($photo, $this->user_id);
            $this->session->set_flashdata('success', 'Data berhasil diubah!');
            redirect('akun');
        } else {
            $this->session->set_flashdata('error', 'Data gagal diubah, harap periksa gambar!');
            redirect('akun');
        }
    }
}

/* End of file Akun.php */
