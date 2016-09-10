<?php
class Clientes_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    //Funções do model combinam com funções do Controller.

    public function get_all() // Retorna todos os clientes
    {
        $query = $this->db->get('clientes');
        return $query->result();
    }

    public function get_cliente($id) // Retorna Cliente específico
    {
        $this->db->where('id_cliente',$id);
        $query = $this->db->get('clientes');
        return $query->result();
    }

    public function post_cliente($data){
        $this->db->insert('clientes', $data);

        return $this->db->insert_id();
    }

    public function delete_cliente($id)  //
    {
        $this->db->where('id_cliente',$id);
        $this->db->delete('clientes');
    }

    public function update_cliente($id, $data)
    {
        $this->db->where('id_cliente',$id);
        $this->db->update('clientes',$data);
       // exit($this->db->last_query());
    }


}
