<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tte_model extends CI_Model {
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

    public function tte($post)
    {
        $params=[
            'tte_oleh'=>$post['tte_oleh'],
            'updated_at'=>date('d-m-Y H:i:s')
        ];
        $this->db->where('id',$post['id']);
        $this->db->update('t_riwayatsurat',$params);
    }
}