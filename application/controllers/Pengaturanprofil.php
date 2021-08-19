<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaturanprofil extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('Managemenuser_model');
        $this->load->library('form_validation');
    }
    
    public function index()
    {
        $this->load->model('Login_model');
        $this->form_validation->set_rules('username','Username','required|min_length[5]|is_unique[t_admin.username]');
        $this->form_validation->set_rules('password','Password','required|min_length[5]');
        $this->form_validation->set_rules('nama','Nama','required');
        $this->form_validation->set_rules('nip','NIP','required');
        $this->form_validation->set_rules('level','Level','required');

        $this->form_validation->set_message('required','%s masih kosong, silahkah diisi' );
        $this->form_validation->set_message('min_length','{field} minimal 5 karakter' );
        $this->form_validation->set_message('is_unique','{field} ini sudah dipakai, silahkan ganti yang lain' );
            
        $this->form_validation->set_error_delimiters('<span class="help-block">','</span>');
            if($this->form_validation->run()==FALSE)
            {   
                $data['title']='Pengaturan User';
                $data['row']=$this->Managemenuser_model->get();
		        $this->load->view('templates/header',$data);
		        $this->load->view('templates/sidebar',$data);
		        $this->load->view('pengaturanprofil/index');
		        $this->load->view('templates/footer');

            } else
            {
                $post=$this->input->post(null,TRUE);
                $this->Managemenuser_model->insert_user($post);
                if($this->db->affected_rows()>0)
                {
                    echo "<script>
                            alert('Data berhasil disimpan');
                    </script>";
                }
                echo "<script>
                        window.location='".site_url('managemenuser')."';
                </script>";
            }
    }
}