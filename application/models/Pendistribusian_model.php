<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendistribusian_model extends CI_Model {

    
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
}