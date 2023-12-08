<?php
 echo" <h2> Banco de Dados </h2>";
 function consultPedidos(){

  $conexao = new PDO("mysql:host=localhost;dbname=livraria","root","");

  $select = "SELECT * FROM historico_de_pedidos";

  $resultado = $conexao->query($select);

  $consulta = $resultado->fetchAll();

    $sql = "SELECT * FROM historico_de_pedidos
    INNER JOIN cadastro_de_clientes ON historico_de_pedidos.`ID_cliente` = cadastro_de_clientes.id";

    $sql2 = "SELECT * FROM historico_de_pedidos
    INNER JOIN controle_de_livros ON historico_de_pedidos.`ID_livro` = controle_de_livros.id";

    echo '<ul>';
    foreach ($consulta as $linha) {
        echo '<hr><pre>';
        echo '<p>'. 'ID: ' . $linha['id'] . '</p>';
        echo '<p>'. 'ID_cliente: ' . $linha['ID_cliente'] . '</p>';
        echo '<p>'. 'ID_livro: ' . $linha['ID_livro'] . '</p>';
        echo '<hr>';
    }
    echo '</ul>';
}
$_POST['idClientes'];
$_POST['idLivro'];

function InserirPedidos($id_cliente, $id_livro)
{
  $conexao = new PDO("mysql:host=localhost;dbname=livraria","root","");

  $guarda = "INSERT INTO historico_de_pedidos (id_cliente, id_livro) VALUES (:ID_Cliente, :ID_Livro)";

  $preparacao = $conexao->prepare($guarda);

  $preparacao->bindParam(":ID_Cliente", $id_cliente);
  $preparacao->bindParam(":ID_Livro", $id_livro);
  $preparacao->execute();
}

InserirPedidos($_POST['idClientes'], $_POST['idLivro']);


   
 ?>