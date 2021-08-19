<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendistribusian extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        check_not_login();
        check_admin();
        $this->load->model('Pendistribusian_model');
    }

	public function index()
	{
        $data['row'] = $this->Pendistribusian_model->get();
        $data['title']='Pendistribusian';
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('pendistribusian/index',$data);
		$this->load->view('templates/footer');
    }
	public function kirim($id)
	{
        $query=$this->Pendistribusian_model->get($id);
            if($query->num_rows()>0)
            {
                $pendistribusian=$query->row();
                $data=array(
                    'page'=>'edit',
                    'row'=> $pendistribusian
                );
                $data['title']='Kirim Surat';
                $this->load->view('templates/header',$data);
                $this->load->view('templates/sidebar',$data);
                $this->load->view('pendistribusian/kirim',$data);
                $this->load->view('templates/footer');
            } else
            {
                echo "<script>alert('Data tidak ditemukan');</script>";
                echo "<script>window.location='".site_url('suratkeluar')."';</script>";
            }
    }

}