	<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Login extends CI_Controller {
		/**
		* Index Page for this controller.
		*
		* Maps to the following URL
				* 		http://example.com/index.php/welcome
			*	- or -
				* 		http://example.com/index.php/welcome/index
			*	- or -
		* Since this controller is set as the default controller in
		* config/routes.php, it's displayed at http://example.com/
		*
		* So any other public methods not prefixed with an underscore will
		* map to /index.php/welcome/<method_name>
		* @see https://codeigniter.com/user_guide/general/urls.html
		*/
		public function index()
		{
			$type = $this->session->userdata('type');
			$login = $this->session->userdata('login');

			if ($login != "") {
				if ($type == 1) {
					redirect('c_admin');
				} else if ($type == 2) {
					redirect('c_aprroval');
				} else if ($type == 3) {
					redirect('c_userpengguna');
				} else {
					redirect('login/index.php/c_logout');
				}
			}
			$this->load->view('layout/login');
		}

		public function c_login()
		{
			$this->form_validation->set_rules('username', 'username', 'required');
			$this->form_validation->set_rules('password', 'password', 'required');
			if ($this->form_validation->run()) {
				$username = $this->input->post('username');
				$password = md5($this->input->post('password'));
				$temp = $this->model_login->check_login($username, $password);
				if ($temp == true) {
					redirect(base_url());
				} else {
					$this->session->set_userdata('operation', "gagal");
					$this->session->set_userdata('message', "Username dan Password tidak ditemukan");
					redirect(base_url());
				}
			} else {
				$this->session->set_userdata('operation', "validasi");
				$this->session->set_userdata('message', validation_errors());
				redirect(base_url());
			}

		}

		public function c_logout(){

		}
	}