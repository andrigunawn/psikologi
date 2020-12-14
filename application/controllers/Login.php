<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();		
        $this->load->model('LoginModel');
        $this->load->model('MainModel');
	}
	
	public function index()
	{
		session_destroy();
		$this->load->view('login/form_login');
	}

    public function daftarBaru()
    {        
        $this->load->view('login/form_daftar');
    }

	 public function daftarBaruLogin() {
        $username = $this->input->post('username');
        $jenis_grup = $this->input->post('jenis');
        $password = md5($this->input->post('password'));
        $checkusername = $this->LoginModel->check_username($this->input->post('username', TRUE))->row();
        $checkpassword = $this->LoginModel->check_password(md5($this->input->post('password', TRUE)))->row();

        if ($checkusername){
            $this->session->set_flashdata('warning', 'Maaf username sudah terpakai!');
            redirect('Login/daftarBaru','refresh');
        }
        $user = array(
                        'nama'     =>$this->input->post('nama'),
                        'username' =>$this->input->post('username'),
                        'email'    =>$this->input->post('email'),
                        'password' =>md5($this->input->post('password')),
                        'password_ori' =>$this->input->post('password'),
                        'telepon'  =>$this->input->post('telepon'),                                             
                       
                         );
        $user_id = $this->MainModel->insert_id($tabel='user', $user);

        $grup_id = $this->MainModel->getDataWhere($tabel='grup', $kolom='nama_grup',$jenis_grup);
       
        $user_grup = array(

                    'grup_id'  =>$grup_id->id,
                    'user_id'  =>$user_id,
                    'creator'  =>$user_id
                    
                     );        
        $b= $this->MainModel->insert($tabel='user_grup', $user_grup);

        $akun = array(                       
                    'user_id'  =>$user_id,
                    'creator'  =>$user_id
                    
                     );
        if ($this->input->post('jenis') == 'perusahaan') {
            $c= $this->MainModel->insert($tabel='perusahaan', $akun);
        }else {
            $c= $this->MainModel->insert($tabel='freelancer', $akun);
        }            

        if ($c) {
            $this->session->set_flashdata('warning', 'Daftar Berhasiil, Silahkan Login!');
            redirect('Login','refresh');
        }else{
            $this->session->set_flashdata('warning', 'Daftar Gagal, Coba Lagi');
            redirect('Login/daftarBaru','refresh');
        }       
    }

    public function login() {
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        $checkusername = $this->LoginModel->check_username($this->input->post('username', TRUE))->row();
        $checkpassword = $this->LoginModel->check_password(md5($this->input->post('password', TRUE)))->row();
        $data_login = $this->LoginModel->ambilProfile($username,$password)->row();
        //print_r($data_login);die();
       
        if($data_login){
        
            if ( $data_login->nama_grup == 'superadmin') {
                 $this->session->set_userdata('logged_in',$data_login);
                redirect('Dashboard','refresh');
            }else  if ( $data_login->nama_grup == 'perusahaan') {
                 $this->session->set_userdata('logged_in',$data_login);               
                 redirect('pekerjaan','refresh');
            }else   if ( $data_login->nama_grup == 'freelancer') {
                 $this->session->set_userdata('logged_in',$data_login);
                    redirect('pekerjaan/freelancerPekerjaan','refresh');
            }
          
        }
        else  if ($checkpassword && $checkusername && !$data_login){
           $this->session->set_flashdata('warning', 'Password dan Email tidak cocok!');
            redirect('Login','refresh');       
        }

        else  if (!$checkusername && $checkpassword){
            $this->session->set_flashdata('warning', 'Maaf username tidak benar!');
            redirect('Login','refresh');
        }
        else if ($checkusername && !$checkpassword) {
            $this->session->set_flashdata('warning', 'Maaf password tidak benar!');
            redirect('Login','refresh');
        } else {
            $this->session->set_flashdata('warning', 'Maaf username dan password tidak benar!');
            redirect('Login','refresh');
        }
       
    }

    public function logout() 
    {
       /* $id_user = $this->session->userdata('logged_in')['result']->client_id;
        $ip = $this->input->ip_address();*/
        //$this->LoginModel->Logout($id_user,$ip);
        redirect('Login/index','refresh');     
    }
}
