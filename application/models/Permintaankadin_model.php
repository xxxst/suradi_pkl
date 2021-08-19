<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permintaankadin_model extends CI_Model {
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
            'nama_file'=>$post['nama_file'],
            'ket_verifikator4'=>$post['ket_verifikator4']
        ];
        $this->db->insert('t_riwayatsurat',$params);
    }
    
    public function edit($post)
    {
        $params=[
            'nama_surat'=>$post['nama_surat'],
            'tanggal'=>$post['tanggal'],
            'tujuan'=>$post['tujuan'],
            'keterangan'=>$post['keterangan'],
            'nama_file'=>$post['nama_file'],
            'verifikator4'=>$post['verifikator4'],
            'ket_verifikator4'=>$post['ket_verifikator4'],
            'updated_at'=>date('d-m-Y H:i:s')
        ];
        $this->db->where('id',$post['id']);
        $this->db->update('t_riwayatsurat',$params);
    }

    public function verifikasi($post)
    {
        $params=[
            'verifikator4'=>$post['verifikator4'],
            'updated_at'=>date('d-m-Y H:i:s')
        ];
        $this->db->where('id',$post['id']);
        $this->db->update('t_riwayatsurat',$params);
    }
    public function delete($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('t_riwayatsurat');
    }


}