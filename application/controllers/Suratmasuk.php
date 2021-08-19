<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Suratmasuk extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('Suratmasuk_model');
        $this->load->library('form_validation');
    }

	public function index()
	{
		check_not_login();
        $data['row']=$this->Suratmasuk_model->get();
        $data['title']='Surat Masuk';
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('suratmasuk/index',$data);
		$this->load->view('templates/footer');
	}
}
