<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		error_reporting(0);
		$this->load->model('User_model', 'user_model');
		is_logged_in();
		is_admin();
	}

	public function index()
	{
		$data = [
			'title' => 'Data User',
			'content' => 'pengaturan/v_user'
		];
		$data['user'] = $this->user_model->get_all_user();

		$this->load->view('layout/wrapper', $data);
	}

	public function tambah()
	{
		$nama = htmlspecialchars($this->input->post('user_fullname', TRUE), ENT_QUOTES);
		$username = htmlspecialchars($this->input->post('user_name', TRUE), ENT_QUOTES);
		$email = htmlspecialchars($this->input->post('user_email', TRUE), ENT_QUOTES);
		$pass = htmlspecialchars($this->input->post('password', TRUE), ENT_QUOTES);
		$pass2 = htmlspecialchars($this->input->post('password2', TRUE), ENT_QUOTES);

		$config['upload_path'] = './assets/images'; //path folder
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
		$config['encrypt_name'] = TRUE; //nama yang terupload nantinya

		$this->upload->initialize($config);
		// cek apakah sudah ada email yang terdaftar
		$cek_username = $this->user_model->validasi_username($username);
		if ($cek_username->num_rows() > 0) {
			$this->session->set_flashdata('warning', 'Username sudah ada');
			redirect('user');
		} else {
			if ($pass == $pass2) {
				if (!empty($_FILES['filefoto']['name'])) {
					if ($this->upload->do_upload('filefoto')) {
						$img = $this->upload->data();
						//Compress Image
						$config['image_library'] = 'gd2';
						$config['source_image'] = './assets/images/' . $img['file_name'];
						$config['create_thumb'] = FALSE;
						$config['maintain_ratio'] = FALSE;
						$config['quality'] = '60%';
						$config['width'] = 100;
						$config['height'] = 100;
						$config['new_image'] = './assets/images/' . $img['file_name'];
						$this->load->library('image_lib', $config);
						$this->image_lib->resize();

						$photo = $img['file_name'];
						$data = [
							'user_fullname' => $nama,
							'user_name' => $username,
							'user_email' => $email,
							'user_password' => password_hash(($pass), PASSWORD_DEFAULT),
							'user_photo' => $photo
						];
						$this->user_model->insert_user($data);
						$this->session->set_flashdata('success', 'Ditambahkan');
						redirect('user');
					} else {
						$this->session->set_flashdata('warning', 'Gambar error, periksa kembali!');
						redirect('user');
					}
				} else {
					$data = [
						'user_fullname' => $nama,
						'user_name' => $username,
						'user_email' => $email,
						'user_password' => password_hash(($pass), PASSWORD_DEFAULT),
					];
					$this->user_model->insert_user_noimg($data);
					$this->session->set_flashdata('success', 'Ditambahkan');
					redirect('user');
				}
			} else {
				echo $this->session->set_flashdata('error', 'Ditambahkan!');
				redirect('user');
			}
		}
	}

	public function ubah()
	{
		$userid = $this->input->post('user_id', TRUE);
		$nama = htmlspecialchars($this->input->post('user_fullname', TRUE), ENT_QUOTES);
		$username = htmlspecialchars($this->input->post('user_name', TRUE), ENT_QUOTES);
		$email = htmlspecialchars($this->input->post('user_email', TRUE), ENT_QUOTES);
		$pass = htmlspecialchars($this->input->post('password', TRUE), ENT_QUOTES);
		$pass2 = htmlspecialchars($this->input->post('password2', TRUE), ENT_QUOTES);
		// $level = htmlspecialchars($this->input->post('level', TRUE), ENT_QUOTES);

		$config['upload_path'] = './assets/images'; //path folder
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
		$config['encrypt_name'] = TRUE; //nama yang terupload nantinya

		$this->upload->initialize($config);
		$cek_username = $this->user_model->validasi_username($username);
		if ($cek_username->num_rows() > 0) {
			$row = $cek_username->row();
			$user_id = $row->user_id;
			if ($user_id <> $userid) {
				$this->session->set_flashdata('warning', 'Username sudah ada');
				redirect('user');
			} else {
				if (empty($pass) || empty($pass2)) {
					if (!empty($_FILES['filefoto']['name'])) {
						if ($this->upload->do_upload('filefoto')) {
							$img = $this->upload->data();
							//Compress Image
							$config['image_library'] = 'gd2';
							$config['source_image'] = './assets/images/' . $img['file_name'];
							$config['create_thumb'] = FALSE;
							$config['maintain_ratio'] = FALSE;
							$config['quality'] = '60%';
							$config['width'] = 100;
							$config['height'] = 100;
							$config['new_image'] = './assets/images/' . $img['file_name'];
							$this->load->library('image_lib', $config);
							$this->image_lib->resize();

							$photo = $img['file_name'];
							$this->_hapusGambar($userid);
							$this->user_model->update_user_nopass($userid, $nama, $username, $email, $photo);
							$this->session->set_flashdata('success', 'Data berhasil diubah!');
							redirect('user');
						} else {
							$this->session->set_flashdata('error', 'Data gagal diubah!');
							redirect('user');
						}
					} else {
						$this->user_model->update_user_nopassimg($userid, $nama, $username, $email);
						$this->session->set_flashdata('success', 'Data berhasil diubah!');
						redirect('user');
					}
				} else {
					if ($pass == $pass2) {
						if (!empty($_FILES['filefoto']['name'])) {
							if ($this->upload->do_upload('filefoto')) {
								$img = $this->upload->data();
								//Compress Image
								$config['image_library'] = 'gd2';
								$config['source_image'] = './assets/images/' . $img['file_name'];
								$config['create_thumb'] = FALSE;
								$config['maintain_ratio'] = FALSE;
								$config['quality'] = '60%';
								$config['width'] = 100;
								$config['height'] = 100;
								$config['new_image'] = './assets/images/' . $img['file_name'];
								$this->load->library('image_lib', $config);
								$this->image_lib->resize();

								$photo = $img['file_name'];
								$this->_hapusGambar($userid);
								$this->user_model->update_user($userid, $nama, $username, $email, $pass, $photo);
								$this->session->set_flashdata('success', 'Data berhasil diubah!');
								redirect('user');
							} else {
								$this->session->set_flashdata('error', 'Data gagal diubah!');
								redirect('user');
							}
						} else {
							$this->user_model->update_user_noimg($userid, $nama, $username, $email, $pass);
							$this->session->set_flashdata('success', 'Data berhasil diubah!');
							redirect('user');
						}
					} else {
						$this->session->set_flashdata('error', 'Data gagal diubah!');
						redirect('user');
					}
				}
			}
		} else {
			if (empty($pass) || empty($pass2)) {
				if (!empty($_FILES['filefoto']['name'])) {
					if ($this->upload->do_upload('filefoto')) {
						$img = $this->upload->data();
						//Compress Image
						$config['image_library'] = 'gd2';
						$config['source_image'] = './assets/images/' . $img['file_name'];
						$config['create_thumb'] = FALSE;
						$config['maintain_ratio'] = FALSE;
						$config['quality'] = '60%';
						$config['width'] = 100;
						$config['height'] = 100;
						$config['new_image'] = './assets/images/' . $img['file_name'];
						$this->load->library('image_lib', $config);
						$this->image_lib->resize();

						$photo = $img['file_name'];
						$this->_hapusGambar($userid);
						$this->user_model->update_user_nopass($userid, $nama, $username, $email, $photo);
						$this->session->set_flashdata('success', 'Data berhasil diubah!');
						redirect('user');
					} else {
						$this->session->set_flashdata('error', 'Data gagal diubah!');
						redirect('user');
					}
				} else {
					$this->user_model->update_user_nopassimg($userid, $nama, $username, $email);
					$this->session->set_flashdata('success', 'Data berhasil diubah!');
					redirect('user');
				}
			} else {
				if ($pass == $pass2) {
					if (!empty($_FILES['filefoto']['name'])) {
						if ($this->upload->do_upload('filefoto')) {
							$img = $this->upload->data();
							//Compress Image
							$config['image_library'] = 'gd2';
							$config['source_image'] = './assets/images/' . $img['file_name'];
							$config['create_thumb'] = FALSE;
							$config['maintain_ratio'] = FALSE;
							$config['quality'] = '60%';
							$config['width'] = 100;
							$config['height'] = 100;
							$config['new_image'] = './assets/images/' . $img['file_name'];
							$this->load->library('image_lib', $config);
							$this->image_lib->resize();

							$photo = $img['file_name'];
							$this->_hapusGambar($userid);
							$this->user_model->update_user($userid, $nama, $username, $email, $pass, $photo);
							$this->session->set_flashdata('success', 'Data berhasil diubah!');
							redirect('user');
						} else {
							$this->session->set_flashdata('error', 'Data gagal diubah!');
							redirect('user');
						}
					} else {
						$this->user_model->update_user_noimg($userid, $nama, $username, $email, $pass);
						$this->session->set_flashdata('success', 'Data berhasil diubah!');
						redirect('user');
					}
				} else {
					$this->session->set_flashdata('error', 'Data gagal diubah!');
					redirect('user');
				}
			}
		}
	}

	private function _hapusGambar($userid)
	{
		$carifoto = $this->db->get_where('tbl_user', array('user_id' => $userid))->row_array();
		$hapusFoto = $carifoto['user_photo'];
		unlink("./assets/images/" . $hapusFoto);
	}

	public function hapus($user_id)
	{
		$carifoto = $this->db->get_where('tbl_user', array('user_id' => $user_id))->row_array();
		$hapusFoto = $carifoto['user_photo'];
		unlink("./assets/images/" . $hapusFoto);

		$this->user_model->delete_user($user_id);
		$this->session->set_flashdata('success', 'Dihapus');
		redirect('user');
	}
}

/* End of file User.php */
