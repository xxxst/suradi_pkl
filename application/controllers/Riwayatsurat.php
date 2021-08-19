<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Riwayatsurat extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('Riwayatsurat_model');
        $this->load->model('Suratkeluar_model');
        $this->load->library('form_validation');
    }

	public function index()
	{
        $data['row']=$this->Riwayatsurat_model->get();
        $data['title']='Riwayat Perjalanan Surat';
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('riwayatsurat/index',$data);
		$this->load->view('templates/footer');
	}
}
