<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	function _remap($param) {
			 $this->index($param);
	 }

	public function index()	{
		header('Content-Type: application/json');

		$token = $this->input->post('token');
		$agentesAtual = $this->input->post('agentes');
		$supervisoresAtual = $this->input->post('supervisores');
		$coordenadoresAtual = $this->input->post('coordenadores');
		$atendimentos = $this->input->post('atendimentos');
		$ret = $this->retStructurePrepare();

		$cliente = $this->checaToken($token);
		if(!$cliente){
			$ret->code = 205;
			$ret->error = 'Token inválido ou inexistente';
			echo json_encode($ret);
			die();
		}

		$this->atualizaCliente($cliente->idCliente, $agentesAtual, $supervisoresAtual, $coordenadoresAtual, $atendimentos);

		$ret->code = 200;
		$ret->response = array(
			'agentes' => $cliente->ad,
			'supervisores' => $cliente->sd,
			'coordenadores' => $cliente->cd
		);

		echo json_encode($ret);
		die();

	}

	private function atualizaCliente($id, $au, $su, $cu, $ats){
		$this->load->model('cliente_model');

		$dados = array(
			'au' => $au,
			'su' => $su,
			'cu' => $cu,
			'ats' => $ats,
			'dataSincronismo' => date("Y-m-d H:i:s")
		);

		if($this->cliente_model->atualizaCliente($id, $dados)){
			return true;
		}
		return false;

	}

	private function checaToken($token){
		if(!$token){
			return false;
		}

		$this->load->model("cliente_model");
		$cliente = $this->cliente_model->getClientes(array('status' => 1, 'token' => $token));
		if($cliente){
			return $cliente[0];
		}
		return false;
	}

	private function retStructurePrepare(){
		return (object) array(
			'code' => 0,
			'error' => null,
			'response' => null
		);
	}

}
