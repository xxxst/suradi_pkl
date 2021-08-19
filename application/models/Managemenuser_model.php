<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Managemenuser_model extends CI_Model {
    
    public function login($post)
    {
        $this->db->select('');
        $this->db->from('t_admin');
        $this->db->where('username',$post['username']);
        $this->db->where('password',sha1($post['password']));
        $query=$this->db->get();
        return $query;
    }
    public function get($id=null)
    {
        $this->db->from('t_admin');
        if($id!=null)
        {
            $this->db->where('id',$id);
        }
        $query=$this->db->get();
        return $query;
    }

    public function insert_user($post)
    {
        $params['username']=$post['username'];
        $params['password']=sha1($post['password']);
        $params['nama']=$post['nama'];
        $params['nip']=$post['nip'];
        $params['level']=$post['level'];
        $this->db->insert('t_admin',$params);
    }
    
    public function edit_user($post)
    {
        $params['username']=$post['username'];
        if(!empty($post['password']))
        {
            $params['password']=sha1($post['password']);
        }
        $params['nama']=$post['nama'];
        $params['nip']=$post['nip'];
        $params['level']=$post['level'];
        $this->db->where('id',$post['id']);
        $this->db->update('t_admin',$params);
    }
    // public function update_user($data,$table)
    // {
    //     $this->db->where('id',$data['id']);
    //     $this->db->update($table,$data);
    // }

    public function delete_user($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('t_admin');
    }
}