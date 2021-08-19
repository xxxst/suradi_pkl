<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permintaankabid extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('Permintaankabid_model');
        $this->load->library('form_validation');
    }

    public function index()
	{
		check_not_login();
        $data['row']=$this->Permintaankabid_model->get();
        $data['title']='Halaman Verifikasi Kabid';
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('permintaankabid/index',$data);
		$this->load->view('templates/footer');
	}

    public function add()
    {
        $verifikator2=new stdClass();
        $verifikator2->id=null;
        $verifikator2->nama_surat=null;
        $verifikator2->tanggal=null;
        $verifikator2->penandatanganan=null;
        $verifikator2->module=null;
        $verifikator2->tujuan=null;
        $verifikator2->keterangan=null;
        $verifikator2->nama_file=null;
        $verifikator2->ket_verifikator2=null;
        $data=array(
            'page'=>'add',
            'row'=> $verifikator2
        );
        $data['title']='Tambah Surat Keluar';
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('permintaankabid/verifikasi',$data);
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
                    $this->Permintaankabid_model->add($post);
                    if($this->db->affected_rows()>0)
                    {
                        echo "<script>alert('Data berhasil ditambahkan');</script>";
                    }
                    echo "<script>window.location='".site_url('permintaankabid')."';</script>";
                } else {
                    echo "<script>alert('Data gagal ditambahkan');</script>";
                    echo "<script>window.location='".site_url('permintaankabid/add')."';</script>";
                }
            } else
            {
                $post['nama_file']=null;
                $this->Permintaankabid_model->add($post);
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
                    $item=$this->Permintaankabid_model->get($post['id'])->row();
                    if($item->nama_file!=null){
                        $target_file='./uploads/surat_keluar/'.$item->nama_file;
                        unlink($target_file);
                    }
                    $post['nama_file']=$this->upload->data('file_name');
                    $this->Permintaankabid_model->edit($post);
                    if($this->db->affected_rows()>0)
                    {
                        echo "<script>alert('Data berhasil ditambahkan');</script>";
                    }
                    echo "<script>window.location='".site_url('permintaankabid')."';</script>";
                } else {
                    echo "<script>alert('Data gagal ditambahkan');</script>";
                    echo "<script>window.location='".site_url('permintaankabid/edit')."';</script>";
                }
            } else
            {
                $post['nama_file']=null;
                $this->Permintaankabid_model->edit($post);
                if($this->db->affected_rows()>0)
                {
                    echo "<script>alert('Data berhasil ditambahkan');</script>";
                }
                echo "<script>window.location='".site_url('permintaankabid')."';</script>";
            }
        }
        if($this->db->affected_rows()>0)
        {
            echo "<script>alert('Data berhasil ditambahkan');</script>";
        }
        echo "<script>window.location='".site_url('permintaankabid')."';</script>";
    }

    public function edit($id)
    {
        $query=$this->Permintaankabid_model->get($id);
        if($query->num_rows()>0)
        {
            $verifikator2=$query->row();
            $data=array(
                'page'=>'edit',
                'row'=> $verifikator2
            );
            $data['title']='Halaman Revisi';
		    $this->load->view('templates/header',$data);
		    $this->load->view('templates/sidebar',$data);
		    $this->load->view('permintaankabid/revisi',$data);
		    $this->load->view('templates/footer');
        } else
        {
            echo "<script>alert('Data tidak ditemukan');</script>";
            echo "<script>window.location='".site_url('permintaankabid')."';</script>";
        }
    }

    public function verifikasi($id)
    {
        $query=$this->Permintaankabid_model->get($id);
        if($query->num_rows()>0)
        {
            $verifikator2=$query->row();
            $data=array(
                'page'=>'verifikasi',
                'row'=> $verifikator2
            );
            $data['title']='Halaman Verifikasi';
		    $this->load->view('templates/header',$data);
		    $this->load->view('templates/sidebar',$data);
		    $this->load->view('permintaankabid/verifikasi',$data);
		    $this->load->view('templates/footer');
        }
    }

    public function prosesverifikasi()
    {
        $post=$this->input->post(null,True);
        if(isset($_POST['add']))
        {
            $this->Permintaankabid_model->add($post);
        } else if (isset($_POST['verifikasi']))
        {
            $this->Permintaankabid_model->verifikasi($post);
        }
        if($this->db->affected_rows()>0)
        {
            echo "<script>alert('Data berhasil diverifikasi');</script>";
        }
        echo "<script>window.location='".site_url('permintaankabid')."';</script>";
    }

    public function delete($id)
    {
        $this->Permintaankabid_model->delete($id);
        if($this->db->affected_rows()>0)
        {
            echo "<script>alert('Data berhasil dihapus');</script>";
        }
        echo "<script>window.location='".site_url('permintaankabid')."';</script>";
    }
    public function download($id)
    {
        $item=$this->db->get_where('t_riwayatsurat',['id'=>$id])->row();
        force_download('uploads/surat_keluar/'.$item->nama_file,null);
    }
}