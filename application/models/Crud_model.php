<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud_model extends CI_Model {

    public function get($id=null)
    {
        $this->db->from('t_crud');
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
            'nama'=>$post['nama'],
            'nip'=>$post['nip'],
            'nomorhp'=>$post['nomorhp'],
            'tglizin'=>$post['tglizin'],
            'keterangan'=>$post['keterangan']
        ];
        $this->db->insert('t_crud',$params);
    }
    
    public function edit($post)
    {
        $params=[
            'nama'=>$post['nama'],
            'nip'=>$post['nip'],
            'nomorhp'=>$post['nomorhp'],
            'tglizin'=>$post['tglizin'],
            'keterangan'=>$post['keterangan'],
            'updated_at'=>date('d-m-Y H:i:s')
        ];
        $this->db->where('id',$post['id']);
        $this->db->update('t_crud',$params);
    }

    public function delete($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('t_crud');
    }
}