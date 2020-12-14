<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MainModel extends CI_Model {

   

    public function insert($tabel,$data){
        return $this->db->insert($tabel, $data);
        
    }
     public function insert_id($tabel,$data){
        $this->db->insert($tabel, $data);
        return $this->db->insert_id();
        
        
    }
    public function update($tabel,$data,$id){
       
        $this->db->where('id', $id);
        return $this->db->update($tabel, $data);
        
    }
    public function delete($tabel,$data,$id){
       
        $this->db->where('id', $id);
       
        return $this->db->update($tabel, $data);
        
    }

    public function getDataWhere($tabel,$kolom,$where){
       
        $this->db->where($kolom, $where);       
        return $this->db->get($tabel)->row();
        
    }

    
   

    
}