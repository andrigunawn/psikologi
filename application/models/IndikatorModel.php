<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class IndikatorModel extends CI_Model {

    public function allIndikator($id)
    {
        
         $this->db->select('ind.*,k.NAMA NAMA_KRITERIA');
         $this->db->from('indikator ind');
         $this->db->join('kriteria k', 'k.ID_DATA = ind.ID_KRITERIA','left');         
         $this->db->where('ind.ID_KRITERIA', $id);
       
        return $this->db->get();
    }

    public function allFile($id)
    {
        
         $this->db->select('tr.*,ind.NAMA NAMA_INDIKATOR');
         $this->db->from('transaksi tr');
         $this->db->join('indikator ind', 'ind.ID_DATA = tr.ID_INDIKATOR','left');         
         $this->db->where('tr.ID_INDIKATOR', $id);
       
        return $this->db->get();
    }

    public function allKriteria()
    {       
        return $this->db->get('kriteria');
    }
    
    

   

  
   

    
}