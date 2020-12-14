<?php

use Restserver\Libraries\REST_Controller;
// import library dari REST_Controller
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';
// extends class dari REST_Controller
class Pekerjaan extends REST_Controller{
// constructor
    public function __construct(){
        parent::__construct();
        $this->load->Model('PekerjaanModel');
        $this->load->Model('MainModel');
    }
    public function index_get(){

        $id ='';
        $id =$this->get('id');
        $data  = array();
        if ($id != '') {
            
           $data = $this->PekerjaanModel->AllPekerjaan($id)->row(); 
        }else{
            
            $data = $this->PekerjaanModel->AllPekerjaan($id)->result(); 
        }
        
        if (!empty($data)) {
          $msg = array('status' => 1, 'message'=>'Berhasil ambil data' ,'data'=>$data);
        }else {
          $msg = array('status' => 0, 'message'=>'Data tidak ditemukan' ,'data'=>array());
        }

        $this->response($msg);
    }
    public function tambah_pekerjaan_post(){
        $id =$this->post('id');       
        $data  = array();
        $pekerjaan = array(
                    'judul'     =>$this->post('judul'),
                    'deskripsi' =>$this->post('deskripsi'),
                    'tarif'     =>$this->post('tarif'),
                    'waktu'     =>$this->post('waktu'),
                    'creator'   =>$this->post('creator'),
                  
                     );
        
        $data = $this->MainModel->insert($tabel='pekerjaan', $pekerjaan);
        
        if (!empty($data)) {
          $msg = array('status' => 1, 'message'=>'Berhasil simpan data' ,'data'=>$data);
        }else {
          $msg = array('status' => 0, 'message'=>'Gagal simpan data' ,'data'=>array());
        }

        $this->response($msg);
    }
    public function update_pekerjaan_post(){
        $id =$this->post('id');
       
        $data  = array();
        $pekerjaan = array(
                    'judul'     =>$this->post('judul'),
                    'deskripsi' =>$this->post('deskripsi'),
                    'tarif'     =>$this->post('tarif'),
                    'waktu'     =>$this->post('waktu'),
                    'creator'   =>$this->post('creator'),
                  
                     );
        
        $data = $this->MainModel->update($tabel='pekerjaan', $pekerjaan,$id);
        
        if (!empty($data)) {
          $msg = array('status' => 1, 'message'=>'Berhasil update data' ,'data'=>$data);
        }else {
          $msg = array('status' => 0, 'message'=>'gagal update data' ,'data'=>array());
        }

        $this->response($msg);
    }

    public function delete_pekerjaan_post(){
        $id =$this->post('id');       
        $data  = array();
        $pekerjaan = array(                    
                    'creator'   => $this->post('creator'),
                    'is_active' => '0'
                  
                     );
        
        $data = $this->MainModel->delete($table='pekerjaan',$pekerjaan,$id);
        
        if (!empty($data)) {
          $msg = array('status' => 1, 'message'=>'Berhasil hapus data' ,'data'=>$data);
        }else {
          $msg = array('status' => 0, 'message'=>'gagal hapus data' ,'data'=>array());
        }

        $this->response($msg);
    }

    

}
?>