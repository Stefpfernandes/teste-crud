<?php
namespace App;
use MF\Init\Bootstrap;

class Route extends Bootstrap {
    protected function initRoutes() {
        $routes['home'] = array(
            'route' => '/',
            'controller' => 'indexController',
            'action' => 'index'
        );

        $routes['info'] = array(
            'route' => '/info',
            'controller' => 'indexController',
            'action' => 'info'
        );

        $routes['cliente'] = array(
            'route' => '/cliente',
            'controller' => 'indexController',
            'action' => 'cliente'
        );

        $routes['registrarCliente'] = array(
            'route' => '/registrarCliente',
            'controller' => 'indexController',
            'action' => 'registrarCliente'
        );

        $routes['editarCliente'] = array(
            'route' => '/editarCliente',
            'controller' => 'indexController',
            'action' => 'editarCliente'
        );

        $routes['produto'] = array(
            'route' => '/produto',
            'controller' => 'indexController',
            'action' => 'produto'
        );

        $routes['registrarProduto'] = array(
            'route' => '/registrarProduto',
            'controller' => 'indexController',
            'action' => 'registrarProduto'
        );

        $routes['editarProduto'] = array(
            'route' => '/editarProduto',
            'controller' => 'indexController',
            'action' => 'editarProduto'
        );

        $routes['categoriaProduto'] = array(
            'route' => '/categoriaProduto',
            'controller' => 'indexController',
            'action' => 'categoriaProduto'
        );

        $routes['registrarCategoriaProduto'] = array(
            'route' => '/registrarCategoriaProduto',
            'controller' => 'indexController',
            'action' => 'registrarCategoriaProduto'
        );

        $routes['editarCategoriaProduto'] = array(
            'route' => '/editarCategoriaProduto',
            'controller' => 'indexController',
            'action' => 'editarCategoriaProduto'
        );

        $routes['pedido'] = array(
            'route' => '/pedido',
            'controller' => 'indexController',
            'action' => 'pedido'
        );

        $routes['registrarPedido'] = array(
            'route' => '/registrarPedido',
            'controller' => 'indexController',
            'action' => 'registrarPedido'
        );

        $routes['editarPedido'] = array(
            'route' => '/editarPedido',
            'controller' => 'indexController',
            'action' => 'editarPedido'
        );

        $routes['item'] = array(
            'route' => '/item',
            'controller' => 'indexController',
            'action' => 'item'
        );

        $routes['registrarItem'] = array(
            'route' => '/registrarItem',
            'controller' => 'indexController',
            'action' => 'registrarItem'
        );

        $routes['editarItem'] = array(
            'route' => '/editarItem',
            'controller' => 'indexController',
            'action' => 'editarItem'
        );

        $routes['contato'] = array(
            'route' => '/contato',
            'controller' => 'indexController',
            'action' => 'contato'
        );

        $this->setRoutes($routes);
    }
}