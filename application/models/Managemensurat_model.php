<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Managemensurat_model extends CI_Model {
    
    public function get($id=null)
    {
        $this->db->from('t_template');
        if($id!=null)
        {
            $this->db->where('id',$id);
        }
        $query=$this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params=[
            'nama_surat'=>$post['nama_surat'],
            'klasifikasi'=>$post['klasifikasi'],
            'module'=>$post['module'],
            'nama_file'=>$post['nama_file']
        ];
        $this->db->insert('t_template',$params);
    }

    public function edit($post)
    {
        $params=[
            'nama_surat'=>$post['nama_surat'],
            'klasifikasi'=>$post['klasifikasi'],
            'module'=>$post['module'],
            'nama_file'=>$post['nama_file'],
            'updated_at'=>date('d-m-Y H:i:s')
        ];
        if($post['nama_file']!=null)
        {
            $params['nama_file']=$post['nama_file'];
        }
        $this->db->where('id',$post['id']);
        $this->db->update('t_template',$params);
    }

    public function delete($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('t_template');
    }
    // public function insert_surat($data,$table)
    // {
    //     $this->db->insert($table,$data);
    // }

    // public function update_surat($data,$table)
    // {
    //     $this->db->where('id',$data['id']);
    //     $this->db->update($table,$data);
    // }

    // public function delete($where,$table)
    // {
    //     $this->db->where($where);
    //     $this->db->delete($table);
    // }
}