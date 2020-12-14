<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pekerjaan extends MY_Controller {
	
	public function __construct() 
	{
		parent::__construct();		       
        $this->load->library('template');        
	}
	
	public function index(){
		redirect('Pekerjaan/listPekerjaan');
	}	

	public function listPekerjaan()
	{		
		$data['pekerjaan'] = $this->get_data("http://localhost/mx1000/api/Pekerjaan");
		$this->template->view('master/Pekerjaan/list_Pekerjaan_v',$data);
	}

	public function tambahPekerjaan()
	{		
		$data['pekerjaan'] = $this->get_data("http://localhost/mx1000/api/Pekerjaan");
		$this->template->view('master/Pekerjaan/pekerjaan_tambah_v',$data);
	}

	public function get_data($url)
	{
		
		$curl = curl_init();
		curl_setopt_array($curl, array(
		  CURLOPT_URL => $url,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		));

		$response = curl_exec($curl);

		$err = curl_error($curl);
		curl_close($curl);
		//print_r(json_decode($response)->data);die;
		  if ($err) {
	        echo "cURL Error #:" . $err;
	      } else {
	        $ubah = array();
	        $result = json_decode($response);
	        return $result;
	      }		
	}

	public function post_data($url,$inputan)
	{		
		$curl = curl_init();
		curl_setopt_array($curl, array(
		  CURLOPT_URL => $url,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => $inputan,		 
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);
		
		//print_r(json_decode($response)->data);die;
		  if ($err) {
	        echo "cURL Error #:" . $err;
	      } else {
	        
	        $result = json_decode($response);
	        return $result;
	      }		
	}

	public function edit($id){
		$sesi = $this->session->userdata('logged_in');
		$list = $this->get_data("http://localhost/mx1000/api/Pekerjaan?id=".$id);		
		$data['pekerjaan'] = $list;		
		
		$this->template->view('master/Pekerjaan/editPekerjaan_v',$data);
	}

	public function simpanTambah(){
		$sesi = $this->session->userdata('logged_in');		    	
		$user = array(
					'judul'     =>$this->input->post('judul'),
					'deskripsi' =>$this->input->post('deskripsi'),
					'tarif'     =>$this->input->post('tarif'),
					'waktu'     =>$this->input->post('waktu'),
					'creator'   =>$sesi->id					
					);
		$a = $this->post_data("http://localhost/mx1000/api/Pekerjaan/tambah_pekerjaan",$user);	
		
		if ($a->status == 1) {
			$this->session->set_flashdata('success', 'Data Pekerjaan berhasil disimpan!');
			redirect('Pekerjaan');
		}
    	
    	$this->session->set_flashdata('warning', 'Data Pekerjaan gagal simpan!');
    	redirect('Pekerjaan');		
	}

	public function simpanUpdate(){
		$sesi = $this->session->userdata('logged_in');							
 		$id = $this->input->post('id');    	
    	
		$user = array(
					'judul'     =>$this->input->post('judul'),
					'deskripsi' =>$this->input->post('deskripsi'),
					'tarif'     =>$this->input->post('tarif'),
					'waktu'     =>$this->input->post('waktu'),
					'creator'   =>$sesi->id,
					'id'        =>$id
					 );
		$a = $this->post_data("http://localhost/mx1000/api/Pekerjaan/update_pekerjaan",$user);		
		if ($a->status == 1) {
			$this->session->set_flashdata('success', 'Data Pekerjaan berhasil update!');
			redirect('Pekerjaan');
		}
    	
    	$this->session->set_flashdata('warning', 'Data Pekerjaan gagal update!');
    	redirect('Pekerjaan');		
	}

	public function delete_Pekerjaan($id){
		$sesi = $this->session->userdata('logged_in');	    	
		$user = array(					
					'creator'  =>$sesi->id,
					'id'  =>$id
					 );
		$delete = $this->post_data("http://localhost/mx1000/api/Pekerjaan/delete_pekerjaan",$user);
		if($delete->data == true){
			$this->session->set_flashdata('success', 'Data Pekerjaan berhasil dihapus!');
    		redirect('Pekerjaan');
		}
		$this->session->set_flashdata('warning', 'Data Pekerjaan gagal dihapus!');
    	redirect('Pekerjaan');

	}
	
	



	
}

