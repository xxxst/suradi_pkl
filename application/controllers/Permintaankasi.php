<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permintaankasi extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('Permintaankasi_model');
        $this->load->library('form_validation');
    }

    public function index()
	{
		check_not_login();
        $data['row']=$this->Permintaankasi_model->get();
        $data['title']='Halaman Verifikasi Kasi';
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('permintaankasi/index',$data);
		$this->load->view('templates/footer');
	}

    public function add()
    {
        $verifikator1=new stdClass();
        $verifikator1->id=null;
        $verifikator1->nama_surat=null;
        $verifikator1->tanggal=null;
        $verifikator1->penandatanganan=null;
        $verifikator1->module=null;
        $verifikator1->tujuan=null;
        $verifikator1->keterangan=null;
        $verifikator1->nama_file=null;
        $verifikator1->ket_verifikator1=null;
        $data=array(
            'page'=>'add',
            'row'=> $verifikator1
        );
        $data['title']='Tambah Verifikasi';
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('permintaankasi/verifikasi',$data);
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
                    $this->Permintaankasi_model->add($post);
                    if($this->db->affected_rows()>0)
                    {
                        echo "<script>alert('Data berhasil ditambahkan');</script>";
                    }
                    echo "<script>window.location='".site_url('permintaankasi')."';</script>";
                } else {
                    echo "<script>alert('Data gagal ditambahkan');</script>";
                    echo "<script>window.location='".site_url('permintaankasi/add')."';</script>";
                }
                
            }else
            {
                $post['nama_file']=null;
                $this->Permintaankasi_model->add($post);
                if($this->db->affected_rows()>0)
                {
                    echo "<script>alert('Data berhasil ditambahkan');</script>";
                }
                echo "<script>window.location='".site_url('permintaankasi')."';</script>";
            }
        } else if (isset($_POST['edit']))
        {
            if(@$_FILES['nama_file']['name']!=null)
            {
                if($this->upload->do_upload('nama_file'))
                {
                    $item=$this->Permintaankasi_model->get($post['id'])->row();
                    if($item->nama_file!=null){
                        $target_file='./uploads/surat_keluar/'.$item->nama_file;
                        unlink($target_file);
                    }
                    $post['nama_file']=$this->upload->data('file_name');
                    $this->Permintaankasi_model->edit($post);
                    if($this->db->affected_rows()>0)
                    {
                        echo "<script>alert('Data berhasil ditambahkan');</script>";
                    }
                    echo "<script>window.location='".site_url('permintaankasi')."';</script>";
                } else {
                    echo "<script>alert('Data gagal ditambahkan');</script>";
                    echo "<script>window.location='".site_url('permintaankasi/edit')."';</script>";
                }
            } else
            {
                $post['nama_file']=null;
                $this->Permintaankasi_model->edit($post);
                if($this->db->affected_rows()>0)
                {
                    echo "<script>alert('Data berhasil ditambahkan');</script>";
                }
                echo "<script>window.location='".site_url('permintaankasi')."';</script>";
            }
        }
        if($this->db->affected_rows()>0)
        {
            echo "<script>alert('Data berhasil ditambahkan');</script>";
        }
        echo "<script>window.location='".site_url('permintaankasi')."';</script>";
    }

    public function edit($id)
    {
        $query=$this->Permintaankasi_model->get($id);
        if($query->num_rows()>0)
        {
            $verifikator1=$query->row();
            $data=array(
                'page'=>'edit',
                'row'=> $verifikator1
            );
            $data['title']='Halaman Revisi';
		    $this->load->view('templates/header',$data);
		    $this->load->view('templates/sidebar',$data);
		    $this->load->view('permintaankasi/revisi',$data);
		    $this->load->view('templates/footer');
        } else
        {
            echo "<script>alert('Data tidak ditemukan');</script>";
            echo "<script>window.location='".site_url('permintaankasi')."';</script>";
        }
    }

    public function verifikasi($id)
    {
        $query=$this->Permintaankasi_model->get($id);
        if($query->num_rows()>0)
        {
            $verifikator1=$query->row();
            $data=array(
                'page'=>'verifikasi',
                'row'=> $verifikator1
            );
            $data['title']='Halaman Verifikasi';
		    $this->load->view('templates/header',$data);
		    $this->load->view('templates/sidebar',$data);
		    $this->load->view('permintaankasi/verifikasi',$data);
		    $this->load->view('templates/footer');
        }
    }

    public function prosesverifikasi()
    {
        $post=$this->input->post(null,True);
        if(isset($_POST['add']))
        {
            $this->Permintaankasi_model->add($post);
        } else if (isset($_POST['verifikasi']))
        {
            $this->Permintaankasi_model->verifikasi($post);
        }
        if($this->db->affected_rows()>0)
        {
            echo "<script>alert('Data berhasil diverifikasi');</script>";
        }
        echo "<script>window.location='".site_url('permintaankasi')."';</script>";
    }

    public function delete($id)
    {
        $this->Permintaankasi_model->delete($id);
        if($this->db->affected_rows()>0)
        {
            echo "<script>alert('Data berhasil dihapus');</script>";
        }
        echo "<script>window.location='".site_url('permintaankasi')."';</script>";
    }

    public function download($id)
    {
        $item=$this->db->get_where('t_riwayatsurat',['id'=>$id])->row();
        force_download('uploads/surat_keluar/'.$item->nama_file,null);
    }
}