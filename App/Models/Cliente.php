<?php

namespace App\Models;
use MF\Model\Model;

class Cliente extends Model {
    private $id;
    private $nome;
    private $email;
    private $endereco;
    private $telefone;

    public function __get($atributo){
        return @$this->$atributo;
    }

    public function __set($atributo, $valor){
        $this->$atributo = $valor;
    }

    //Salvar
    public function salvar() {
        $query = "INSERT INTO tb_cliente(nome, email, endereco, telefone) VALUES (:nome, :email, :endereco, :telefone)";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':nome', $this->__get('nome'));
        $stmt->bindValue(':email', $this->__get('email'));
        $stmt->bindValue(':endereco', $this->__get('endereco'));
        $stmt->bindValue(':telefone', $this->__get('telefone'));
        $stmt->execute();

        return $this;
    }

    //Validar se está consistente os dados
    public function validarCliente() {
        $valido = true;

        if ((strlen($this->__get('nome')) < 3) || (strlen($this->__get('email')) < 3) || (strlen($this->__get('endereco')) < 3) || (strlen($this->__get('telefone')) < 3)) {
            $valido = false;
        }

        return $valido;
    }

    //Validar se já existe o cliente
    public function getClienteEmail() {
        $query = "SELECT nome, email FROM tb_cliente WHERE email = :email";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':email', $this->__get('email'));
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getCliente() {
        $query = "SELECT id, nome, email, endereco, telefone FROM tb_cliente ORDER BY id DESC";
        return $this->db->query($query)->fetchAll();
    }

    //Listar clientes
    public function listarCliente($id) {
        $query = "SELECT id, nome, email, endereco, telefone FROM tb_cliente WHERE id = $id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':nome', $this->__get('nome'));
        $stmt->bindValue(':email', $this->__get('email'));
        $stmt->bindValue(':endereco', $this->__get('endereco'));
        $stmt->bindValue(':telefone', $this->__get('telefone'));
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    //Editar clientes
    public function editarCliente($id) {
        $query = "UPDATE tb_cliente SET nome = :nome, email = :email, endereco = :endereco, telefone = :telefone WHERE id = $id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':nome', $this->__get('nome'));
        $stmt->bindValue(':email', $this->__get('email'));
        $stmt->bindValue(':endereco', $this->__get('endereco'));
        $stmt->bindValue(':telefone', $this->__get('telefone'));
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    //Excluir clientes
    public function excluirCliente($id) {
        $query = "DELETE FROM tb_cliente WHERE id = $id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $this->__get('id'));
        $stmt->execute();

        return $this;
    }
}