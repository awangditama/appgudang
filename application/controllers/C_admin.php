	<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class C_Admin extends CI_Controller{
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
			$data1['tanggal'] = date('d-m-Y');
			$data1['driver'] = $this->model_login->ambil_driver();
			$data1['karyawan'] = $this->model_login->ambil_karyawan($this->session->userdata('username'));
 			$data['content'] = $this->load->view('layout/pinjam_mobil/v_insert_mobil', $data1, true);
            $this->load->view('layout/template/template',$data);
		}

		public function proses_add_pinjam_mobil(){
		$this->form_validation->set_rules('jam_mulai', 'jam_mulai', 'required');
        $this->form_validation->set_rules('jam_akhir', 'jam_akhir', 'required');
        $this->form_validation->set_rules('driver', 'driver', 'required');
        $this->form_validation->set_rules('tujuan', 'tujuan', 'required');
        $this->form_validation->set_rules('keperluan', 'keperluan', 'required');
        
        if ($this->form_validation->run()) {
            $nik = $this->input->post('nik', true);
            $nama = $this->input->post('nama', true);
            $tanggal = date("Y-m-d", strtotime($this->input->post('input_tanggal')));
            $jam_mulai = $this->input->post('jam_mulai', true);
            $jam_akhir = $this->input->post('jam_akhir', true);
            $driver = $this->input->post('driver', true);
            $tujuan = $this->input->post('tujuan', true);
         	$keperluan = $this->input->post('keperluan', true);
         	$this->model_login->add_pinjam_mobil($nik,$tanggal,$jam_mulai,$jam_akhir,$tujuan,$keperluan);
        } else {
            $this->session->set_userdata('operation', "duplicate");
            $this->session->set_userdata('message', validation_errors());
            redirect("admin/data_dosen");
        }
		}
	}