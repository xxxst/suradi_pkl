<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tte extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('Tte_model');
        $this->load->library('form_validation');
    }

    public function index()
	{
		check_not_login();
        $data['row']=$this->Tte_model->get();
        $data['title']='Halaman TTE';
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('tte/index',$data);
		$this->load->view('templates/footer');
	}
    
    public function verifikasi($id)
    {
        $query=$this->Tte_model->get($id);
        if($query->num_rows()>0)
        {
            $tte=$query->row();
            $data=array(
                'page'=>'tte',
                'row'=> $tte
            );
            $data['title']='Halaman TTE';
            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar',$data);
            $this->load->view('tte/tte',$data);
            $this->load->view('templates/footer');
        } else
        {
            echo "<script>alert('Data tidak ditemukan');</script>";
            echo "<script>window.location='".site_url('tte')."';</script>";
        }
    }

    public function prosestte()
    {
        $post=$this->input->post(null,True);
        if(isset($_POST['add']))
        {
            $this->Tte_model->add($post);
        } else if (isset($_POST['tte']))
        {
            $this->Tte_model->tte($post);
        }
        if($this->db->affected_rows()>0)
        {
            echo "<script>alert('Surat Telah Diberi TTE');</script>";
        }
        echo "<script>window.location='".site_url('tte')."';</script>";
    }

    function download($id)
	{
		$data = $this->db->get_where('t_riwayatsurat',['id'=>$id])->row();
		force_download('uploads/surat_keluar/'.$data->nama_file,NULL);
	}
}