<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        check_not_login();
        check_admin();
        $this->load->model('Crud_model');
    }

	public function index()
	{
        $data['row'] = $this->Crud_model->get();
        $data['title']='Halaman Template Crud';
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('crud/index',$data);
		$this->load->view('templates/footer');
    }

    public function add()
    {
        $crud=new stdClass();
        $crud->id=null;
        $crud->nama=null;
        $crud->nip=null;
        $crud->nomorhp=null;
        $crud->tglizin=null;
        $crud->keterangan=null;
        $data=array(
            'page'=>'add',
            'row'=> $crud
        );
        $data['title']='Halaman Template Crud';
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('crud/add',$data);
		$this->load->view('templates/footer');
    }

    public function proses()
    {
        $post=$this->input->post(null,True);
        if(isset($_POST['add']))
        {
            $this->Crud_model->add($post);
        } else if (isset($_POST['edit']))
        {
            $this->Crud_model->edit($post);
        }
        if($this->db->affected_rows()>0)
        {
            echo "<script>alert('Data berhasil ditambahkan');</script>";
        }
        echo "<script>window.location='".site_url('crud')."';</script>";
    }

    public function edit($id)
    {
        $query=$this->Crud_model->get($id);
        if($query->num_rows()>0)
        {
            $crud=$query->row();
            $data=array(
                'page'=>'edit',
                'row'=> $crud
            );
            $data['title']='Halaman Template Crud';
		    $this->load->view('templates/header',$data);
		    $this->load->view('templates/sidebar',$data);
		    $this->load->view('crud/add',$data);
		    $this->load->view('templates/footer');
        } else
        {
            echo "<script>alert('Data tidak ditemukan');</script>";
            echo "<script>window.location='".site_url('crud')."';</script>";
        }
    }

    public function delete($id)
    {
        $this->Crud_model->delete($id);
        if($this->db->affected_rows()>0)
        {
            echo "<script>alert('Data berhasil dihapus');</script>";
        }
        echo "<script>window.location='".site_url('crud')."';</script>";
    }
}