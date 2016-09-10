<?php
require APPPATH.'/libraries/REST_Controller.php';

class Api extends REST_Controller
{

    public function __construct()
    {
        parent::__construct();
     $this->load->model('clientes_model', 'clientes');

    }

    public function clientes_get()
    {
        if (!$this->get('id')) {
            $clientes = $this->clientes->get_all(); //Retorna todos os resultados
        } else {
            $clientes = $this->clientes->get_cliente($this->get('id')); // retorna resultado específico
        }

        if ($clientes) {
            $this->response($clientes, 200); // Código de sucesso
        } else {
            $this->response([], 404); // Retorna vazio.
        }
    }

    public function clientes_post()
    {
        if (!$this->post('nome')) {
            $this->response(array('error' => 'Nenhum dado recebido.'), 400);
        } else {
            $data = array(
                'nome_cliente' => $this->post('nome'),
                'dt_nasc_cliente' => $this->post('nascimento'),
                'rg_cliente' => $this->post('rg'),
                'cpf_cliente' =>$this->post('cpf'),
                'telefone_cliente' =>$this->post('telefone')
            );
       }
         $cliente = $this->clientes->post_cliente($data);
        if ($cliente > 0) {
            $message = array('id' => $cliente, 'nome' => $this->post('nome'));
            $this->response($message, 200);
        }
    }



    public function clientes_edit_post()
    {
     // Teoricamente essa função deveria usar PUT ao invés de POST, mas o Codeigniter não é muito fã de PUT :(


        $data = array(
            'nome_cliente' => $this->post('nome'),
            'dt_nasc_cliente' => $this->post('nascimento'),
            'rg_cliente' => $this->post('rg'),
            'cpf_cliente' =>$this->post('cpf'),
            'telefone_cliente' =>$this->post('telefone')
        );
        $this->clientes->update_cliente($this->post('id'), $data);
        $message = array('success' => $this->post('nome') . ' Updated!');
        $this->response($message, 200);
    }

    public function clientes_delete($id = NULL)
    {       $id = $this->query('id');
        if ($id == NULL) {
            $message = array('error' => 'Missing delete data: id');
            $this->response($message, 400);
        } else {
            $this->clientes->delete_cliente($id);
            $message = array('id' => $id, 'message' => 'DELETED!');
            $this->response($message, 200);
        }


    }
}