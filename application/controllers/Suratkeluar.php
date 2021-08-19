<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Suratkeluar extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('Suratkeluar_model');
    }

    public function index()
	{
        $data['row'] = $this->Suratkeluar_model->get();
        $data['title']='Surat Keluar';
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('suratkeluar/index',$data);
		$this->load->view('templates/footer');
    }

    public function add()
    {
        $suratkeluar=new stdClass();
        $suratkeluar->id=null;
        $suratkeluar->nama_surat=null;
        $suratkeluar->tanggal=null;
        $suratkeluar->penandatanganan=null;
        $suratkeluar->jenissurat=null;
        $suratkeluar->module=null;
        $suratkeluar->tujuan=null;
        $suratkeluar->keterangan=null;
        $suratkeluar->nama_file=null;
        $data=array(
            'page'=>'add',
            'row'=> $suratkeluar
        );
        $data['title']='Tambah Surat Keluar';
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('suratkeluar/tambahsuratkeluar',$data);
		$this->load->view('templates/footer');
    }

    public function proses()
    {
        $config['upload_path']          = './uploads/surat_keluar/';
        $config['allowed_types']        = '*';
        $config['max_size']             = 20480;
        $config['file_name']             = 'diskominfo-'.date('ymd').'-'.substr(md5(rand()),0,10);
        $this->load->library('upload',$config);
        $post=$this->input->post(null,True);
        if(isset($_POST['add']))
        {
            if(@$_FILES['nama_file']['name']!=null)
            {
                if($this->upload->do_upload('nama_file'))
                {
                    $post['nama_file']=$this->upload->data('file_name');
                    $this->Suratkeluar_model->add($post);
                    if($this->db->affected_rows()>0)
                    {
                        echo "<script>alert('Data berhasil ditambahkan');</script>";
                    }
                    echo "<script>window.location='".site_url('suratkeluar')."';</script>";
                } else {
                    echo "<script>alert('Data gagal ditambahkan');</script>";
                    echo "<script>window.location='".site_url('suratkeluar/add')."';</script>";
                }
            } else
            {
                $post['nama_file']=null;
                $this->Suratkeluar_model->add($post);
                if($this->db->affected_rows()>0)
                {
                    echo "<script>alert('Data berhasil ditambahkan');</script>";
                }
                echo "<script>window.location='".site_url('suratkeluar')."';</script>";
            }
        } else if (isset($_POST['edit']))
        {
            if(@$_FILES['nama_file']['name']!=null)
            {
                if($this->upload->do_upload('nama_file'))
                {
                    $item=$this->Suratkeluar_model->get($post['id'])->row();
                    if($item->nama_file!=null){
                        $target_file='./uploads/surat_keluar/'.$item->nama_file;
                        unlink($target_file);
                    }
                    $post['nama_file']=$this->upload->data('file_name');
                    $this->Suratkeluar_model->edit($post);
                    if($this->db->affected_rows()>0)
                    {
                        echo "<script>alert('Data berhasil ditambahkan');</script>";
                    }
                    echo "<script>window.location='".site_url('suratkeluar')."';</script>";
                } else {
                    echo "<script>alert('Data gagal ditambahkan');</script>";
                    echo "<script>window.location='".site_url('suratkeluar/edit')."';</script>";
                }
            } else
            {
                $post['nama_file']=null;
                $this->Suratkeluar_model->edit($post);
                if($this->db->affected_rows()>0)
                {
                    echo "<script>alert('Data berhasil ditambahkan');</script>";
                }
                echo "<script>window.location='".site_url('suratkeluar')."';</script>";
            }
        }
        if($this->db->affected_rows()>0)
        {
            echo "<script>alert('Data berhasil ditambahkan');</script>";
        }
        echo "<script>window.location='".site_url('suratkeluar')."';</script>";
    }

    public function edit($id)
    {
        $query=$this->Suratkeluar_model->get($id);
        if($query->num_rows()>0)
        {
            $suratkeluar=$query->row();
            $data=array(
                'page'=>'edit',
                'row'=> $suratkeluar
            );
            $data['title']='Halaman Template Crud';
		    $this->load->view('templates/header',$data);
		    $this->load->view('templates/sidebar',$data);
		    $this->load->view('suratkeluar/tambahsuratkeluar',$data);
		    $this->load->view('templates/footer');
        } else
        {
            echo "<script>alert('Data tidak ditemukan');</script>";
            echo "<script>window.location='".site_url('suratkeluar')."';</script>";
        }
    }

    public function delete($id)
    {
        $item=$this->Suratkeluar_model->get($id)->row();
        if($item->nama_file!=null){
        $target_file='./uploads/surat_keluar/'.$item->nama_file;
        unlink($target_file);
        }
        $this->Suratkeluar_model->delete($id);
        if($this->db->affected_rows()>0)
        {
            echo "<script>alert('Data berhasil dihapus');</script>";
        }
        echo "<script>window.location='".site_url('suratkeluar')."';</script>";
    }

    public function download($id)
    {
        $item=$this->db->get_where('t_riwayatsurat',['id'=>$id])->row();
        force_download('uploads/surat_keluar/'.$item->nama_file,null);
    }
    public function preview($id)
    {
        $item=$this->db->get_where('t_riwayatsurat',['id'=>$id])->row();
        $item= fopen('uploads/surat_keluar/'.$item->nama_file, "r");
    }
}