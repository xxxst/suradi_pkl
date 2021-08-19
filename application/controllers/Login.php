<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Login_model');
    }

	public function index()
	{
        check_already_login();
		$this->load->view('templates/login_header');
		$this->load->view('login/login');
		$this->load->view('templates/login_footer');
	}

    public function proses()
    {
        $post=$this->input->post(null,TRUE);
        if (isset($post['login']))
        {
            $this->load->model('Login_model');
            $query=$this->Login_model->login($post);
            if($query->num_rows()>0)
            {
                $row=$query->row();
                $params=array(
                    'id'=>$row->id,
                    'level'=>$row->level
                );
                $this->session->set_userdata($params);
                redirect('dashboard');
            } else
            {
                echo "<script>
                    alert('Login gagal');
                    window.location='".site_url('login')."';
                </script>";
            }
        }
    }

    public function logout()
    {
        $params=array('id','level');
        $this->session->unset_userdata($params);
        redirect('login');
    }
}
