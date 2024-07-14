<?php

namespace App\Models;
use MF\Model\Model;

class CategoriaProduto extends Model {
    private $id;
    private $nome;

    public function __get($atributo){
        return @$this->$atributo;
    }

    public function __set($atributo, $valor){
        $this->$atributo = $valor;
    }

    //Salvar
    public function salvar() {
        $query = "INSERT INTO ctg_produto(nome) VALUES (:nome)";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':nome', $this->__get('nome'));
        $stmt->execute();

        return $this;
    }

    //Validar se está consistente os dados
    public function validarCategoriaProduto() {
        $valido = true;

        if (strlen($this->__get('nome')) < 3) {
            $valido = false;
        }

        return $valido;
    }

    //Validar se já existe a Categoria Produto
    public function getCategoriaProdutoNome() {
        $query = "SELECT nome FROM ctg_produto WHERE nome = :nome";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':nome', $this->__get('nome'));
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getCategoriaProduto() {
        $query = "SELECT id, nome FROM ctg_produto ORDER BY id DESC";
        return $this->db->query($query)->fetchAll();
    }

    //Listar Categoria Produto
    public function listarCategoriaProduto($id) {
        $query = "SELECT id, nome FROM ctg_produto WHERE id = $id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':nome', $this->__get('nome'));
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    //Editar Categoria Produto
    public function editarCategoriaProduto($id) {
        $query = "UPDATE ctg_produto SET nome = :nome WHERE id = $id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':nome', $this->__get('nome'));
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    //Excluir Categoria Produto
    public function excluirCategoriaProduto($id) {
        $query = "DELETE FROM ctg_produto WHERE id = $id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $this->__get('id'));
        $stmt->execute();

        return $this;
    }
}