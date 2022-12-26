<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web extends CI_Controller {

	public function index()
	{
		$data['web_ppdb']	 = $this->db->get_where('tbl_web', "id_web='1'")->row();
		$this->load->view('web/index', $data);
	}

	public function pendaftaran()
	{
		$data['web_ppdb']	 = $this->db->get_where('tbl_web', "id_web='1'")->row();
		if ($data['web_ppdb']->status_ppdb == 'tutup') {
			redirect('404');
		}

		$this->db->order_by('id_pdd', 'ASC');
		$data['v_pdd'] = $this->db->get('tbl_pdd')->result();

		$this->db->order_by('id_penghasilan', 'ASC');
		$data['v_penghasilan'] = $this->db->get('tbl_penghasilan')->result();

		$this->db->where('ket_pekerjaan', 'ayah');
		$this->db->order_by('id_pekerjaan', 'ASC');
		$data['v_pekerjaan_ayah'] = $this->db->get('tbl_pekerjaan')->result();

		$this->db->where('ket_pekerjaan', 'ibu');
		$this->db->order_by('id_pekerjaan', 'ASC');
		$data['v_pekerjaan_ibu'] = $this->db->get('tbl_pekerjaan')->result();

		$this->db->order_by('id_pekerjaan', 'ASC');
		$this->db->group_by('nama_pekerjaan');
		$data['v_pekerjaan_wali'] = $this->db->get('tbl_pekerjaan')->result();

		$this->load->view('web/pendaftaran', $data);

		if (isset($_POST['btndaftar'])) {
			$this->db->order_by('id_siswa', 'DESC');
			$sql 		= $this->db->get('tbl_siswa');
			if ($sql->num_rows() == 0) {
				$str_time = date('ymdHis');
			  $no_pendaftaran   = "PSB"."$str_time"."001";
			}else{
				$str_time = date('ymdHis');
			  $noUrut 	 	= substr($sql->row()->no_pendaftaran, 8, 3);
			  $noUrut++;
			  $no_pendaftaran	  = "PSB"."$str_time".sprintf("%03s", $noUrut);
			}

			$nis							= $this->input->post('nis');
			$nisn							= $this->input->post('nisn');
			$nik							= $this->input->post('nik');
			$nama_lengkap			= $this->input->post('nama_lengkap');
			$jk								= $this->input->post('jk');
			$tempat_lahir			= $this->input->post('tempat_lahir');
			$tgl_lahir				= $this->input->post('tgl_lahir')."-".$this->input->post('bln_lahir')."-".$this->input->post('thn_lahir');
			$agama						= $this->input->post('agama');
			$status_keluarga	= $this->input->post('status_keluarga');
			$alamat_siswa			= $this->input->post('alamat_siswa');
			$no_hp_siswa			= $this->input->post('no_hp_siswa');
			$nama_ayah				= $this->input->post('nama_ayah');
			$pdd_ayah					= $this->input->post('pdd_ayah');
			$pekerjaan_ayah		= $this->input->post('pekerjaan_ayah');
			$penghasilan_ayah	= $this->input->post('penghasilan_ayah');
			$no_hp_ayah				= $this->input->post('no_hp_ayah');
			$nama_ibu					= $this->input->post('nama_ibu');
			$pdd_ibu					= $this->input->post('pdd_ibu');
			$pekerjaan_ibu		= $this->input->post('pekerjaan_ibu');
			$penghasilan_ibu	= $this->input->post('penghasilan_ibu');
			$no_hp_ibu				= $this->input->post('no_hp_ibu');
			$nama_wali				= $this->input->post('nama_wali');
			$pdd_wali					= $this->input->post('pdd_wali');
			$pekerjaan_wali		= $this->input->post('pekerjaan_wali');
			$penghasilan_wali	= $this->input->post('penghasilan_wali');
			$no_hp_wali				= $this->input->post('no_hp_wali');
			$npsn							= $this->input->post('npsn');
			$nama_sekolah			= $this->input->post('nama_sekolah');
			$status_sekolah		= $this->input->post('status_sekolah');
			$model_un					= $this->input->post('model_un');
			$alamat_sekolah		= $this->input->post('alamat_sekolah');
			$thn_lulus				= $this->input->post('thn_lulus');
			$rayonisasi				= $this->input->post('rayonisasi');
			$tgl_siswa				= $this->Model_data->date('waktu_default');
			$kk = $_FILES['kk'];
			if ($kk=''){} else{
				$config['upload_path'] = './upload/kk';
				$config['allowed_types'] = 'pdf';
				$this->upload->initialize($config);

				$this->load->library('upload', $config);
				if(!$this->upload->do_upload('kk')){
					echo  $this->upload->display_errors();die();
				}else{
					$kk=$this->upload->data('file_name');
				}
			}

			$akte = $_FILES['akte'];
			if ($akte=''){} else{
				$config['upload_path'] = './upload/akte';
				$config['allowed_types'] = 'pdf';
				$this->upload->initialize($config);

				$this->load->library('upload', $config);
				if(!$this->upload->do_upload('akte')){
					echo  $this->upload->display_errors();die();
				}else{
					$akte=$this->upload->data('file_name');
				}
			}

			$ijazah = $_FILES['ijazah'];
			if ($ijazah=''){} else{
				$config['upload_path'] = './upload/ijazah';
				$config['allowed_types'] = 'jpg|pdf';
				$this->upload->initialize($config);

				$this->load->library('upload', $config);
				if(!$this->upload->do_upload('ijazah')){
					$ijazah['ijazah']='default.jpg';
				}else{
					$ijazah=$this->upload->data('file_name');
				}
			}

			$pas_foto = $_FILES['pas_foto'];
			if ($pas_foto=''){} else{
				$config['upload_path'] = './upload/foto';
				$config['allowed_types'] = 'jpg|jpeg|png';
				$this->upload->initialize($config);

				$this->load->library('upload', $config);
				if(!$this->upload->do_upload('pas_foto')){
					echo  $this->upload->display_errors();die();
				}else{
					$pas_foto=$this->upload->data('file_name');
				}
			}

			$ktp_ortu = $_FILES['ktp_ortu'];
			if ($ktp_ortu=''){} else{
				$config['upload_path'] = './upload/ktp';
				$config['allowed_types'] = 'pdf';
				$this->upload->initialize($config);

				$this->load->library('upload', $config);
				if(!$this->upload->do_upload('ktp_ortu')){
					echo  $this->upload->display_errors();die();
				}else{
					$ktp_ortu=$this->upload->data('file_name');
				}
			}



			
					$data = array(
						'no_pendaftaran'		=> $no_pendaftaran,
						'password'				  => $nik,
						'nis'					  		=> $nis,
						'nisn'				  		=> $nisn,
						'nik'				  			=> $nik,
						'nama_lengkap'			=> $nama_lengkap,
						'jk'				  			=> $jk,
						'tempat_lahir'			=> $tempat_lahir,
						'tgl_lahir'				  => $tgl_lahir,
						
						'status_keluarga'		=> $status_keluarga,
						'alamat_siswa'			=> $alamat_siswa,
						'no_hp_siswa'				=> $no_hp_siswa,
						'nama_ayah'				  => $nama_ayah,
						'pdd_ayah'				  => $pdd_ayah,
						'pekerjaan_ayah'		=> $pekerjaan_ayah,
						'penghasilan_ayah'	=> $penghasilan_ayah,
						'no_hp_ayah'				=> $no_hp_ayah,
						'nama_ibu'				  => $nama_ibu,
						'pdd_ibu'				  	=> $pdd_ibu,
						'pekerjaan_ibu'			=> $pekerjaan_ibu,
						'penghasilan_ibu'		=> $penghasilan_ibu,
						'no_hp_ibu'				  => $no_hp_ibu,
						'nama_wali'				  => $nama_wali,
						'pdd_wali'				  => $pdd_wali,
						'pekerjaan_wali'		=> $pekerjaan_wali,
						'penghasilan_wali'	=> $penghasilan_wali,
						'no_hp_wali'				=> $no_hp_wali,
						'npsn_sekolah'  	  => $npsn,
						'nama_sekolah'			=> $nama_sekolah,
						'status_sekolah'		=> $status_sekolah,
						'model_un'				  => $model_un,
						'alamat_sekolah'		=> $alamat_sekolah,
						'thn_lulus'				  => $thn_lulus,
						'rayonisasi'				=> $rayonisasi,
						'tgl_siswa'				  => $tgl_siswa,
						'kk'				  => $kk,
						'ktp_ortu'				  => $ktp_ortu,
						'akte'				  => $akte,
						'ijazah'				  => $ijazah,
						'pas_foto'				  => $pas_foto
					);
					$this->db->insert('tbl_siswa',$data);

					for ($i=1; $i <=5 ; $i++) {
						if ($i == 1) {
							$mapel = 'Ilmu Pengetahuan Alam (IPA)';
							$smstr = 'ipa';
						}elseif ($i == 2) {
							$mapel = 'Ilmu Pengetahuan Sosial (IPS)';
							$smstr = 'ips';
						}elseif ($i == 3) {
							$mapel = 'Matematika';
							$smstr = 'mtk';
						}elseif ($i == 4) {
							$mapel = 'Bahasa Indonesia';
							$smstr = 'ind';
						}elseif ($i == 5) {
							$mapel = 'Bahasa Inggris';
							$smstr = 'ing';
						}
						$data2 = array(
							'mapel'				 		=> $mapel,
							'semester1'		 		=> $this->input->post($smstr."1"),
							'semester2'				=> $this->input->post($smstr."2"),
							'semester3'				=> $this->input->post($smstr."3"),
							'semester4'				=> $this->input->post($smstr."4"),
							'semester5'				=> $this->input->post($smstr."5"),
							'rata_rata_nilai'	=> $this->input->post("nilai_".$smstr),
							'no_pendaftaran'	=> $no_pendaftaran
						);
						$this->db->insert('tbl_rapor',$data2);
					}

					for ($i=1; $i <=7 ; $i++) {
						if ($i == 1) {
							$mapel = 'Pendidikan Agama';
							$nilai = 'agama';
						}elseif ($i == 2) {
							$mapel = 'PKN';
							$nilai = 'pkn';
						}elseif ($i == 3) {
							$mapel = 'Bahasa Indonesia';
							$nilai = 'ind';
						}elseif ($i == 4) {
							$mapel = 'Bahasa Inggris';
							$nilai = 'ing';
						}elseif ($i == 5) {
							$mapel = 'Matematika';
							$nilai = 'mtk';
						}elseif ($i == 6) {
							$mapel = 'Ilmu Pengetahuan Alam (IPA)';
							$nilai = 'ipa';
						}elseif ($i == 7) {
							$mapel = 'Ilmu Pengetahuan Sosial (IPS)';
							$nilai = 'ipa';
						}
						$data3 = array(
							'mapel_usbn'			=> $mapel,
							'nilai_usbn'			=> $this->input->post("usbn_".$nilai),
							'no_pendaftaran'	=> $no_pendaftaran
						);
						$this->db->insert('tbl_nilai_usbn',$data3);
					}

					for ($i=1; $i <=4 ; $i++) {
						if ($i == 1) {
							$mapel = 'Ilmu Pengetahuan Alam (IPA)';
							$nilai = 'ipa';
						}elseif ($i == 2) {
							$mapel = 'Matematika';
							$nilai = 'mtk';
						}elseif ($i == 3) {
							$mapel = 'Bahasa Indonesia';
							$nilai = 'ind';
						}elseif ($i == 4) {
							$mapel = 'Bahasa Inggris';
							$nilai = 'ing';
						}
						$data4 = array(
							'mapel_unbk'			=> $mapel,
							'nilai_unbk'			=> $this->input->post("unbk_".$nilai),
							'no_pendaftaran'	=> $no_pendaftaran
						);
						$this->db->insert('tbl_nilai_unbk',$data4);
					}

						// $this->session->set_flashdata('msg',
						// 	'
						// 	<div class="alert alert-success alert-dismissible" role="alert">
						// 		 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						// 			 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
						// 		 </button>
						// 		 <strong>Sukses!</strong> Berhasil ditambahkan.
						// 	</div>'
						// );
						$this->session->set_userdata('no_pendaftaran', "$no_pendaftaran");
						redirect('panel_siswa');

		}


	}

	public function logcs()
	{
		$data['web_ppdb']	 = $this->db->get_where('tbl_web', "id_web='1'")->row();
		if ($data['web_ppdb']->status_ppdb == 'tutup') {
			redirect('404');
		}
		$ceks = $this->session->userdata('no_pendaftaran');
		if(isset($ceks)) {
			redirect('panel_siswa');
		}else{
			$this->load->view('web/index', $data);

				if (isset($_POST['btnlogin'])){
						 $username = $_POST['username'];
						 $pass	   = $_POST['password'];

						 $this->db->like('tgl_siswa', date('Y'), "after");
						 $query  = $this->db->get_where('tbl_siswa', "no_pendaftaran='$username'");
						 $cek    = $query->result();
						 $cekun  = $cek[0]->no_pendaftaran;
						 $jumlah = $query->num_rows();

						 if($jumlah == 0) {
								 $this->session->set_flashdata('msg',
									 '
									 <div class="alert alert-danger alert-dismissible" role="alert">
									 		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;&nbsp;</span>
											</button>
											<strong>No. Pendaftaran "'.$username.'"</strong> belum terdaftar.
									 </div>'
								 );
								 redirect('logcs');
						 } else {
										 $row = $query->row();
										 $cekpass = $row->password;
										 if($cekpass <> $pass) {
												$this->session->set_flashdata('msg',
													 '<div class="alert alert-warning alert-dismissible" role="alert">
													 		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
																<span aria-hidden="true">&times;&nbsp;</span>
															</button>
															<strong>No. Pendaftaran atau NIK Salah!</strong>.
													 </div>'
												);
												redirect('logcs');
										 } else {

																$this->session->set_userdata('no_pendaftaran', "$cekun");

												 			 	redirect('panel_siswa');
										 }
						 }
				}
		}
	}


	function error_not_found(){
		$this->load->view('404_content');
	}

}
