<?php

namespace App\Models;
use MF\Model\Model;

class Contato extends Model {
    public function getContato() {
        $query = "SELECT nome, email, telefone, descricao FROM tb_contato";
        return $this->db->query($query)->fetchAll();
    }
}