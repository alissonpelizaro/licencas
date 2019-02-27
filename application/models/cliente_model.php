<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente_model extends My_model {

	function __construct(){
		parent::__construct();
		$this->setTabela('cliente');
	}

	public function getClientes(){
		return $this->getQuery();
	}

	public function cadastraCliente($dados){
		if($this->db->insert('cliente', $dados)){
			return true;
		}
		return false;
	}



}
