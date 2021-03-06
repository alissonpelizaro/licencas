<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()	{
		if(!$this->session->userdata('id')){
			redirect('../');
		}

		$this->load->model('cliente_model');
		$clientes = $this->cliente_model->getClientes(array('status' => 1));

		$usuarios = 0;
		$atendimentos = 0;
		foreach ($clientes as $cliente) {
			$usuarios = $usuarios + $cliente->au + $cliente->su + $cliente->cu;
			$atendimentos = $atendimentos + $cliente->ats;
		}

		$dados = array(
			'clientes' => $clientes,
			'usuarios' => $usuarios,
			'atendimentos' => $atendimentos,
			'instancias' => count($clientes),
			'page' => (object) array(
				'name' => 'Dashboard',
				'dir' => 'inicio'
			)
		);

		$this->load->view('inicio', $dados);
	}

}
