<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {


	public function index()	{

		header('Content-Type: application/json');

		$token = $this->input->post('token');
		$agentesAtual = $this->input->post('agentes');
		$supervisoresAtual = $this->input->post('supervisores');
		$coordenadoresAtual = $this->input->post('coordenadores');

		$ret = $this->retStructurePrepare();

		if(!$token){
			$ret->code = 205;
			$ret->error = 'Token inválido ou inexistente';
			echo json_encode($ret);
			die();
		}

		$ret->code = 200;
		$ret->response = array(
			'agentes' => 150,
			'supervisores' => 30,
			'coordenadores' => 10
		);
		
		echo json_encode($ret);
		die();

	}

	private function retStructurePrepare(){
		return (object) array(
			'code' => 0,
			'error' => null,
			'response' => null
		);
	}

}
