<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tambahnomor extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        check_not_login();
		$this->load->model('Tambahnomor_model');
    }
	
	function index()
	{
		check_admin();
        check_not_login();
        $data['title']='Tambah Nomor';
		$data['namafile'] = $this->db->get('t_riwayatsurat');
        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
		$this->load->view('tambahnomor/index');
        $this->load->view('templates/footer');
	}
    

}


