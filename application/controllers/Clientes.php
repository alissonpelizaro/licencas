<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends CI_Controller {


		public function index(){

			if(!$this->session->userdata('id')){
				redirect('../');
			}

      $this->load->model('cliente_model');
      $clientes = $this->cliente_model->getClientes(array('status' => 1));

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

      $clientes = $this->cliente_model->getClientes(array('status' => 1));

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

		public function edita($id){

			if(!$this->session->userdata('id')){
				redirect('../');
			}
			$this->load->model('cliente_model');

			$id = $id / 527;

			$cliente = $this->cliente_model->getCliente($id);

			$dados = array(
        'cliente' => $cliente,
        'page' => (object) array(
  				'name' => 'Editar informações de um cliente',
  				'dir' => 'clientes'
  			)
      );

			$this->load->view('edita_cliente', $dados);

		}

		public function editaCliente(){
			if(!$this->session->userdata('id')){
				redirect('../');
			}

			$this->load->model('cliente_model');

			$edicao;
			$id = $this->input->post('hash') / 421;
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
				'status' => 1
			);

			if($this->cliente_model->atualizaCliente($id, $dados)){
				$edicao = true;
			}

			$clientes = $this->cliente_model->getClientes(array('status' => 1));

			$dados = array(
				'edicao' => $edicao,
				'clientes' => $clientes,
				'page' => (object) array(
					'name' => 'Clientes',
					'dir' => 'clientes'
				)
			);

			$this->load->view('clientes', $dados);

		}

		public function apagar($id){
			if(!$this->session->userdata('id')){
				redirect('../');
			}

			$this->load->model('cliente_model');


			$id = $id / 323;
			$edicao;

			$dados = array(
				'status' => 0
			);

			if($this->cliente_model->atualizaCliente($id, $dados)){
				$edicao = true;
			}

			$clientes = $this->cliente_model->getClientes(array('status' => 1));

			$dados = array(
				'apagar' => $edicao,
				'clientes' => $clientes,
				'page' => (object) array(
					'name' => 'Clientes',
					'dir' => 'clientes'
				)
			);

			$this->load->view('clientes', $dados);

		}



}
