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


        $this->load->view('lista', $data);

    }

}