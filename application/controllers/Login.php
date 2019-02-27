<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {


		public function index(){

			//$this->session->sess_destroy();
			if($this->session->userdata('id')){
				redirect('../inicio');
			} else {
				$this->load->view('login');
			}

		}

		public function execLogin(){
			$this->load->model('login_model');

			$usr = $this->input->post('login');
			$passPure = $this->input->post('password');
			$pass = md5($passPure);

			$usr = $this->login_model->checkLogin($usr, $pass);

			if($usr){

				$this->session->set_userdata('id', $usr->idUser);
				$this->session->set_userdata('nome', $usr->nome);
				$this->session->set_userdata('senha', $usr->senha);
				$this->session->set_userdata('hora', date('Y-m-d H:i:s'));

				redirect('../inicio');

			} else {
				$this->load->view('login', array('invalidUser' => true));
			}

		}

		public function logout(){
				$this->session->sess_destroy();

				redirect('../');

		}
}
