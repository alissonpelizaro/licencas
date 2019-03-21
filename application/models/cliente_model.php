<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente_model extends My_model {

	function __construct(){
		parent::__construct();
		$this->setTabela('cliente');
	}

	public function getClientes($filtro = false){
		return $this->getQuery($filtro);
	}

	public function cadastraCliente($dados){
		if($this->db->insert('cliente', $dados)){
			return true;
		}
		return false;
	}

	public function getCliente($id){
		$dados = array("idCliente" => $id);
		$ret = $this->getQuery($dados);
		if($ret){
			return $ret[0];
		}
		return false;
	}

	public function atualizaCliente($id, $dados){
		$keys = array_keys($dados);
		foreach ($keys as $key) {
			$this->db->set($key, $dados[$key]);
		}
		$this->db->where('idCliente', $id);

		if($this->db->update('cliente')){
			return true;
		}

		return false;
	}



}
