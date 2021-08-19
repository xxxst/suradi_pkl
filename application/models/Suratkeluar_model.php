<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Suratkeluar_model extends CI_Model {

    
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
    public function add($post)
    {
        $params=[
            'nama_surat'=>$post['nama_surat'],
            'tanggal'=>$post['tanggal'],
            'penandatanganan'=>$post['penandatanganan'],
            'jenissurat'=>$post['jenissurat'],
            'klasifikasi'=>$post['jenissurat'],
            'module'=>$post['module'],
            'tujuan'=>$post['tujuan'],
            'keterangan'=>$post['keterangan'],
            'nama_file'=>$post['nama_file']
        ];
        $this->db->insert('t_riwayatsurat',$params);
    }
    
    public function edit($post)
    {
        $params=[
            'nama_surat'=>$post['nama_surat'],
            'tanggal'=>$post['tanggal'],
            'penandatanganan'=>$post['penandatanganan'],
            'jenissurat'=>$post['jenissurat'],
            'klasifikasi'=>$post['jenissurat'],
            'module'=>$post['module'],
            'tujuan'=>$post['tujuan'],
            'keterangan'=>$post['keterangan'],
            'nama_file'=>$post['nama_file'],
            'updated_at'=>date('d-m-Y H:i:s')
        ];
        if($post['nama_file']!=null)
        {
            $params['nama_file']=$post['nama_file'];
        }
        $this->db->where('id',$post['id']);
        $this->db->update('t_riwayatsurat',$params);
    }

    public function delete($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('t_riwayatsurat');
    }
}