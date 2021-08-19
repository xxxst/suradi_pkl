<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Managemenarsip extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        check_not_login();
        check_admin();
        $this->load->model('Riwayatsurat_model');
    }

	public function index()
	{
		check_not_login();
        $data['title']='Managemen Arsip';
        $data['row']=$this->Riwayatsurat_model->get();
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('managemenarsip/index');
		$this->load->view('templates/footer');
	}

	public function delete($id)
    {
        $where=array('id'=>$id);
        $row = $this->db->where('id',$id)->get('t_riwayatsurat')->row();
        unlink('uploads/surat_keluar/'.$row->nama_file);
        $this->Suratkeluar_model->delete($where,'t_riwayatsurat');
        redirect('managemenarsip');
    }
}
