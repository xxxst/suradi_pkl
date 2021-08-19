<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Managemenuser extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        check_not_login();
        check_admin();
        $this->load->model('Managemenuser_model');
        $this->load->library('form_validation');
    }
    
    public function index()
    {
        $this->load->model('Login_model');
        $data['row']=$this->Managemenuser_model->get();
        $data['title']='Managemen User';
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('managemenuser/index');
		$this->load->view('templates/footer');
    }

    public function halamantambahuser()
    {
            $this->form_validation->set_rules('username','Username','required|min_length[5]|is_unique[t_admin.username]');
            $this->form_validation->set_rules('password','Password','required|min_length[5]');
            $this->form_validation->set_rules('nama','Nama','required');
            $this->form_validation->set_rules('nip','NIP','required');
            $this->form_validation->set_rules('level','Level','required');

            $this->form_validation->set_message('required','%s masih kosong, silahkah diisi' );
            $this->form_validation->set_message('min_length','{field} minimal 5 karakter' );
            $this->form_validation->set_message('is_unique','{field} ini sudah dipakai, silahkan ganti yang lain' );
            
            $this->form_validation->set_error_delimiters('<span class="help-block">','</span>');
            $data['title']='Halaman Tambah User';
            if($this->form_validation->run()==FALSE)
            {   
                $this->load->view('templates/header',$data);
                $this->load->view('templates/sidebar',$data);
                $this->load->view('managemenuser/tambahuser');
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
                        window.location='".site_url('pengaturanprofil')."';
                </script>";
            }


    }
    public function halamantedituser($id)
    {
            // $this->_rules();
            // print_r($_POST['username']);
            $this->form_validation->set_rules('username','Username','required|min_length[5]|callback_username_check');
            if($this->input->post('password'))
            {
                $this->form_validation->set_rules('password','Password','min_length[5]');
            }
            $this->form_validation->set_rules('nama','Nama','required');
            $this->form_validation->set_rules('nip','NIP','required');
            $this->form_validation->set_rules('level','Level','required');

            $this->form_validation->set_message('required','%s masih kosong, silahkah diisi' );
            $this->form_validation->set_message('min_length','{field} minimal 5 karakter' );
            $this->form_validation->set_message('is_unique','{field} ini sudah dipakai, silahkan ganti yang lain' );
            
            $this->form_validation->set_error_delimiters('<span class="help-block">','</span>');
            $data['title']='Halaman Edit User';
            if($this->form_validation->run()==FALSE)
            {
                $query=$this->Managemenuser_model->get($id);
                if ($query->num_rows() > 0)
                {
                    $data['row']=$query->row();
                    $this->load->view('templates/header',$data);
                    $this->load->view('templates/sidebar',$data);
                    $this->load->view('managemenuser/edituser',$data);
                    $this->load->view('templates/footer');
                } else
                {
                    echo "<script>alert('Data tidak ditemukan');</script>";
                    echo "<script>window.location='".site_url('managemenuser')."';</script>";
                }

            } else
            {
                $post=$this->input->post(null,TRUE);
                $this->Managemenuser_model->edit_user($post);
                if($this->db->affected_rows () > 0)
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

    function username_check()
    {
        $post=$this->input->post(null,TRUE);
        $query=$this->db->query("SELECT*FROM t_admin WHERE username='$post[username]'AND id !='$post[id]'");
        if($query->num_rows()>0)
        {
            $this->form_validation->set_message('username_check','{field} ini sudah dipakai');
            return false;
        } else
        {
            return true;
        }
    }

    public function deleteuser()
    {
        $id=$this->input->post('id');
        $this->Managemenuser_model->delete_user($id);
        if($this->db->affected_rows()>0)
        {
            echo "<script>
                alert('Data berhasil dihapus');
            </script>";
        }
        echo "<script>
                window.location='".site_url('managemenuser')."';
            </script>";
    }
    // public function tambahdatauser()
    // {
        
    //     if($this->form_validation->run()==FALSE){
    //         $this->index();

    //     } else 
    //     {
    //         $data=array(
    //             'username'=>$this->input->post('username'),
    //             'password'=>password_hash($this->input->post('password'),PASSWORD_DEFAULT),
    //             'nama'=>$this->input->post('nama'),
    //             'nip'=>$this->input->post('nip'),
    //             'level'=>$this->input->post('level')
    //         );

    //         $this->Managemenuser_model->insert_user($data,'t_admin');

    //         $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
    //             Naskah Berhasil Dibuat!
    //             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    //             <span aria-hidden="true">&times;</span>
    //             </button>
    //             </div>');
    //             redirect('index');
    //     }
            
    // }

    public function _rules()
    {
        $this->form_validation->set_rules('username','Username','required',array(
            'required'=>'%s Harus Diisi!!!'
        ));
        $this->form_validation->set_rules('password','Password','required',array(
            'required'=>'%s Harus Diisi!!!'
        ));
        $this->form_validation->set_rules('nama','Nama','required',array(
            'required'=>'%s Harus Diisi!!!'
        ));
        $this->form_validation->set_rules('nip','NIP','required',array(
            'required'=>'%s Harus Diisi!!!'
        ));
    }
}