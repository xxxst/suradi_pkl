<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Templatesurat extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('Templatesurat_model');
        $this->load->library('form_validation');
    }
    function proses()
	{
		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = '*';
		$config['max_size']             = 50000;
		$config['max_width']            = 10000;
		$config['max_height']           = 10000;
		$config['encrypt_name']			= FALSE;
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('nama_file'))
		{
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('managemensurat/form_upload', $error);
		}
		else
		{
			$data['nama_surat'] = $this->input->post('nama_surat');
            $data['klasifikasi'] = $this->input->post('klasifikasi');
            
            $data['module'] = $this->input->post('module');
            $data['nama_file'] = $this->upload->data("file_name");
			$this->db->insert('t_template',$data);
			redirect('managemensurat');
		}
	}
    public function index()
	{
		check_admin();
		check_not_login();
        $data['title']='Managemen Surat';
		$data['nama_file'] = $this->db->get('t_template');
        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
		$this->load->view('managemensurat/index',$data);
        $this->load->view('templates/footer');
	}
    function download($id)
	{
		$data = $this->db->get_where('t_template',['id'=>$id])->row();
		force_download('uploads/'.$data->nama_file,NULL);
	}

	public function templatesurat()
	{
		check_not_login();
		$data['title']='Download Template Surat';
		$data['nama_file'] = $this->db->get('t_template');
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templatesurat/index',$data);
		$this->load->view('templates/footer');
	}
}
