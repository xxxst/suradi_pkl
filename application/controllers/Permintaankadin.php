<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permintaankadin extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('Permintaankadin_model');
        $this->load->library('form_validation');
    }

    public function index()
	{
		check_not_login();
        $data['row']=$this->Permintaankadin_model->get();
        $data['title']='Halaman Verifikasi Kadin';
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('permintaankadin/index',$data);
		$this->load->view('templates/footer');
	}

    public function add()
    {
        $verifikator4=new stdClass();
        $verifikator4->id=null;
        $verifikator4->nama_surat=null;
        $verifikator4->tanggal=null;
        $verifikator4->penandatanganan=null;
        $verifikator4->module=null;
        $verifikator4->tujuan=null;
        $verifikator4->keterangan=null;
        $verifikator4->nama_file=null;
        $verifikator4->ket_verifikator4=null;
        $data=array(
            'page'=>'add',
            'row'=> $verifikator4
        );
        $data['title']='Tambah Surat Keluar';
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('permintaankadin/verifikasi',$data);
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
                    $this->Permintaankadin_model->add($post);
                    if($this->db->affected_rows()>0)
                    {
                        echo "<script>alert('Data berhasil ditambahkan');</script>";
                    }
                    echo "<script>window.location='".site_url('permintaankadin')."';</script>";
                } else {
                    echo "<script>alert('Data gagal ditambahkan');</script>";
                    echo "<script>window.location='".site_url('permintaankadin/add')."';</script>";
                }
            } else
            {
                $post['nama_file']=null;
                $this->Permintaankadin_model->add($post);
                if($this->db->affected_rows()>0)
                {
                    echo "<script>alert('Data berhasil ditambahkan');</script>";
                }
                echo "<script>window.location='".site_url('permintaankadin')."';</script>";
            }
        } else if (isset($_POST['edit']))
        {
            if(@$_FILES['nama_file']['name']!=null)
            {
                if($this->upload->do_upload('nama_file'))
                {
                    $item=$this->Permintaankadin_model->get($post['id'])->row();
                    if($item->nama_file!=null){
                        $target_file='./uploads/surat_keluar/'.$item->nama_file;
                        unlink($target_file);
                    }
                    $post['nama_file']=$this->upload->data('file_name');
                    $this->Permintaankadin_model->edit($post);
                    if($this->db->affected_rows()>0)
                    {
                        echo "<script>alert('Data berhasil ditambahkan');</script>";
                    }
                    echo "<script>window.location='".site_url('permintaankadin')."';</script>";
                } else {
                    echo "<script>alert('Data gagal ditambahkan');</script>";
                    echo "<script>window.location='".site_url('permintaankadin/edit')."';</script>";
                }
            } else
            {
                $post['nama_file']=null;
                $this->Permintaankadin_model->edit($post);
                if($this->db->affected_rows()>0)
                {
                    echo "<script>alert('Data berhasil ditambahkan');</script>";
                }
                echo "<script>window.location='".site_url('permintaankadin')."';</script>";
            }
        }
        if($this->db->affected_rows()>0)
        {
            echo "<script>alert('Data berhasil ditambahkan');</script>";
        }
        echo "<script>window.location='".site_url('permintaankadin')."';</script>";
    }

    public function edit($id)
    {
        $query=$this->Permintaankadin_model->get($id);
        if($query->num_rows()>0)
        {
            $verifikator4=$query->row();
            $data=array(
                'page'=>'edit',
                'row'=> $verifikator4
            );
            $data['title']='Halaman Revisi';
		    $this->load->view('templates/header',$data);
		    $this->load->view('templates/sidebar',$data);
		    $this->load->view('permintaankadin/revisi',$data);
		    $this->load->view('templates/footer');
        } else
        {
            echo "<script>alert('Data tidak ditemukan');</script>";
            echo "<script>window.location='".site_url('permintaankadin')."';</script>";
        }
    }

    public function verifikasi($id)
    {
        $query=$this->Permintaankadin_model->get($id);
        if($query->num_rows()>0)
        {
            $verifikator4=$query->row();
            $data=array(
                'page'=>'verifikasi',
                'row'=> $verifikator4
            );
            $data['title']='Halaman Verifikasi';
		    $this->load->view('templates/header',$data);
		    $this->load->view('templates/sidebar',$data);
		    $this->load->view('permintaankadin/verifikasi',$data);
		    $this->load->view('templates/footer');
        }
    }

    public function prosesverifikasi()
    {
        $post=$this->input->post(null,True);
        if(isset($_POST['add']))
        {
            $this->Permintaankadin_model->add($post);
        } else if (isset($_POST['verifikasi']))
        {
            $this->Permintaankadin_model->verifikasi($post);
        }
        if($this->db->affected_rows()>0)
        {
            echo "<script>alert('Data berhasil diverifikasi');</script>";
        }
        echo "<script>window.location='".site_url('permintaankadin')."';</script>";
    }

    public function delete($id)
    {
        $this->Permintaankadin_model->delete($id);
        if($this->db->affected_rows()>0)
        {
            echo "<script>alert('Data berhasil dihapus');</script>";
        }
        echo "<script>window.location='".site_url('permintaankadin')."';</script>";
    }
    public function download($id)
    {
        $item=$this->db->get_where('t_riwayatsurat',['id'=>$id])->row();
        force_download('uploads/surat_keluar/'.$item->nama_file,null);
    }
}