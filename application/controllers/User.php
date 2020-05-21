<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('user_model');
	}
	
	public function profile() {
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['judul'] = 'Profile Saya';
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('user/profile', $data);
		$this->load->view('template/footer');
	}

	public function editProfile() {
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		if($this->input->post('username') != $data['user']['username']) {
		   $is_uniqueU =  '|is_unique[user.username]';
		} else {
		   $is_uniqueU =  '';
		}

		if($this->input->post('email') != $data['user']['email']) {
		   $is_uniqueE =  '|is_unique[user.email]';
		} else {
		   $is_uniqueE =  '';
		}

		$this->form_validation->set_rules('username', 'Username', 'required|trim'.$is_uniqueU, [
			'required' => 'Kolom harus diisi!',
			'is_unique' => 'Username sudah terdaftar!'
		]);
		$this->form_validation->set_rules('email', 'Email', 'required|trim'.$is_uniqueE, [
			'required' => 'Kolom harus diisi!',
			'is_unique' => 'Email sudah terdaftar!'
		]);

		$data['judul'] = 'Edit Profile';

		if ($this->form_validation->run() == false) {
			$this->load->view('template/header', $data);
			$this->load->view('template/sidebar', $data);
			$this->load->view('template/topbar', $data);
			$this->load->view('user/editProfile', $data);
			$this->load->view('template/footer');
		} else {
			$id = $data['user']['id'];
			$this->user_model->editProfile($id);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Profile berhasil diedit!</div>');
			redirect('user/profile');
		}
	}

	public function editPassword() {
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('passwordLama', 'Password Lama', 'required|trim');
		$this->form_validation->set_rules('passwordBaru', 'Password Baru', 'required|trim|matches[passwordBaru1]|min_length[3]');
		$this->form_validation->set_rules('passwordBaru1', 'Konfirmasi Password', 'required|trim|matches[passwordBaru]');

		$data['judul'] = 'Edit Password';

		if ($this->form_validation->run() == false) {
			$this->load->view('template/header', $data);
			$this->load->view('template/sidebar', $data);
			$this->load->view('template/topbar', $data);
			$this->load->view('user/editPassword', $data);
			$this->load->view('template/footer');
		} else {
			$id = $data['user']['id'];
			$passwordLama = $this->input->post('passwordLama');
			$passwordBaru = $this->input->post('passwordBaru');
			$passwordBaru1 = $this->input->post('passwordBaru1');

			if ($passwordLama == $data['user']['password'] && $passwordLama != $passwordBaru) {
				$this->db->set('password', $passwordBaru);
				$this->db->where('id', $id);
				$this->db->update('user');
				$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Password berhasil diedit!</div>');
				redirect('user/editPassword');
			} else if ($passwordLama != $data['user']['password']) {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert"><strong>Password Lama</strong> tidak sesuai!</div>');
				redirect('user/editPassword');
			} else if ($passwordBaru != $passwordBaru1) {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert"><strong>Konfirmasi Password</strong> tidak sesuai!</div>');
				redirect('user/editPassword');
			} else if ($passwordLama == $passwordBaru) {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert"><strong>Password baru</strong> harus beda dengan <strong>Password Lama</strong></div>');
				redirect('user/editPassword');
			}

		}
	}
}