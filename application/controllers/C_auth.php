<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_auth extends CI_Controller { 
    
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_customer');
    }

    public function edit_profil()
    {
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $tanggal_lahir = $this->input->post('tanggal_lahir');
        $alamat = $this->input->post('alamat');
        $jenis_identitas = $this->input->post('jenis_identitas');
        $no_identitas = $this->input->post('no_identitas');
        $no_handphone = $this->input->post('no_handphone');
        $email = $this->input->post('email');
        $foto_identitas = $this->input->post('hidden_foto_identitas');

        if(!empty($_FILES['foto_identitas']['name'])) {
            $foto_identitas = $this->upload_image();
        }

        $data = [
            'id_customer' => $id,
            'nama' => $nama,
            'tanggal_lahir' => $tanggal_lahir,
            'alamat' => $alamat,
            'jenis_identitas' => $jenis_identitas,
            'no_identitas' => $no_identitas,
            'no_handphone' => $no_handphone,
            'email' => $email,
            'foto_identitas' => $foto_identitas
        ];

        $affected_row = $this->m_customer->update_customer($data);

        if($affected_row == TRUE) {
            $this->session->set_flashdata('message', '<div class="alert alert-success">Akun pendaki berhasil diupdate. Silahkan Login kembali!</div>');
            redirect('c_home/login');
            $this->session->sess_destroy();
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Akun pendaki GAGAL diupdate. Silahkan Coba Lagi!</div>');
            redirect('c_home/profil');
        }
        
    }

    public function register() 
    {
        $this->form_validation->set_error_delimiters('<small class="text-danger pl-2 pb-2">', '</small>');

        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('jenis_identitas', 'Jenis Identitas', 'required');
        $this->form_validation->set_rules('no_identitas', 'Nomer Identitas', 'required|trim|numeric', ['numeric' => 'No Identitas hanya dapat berisi angka']);
        $this->form_validation->set_rules('no_handphone', 'No Handphone', 'required|numeric', ['numeric' => 'No Handphone hanya dapat berisi angka']);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tbl_customer.email]');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[5]');

        if($this->form_validation->run() == FALSE) {
            $data['title'] = "Register Pendaki | Ciremai";

            $this->session->set_flashdata('message', '<div class="alert alert-danger">Kesalahan data form registrasi. Silahkan ulangi!</div>');

            $this->load->view('main/template/header', $data);
            $this->load->view('main/template/navbar');
            $this->load->view('main/Register', );
            $this->load->view('main/template/end');
        } else {
            $nama = $this->input->post('nama');
            $tanggal_lahir = $this->input->post('tanggal_lahir');
            $alamat = $this->input->post('alamat');
            $jk = $this->input->post('jk');
            $jenis_identitas = $this->input->post('jenis_identitas');
            $no_identitas = $this->input->post('no_identitas');
            $no_handphone = $this->input->post('no_handphone');
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $password = password_hash($password, PASSWORD_BCRYPT);

            $data = [
                'nama' => $nama,
                'tanggal_lahir' => $tanggal_lahir,
                'alamat' => $alamat,
                'jk' => $jk,
                'jenis_identitas' => $jenis_identitas,
                'no_identitas' => $no_identitas,
                'no_handphone' => $no_handphone,
                'email' => $email,
                'password' => $password,
                'foto_identitas' => $this->upload_image()
            ];

            $affected_row = $this->m_customer->insert_customer($data);
			if($affected_row == TRUE){
				$this->session->set_flashdata('message', '<div class="alert alert-success">Akun pendaki baru berhasil terdaftar.</div>');
				redirect('c_home/login');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger">Kesalahan! Silahkan daftar ulang.</div>');
				redirect('c_home/register');
			}
        }
    }

    public function login()
    {
        $this->form_validation->set_error_delimiters('<small class="text-danger pl-2">', '</small>');

        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if($this->form_validation->run() == FALSE) {
            $data['title'] = "Login Pendaki | Ciremai";

            $this->load->view('main/template/header', $data);
            $this->load->view('main/template/navbar');
            $this->load->view('main/Login');
            $this->load->view('main/template/end');
        } else {
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $customer = $this->m_customer->get_customer($email);

            if($customer->num_rows() > 0) {
                $customer = $customer->row_array();
                if(password_verify($password, $customer['password'])) {
                    $session_data = [
                        'id' => $customer['id_customer'],
                        'nama' => $customer['nama'],
                        'tanggal_lahir' => $customer['tanggal_lahir'],
                        'alamat' => $customer['alamat'],
                        'jk' => $customer['jk'],
                        'jenis_identitas' => $customer['jenis_identitas'],
                        'no_identitas' => $customer['no_identitas'],
                        'no_handphone' => $customer['no_handphone'],
                        'email' => $customer['email'],
                        'foto_identitas' => $customer['foto_identitas']
                    ];
                    $this->session->set_userdata($session_data);
                    redirect('c_home');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger">Password tidak sesuai.</div>');
					redirect('c_home/login');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger">Anda belum terdaftar.</div>');
				redirect('c_home/login');	
            }
        }
    }

    public function logout() 
    {
		$this->session->sess_destroy();
		redirect('c_home');
    }

    public function upload_image()
    {
        //Load library upload
        $this->load->library('upload');

        //Variabel untuk memvalidasi file yang diupload
        $config['upload_path'] = './assets/uploaded';
        $config['allowed_types'] = 'jpg|png|jpeg' ;
        $config['encrypt_name'] = TRUE;
        $config['max_size'] = 5024;
             
        $this->upload->initialize($config);
        if(!empty($_FILES['foto_identitas']['name'])){ 
            if($this->upload->do_upload('foto_identitas')){
                //Ambil data dari gambar yang telah diupload
                $img = $this->upload->data();
                //Cek resolusi dari image,jika terlalu besar maka kecilkan image tersebut
                    if($img['image_width'] > 1024 || $img['image_height'] > 768){
                        $config_img['image_library'] = 'gd2';
                        $config_img['source_image'] = $img['full_path'];
                        $config_img['width'] = 1024;
                        $config_img['height'] = 768;
                        $config_img['new_image'] = $img['full_path'];
                        $this->load->library('image_lib', $config_img);
                        $this->image_lib->resize();
                        return $img['file_name']; 
                    } else {
                        return $img['file_name']; }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger text-center">'. $this->upload->display_errors() .'.</div>');
                redirect('c_main/jual_barang'); }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger text-center">Pilih gambar yang mau diupload..!!</div>');
            redirect('c_main/jual_barang');
        }
    }
}