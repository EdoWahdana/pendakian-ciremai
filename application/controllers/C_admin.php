<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_admin extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('m_admin');
	}

	public function index() {
		//Set error delimiter
		$this->form_validation->set_error_delimiters('<small class="text-danger pl-2">', '</small>');

		$this->form_validation->set_rules('username', 'Username', 'required|alpha_dash');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if($this->form_validation->run() == FALSE){
			$this->load->view('admin/signin');
		} else {
			//Ambil inputan
			$username = $this->input->post('username', TRUE);
			$password = $this->input->post('password', TRUE);

			//SELECT FROM tbl_admin WHERE username = $username
			$admin = $this->m_admin->get_admin($username);

			//Auth Flow
			if($admin->num_rows() > 0){
				$admin = $admin->row_array();
				if(password_verify($password, $admin['password'])){
					//Membuat variabel session
					$data = [
						'id' => $admin['id_admin'],
						'nama' => $admin['nama'],
						'username' => $admin['username'],
						'status' => 'login'
					];
					$this->session->set_userdata($data);
					redirect('c_dashboard/dashboard');
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger">Password tidak sesuai.</div>');
					redirect('C_admin');	
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger">Akun anda belum terdaftar.</div>');
				redirect('C_admin');	
			}
		}
	}

	public function logout() {
		$session_data = ['nama', 'username', 'status'];
		$this->session->unset_userdata($session_data);
		redirect('c_admin');
	}

	public function register_admin() {
		//Set error delimiter
		$this->form_validation->set_error_delimiters('<small class="text-danger pl-2">', '</small>');

		//Set rule untuk setiap form input
		$this->form_validation->set_rules('name', 'Fullname', 'required|trim|min_length[5]|alpha_numeric_spaces');
		$this->form_validation->set_rules('username', 'Username', 'required|trim|min_length[5]|alpha_dash|is_unique[tbl_admin.username]');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[5]|matches[c_password]');
		$this->form_validation->set_rules('c_password', 'Password Confirmation', 'required|trim|matches[password]');

		if($this->form_validation->run() == FALSE){
			$this->load->view('admin/signup');
		} else {
			//Ambil inputan form dan filter XSS
			$name = $this->input->post('name', TRUE);
			$user = $this->input->post('username', TRUE);
			$pass = $this->input->post('password', TRUE);

			//Hash input password dengan BCrypt
			$pass = password_hash($pass, PASSWORD_BCRYPT);

			//Define data untuk dikirim ke model
			$data = [
				'nama' => $name,
				'username' => $user,
				'password'=> $pass
			];

			$affected_row = $this->m_admin->insert_admin($data);
			if($affected_row == TRUE){
				$this->session->set_flashdata('message', '<div class="alert alert-success">Admin baru berhasil terdaftar.</div>');
				redirect('C_admin');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger">Kesalahan! Silahkan daftar ulang.</div>');
				redirect('C_admin/register_admin');	
			}
		}	
	}
}
