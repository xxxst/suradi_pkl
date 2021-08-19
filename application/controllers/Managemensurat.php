<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Managemensurat extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        check_not_login();
        check_admin();
		$this->load->model('Managemensurat_model');
    }

	public function index()
	{
        $data['row'] = $this->Managemensurat_model->get();
        $data['title']='Managemen Surat';
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('managemensurat/index',$data);
		$this->load->view('templates/footer');
    }

	public function add()
    {
        $managemensurat=new stdClass();
        $managemensurat->id=null;
        $managemensurat->nama_surat=null;
        $managemensurat->klasifikasi=null;
        $managemensurat->module=null;
        $managemensurat->nama_file=null;
        $data=array(
            'page'=>'add',
            'row'=> $managemensurat
        );
        $data['title']='Tambah Data';
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('managemensurat/form_upload',$data);
		$this->load->view('templates/footer');
    }

	public function proses()
    {
        $config['upload_path']          = './uploads/template_surat/';
        $config['allowed_types']        = '*';
        $config['max_size']             = 20480;
        $config['file_name']             = 'templatesurat_diskominfo-'.date('ymd').'-'.substr(md5(rand()),0,10);
        $this->load->library('upload',$config);
        $post=$this->input->post(null,True);
        if(isset($_POST['add']))
        {
            if(@$_FILES['nama_file']['name']!=null)
            {
                if($this->upload->do_upload('nama_file'))
                {
                    $post['nama_file']=$this->upload->data('file_name');
                    $this->Managemensurat_model->add($post);
                    if($this->db->affected_rows()>0)
                        {
                            echo "<script>alert('Data berhasil ditambahkan');</script>";
                        }
                    echo "<script>window.location='".site_url('managemensurat')."';</script>";
                } else {
                    echo "<script>alert('Data gagal ditambahkan');</script>";
                    echo "<script>window.location='".site_url('managemensurat/add')."';</script>";
                }
            } else
            {
                $post['nama_file']=null;
                $this->Managemensurat_model->add($post);
                if($this->db->affected_rows()>0)
                {
                    echo "<script>alert('Data berhasil ditambahkan');</script>";
                }
                echo "<script>window.location='".site_url('managemensurat')."';</script>";
            }
        } else if (isset($_POST['edit']))
        {
            if(@$_FILES['nama_file']['name']!=null)
            {
                if($this->upload->do_upload('nama_file'))
                {
                    $item=$this->Managemensurat_model->get($post['id'])->row();
                    if($item->nama_file!=null){
                        $target_file='./uploads/template_surat/'.$item->nama_file;
                        unlink($target_file);
                    }
                    $post['nama_file']=$this->upload->data('file_name');
                    $this->Managemensurat_model->edit($post);
                    if($this->db->affected_rows()>0)
                    {
                        echo "<script>alert('Data berhasil ditambahkan');</script>";
                    }
                    echo "<script>window.location='".site_url('managemensurat')."';</script>";
                } else
                {
                    echo "<script>alert('Data gagal ditambahkan');</script>";
                    echo "<script>window.location='".site_url('managemensurat/add')."';</script>";
                }
            } else
            {
                $post['nama_file']=null;
                $this->Managemensurat_model->edit($post);
                if($this->db->affected_rows()>0)
                {
                    echo "<script>alert('Data berhasil ditambahkan');</script>";
                }
                echo "<script>window.location='".site_url('managemensurat')."';</script>";
            }
        }
        if($this->db->affected_rows()>0)
        {
            echo "<script>alert('Data berhasil ditambahkan');</script>";
        }
        echo "<script>window.location='".site_url('managemensurat')."';</script>";
    }

	public function edit($id)
    {
        $query=$this->Managemensurat_model->get($id);
        if($query->num_rows()>0)
        {
            $managemensurat=$query->row();
            $data=array(
                'page'=>'edit',
                'row'=> $managemensurat
            );
            $data['title']='Edit Data';
		    $this->load->view('templates/header',$data);
		    $this->load->view('templates/sidebar',$data);
		    $this->load->view('managemensurat/form_upload',$data);
		    $this->load->view('templates/footer');
        } else
        {
            echo "<script>alert('Data tidak ditemukan');</script>";
            echo "<script>window.location='".site_url('managemensurat')."';</script>";
        }
    }

	public function delete($id)
    {
        $item=$this->Managemensurat_model->get($id)->row();
        if($item->nama_file!=null){
        $target_file='./uploads/template_surat/'.$item->nama_file;
        unlink($target_file);
        }
        $this->Managemensurat_model->delete($id);
        if($this->db->affected_rows()>0)
        {
            echo "<script>alert('Data berhasil dihapus');</script>";
        }
        echo "<script>window.location='".site_url('managemensurat')."';</script>";
    }

    public function download($id)
    {
        $item=$this->db->get_where('t_template',['id'=>$id])->row();
        force_download('uploads/template_surat/'.$item->nama_file,null);
    }
}