<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Naskahkeluar extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Naskahkeluar_model');
    }
	public function index()
	{
        $data['title']='Naskah Keluar';
        $data['naskahkeluar']=$this->Naskahkeluar_model->get_data('naskah')->result();
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('naskah/naskahkeluar',$data);
		$this->load->view('templates/footer');
	}

    public function t_naskahkeluar()
    {
        $data['title']='Tambah Naskah Keluar';
        $this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('naskah/t_naskahkeluar');
		$this->load->view('templates/footer');
    }

    public function tambahinputnaskahkeluar()
    {
        $this->_rules();

        if($this->form_validation->run()==FALSE){
            $this->t_naskahkeluar();
        } else {
            $data=array(
                'tglnaskah'=>$this->input->post('tglnaskah'),
                'penandatanganan'=>$this->input->post('penandatanganan'),
                'klasifikasi'=>$this->input->post('klasifikasi'),
                'jenisnaskah'=>$this->input->post('jenisnaskah'),
                'tujuansurat'=>$this->input->post('tujuansurat'),
                'keterangan'=>$this->input->post('keterangan')
            );

            $this->Naskahkeluar_model->insert_naskahkeluar($data,'naskah');

            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
                Naskah Berhasil Dibuat!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('naskahkeluar');
        }
    }

    public function editinputnaskahkeluar($id)
    {
        $this->_rules();

        if ($this->form_validation->run()==FALSE)
        {
            $this->index();
        } else
        {
            $data=array(
                'id'=>$id,
                'tglnaskah'=>$this->input->post('tglnaskah'),
                'penandatanganan'=>$this->input->post('penandatanganan'),
                'klasifikasi'=>$this->input->post('klasifikasi'),
                'jenisnaskah'=>$this->input->post('jenisnaskah'),
                'tujuansurat'=>$this->input->post('tujuansurat'),
                'keterangan'=>$this->input->post('keterangan')
            );

            $this->Naskahkeluar_model->update_naskahkeluar($data,'naskah');
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
                Naskah Berhasil Diubah!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('naskahkeluar');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('tglnaskah','Tanggal Naskah','required',array(
            'required'=>'%s Harus Diisi!!!'
        ));
        $this->form_validation->set_rules('penandatanganan','Penandatanganan','required',array(
            'required'=>'%s Harus Diisi!!!'
        ));
        $this->form_validation->set_rules('klasifikasi','Klasifikasi','required',array(
            'required'=>'%s Harus Diisi!!!'
        ));
        $this->form_validation->set_rules('jenisnaskah','Jenis Naskah','required',array(
            'required'=>'%s Harus Diisi!!!'
        ));
        $this->form_validation->set_rules('tujuansurat','Tujuan Surat','required',array(
            'required'=>'%s Harus Diisi!!!'
        ));
        $this->form_validation->set_rules('keterangan','Keterangan','required',array(
            'required'=>'%s Harus Diisi!!!'
        ));
    }

    public function deletenaskahkeluar($id)
    {
        $where=array('id'=>$id);
        $this->Naskahkeluar_model->delete_naskahkeluar($where,'naskah');
        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Naskah Berhasil Dihapus!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('naskahkeluar');

    }
}
