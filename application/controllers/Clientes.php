<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends CI_Controller {


		public function index(){

			if(!$this->session->userdata('id')){
				redirect('../');
			}

      $this->load->model('cliente_model');
      $clientes = $this->cliente_model->getClientes();

      $dados = array(
  			'page' => (object) array(
  				'name' => 'Clientes',
  				'dir' => 'clientes'
  			),
        'clientes' => $clientes
  		);
      $this->load->view('clientes', $dados);

		}

    public function cadastracliente(){
      if(!$this->session->userdata('id')){
				redirect('../');
			}

      $this->load->model('cliente_model');

      $cadastro;
      $token = $this->input->post('token');
      $fantasia = $this->input->post('fantasia');
  		$razao = $this->input->post('razao');
      $responsavel = $this->input->post('responsavel');
  		$coordenadores = $this->input->post('coordenadores');
  		$supervisores = $this->input->post('supervisores');
      $agentes = $this->input->post('agentes');

      $dados = array(
        'token' => $token,
        'fantasia' => $fantasia,
        'razao' => $razao,
        'responsavel' => $responsavel,
        'cd' => $coordenadores,
        'sd' => $supervisores,
        'ad' => $agentes,
        'dataCadastro' => date("Y-m-d H:i:S"),
        'status' => 1
      );

      if($this->cliente_model->cadastraCliente($dados)){
        $cadastro = true;
      }

      $clientes = $this->cliente_model->getClientes();

      $dados = array(
        'cadastro' => $cadastro,
        'clientes' => $clientes,
        'page' => (object) array(
  				'name' => 'Clientes',
  				'dir' => 'clientes'
  			)
      );

      $this->load->view('clientes', $dados);

    }

}
