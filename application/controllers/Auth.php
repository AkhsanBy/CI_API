<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index() {
		if ($this->session->userdata('email')) {
			redirect('tools/find');
		}
		$this->form_validation->set_rules('email', 'Email', 'required|trim', [
			'required' => 'Kolom harus diisi!'
		]);
		$this->form_validation->set_rules('password', 'Password', 'required|trim', [
			'required' => 'Kolom harus diisi!'
		]);

		$data['judul'] = 'Halaman Login';
		if ($this->form_validation->run() == false) {
			$this->load->view('template/auth_header', $data);
			$this->load->view('auth/index');
			$this->load->view('template/auth_footer');
		} else {
			$email = $this->input->post('email');
			$password = $this->input->post('password');

			$emaildb = $this->db->get_where('user', ['email' => $email])->row_array();
			
			if ($emaildb == true) {
				if ($password == $emaildb['password']) {
					$data = [
						'id' => $emaildb['id'],
						'email' => $emaildb['email'],
						'role_id' => $emaildb['role_id']
					];
					$this->session->set_userdata($data);
					redirect('tools/find');
				} else {
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Password salah!', '</div>');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Email tidak terdaftar!', '</div>');
				redirect('auth');
			}
		}
	}

	public function register() {
		if ($this->session->userdata('email')) {
			redirect('tools/find');
		}
		
		$this->form_validation->set_rules('username', 'Username', 'required|trim', [
			'required' => 'Kolom harus diisi!'
		]);
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
			'required' => 'Kolom harus diisi!',
			'valid_email' => 'Email tidak valid!'
		]);
		$this->form_validation->set_rules('password', 'Password', 'required|trim|matches[password1]|min_length[3]', [
			'required' => 'Kolom harus diisi!',
			'matches' => 'Password tidak sama!',
			'min_length' => 'Password terlalu pendek!'
		]);
		$this->form_validation->set_rules('password1', 'Ulangi Password', 'required|trim|matches[password]');

		$data['judul'] = 'Halaman Register';
		if ($this->form_validation->run() == false) {
			$this->load->view('template/auth_header', $data);
			$this->load->view('auth/register');
			$this->load->view('template/auth_footer');
		} else {
			$data = [
				'username' => $this->input->post('username'),
				'email' => $this->input->post('email'),
				'password' => $this->input->post('password'),
				'image' => 'default.png',
				'role_id' => 2,
				'date_created' => time()
			];
			$this->db->insert('user', $data);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Akun baru berhasil dibuat!, silakan Login</div>');
			redirect('auth');
		}
	}

	public function logout() {
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Berhasil logout!</div>');
		redirect('auth');
	}

}