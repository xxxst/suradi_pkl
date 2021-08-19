<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Naskahkeluar_model extends CI_Model {
    public function get_data($table)
    {
        return $this->db->get($table);
    }

    public function insert_naskahkeluar($data,$table)
    {
        $this->db->insert($table,$data);
    }

    public function update_naskahkeluar($data,$table)
    {
        $this->db->where('id',$data['id']);
        $this->db->update($table,$data);
    }
    
    public function delete_naskahkeluar($where,$table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}