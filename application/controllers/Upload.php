<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Upload extends CI_Controller {
 
	function create()
	{
		check_not_login();
        $data['title']='Managemen Surat';
		// $data['row']=$this->Managemensurat_model->get();
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('form_upload',$data);
		$this->load->view('templates/footer');
	}
    function proses()
	{
		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = '*';
		$config['max_size']             = 500;
		$config['max_width']            = 10000;
		$config['max_height']           = 10000;
		$config['encrypt_name']			= TRUE;
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('berkas'))
		{
				$error = array('error' => $this->upload->display_errors());
				$this->load->view('form_upload', $error);
		}
		else
		{
			$data['nama_berkas'] = $this->upload->data("file_name");
			$data['keterangan_berkas'] = $this->input->post('keterangan_berkas');
			$data['tipe_berkas'] = $this->upload->data('file_ext');
			$data['ukuran_berkas'] = $this->upload->data('file_size');
			$this->db->insert('tb_berkas',$data);
			redirect('upload');
		}
	}
    public function index()
	{
		$data['berkas'] = $this->db->get('tb_berkas');
		check_not_login();
        $data['title']='Managemen Surat';
		// $data['row']=$this->Managemensurat_model->get();
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('tampil_berkas',$data);
		$this->load->view('templates/footer');
	}
    function download($id)
	{
		$data = $this->db->get_where('tb_berkas',['kd_berkas'=>$id])->row();
		force_download('uploads/'.$data->nama_berkas,NULL);
	}
}