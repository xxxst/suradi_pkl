<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tambahnomor_model extends CI_Model {
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
    // public function get(){
    // $this->db->from('t_riwayatsurat');
    // {
    //     $this->db->where('klasifikasi', $klasifikasi);
    // }
    // // $this->db->join('t_riwayatsurat', 't_riwayatsurat.jenissurat = t_nomorsurat.nama_surat');
    // // $query=$this->db->get();
    // // return $query;
    // }

}