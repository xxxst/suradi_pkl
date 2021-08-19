<?php 

    function check_already_login()
    {
        $ci=&get_instance();
        $user_session=$ci->session->userdata('id');
        if($user_session)
        {
            redirect('dashboard');
        }
    }

    function check_not_login()
    {
        $ci=&get_instance();
        $user_session=$ci->session->userdata('id');
        if(!$user_session)
        {
            redirect('login');
        }
    }

    function check_admin()
    {
        $ci=&get_instance();
        $ci->load->library('fungsi');
        if($ci->fungsi->user_login()->level !=1)
        {
            redirect('dashboard');
        }
    }
    function check_staff()
    {
        $ci=&get_instance();
        $ci->load->library('fungsi');
        if($ci->fungsi->user_login()->level!=2)
        {
            redirect('dashboard');
        }
    }
    function check_kasi()
    {
        $ci=&get_instance();
        $ci->load->library('fungsi');
        if($ci->fungsi->user_login()->level !=3)
        {
            redirect('dashboard');
        } else if ($ci->fungsi->user_login()->level=1)
        {
            redirect('permintaankasi');
        }
    }
    function check_kabid()
    {
        $ci=&get_instance();
        $ci->load->library('fungsi');
        if($ci->fungsi->user_login()->level !=4)
        {
            redirect('dashboard');
        }
    }
    function check_sekdin()
    {
        $ci=&get_instance();
        $ci->load->library('fungsi');
        if($ci->fungsi->user_login()->level !=5)
        {
            redirect('dashboard');
        }
    }
    function check_kadin()
    {
        $ci=&get_instance();
        $ci->load->library('fungsi');
        if($ci->fungsi->user_login()->level !=6)
        {
            redirect('dashboard');
        }
    }