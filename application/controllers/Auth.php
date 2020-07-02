<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		error_reporting(0);
		$this->load->model('Auth_model', 'auth_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		if ($this->session->userdata('user_name')) {
			redirect('dashboard');
		}
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[4]|max_length[25]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('auth/v_auth');
		} else {
			// jalankan function login
			$this->_login();
		}
	}

	public function _login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		// cek apa ada user dlm database
		$user = $this->auth_model->get_user($username)->row_array();

		// cek user exist
		if ($user) {
			// pass verify
			if (password_verify($password, $user['user_password'])) {
				$data = [
					'user_id'       => $user['user_id'],
					'user_fullname' => $user['user_fullname'],
					'user_email'    => $user['user_email'],
					'user_name'     => $user['user_name'],
					'user_level'    => $user['user_level'],
				];
				$this->session->set_userdata($data);
				echo "<b>login berhasil...</b><meta http-equiv='refresh' content='1;URL=dashboard'>";
				// redirect('dashboard');
			} else {
				$this->session->set_flashdata('error', 'Password salah!');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('error', 'User tidak ada!');
			redirect('auth');
		}
	}

	public function blocked()
	{
		$data['footer'] = $this->load->view('footer', '', TRUE);
		$this->load->view('header', $data);
		$this->load->view('blocked', $data);
	}

	public function logout()
	{
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('user_fullname');
		$this->session->unset_userdata('user_name');
		$this->session->unset_userdata('user_email');
		$this->session->unset_userdata('user_level');

		$this->session->set_flashdata('success', 'Berhasil logout!');
		redirect('auth');
	}
}

/* End of file Auth.php */
