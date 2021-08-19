<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permintaansekdin extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('Permintaansekdin_model');
        $this->load->library('form_validation');
    }

    public function index()
	{
		check_not_login();
        $data['row']=$this->Permintaansekdin_model->get();
        $data['title']='Halaman Verifikasi Sekdin';
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('permintaansekdin/index',$data);
		$this->load->view('templates/footer');
	}

    public function add()
    {
        $verifikator3=new stdClass();
        $verifikator3->id=null;
        $verifikator3->nama_surat=null;
        $verifikator3->tanggal=null;
        $verifikator3->penandatanganan=null;
        $verifikator3->module=null;
        $verifikator3->tujuan=null;
        $verifikator3->keterangan=null;
        $verifikator3->nama_file=null;
        $verifikator3->ket_verifikator3=null;
        $data=array(
            'page'=>'add',
            'row'=> $verifikator3
        );
        $data['title']='Tambah Surat Keluar';
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('permintaansekdin/verifikasi',$data);
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
                    $this->Permintaansekdin_model->add($post);
                    if($this->db->affected_rows()>0)
                    {
                        echo "<script>alert('Data berhasil ditambahkan');</script>";
                    }
                    echo "<script>window.location='".site_url('permintaansekdin')."';</script>";
                } else {
                    echo "<script>alert('Data gagal ditambahkan');</script>";
                    echo "<script>window.location='".site_url('permintaansekdin/add')."';</script>";
                }
            } else
            {
                $post['nama_file']=null;
                $this->Permintaansekdin_model->add($post);
                if($this->db->affected_rows()>0)
                {
                    echo "<script>alert('Data berhasil ditambahkan');</script>";
                }
                echo "<script>window.location='".site_url('permintaankabid')."';</script>";
            }
        } else if (isset($_POST['edit']))
        {
            if(@$_FILES['nama_file']['name']!=null)
            {
                if($this->upload->do_upload('nama_file'))
                {
                    $item=$this->Permintaansekdin_model->get($post['id'])->row();
                    if($item->nama_file!=null){
                        $target_file='./uploads/surat_keluar/'.$item->nama_file;
                        unlink($target_file);
                    }
                    $post['nama_file']=$this->upload->data('file_name');
                    $this->Permintaansekdin_model->edit($post);
                    if($this->db->affected_rows()>0)
                    {
                        echo "<script>alert('Data berhasil ditambahkan');</script>";
                    }
                    echo "<script>window.location='".site_url('permintaansekdin')."';</script>";
                } else {
                    echo "<script>alert('Data gagal ditambahkan');</script>";
                    echo "<script>window.location='".site_url('permintaansekdin/edit')."';</script>";
                }
            }else
            {
                $post['nama_file']=null;
                $this->Permintaansekdin_model->edit($post);
                if($this->db->affected_rows()>0)
                {
                    echo "<script>alert('Data berhasil ditambahkan');</script>";
                }
                echo "<script>window.location='".site_url('permintaansekdin')."';</script>";
            }
        }
        if($this->db->affected_rows()>0)
        {
            echo "<script>alert('Data berhasil ditambahkan');</script>";
        }
        echo "<script>window.location='".site_url('permintaansekdin')."';</script>";
    }

    public function edit($id)
    {
        $query=$this->Permintaansekdin_model->get($id);
        if($query->num_rows()>0)
        {
            $verifikator3=$query->row();
            $data=array(
                'page'=>'edit',
                'row'=> $verifikator3
            );
            $data['title']='Halaman Revisi';
		    $this->load->view('templates/header',$data);
		    $this->load->view('templates/sidebar',$data);
		    $this->load->view('permintaansekdin/revisi',$data);
		    $this->load->view('templates/footer');
        } else
        {
            echo "<script>alert('Data tidak ditemukan');</script>";
            echo "<script>window.location='".site_url('permintaansekdin')."';</script>";
        }
    }

    public function verifikasi($id)
    {
        $query=$this->Permintaansekdin_model->get($id);
        if($query->num_rows()>0)
        {
            $verifikator3=$query->row();
            $data=array(
                'page'=>'verifikasi',
                'row'=> $verifikator3
            );
            $data['title']='Halaman Verifikasi';
		    $this->load->view('templates/header',$data);
		    $this->load->view('templates/sidebar',$data);
		    $this->load->view('permintaansekdin/verifikasi',$data);
		    $this->load->view('templates/footer');
        }
    }

    public function prosesverifikasi()
    {
        $post=$this->input->post(null,True);
        if(isset($_POST['add']))
        {
            $this->Permintaansekdin_model->add($post);
        } else if (isset($_POST['verifikasi']))
        {
            $this->Permintaansekdin_model->verifikasi($post);
        }
        if($this->db->affected_rows()>0)
        {
            echo "<script>alert('Data berhasil diverifikasi');</script>";
        }
        echo "<script>window.location='".site_url('permintaansekdin')."';</script>";
    }

    public function delete($id)
    {
        $this->Permintaansekdin_model->delete($id);
        if($this->db->affected_rows()>0)
        {
            echo "<script>alert('Data berhasil dihapus');</script>";
        }
        echo "<script>window.location='".site_url('permintaansekdin')."';</script>";
    }
    
    public function download($id)
    {
        $item=$this->db->get_where('t_riwayatsurat',['id'=>$id])->row();
        force_download('uploads/surat_keluar/'.$item->nama_file,null);
    }
    
}