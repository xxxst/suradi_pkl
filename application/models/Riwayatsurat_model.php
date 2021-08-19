<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Riwayatsurat_model extends CI_Model {
    
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
        $this->db->from('t_riwayatsurat');
        if($id!=null)
        {
            $this->db->where('id',$id);
        }
        $query=$this->db->get();
        return $query;
    }

    public function delete($where,$table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}