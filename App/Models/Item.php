<?php

namespace App\Models;
use MF\Model\Model;

class Item extends Model {
    private $id;
    private $pedido_fk;
    private $produto_fk;
    private $quantidade;

    public function __get($atributo){
        return @$this->$atributo;
    }

    public function __set($atributo, $valor){
        $this->$atributo = $valor;
    }

    //Salvar
    public function salvar() {
        $query = "INSERT INTO tb_itens_pedido(pedido_fk, produto_fk, quantidade, preco_uni) VALUES (:pedido_fk, :produto_fk, :quantidade, :preco_uni)";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':pedido_fk', $this->__get('pedido_fk'));
        $stmt->bindValue(':produto_fk', $this->__get('produto_fk'));
        $stmt->bindValue(':quantidade', $this->__get('quantidade'));
        $stmt->bindValue(':preco_uni', $this->__get('preco_uni'));
        $stmt->execute();

        return $this;
    }

    //Validar se está consistente os dados
    public function validarItem() {
        $valido = true;

        if ((strlen($this->__get('pedido_fk')) < 1) || (strlen($this->__get('quantidade')) < 1)) {
            $valido = false;
        }

        return $valido;
    }

    public function getItem() {
        $query = "SELECT id, pedido_fk, produto_fk, quantidade, preco_uni FROM tb_itens_pedido ORDER BY id DESC";
        return $this->db->query($query)->fetchAll();
    }

    public function getPedido() {
        $query2 = "SELECT id FROM tb_pedido";
        return $this->db->query($query2)->fetchAll();
    }

    public function getProduto() {
        $query3 = "SELECT id, nome FROM tb_produto";
        return $this->db->query($query3)->fetchAll();
    }

    //Listar item
    public function listarItem($id) {
        $query = "SELECT id, pedido_fk, produto_fk, quantidade, preco_uni FROM tb_itens_pedido WHERE id = $id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':pedido_fk', $this->__get('pedido_fk'));
        $stmt->bindValue(':produto_fk', $this->__get('produto_fk'));
        $stmt->bindValue(':quantidade', $this->__get('quantidade'));
        $stmt->bindValue(':preco_uni', $this->__get('preco_uni'));
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    //Editar item
    public function editarItem($id) {
        $query = "UPDATE tb_itens_pedido SET pedido_fk = :pedido_fk, produto_fk = :produto_fk, quantidade = :quantidade, preco_uni = :preco_uni WHERE id = $id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':pedido_fk', $this->__get('pedido_fk'));
        $stmt->bindValue(':produto_fk', $this->__get('produto_fk'));
        $stmt->bindValue(':quantidade', $this->__get('quantidade'));
        $stmt->bindValue(':preco_uni', $this->__get('preco_uni'));
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    //Excluir item
    public function excluirItem($id) {
        $query = "DELETE FROM tb_itens_pedido WHERE id = $id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $this->__get('id'));
        $stmt->execute();

        return $this;
    }
}