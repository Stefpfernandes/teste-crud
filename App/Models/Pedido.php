<?php

namespace App\Models;
use MF\Model\Model;

class Pedido extends Model {
    private $id;
    private $cliente_fk;
    private $data_pedido;
    private $total;

    public function __get($atributo){
        return @$this->$atributo;
    }

    public function __set($atributo, $valor){
        $this->$atributo = $valor;
    }

    //Salvar
    public function salvar() {
        $query = "INSERT INTO tb_pedido(cliente_fk, data_pedido, total) VALUES (:cliente_fk, :data_pedido, :total)";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':cliente_fk', $this->__get('cliente_fk'));
        $stmt->bindValue(':data_pedido', $this->__get('data_pedido'));
        $stmt->bindValue(':total', $this->__get('total'));
        $stmt->execute();

        return $this;
    }

    //Validar se está consistente os dados
    public function validarPedido() {
        $valido = true;

        if ((strlen($this->__get('cliente_fk')) < 1) || (strlen($this->__get('total')) < 1)) {
            $valido = false;
        }

        return $valido;
    }

    public function getPedido() {
        $query = "SELECT id, cliente_fk, data_pedido, total FROM tb_pedido ORDER BY id DESC";
        return $this->db->query($query)->fetchAll();
    }

    public function getCliente() {
        $query2 = "SELECT id, nome FROM tb_cliente";
        return $this->db->query($query2)->fetchAll();
    }

    //Listar pedidos
    public function listarPedido($id) {
        $query = "SELECT id, cliente_fk, data_pedido, total FROM tb_pedido WHERE id = $id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':cliente_fk', $this->__get('cliente_fk'));
        $stmt->bindValue(':data_pedido', $this->__get('data_pedido'));
        $stmt->bindValue(':total', $this->__get('total'));
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    //Editar pedidos
    public function editarPedido($id) {
        $query = "UPDATE tb_pedido SET cliente_fk = :cliente_fk, data_pedido = :data_pedido, total = :total WHERE id = $id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':cliente_fk', $this->__get('cliente_fk'));
        $stmt->bindValue(':data_pedido', $this->__get('data_pedido'));
        $stmt->bindValue(':total', $this->__get('total'));
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    //Excluir pedidos
    public function excluirPedido($id) {
        $query = "DELETE FROM tb_pedido WHERE id = $id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $this->__get('id'));
        $stmt->execute();

        return $this;
    }
}