<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {


	public function __construct(){
		parent::__construct();
		if($this->session->userdata('hak_akses') != "admin") { 
			redirect(base_url());
		} else {
			$this->load->Model('Master_model');
			$this->load->Model('Combo_model');
		}
	}


	public function index() {
		redirect(base_url());
	}


	public function jurusan() {
		$d['judul'] = "Data Jurusan";
		$d['jurusan'] = $this->Master_model->jurusan();
		$this->load->view('top',$d);
		$this->load->view('menu');
		$this->load->view('jurusan/jurusan');
		$this->load->view('bottom');	
	}


	public function jurusan_tambah() {
		$d['judul'] = "Data Jurusan";
		$d['judul2'] = "Tambah";
		$d['tipe'] = 'add';
		$d['nama_jurusan'] = "";
		$d['kode_jurusan'] = "";
		$d['id_jurusan'] = "";
		$d['aktif_jurusan'] = "";
		$this->load->view('top',$d);
		$this->load->view('menu');
		$this->load->view('jurusan/jurusan_tambah');
		$this->load->view('bottom');
		
	}


	public function jurusan_edit($id_jurusan) {
		$cek = $this->db->query("SELECT id_jurusan FROM mst_jurusan WHERE id_jurusan = '$id_jurusan'");
		if($cek->num_rows() > 0) { 
			$d['judul'] = "Data Jurusan";
			$d['judul2'] = "Ubah";
			$d['tipe'] = 'edit';
			$get = $this->Master_model->jurusan_edit($id_jurusan);
			$data = $get->row();
			$d['id_jurusan'] = $data->id_jurusan;
			$d['nama_jurusan'] = $data->nama_jurusan;
			$d['kode_jurusan'] = $data->kode_jurusan;
			$d['aktif_jurusan'] = $data->aktif_jurusan;
			$this->load->view('top',$d);
			$this->load->view('menu');
			$this->load->view('jurusan/jurusan_tambah');
			$this->load->view('bottom');
		} else {
			$this->load->view('top');
			$this->load->view('menu');
			$this->load->view('404');
			$this->load->view('bottom');
		}	
	}

	public function jurusan_save() {
			$tipe = $this->input->post("tipe");	
			$in['nama_jurusan'] = $this->input->post("nama_jurusan");
			$in['kode_jurusan'] = $this->input->post("kode_jurusan");
			
			if($tipe == "add") {
				$cek = $this->db->query("SELECT kode_jurusan FROM mst_jurusan WHERE kode_jurusan = '$in[kode_jurusan]'");
				$cek2 = $this->db->query("SELECT nama_jurusan FROM mst_jurusan WHERE nama_jurusan = '$in[nama_jurusan]'");
				if($cek->num_rows() > 0) { 
					$this->session->set_flashdata("error","Gagal Input. Kode Jurusan Sudah Digunakan");
					redirect("master/jurusan_tambah");	
				} else if($cek2->num_rows() > 0) { 
					$this->session->set_flashdata("error","Gagal Input. Nama Jurusan Sudah Digunakan");
					redirect("master/jurusan_tambah");	
				} else { 	
					$this->db->insert("mst_jurusan",$in);
					$this->session->set_flashdata("success","Tambah Data Jurusan Berhasil");
					redirect("master/jurusan");	
				}
			} elseif($tipe = 'edit') {
				$where['id_jurusan'] 	= $this->input->post('id_jurusan');
				$cek = $this->db->query("SELECT kode_jurusan FROM mst_jurusan WHERE kode_jurusan = '$in[kode_jurusan]' AND id_jurusan != '$where[id_jurusan]'");
				$cek2 = $this->db->query("SELECT nama_jurusan FROM mst_jurusan WHERE nama_jurusan = '$in[nama_jurusan]' AND id_jurusan != '$where[id_jurusan]'");
				if($cek->num_rows() > 0) { 
					$this->session->set_flashdata("error","Gagal Input. Kode Jurusan Sudah Digunakan");
					redirect("master/jurusan/jurusan_edit/".$this->input->post("id_jurusan"));
				} else if($cek2->num_rows() > 0) { 
					$this->session->set_flashdata("error","Gagal Input. Nama Jurusan Sudah Digunakan");
					redirect("master/jurusan/jurusan_edit/".$this->input->post("id_jurusan"));
				} else { 	
					$in['aktif_jurusan'] = $this->input->post("aktif_jurusan");
					$this->db->update("mst_jurusan",$in,$where);
					$this->session->set_flashdata("success","Ubah Data jurusan Berhasil");
					redirect("master/jurusan");	
				}
				
			} else {
				redirect(base_url());
			}
	}


	public function tahun_ajaran() {
		$d['judul'] = "Data Tahun Ajaran";
		$d['tahun_ajaran'] = $this->Master_model->tahun_ajaran();
		$this->load->view('top',$d);
		$this->load->view('menu');
		$this->load->view('tahun_ajaran/tahun_ajaran');
		$this->load->view('bottom');	
	}


	public function tahun_ajaran_tambah() {
		$d['judul'] = "Data Tahun Ajaran";
		$d['judul2'] = "Tambah";
		$d['tipe'] = 'add';
		$d['tahun_ajaran'] = "";
		$d['semester'] = "";
		$d['id_tahun_ajaran'] = "";
		$d['aktif_tahun_ajaran'] = "";
		$this->load->view('top',$d);
		$this->load->view('menu');
		$this->load->view('tahun_ajaran/tahun_ajaran_tambah');
		$this->load->view('bottom');
		
	}


	public function tahun_ajaran_edit($id_tahun_ajaran) {
		$cek = $this->db->query("SELECT id_tahun_ajaran FROM mst_tahun_ajaran WHERE id_tahun_ajaran = '$id_tahun_ajaran'");
		if($cek->num_rows() > 0) { 
			$d['judul'] = "Data Tahun Ajaran";
			$d['judul2'] = "Ubah";
			$d['tipe'] = 'edit';
			$get = $this->Master_model->tahun_ajaran_edit($id_tahun_ajaran);
			$data = $get->row();
			$d['id_tahun_ajaran'] = $data->id_tahun_ajaran;
			$d['tahun_ajaran'] = $data->tahun_ajaran;
			$d['semester'] = $data->semester;
			$d['aktif_tahun_ajaran'] = $data->aktif_tahun_ajaran;
			$this->load->view('top',$d);
			$this->load->view('menu');
			$this->load->view('tahun_ajaran/tahun_ajaran_tambah');
			$this->load->view('bottom');
		} else {
			$this->load->view('top');
			$this->load->view('menu');
			$this->load->view('404');
			$this->load->view('bottom');
		}	
	}

	public function tahun_ajaran_save() {
			$tipe = $this->input->post("tipe");	
			$in['tahun_ajaran'] = $this->input->post("tahun_ajaran");
			$in['semester'] = $this->input->post("semester");
			
			if($tipe == "add") {
				$cek = $this->db->query("SELECT tahun_ajaran FROM mst_tahun_ajaran WHERE tahun_ajaran = '$in[tahun_ajaran]' AND semester = '$in[semester]'");
				if($cek->num_rows() > 0) { 
					$this->session->set_flashdata("error","Gagal Input. Tahun Ajaran & Semester Sudah Digunakan");
					redirect("master/tahun_ajaran_tambah");	
				} else { 	
					$this->db->query("UPDATE mst_tahun_ajaran SET aktif_tahun_ajaran = 0");
					$this->db->insert("mst_tahun_ajaran",$in);
					$this->session->set_flashdata("success","Tambah Data Tahun Ajaran Berhasil");
					redirect("master/tahun_ajaran");	
				}
			} elseif($tipe = 'edit') {
				$where['id_tahun_ajaran'] 	= $this->input->post('id_tahun_ajaran');
				$cek = $this->db->query("SELECT tahun_ajaran FROM mst_tahun_ajaran WHERE tahun_ajaran = '$in[tahun_ajaran]' AND semester = '$in[semester]' AND id_tahun_ajaran != '$where[id_tahun_ajaran]'");
				if($cek->num_rows() > 0) { 
					$this->session->set_flashdata("error","Gagal Input. Tahun Ajaran & Semester Sudah Digunakan");
					redirect("master/tahun_ajaran/tahun_ajaran_edit/".$this->input->post("id_tahun_ajaran"));
				} else { 	
					if($this->input->post("aktif_tahun_ajaran") == 1) {
						$this->db->query("UPDATE mst_tahun_ajaran SET aktif_tahun_ajaran = 0");
					}

					$in['aktif_tahun_ajaran'] = $this->input->post("aktif_tahun_ajaran");
					$this->db->update("mst_tahun_ajaran",$in,$where);
					$this->session->set_flashdata("success","Ubah Data Tahun Ajaran Berhasil");
					redirect("master/tahun_ajaran");	
				}
				
			} else {
				redirect(base_url());
			}
	}


	public function kelas() {
		$d['judul'] = "Data Kelas";
		$d['kelas'] = $this->Master_model->kelas();
		$this->load->view('top',$d);
		$this->load->view('menu');
		$this->load->view('kelas/kelas');
		$this->load->view('bottom');	
	}


	public function kelas_tambah() {
		$d['judul'] = "Data Kelas";
		$d['judul2'] = "Tambah";
		$d['tipe'] = 'add';
		$d['nama_kelas'] = "";
		$d['kode_kelas'] = "";
		$d['id_kelas'] = "";
		$d['aktif_kelas'] = "";
		$this->load->view('top',$d);
		$this->load->view('menu');
		$this->load->view('kelas/kelas_tambah');
		$this->load->view('bottom');
		
	}


	public function kelas_edit($id_kelas) {
		$cek = $this->db->query("SELECT id_kelas FROM mst_kelas WHERE id_kelas = '$id_kelas'");
		if($cek->num_rows() > 0) { 
			$d['judul'] = "Data kelas";
			$d['judul2'] = "Ubah";
			$d['tipe'] = 'edit';
			$get = $this->Master_model->kelas_edit($id_kelas);
			$data = $get->row();
			$d['id_kelas'] = $data->id_kelas;
			$d['nama_kelas'] = $data->nama_kelas;
			$d['kode_kelas'] = $data->kode_kelas;
			$d['aktif_kelas'] = $data->aktif_kelas;
			$this->load->view('top',$d);
			$this->load->view('menu');
			$this->load->view('kelas/kelas_tambah');
			$this->load->view('bottom');
		} else {
			$this->load->view('top');
			$this->load->view('menu');
			$this->load->view('404');
			$this->load->view('bottom');
		}	
	}

	public function kelas_save() {
			$tipe = $this->input->post("tipe");	
			$in['nama_kelas'] = $this->input->post("nama_kelas");
			$in['kode_kelas'] = $this->input->post("kode_kelas");
			
			if($tipe == "add") {
				$cek = $this->db->query("SELECT kode_kelas FROM mst_kelas WHERE kode_kelas = '$in[kode_kelas]'");
				$cek2 = $this->db->query("SELECT nama_kelas FROM mst_kelas WHERE nama_kelas = '$in[nama_kelas]'");
				if($cek->num_rows() > 0) { 
					$this->session->set_flashdata("error","Gagal Input. Kode kelas Sudah Digunakan");
					redirect("master/kelas_tambah");	
				} else if($cek2->num_rows() > 0) { 
					$this->session->set_flashdata("error","Gagal Input. Nama kelas Sudah Digunakan");
					redirect("master/kelas_tambah");	
				} else { 	
					$this->db->insert("mst_kelas",$in);
					$this->session->set_flashdata("success","Tambah Data kelas Berhasil");
					redirect("master/kelas");	
				}
			} elseif($tipe = 'edit') {
				$where['id_kelas'] 	= $this->input->post('id_kelas');
				$cek = $this->db->query("SELECT kode_kelas FROM mst_kelas WHERE kode_kelas = '$in[kode_kelas]' AND id_kelas != '$where[id_kelas]'");
				$cek2 = $this->db->query("SELECT nama_kelas FROM mst_kelas WHERE nama_kelas = '$in[nama_kelas]' AND id_kelas != '$where[id_kelas]'");
				if($cek->num_rows() > 0) { 
					$this->session->set_flashdata("error","Gagal Input. Kode kelas Sudah Digunakan");
					redirect("master/kelas/kelas_edit/".$this->input->post("id_kelas"));
				} else if($cek2->num_rows() > 0) { 
					$this->session->set_flashdata("error","Gagal Input. Nama kelas Sudah Digunakan");
					redirect("master/kelas/kelas_edit/".$this->input->post("id_kelas"));
				} else { 	
					$in['aktif_kelas'] = $this->input->post("aktif_kelas");
					$this->db->update("mst_kelas",$in,$where);
					$this->session->set_flashdata("success","Ubah Data kelas Berhasil");
					redirect("master/kelas");	
				}
				
			} else {
				redirect(base_url());
			}
	}


	public function kelompok_pelajaran() {
		$d['judul'] = "Data Kelompok Pelajaran";
		$d['kelompok_pelajaran'] = $this->Master_model->kelompok_pelajaran();
		$this->load->view('top',$d);
		$this->load->view('menu');
		$this->load->view('kelompok_pelajaran/kelompok_pelajaran');
		$this->load->view('bottom');	
	}


	public function kelompok_pelajaran_tambah() {
		$d['judul'] = "Data Kelompok Pelajaran";
		$d['judul2'] = "Tambah";
		$d['tipe'] = 'add';
		$d['nama_kelompok_pelajaran'] = "";
		$d['id_kelompok_pelajaran'] = "";
		$d['aktif_kelompok_pelajaran'] = "";
		$this->load->view('top',$d);
		$this->load->view('menu');
		$this->load->view('kelompok_pelajaran/kelompok_pelajaran_tambah');
		$this->load->view('bottom');
		
	}


	public function kelompok_pelajaran_edit($id_kelompok_pelajaran) {
		$cek = $this->db->query("SELECT id_kelompok_pelajaran FROM mst_kelompok_pelajaran WHERE id_kelompok_pelajaran = '$id_kelompok_pelajaran'");
		if($cek->num_rows() > 0) { 
			$d['judul'] = "Data Kelompok Pelajaran";
			$d['judul2'] = "Ubah";
			$d['tipe'] = 'edit';
			$get = $this->Master_model->kelompok_pelajaran_edit($id_kelompok_pelajaran);
			$data = $get->row();
			$d['id_kelompok_pelajaran'] = $data->id_kelompok_pelajaran;
			$d['nama_kelompok_pelajaran'] = $data->nama_kelompok_pelajaran;
			$d['aktif_kelompok_pelajaran'] = $data->aktif_kelompok_pelajaran;
			$this->load->view('top',$d);
			$this->load->view('menu');
			$this->load->view('kelompok_pelajaran/kelompok_pelajaran_tambah');
			$this->load->view('bottom');
		} else {
			$this->load->view('top');
			$this->load->view('menu');
			$this->load->view('404');
			$this->load->view('bottom');
		}	
	}

	public function kelompok_pelajaran_save() {
			$tipe = $this->input->post("tipe");	
			$in['nama_kelompok_pelajaran'] = $this->input->post("nama_kelompok_pelajaran");
			
			if($tipe == "add") {
				$cek = $this->db->query("SELECT id_kelompok_pelajaran FROM mst_kelompok_pelajaran WHERE id_kelompok_pelajaran = '$in[id_kelompok_pelajaran]'");
				if($cek->num_rows() > 0) { 
					$this->session->set_flashdata("error","Gagal Input. Nama Kelompok Pelajaran Sudah Digunakan");
					redirect("master/kelompok_pelajaran_tambah");	
				} else { 	
					$this->db->insert("mst_kelompok_pelajaran",$in);
					$this->session->set_flashdata("success","Tambah Data Kelompok Pelajaran Berhasil");
					redirect("master/kelompok_pelajaran");	
				}
			} elseif($tipe = 'edit') {
				$where['id_kelompok_pelajaran'] 	= $this->input->post('id_kelompok_pelajaran');
				$cek = $this->db->query("SELECT nama_kelompok_pelajaran FROM mst_kelompok_pelajaran WHERE nama_kelompok_pelajaran = '$in[nama_kelompok_pelajaran]' AND id_kelompok_pelajaran != '$where[id_kelompok_pelajaran]'");
				if($cek->num_rows() > 0) { 
					$this->session->set_flashdata("error","Gagal Input. Nama Kelompok Pelajaran Sudah Digunakan");
					redirect("master/kelompok_pelajaran/kelompok_pelajaran_edit/".$this->input->post("id_kelompok_pelajaran"));
				} else { 	
					$in['aktif_kelompok_pelajaran'] = $this->input->post("aktif_kelompok_pelajaran");
					$this->db->update("mst_kelompok_pelajaran",$in,$where);
					$this->session->set_flashdata("success","Ubah Data Kelompok Pelajaran Berhasil");
					redirect("master/kelompok_pelajaran");	
				}
				
			} else {
				redirect(base_url());
			}
	}


	public function mapel() {
		$d['judul'] = "Data Mata Pelajaran";
		$d['mapel'] = $this->Master_model->mapel();
		$this->load->view('top',$d);
		$this->load->view('menu');
		$this->load->view('mapel/mapel');
		$this->load->view('bottom');	
	}


	public function mapel_tambah() {
		$d['judul'] = "Data Mata Pelajaran";
		$d['judul2'] = "Tambah";
		$d['tipe'] = 'add';
		$d['nama_mapel'] = "";
		$d['kode_mapel'] = "";
		$d['id_mapel'] = "";
		$d['kkm'] = "";
		$d['aktif_mapel'] = "";
		$d['combo_kelompok_pelajaran'] = $this->Combo_model->combo_kelompok_pelajaran();
		$this->load->view('top',$d);
		$this->load->view('menu');
		$this->load->view('mapel/mapel_tambah');
		$this->load->view('bottom');
		
	}


	public function mapel_edit($id_mapel) {
		$cek = $this->db->query("SELECT id_mapel FROM mst_mapel WHERE id_mapel = '$id_mapel'");
		if($cek->num_rows() > 0) { 
			$d['judul'] = "Data mapel";
			$d['judul2'] = "Ubah";
			$d['tipe'] = 'edit';
			$get = $this->Master_model->mapel_edit($id_mapel);
			$data = $get->row();
			$d['id_mapel'] = $data->id_mapel;
			$d['nama_mapel'] = $data->nama_mapel;
			$d['kode_mapel'] = $data->kode_mapel;
			$d['kkm'] = $data->kkm;
			$d['aktif_mapel'] = $data->aktif_mapel;
			$d['combo_kelompok_pelajaran'] = $this->Combo_model->combo_kelompok_pelajaran($data->id_kelompok_pelajaran);
			$this->load->view('top',$d);
			$this->load->view('menu');
			$this->load->view('mapel/mapel_tambah');
			$this->load->view('bottom');
		} else {
			$this->load->view('top');
			$this->load->view('menu');
			$this->load->view('404');
			$this->load->view('bottom');
		}	
	}

	public function mapel_save() {
			$tipe = $this->input->post("tipe");	
			$in['nama_mapel'] = $this->input->post("nama_mapel");
			$in['kode_mapel'] = $this->input->post("kode_mapel");
			$in['kkm'] = $this->input->post("kkm");
			$in['id_kelompok_pelajaran'] = $this->input->post("id_kelompok_pelajaran");
			
			if($tipe == "add") {
				$cek = $this->db->query("SELECT kode_mapel FROM mst_mapel WHERE kode_mapel = '$in[kode_mapel]'");
				$cek2 = $this->db->query("SELECT nama_mapel FROM mst_mapel WHERE nama_mapel = '$in[nama_mapel]'");
				if($cek->num_rows() > 0) { 
					$this->session->set_flashdata("error","Gagal Input. Kode Mata Pelajaran Sudah Digunakan");
					redirect("master/mapel_tambah");	
				} else if($cek2->num_rows() > 0) { 
					$this->session->set_flashdata("error","Gagal Input. Nama Mata Pelajaran Sudah Digunakan");
					redirect("master/mapel_tambah");	
				} else { 	
					$this->db->insert("mst_mapel",$in);
					$this->session->set_flashdata("success","Tambah Data Mata Pelajaran Berhasil");
					redirect("master/mapel");	
				}
			} elseif($tipe = 'edit') {
				$where['id_mapel'] 	= $this->input->post('id_mapel');
				$cek = $this->db->query("SELECT kode_mapel FROM mst_mapel WHERE kode_mapel = '$in[kode_mapel]' AND id_mapel != '$where[id_mapel]'");
				$cek2 = $this->db->query("SELECT nama_mapel FROM mst_mapel WHERE nama_mapel = '$in[nama_mapel]' AND id_mapel != '$where[id_mapel]'");
				if($cek->num_rows() > 0) { 
					$this->session->set_flashdata("error","Gagal Input. Kode Mata Pelajaran Sudah Digunakan");
					redirect("master/mapel/mapel_edit/".$this->input->post("id_mapel"));
				} else if($cek2->num_rows() > 0) { 
					$this->session->set_flashdata("error","Gagal Input. Nama Mata Pelajaran Sudah Digunakan");
					redirect("master/mapel/mapel_edit/".$this->input->post("id_mapel"));
				} else { 	
					$in['aktif_mapel'] = $this->input->post("aktif_mapel");
					$this->db->update("mst_mapel",$in,$where);
					$this->session->set_flashdata("success","Ubah Data Mata Pelajaran Berhasil");
					redirect("master/mapel");	
				}
				
			} else {
				redirect(base_url());
			}
	}

	public function predikat() {
		$d['judul'] = "Data Rentang Nilai / Predikat";
		$d['mapel'] = $this->Master_model->predikat();
		$this->load->view('top',$d);
		$this->load->view('menu');
		$this->load->view('predikat/predikat');
		$this->load->view('bottom');	
	}

	public function predikat_save() {
		if(!empty($this->input->post("id_predikat"))) {
			if(!empty($this->input->post("dari_nilai"))) {
				$in['dari_nilai'] = $this->input->post("dari_nilai");
			}
		
			if(!empty($this->input->post("sampai_nilai"))) {
				$in['sampai_nilai'] = $this->input->post("sampai_nilai");
			}
			
			$where['id_predikat'] = $this->input->post("id_predikat");
			$this->db->update("mst_predikat",$in,$where);
		}
	}


	public function proses_tampil_walikelas() {
		$tahun_ajaran = $this->input->post("tahun_ajaran");
		$tahun_ajaran = str_replace("/","-",$this->input->post("tahun_ajaran"));
		redirect("master/walikelas/".$tahun_ajaran);
	}

	public function walikelas($tahun_ajaran="") {
		$d['judul'] = "Data Wali Kelas";
		if(!empty($tahun_ajaran)) {
			$tahun_ajaran = str_replace("-","/",$tahun_ajaran);
			$d['walikelas'] = $this->Master_model->walikelas($tahun_ajaran);
		} else {
			$d['walikelas'] = "";
		}
		$d['combo_tahun_ajaran'] = $this->Combo_model->combo_tahun_ajaran_only($tahun_ajaran);
		$this->load->view('top',$d);
		$this->load->view('menu');
		$this->load->view('walikelas/walikelas');
		$this->load->view('bottom');	
	}


	public function walikelas_tambah() {
		$d['judul'] = "Data Wali Kelas";
		$d['judul2'] = "Tambah";
		$d['tipe'] = 'add';
		$d['combo_tahun_ajaran'] = $this->Combo_model->combo_tahun_ajaran_only();
		$d['combo_guru'] = $this->Combo_model->combo_guru();
		$d['combo_kelas'] = $this->Combo_model->combo_kelas();
		$d['id_walikelas'] = "";
		$this->load->view('top',$d);
		$this->load->view('menu');
		$this->load->view('walikelas/walikelas_tambah');
		$this->load->view('bottom');
		
	}


	public function walikelas_edit($id_walikelas) {
		$cek = $this->db->query("SELECT * FROM mst_walikelas WHERE id_walikelas = '$id_walikelas'");
		if($cek->num_rows() > 0) { 
			$d['judul'] = "Data Wali Kelas";
			$d['judul2'] = "Ubah";
			$d['tipe'] = 'edit';
			$data = $cek->row();
			$d['id_walikelas'] = $data->id_walikelas;
			$d['combo_tahun_ajaran'] = $this->Combo_model->combo_tahun_ajaran_only($data->tahun_ajaran);
			$d['combo_guru'] = $this->Combo_model->combo_guru($data->id_guru);
			$d['combo_kelas'] = $this->Combo_model->combo_kelas($data->id_kelas);
			$this->load->view('top',$d);
			$this->load->view('menu');
			$this->load->view('walikelas/walikelas_tambah');
			$this->load->view('bottom');
		} else {
			$this->load->view('top');
			$this->load->view('menu');
			$this->load->view('404');
			$this->load->view('bottom');
		}	
	}

	public function walikelas_save() {
			$tipe = $this->input->post("tipe");	
			$in['id_guru'] = $this->input->post("id_guru");
			$in['id_kelas'] = $this->input->post("id_kelas");
			$in['tahun_ajaran'] = $this->input->post("tahun_ajaran");

			$tahun_ajaran = str_replace("/","-",$in['tahun_ajaran']);
			
			if($tipe == "add") {
				$cek = $this->db->query("SELECT id_walikelas FROM mst_walikelas WHERE id_guru = '$in[id_guru]' AND tahun_ajaran = '$in[tahun_ajaran]'");
				if($cek->num_rows() > 0) { 
					$this->session->set_flashdata("error","Gagal Input. Guru Sudah Pernah Diinput Menjadi Wali Kelas Pada Tahun Ajaran ".$in['tahun_ajaran']);
					redirect("master/walikelas_tambah");	
				}  else { 	
					$this->db->insert("mst_walikelas",$in);
					$this->session->set_flashdata("success","Tambah Data Wali Kelas Berhasil");
					redirect("master/walikelas/".$tahun_ajaran);	
				}
			} elseif($tipe = 'edit') {
				$where['id_walikelas'] 	= $this->input->post('id_walikelas');
				$cek = $this->db->query("SELECT id_walikelas FROM mst_walikelas WHERE id_guru = '$in[id_guru]' AND tahun_ajaran = '$in[tahun_ajaran]' AND id_walikelas != '$where[id_walikelas]'");
				if($cek->num_rows() > 0) { 
					$this->session->set_flashdata("error","Gagal Input. Guru Sudah Pernah Diinput Menjadi Wali Kelas Pada Tahun Ajaran ".$in['tahun_ajaran']);
					redirect("master/walikelas/walikelas_edit/".$this->input->post("id_walikelas"));
				}  else { 	
					$this->db->update("mst_walikelas",$in,$where);
					$this->session->set_flashdata("success","Ubah Data Wali Kelas Berhasil");
					redirect("master/walikelas/".$tahun_ajaran);	
				}
			} else {
				redirect(base_url());
			}
	}

	public function walikelas_hapus($id_walikelas) {
		$id_walikelas = preg_replace( '/[^0-9]/', '', $id_walikelas );
		if(!empty($id_walikelas)) {
			$cek = $this->db->query("SELECT id_walikelas FROM mst_walikelas WHERE id_walikelas = $id_walikelas");
			if($cek->num_rows() > 0) {
				$where['id_walikelas'] = $id_walikelas;
				$this->db->delete("mst_walikelas",$where);
				redirect("master/walikelas/");
			} else {
				redirect(base_url());
			}
		} else {
			redirect(base_url());
		}
	}
}