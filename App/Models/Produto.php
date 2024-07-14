<?php

namespace App\Models;
use MF\Model\Model;

class Produto extends Model {
    private $id;
    private $nome;
    private $descricao;
    private $preco;
    private $categoria;

    public function __get($atributo){
        return @$this->$atributo;
    }

    public function __set($atributo, $valor){
        $this->$atributo = $valor;
    }

    //Salvar
    public function salvar() {
        $query = "INSERT INTO tb_produto(nome, descricao, preco, categoria) VALUES (:nome, :descricao, :preco, :categoria)";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':nome', $this->__get('nome'));
        $stmt->bindValue(':descricao', $this->__get('descricao'));
        $stmt->bindValue(':preco', $this->__get('preco'));
        $stmt->bindValue(':categoria', $this->__get('categoria'));
        $stmt->execute();

        return $this;
    }

    //Validar se está consistente os dados
    public function validarProduto() {
        $valido = true;

        if ((strlen($this->__get('nome')) < 1) || (strlen($this->__get('preco')) < 1)) {
            $valido = false;
        }

        return $valido;
    }

    //Validar se já existe o produto
    public function getProdutoNome() {
        $query = "SELECT nome FROM tb_produto WHERE nome = :nome";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':nome', $this->__get('nome'));
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getProduto() {
        $query = "SELECT id, nome, descricao, preco, categoria FROM tb_produto";
        return $this->db->query($query)->fetchAll();
    }

    public function getCategoria() {
        $query2 = "SELECT id, nome FROM ctg_produto";
        return $this->db->query($query2)->fetchAll();
    }

    //Listar produtos
    public function listarProduto($id) {
        $query = "SELECT id, nome, descricao, preco, categoria FROM tb_produto WHERE id = $id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':nome', $this->__get('nome'));
        $stmt->bindValue(':descricao', $this->__get('descricao'));
        $stmt->bindValue(':preco', $this->__get('preco'));
        $stmt->bindValue(':categoria', $this->__get('categoria'));
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    //Editar produtos
    public function editarProduto($id) {
        $query = "UPDATE tb_produto SET nome = :nome, descricao = :descricao, preco = :preco, categoria = :categoria WHERE id = $id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':nome', $this->__get('nome'));
        $stmt->bindValue(':descricao', $this->__get('descricao'));
        $stmt->bindValue(':preco', $this->__get('preco'));
        $stmt->bindValue(':categoria', $this->__get('categoria'));
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    //Excluir produtos
    public function excluirProduto($id) {
        $query = "DELETE FROM tb_produto WHERE id = $id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $this->__get('id'));
        $stmt->execute();

        return $this;
    }
}
?>