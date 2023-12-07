-- Active: 1700825179262@@127.0.0.1@3306@livraria

SELECT * FROM historico_de_pedidos
  INNER JOIN cadastro_de_clientes ON historico_de_pedidos.`ID_cliente` = cadastro_de_clientes.id;

SELECT * FROM historico_de_pedidos
  INNER JOIN controle_de_livros ON historico_de_pedidos.`ID_livro` = controle_de_livros.id;