<?php

Class Clientes extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('clientes_model', 'clientes');

    }



    public function index(){

        $data= array();
        $data['clientes'] = $this->clientes->get_all();


        $this->load->view('layout/header');
        $this->load->view('lista', $data);
        $this->load->view('layout/footer');

    }


    public function adicionar(){

        $this->load->library('form_validation');

        $this->form_validation->set_rules('nome', 'Nome', 'required');
        $this->form_validation->set_rules('nascimento', 'Data de Nascimento', 'required');
        $this->form_validation->set_rules('rg', 'RG', 'required');
        $this->form_validation->set_rules('cpf', 'CPF', 'required');
        $this->form_validation->set_rules('telefone', 'Telefone', 'required');

        $data = array();




        if($this->input->post()){
            // Validar data de nascimento
            if($this->input->post('nascimento') != NULL ){
                $dt_nasc = explode('/', $this->input->post('nascimento'));
                $valida_data = checkdate($dt_nasc[1], $dt_nasc[0], $dt_nasc[2]);
            }else{
                $valida_data = FALSE;
            }


            if ($this->form_validation->run() == FALSE || $valida_data == FALSE)
            {
              $data['erros'] = '';
              $data['erros'] = validation_errors('<p>', '</p>');
              if(!$valida_data){
                  $data['erros'] .= 'Data de nascimento  inválida';
              }
            }else{

                $insert = array(
                    'nome_cliente' => $this->input->post('nome'),
                    'dt_nasc_cliente' => date('Y-m-d', strtotime($dt_nasc[2].'-'.$dt_nasc[1].'-'.$dt_nasc[0] )), // Já que eu separei a data em variáveis, é mais fácio reordenar aqui
                    'rg_cliente' => $this->input->post('rg'),
                    'cpf_cliente' =>$this->input->post('cpf'),
                    'telefone_cliente' =>$this->input->post('telefone')
                );

                $this->clientes->post_cliente($insert);

                header('location: '.site_url('clientes?a=sucesso')); //ativa  mensagem de sucesso na view lista
            }

        }




        $this->load->view('layout/header');
        $this->load->view('adicionar_cliente', $data);
        $this->load->view('layout/footer');
    }




    public function editar($id =''){

        //A função de editar é a mesma de criar, com algumas alterações

        $data = array();
       $data['cliente'] =  $this->clientes->get_cliente($id);


        $this->load->library('form_validation');

        $this->form_validation->set_rules('nome', 'Nome', 'required');
        $this->form_validation->set_rules('nascimento', 'Data de Nascimento', 'required');
        $this->form_validation->set_rules('rg', 'RG', 'required');
        $this->form_validation->set_rules('cpf', 'CPF', 'required');
        $this->form_validation->set_rules('telefone', 'Telefone', 'required');






        if($this->input->post()){
            // Validar data de nascimento - Como esse CRUD só tem uma tabela o código de validação está repetido
            if($this->input->post('nascimento') != NULL ){
                $dt_nasc = explode('/', $this->input->post('nascimento'));
                $valida_data = checkdate($dt_nasc[1], $dt_nasc[0], $dt_nasc[2]);
            }else{
                $valida_data = FALSE;
            }


            if ($this->form_validation->run() == FALSE || $valida_data == FALSE)
            {
                $data['erros'] = '';
                $data['erros'] = validation_errors('<p>', '</p>');
                if(!$valida_data){
                    $data['erros'] .= 'Data de nascimento  inválida';
                }
            }else{

                $edit = array(
                    'nome_cliente' => $this->input->post('nome'),
                    'dt_nasc_cliente' => date('Y-m-d', strtotime($dt_nasc[2].'-'.$dt_nasc[1].'-'.$dt_nasc[0] )), // Já que eu separei a data em variáveis, é mais fácio reordenar aqui
                    'rg_cliente' => $this->input->post('rg'),
                    'cpf_cliente' =>$this->input->post('cpf'),
                    'telefone_cliente' =>$this->input->post('telefone')
                );

                $this->clientes->update_cliente($id, $edit);

                header('location: '.site_url('clientes?e=sucesso')); //ativa  mensagem de sucesso na view lista
            }

        }




        $this->load->view('layout/header');
        $this->load->view('editar_cliente', $data);
        $this->load->view('layout/footer');

    }


    public function apagar($id = NULL){

        $this->clientes->delete_cliente($id);
    }

}