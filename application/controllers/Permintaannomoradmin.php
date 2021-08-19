<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permintaannomoradmin extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        check_not_login();
        check_admin();
        $this->load->model('Permintaannomoradmin_model');
        $this->load->library('form_validation');
    }

    public function index()
	{
        $data['row']=$this->Permintaannomoradmin_model->get();
        $data['title']='Nomor Surat';
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('permintaannomoradmin/index',$data);
		$this->load->view('templates/footer');
	}
    
    public function tambahnomor($id)
    {
        $query=$this->Permintaannomoradmin_model->get($id);
        if($query->num_rows()>0)
        {
            $admin=$query->row();
            $data=array(
                'page'=>'tambahnomor',
                'row'=> $admin
            );
            $data['title']='Tambah Verifikasi';
            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar',$data);
            $this->load->view('permintaannomoradmin/tambahnomor',$data);
            $this->load->view('templates/footer');
        }
    }

    public function proses()
    {
        $post=$this->input->post(null,True);
        if(isset($_POST['add']))
        {
            $this->Permintaannomoradmin_model->add($post);
        } else if (isset($_POST['tambahnomor']))
        {
            $this->Permintaannomoradmin_model->tambahnomor($post);
        }
        if($this->db->affected_rows()>0)
        {
            echo "<script>alert('Data berhasil diverifikasi');</script>";
        }
        echo "<script>window.location='".site_url('permintaannomoradmin')."';</script>";
    }
}