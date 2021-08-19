<?php 

class Fungsi{
    protected $ci;

    function __construct()
    {
        $this->ci=&get_instance();
    }

    function user_login()
    {
        $this->ci->load->model('Login_model');
        $user_id=$this->ci->session->userdata('id');
        $user_data=$this->ci->Login_model->get($user_id)->row();
        return $user_data;
    }

    function verifikasi()
    {
        $this->ci->load->model('Riwayatsurat_model');
        $user_id=$this->ci->session->userdata('id');
        $user_data=$this->ci->Riwayatsurat_model->get($user_id)->row();
        return $user_data;
    }
    function templatesurat()
    {
        $this->ci->load->model('Templatesurat_model');
        $user_id=$this->ci->session->userdata('id');
        $user_data=$this->ci->Templatesurat_model->get($user_id)->row();
        return $user_data;
    }
}