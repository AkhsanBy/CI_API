<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	public function editProfile($id) {
		$username = $this->input->post('username');
		$email = $this->input->post('email');

		// cek ada gambar atau tidak
		$upload_img = $_FILES['image']['name'];
		if ($upload_img) {
			$config['upload_path'] = './assets/img/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = '2048';
			$this->load->library('upload', $config);

			if ($this->upload->do_upload('image')) {
				$image_lama = $data['user']['image'];
				if ($image_lama != 'default.png') {
					unlink(FCPATH . 'assets/img/' . $image_lama);
				}
				$image_baru = $this->upload->data('file_name');
				$query0 = $this->db->set('image', $image_baru);
			} else {
				echo "gagal";
			}
		}

		$this->db->set('username', $username);
		$this->db->set('email', $email);	
		$this->db->where('id', $id);
		return $this->db->update('user');
	} 
}