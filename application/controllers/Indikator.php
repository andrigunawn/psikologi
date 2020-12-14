<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Indikator extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();		
        $this->load->library('template');
        $this->load->Model('IndikatorModel');
        $this->load->Model('MainModel');
	}
	
	public function listIndikator($id='')
	{	
		$data['indikator'] = $this->IndikatorModel->allIndikator($id)->result();
		//print_r($data['indikator']);die;
		$this->template->view('master/indikator/list_indikator_v',$data);
	}

	public function lihatFile($id_kriteria='',$id_indikator='')
	{	
		$data['kriteria'] = $id_kriteria;
		$data['file'] = $this->IndikatorModel->allFile($id_indikator)->result();
		//print_r($data['file']);die;
		$this->template->view('master/file/list_file_v',$data);
	}

	
}
