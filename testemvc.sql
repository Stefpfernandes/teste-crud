-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 14-Jul-2024 às 16:12
-- Versão do servidor: 5.7.36
-- versão do PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `testemvc`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `ctg_produto`
--

DROP TABLE IF EXISTS `ctg_produto`;
CREATE TABLE IF NOT EXISTS `ctg_produto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `ctg_produto`
--

INSERT INTO `ctg_produto` (`id`, `nome`) VALUES
(1, 'Eletrônico'),
(2, 'Móveis'),
(3, 'Cozinha');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_cliente`
--

DROP TABLE IF EXISTS `tb_cliente`;
CREATE TABLE IF NOT EXISTS `tb_cliente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `endereco` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telefone` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tb_cliente`
--

INSERT INTO `tb_cliente` (`id`, `nome`, `email`, `endereco`, `telefone`) VALUES
(6, 'Teste CRUD', 'teste@gmail.com', 'Rua Teste', '+44 (44) 44444-4444'),
(7, 'Stefanie', 'stefaniepereirafernandes@gmail.com', 'Rua Rio Congoinhas', '+44 (99) 14163-24');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_contato`
--

DROP TABLE IF EXISTS `tb_contato`;
CREATE TABLE IF NOT EXISTS `tb_contato` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telefone` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `descricao` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_info`
--

DROP TABLE IF EXISTS `tb_info`;
CREATE TABLE IF NOT EXISTS `tb_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `descricao` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tb_info`
--

INSERT INTO `tb_info` (`id`, `titulo`, `descricao`) VALUES
(1, 'O teste:', 'O desafio é desenvolver um sistema de cadastro de pedidos de compra. Esse sistema será composto de um cadastro de clientes, produtos e pedidos. Os requisitos desse sistema estão listados nos tópicos abaixo. Não existe certo ou errado, queremos saber como você se sai em situações reais como esse desafio.'),
(2, 'Instruções:', 'O foco principal do nosso teste é o backend;\n•\nO sistema deverá ser desenvolvido utilizando a linguagem PHP (de preferência a versão mais nova);\n•\nSeguir princípios MVC (Model-View-Controller);\n•\nUtilize boas práticas de programação;\n•\nSalvar as informações necessárias em um banco de dados relacional MySQL (de preferência a versão mais nova).\n•\nUtilize boas práticas de git;\n•\nDocumentar como rodar o projeto (README.md);'),
(3, 'Modelo de Dados:', '•\nTabela Cliente:\no\nID (Chave primária)\no\nNome\no\nEmail\no\nEndereço\no\nTelefone\n•\nTabela Produto:\no\nID (Chave primária)\no\nNome\no\nDescrição\no\nPreço\no\nCategoria (se aplicável)\n•\nTabela Pedido:\no\nID (Chave primária)\no\nData do Pedido\no\nID do Cliente (Chave estrangeira referenciando a tabela Cliente)\no\nTotal (o valor total do pedido)\n•\nTabela Itens do Pedido:\no\nID (Chave primária)\no\nID do Pedido (Chave estrangeira referenciando a tabela Pedido)\no\nID do Produto (Chave estrangeira referenciando a tabela Produto)\no\nQuantidade\no\nPreço Unitário (o preço do produto no momento do pedido)'),
(4, 'Observações:', '→\r\nA tabela \"Cliente\" armazena informações sobre os clientes que fazem pedidos.\r\n→\r\nA tabela \"Produto\" contém informações sobre os produtos disponíveis para compra.\r\n→\r\nA tabela \"Pedido\" armazena os detalhes do pedido, incluindo a data do pedido, o cliente que fez o pedido e o valor total.\r\n→\r\nA tabela \"Itens do Pedido\" é usada para registrar os produtos específicos incluídos em cada pedido, juntamente com a quantidade e o preço unitário no momento do pedido.'),
(5, 'Bônus:', '•\r\nImplementar autenticação de usuário na aplicação.\r\n•\r\nImplementar aplicação de desconto em alguns pedidos de compra.\r\n•\r\nImplementar a camada de Front-End utilizando a biblioteca javascript Bootstrap e ser responsiva.\r\n•\r\nAPI Rest JSON para todos os CRUDS listados acima.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_itens_pedido`
--

DROP TABLE IF EXISTS `tb_itens_pedido`;
CREATE TABLE IF NOT EXISTS `tb_itens_pedido` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pedido_fk` int(11) NOT NULL,
  `produto_fk` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `preco_uni` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tb_itens_pedido`
--

INSERT INTO `tb_itens_pedido` (`id`, `pedido_fk`, `produto_fk`, `quantidade`, `preco_uni`) VALUES
(2, 2, 4, 10, 100);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_pedido`
--

DROP TABLE IF EXISTS `tb_pedido`;
CREATE TABLE IF NOT EXISTS `tb_pedido` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cliente_fk` int(11) NOT NULL,
  `data_pedido` date NOT NULL,
  `total` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tb_pedido`
--

INSERT INTO `tb_pedido` (`id`, `cliente_fk`, `data_pedido`, `total`) VALUES
(2, 7, '2024-07-14', 30);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_produto`
--

DROP TABLE IF EXISTS `tb_produto`;
CREATE TABLE IF NOT EXISTS `tb_produto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descricao` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `preco` float(8,2) NOT NULL,
  `categoria` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tb_produto`
--

INSERT INTO `tb_produto` (`id`, `nome`, `descricao`, `preco`, `categoria`) VALUES
(1, 'Sofá', 'Para sentar', 1250.75, 2),
(2, 'Cadeira', 'Para sentar', 378.99, 2),
(4, 'Notebook', 'Para utilizar e navegar na internet', 1752.49, 1),
(5, 'Smartphone', 'Para facilitar o uso ao navegar na internet', 999.99, 1),
(7, 'Faca', 'Serve para cortar', 20.00, 3);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
