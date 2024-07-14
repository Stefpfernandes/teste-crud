<?php

namespace App\Controllers;

// Recursos
use MF\Controller\Action;
use MF\Model\Container;

class IndexController extends Action {
    public function index() {
        //Instancia de Conexao
        $produto = Container::getModel('Produto');
        $this->view->dados = $produto->getProduto();
        $this->render('index', 'home');
    }

    public function info() {
        //Instancia de Conexao
        $info = Container::getModel('Info');
        $this->view->dados = $info->getInfo();
        $this->render('info', 'home');
    }

    //CLIENTE
    public function cliente() {
        $this->view->cliente = array(
            'nome' => '',
            'email' => '',
            'telefone' => '',
            'endereco' => '',
        );

        $this->view->erroCadastro = false;
        $this->view->editarCadastro = false;

        $info = Container::getModel('Cliente');

        //Excluir cliente
        if ($_GET && $_GET['ok'] == 'excluirCliente') {
            $info->excluirCliente($_GET['id']);
            echo '<script>alert("Excluído com sucesso!")</script>';
        }

         //Editar cliente
         if ($_GET && $_GET['ok'] == 'editarCliente') {
            $this->view->editarCadastro = true;
         
            $this->view->cliente = $info->listarCliente($_GET['id']);

            $this->view->cliente = array(
                'nome' => $this->view->cliente[0]['nome'],
                'email' => $this->view->cliente[0]['email'],
                'telefone' => $this->view->cliente[0]['telefone'],
                'endereco' => $this->view->cliente[0]['endereco'],
            );
        }

        //Instancia de Conexao
        $this->view->dados = $info->getCliente();
        $this->render('cliente', 'home');
    }

    public function editarCliente() {
        //Editar cliente
        $info = Container::getModel('cliente');
        $this->view->editarCadastro = true;

        if ($_POST) {
            $info->__set('nome', $_POST['nome']);
            $info->__set('email', $_POST['email']);
            $info->__set('telefone', $_POST['telefone']);
            $info->__set('endereco', $_POST['endereco']);

            $info->editarCliente($_POST['id']);
            //view de sucesso
            $this->render('cadastro', 'home');
        }
    }

    public function registrarCliente() {
        //recebimento dos dados
        $info = Container::getModel('cliente');

        $info->__set('nome', $_POST['nome']);
        $info->__set('email', $_POST['email']);
        $info->__set('telefone', $_POST['telefone']);
        $info->__set('endereco', $_POST['endereco']);

        //validar se os campos estão preenchidos e conferir se possui mais de um cliente com o mesmo e-mail
        if ($info->validarCliente() && count($info->getClienteEmail()) == 0) {
            $info->salvar();

            //view de sucesso
            $this->render('cadastro', 'home');
        } else {
            $this->view->cliente = array(
                'nome' => $_POST['nome'],
                'email' => $_POST['email'],
                'telefone' => $_POST['telefone'],
                'endereco' => $_POST['endereco'],
            );
            $this->view->erroCadastro = true;
            $this->render('cliente', 'home');
        }
    }

    //PRODUTO
    public function produto() {
        $this->view->produto = array(
            'nome' => '',
            'descricao' => '',
            'preco' => '',
            'categoria' => '',
        );

        $this->view->erroCadastro = false;
        $this->view->editarCadastro = false;

        $info = Container::getModel('Produto');

        //Excluir produto
        if ($_GET && $_GET['ok'] == 'excluirProduto') {
            $info->excluirProduto($_GET['id']);
            echo '<script>alert("ExcluÃ­do com sucesso!")</script>';
        }

         //Editar produto
         if ($_GET && $_GET['ok'] == 'editarProduto') {
            $this->view->editarCadastro = true;
         
            $this->view->produto = $info->listarProduto($_GET['id']);

            $this->view->produto = array(
                'nome' => $this->view->produto[0]['nome'],
                'descricao' => $this->view->produto[0]['descricao'],
                'preco' => $this->view->produto[0]['preco'],
                'categoria' => $this->view->produto[0]['categoria'],
            );
        }

        //Instancia de Conexao
        $this->view->dados = $info->getProduto();
        $this->view->ctg = $info->getCategoria();
        $this->render('produto', 'home');
    }

    public function editarProduto() {
        //Editar produto
        $info = Container::getModel('produto');
        $this->view->editarCadastro = true;

        if ($_POST) {
            $info->__set('nome', $_POST['nome']);
            $info->__set('descricao', $_POST['descricao']);
            $info->__set('preco', $_POST['preco']);
            $info->__set('categoria', $_POST['categoria']);

            $info->editarProduto($_POST['id']);
            //view de sucesso
            $this->render('cadastro', 'home');
        }
    }

    public function registrarProduto() {
        //recebimento dos dados
        $info = Container::getModel('produto');

        $info->__set('nome', $_POST['nome']);
        $info->__set('descricao', $_POST['descricao']);
        $info->__set('preco', $_POST['preco']);
        $info->__set('categoria', $_POST['categoria']);

        //validar se os campos estÃ£o preenchidos e conferir se possui mais de um produto com o mesmo nome
        if ($info->validarProduto() && count($info->getProdutoNome()) == 0) {
            $info->salvar();

            //view de sucesso
            $this->render('cadastro', 'home');
        } else {
            $this->view->produto = array(
                'nome' => $_POST['nome'],
                'descricao' => $_POST['descricao'],
                'preco' => $_POST['preco'],
                'categoria' => $_POST['categoria'],
            );
            $this->view->erroCadastro = true;
            $this->render('produto', 'home');
        }
    }

    //CATEGORIA PRODUTO
    public function categoriaProduto() {
        $this->view->categoriaProduto = array(
            'nome' => '',
        );

        $this->view->erroCadastro = false;
        $this->view->editarCadastro = false;

        $info = Container::getModel('CategoriaProduto');

        //Excluir categoria produto
        if ($_GET && $_GET['ok'] == 'excluirCategoriaProduto') {
            $info->excluirCategoriaProduto($_GET['id']);
            echo '<script>alert("Excluído com sucesso!")</script>';
        }

         //Editar categoria produto
         if ($_GET && $_GET['ok'] == 'editarCategoriaProduto') {
            $this->view->editarCadastro = true;
         
            $this->view->categoriaProduto = $info->listarCategoriaProduto($_GET['id']);

            $this->view->categoriaProduto = array(
                'nome' => $this->view->categoriaProduto[0]['nome'],
            );
        }

        //Instancia de Conexao
        $this->view->dados = $info->getCategoriaProduto();
        $this->render('categoriaProduto', 'home');
    }

    public function editarCategoriaProduto() {
        //Editar cliente
        $info = Container::getModel('categoriaProduto');
        $this->view->editarCadastro = true;

        if ($_POST) {
            $info->__set('nome', $_POST['nome']);

            $info->editarCategoriaProduto($_POST['id']);
            //view de sucesso
            $this->render('cadastro', 'home');
        }
    }

    public function registrarCategoriaProduto() {
        //recebimento dos dados
        $info = Container::getModel('categoriaProduto');

        $info->__set('nome', $_POST['nome']);

        //validar se os campos estão preenchidos e conferir se possui mais de uma categoria com o mesmo nome
        if ($info->validarCategoriaProduto() && count($info->getCategoriaProdutoNome()) == 0) {
            $info->salvar();

            //view de sucesso
            $this->render('cadastro', 'home');
        } else {
            $this->view->categoriaProduto = array(
                'nome' => $_POST['nome'],
            );
            $this->view->erroCadastro = true;
            $this->render('categoriaProduto', 'home');
        }
    }

    //PEDIDO 
    public function pedido() {
        $this->view->pedido = array(
            'cliente_fk' => '',
            'data_pedido' => '',
            'total' => '',
        );

        $this->view->erroCadastro = false;
        $this->view->editarCadastro = false;

        $info = Container::getModel('Pedido');

        //Excluir pedido
        if ($_GET && $_GET['ok'] == 'excluirPedido') {
            $info->excluirPedido($_GET['id']);
            echo '<script>alert("Excluído com sucesso!")</script>';
        }

        //Editar pedido
        if ($_GET && $_GET['ok'] == 'editarPedido') {
            $this->view->editarCadastro = true;
        
            $this->view->pedido = $info->listarPedido($_GET['id']);

            $this->view->pedido = array(
                'cliente_fk' => $this->view->pedido[0]['cliente_fk'],
                'data_pedido' => $this->view->pedido[0]['data_pedido'],
                'total' => $this->view->pedido[0]['total'],
            );
        }

        //Instancia de Conexao
        $this->view->dados = $info->getPedido();
        $this->view->cliente = $info->getCliente();
        $this->render('pedido', 'home');
    }

    public function editarPedido() {
        //Editar cliente
        $info = Container::getModel('pedido');
        $this->view->editarCadastro = true;

        if ($_POST) {
            $info->__set('cliente_fk', $_POST['cliente_fk']);
            $info->__set('data_pedido', $_POST['data_pedido']);
            $info->__set('total', $_POST['total']);

            $info->editarPedido($_POST['id']);
            //view de sucesso
            $this->render('cadastro', 'home');
        }
    }

    public function registrarPedido() {
        //recebimento dos dados
        $info = Container::getModel('pedido');

        $info->__set('cliente_fk', $_POST['cliente_fk']);
        $info->__set('data_pedido', $_POST['data_pedido']);
        $info->__set('total', $_POST['total']);

        //validar se os campos estão preenchidos
        if ($info->validarPedido()) {
            $info->salvar();

            //view de sucesso
            $this->render('cadastro', 'home');
        } else {
            $this->view->pedido = array(
                'cliente_fk' => $_POST['cliente_fk'],
                'data_pedido' => $_POST['data_pedido'],
                'total' => $_POST['total'],
            );
            $this->view->erroCadastro = true;
            $this->render('pedido', 'home');
        }
    }

    //ITEM 
    public function item() {
        $this->view->item = array(
            'pedido_fk' => '',
            'produto_fk' => '',
            'quantidade' => '',
            'preco_uni' => '',
        );

        $this->view->erroCadastro = false;
        $this->view->editarCadastro = false;

        $info = Container::getModel('Item');

        //Excluir item
        if ($_GET && $_GET['ok'] == 'excluirItem') {
            $info->excluirItem($_GET['id']);
            echo '<script>alert("Excluído com sucesso!")</script>';
        }

        //Editar item
        if ($_GET && $_GET['ok'] == 'editarItem') {
            $this->view->editarCadastro = true;
        
            $this->view->item = $info->listarItem($_GET['id']);

            $this->view->item = array(
                'pedido_fk' => $this->view->item[0]['pedido_fk'],
                'produto_fk' => $this->view->item[0]['produto_fk'],
                'quantidade' => $this->view->item[0]['quantidade'],
                'preco_uni' => $this->view->item[0]['preco_uni'],
            );
        }

        //Instancia de Conexao
        $this->view->dados = $info->getItem();
        $this->view->pedido = $info->getPedido();
        $this->view->produto = $info->getProduto();
        $this->render('item', 'home');
    }

    public function editarItem() {
        //Editar item
        $info = Container::getModel('item');
        $this->view->editarCadastro = true;

        if ($_POST) {
            $info->__set('pedido_fk', $_POST['pedido_fk']);
            $info->__set('produto_fk', $_POST['produto_fk']);
            $info->__set('quantidade', $_POST['quantidade']);
            $info->__set('preco_uni', $_POST['preco_uni']);

            $info->editarItem($_POST['id']);
            //view de sucesso
            $this->render('cadastro', 'home');
        }
    }

    public function registrarItem() {
        //recebimento dos dados
        $info = Container::getModel('item');

        $info->__set('pedido_fk', $_POST['pedido_fk']);
        $info->__set('produto_fk', $_POST['produto_fk']);
        $info->__set('quantidade', $_POST['quantidade']);
        $info->__set('preco_uni', $_POST['preco_uni']);

        //validar se os campos estão preenchidos
        if ($info->validarItem()) {
            $info->salvar();

            //view de sucesso
            $this->render('cadastro', 'home');
        } else {
            $this->view->item = array(
                'pedido_fk' => $_POST['pedido_fk'],
                'produto_fk' => $_POST['produto_fk'],
                'quantidade' => $_POST['quantidade'],
                'preco_uni' => $_POST['preco_uni'],
            );
            $this->view->erroCadastro = true;
            $this->render('item', 'home');
        }
    }


    public function contato() {
        //Instancia de Conexao
        $info = Container::getModel('Contato');
        $this->view->dados = $info->getContato();
        $this->render('contato', 'home');
    }
}
?>