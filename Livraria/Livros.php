<?php
 echo" <h2> Controle de Livros </h2>";

 
 function consultLivros(){
  $conexao = new PDO("mysql:host=localhost;dbname=livraria","root","");

  $select = "SELECT * FROM controle_de_livros";

  $resultado = $conexao->query($select);

  $consulta = $resultado->fetchAll();

    echo '<ul>';
  foreach($consulta as $linha){
    echo '<hr><pre>';
    echo '<p>'.$linha ['Titulo'].'</p>';
    echo '<p>'.$linha ['Autor'].'</p>';
    echo '<p>'.$linha ['Genero'].'</p>';
    echo '<p>'.$linha ['Data_de_publicacao'].'</p>';
    echo '<p>'.$linha ['Editora'].'</p>';
    echo '<p>'.$linha ['Valor'].'</p>';
    echo '<p>'.$linha ['Quantidade_disponivel'].'</p>';
    echo '<hr>';
}
echo '</ul>';
}

$_POST['titulo'];
$_POST['autor'];
$_POST['genero'];
$_POST['data_de_publicacao'];
$_POST['editora'];
$_POST['valor'];
$_POST['quantidade_disponivel'];






function InserirLivros($titulo, $autor, $genero, $Data_de_publicacao, $editora, $valor, $quantidade_disponivel)
{
  $conexao = new PDO("mysql:host=localhost;dbname=livraria","root","");

  $guarda = "INSERT INTO controle_de_livros (titulo, autor, genero, Data_de_publicacao, editora, valor, quantidade_disponivel) VALUES (:Titulo, :Autor, :Genero, :Data_de_Publicacao, :Editora, :Valor, :Quantidade_Disponivel)";

  $preparacao = $conexao->prepare($guarda);

  $preparacao->bindParam(":Titulo", $titulo);
  $preparacao->bindParam(":Autor", $autor);
  $preparacao->bindParam(":Genero", $genero);
  $preparacao->bindParam(":Data_de_Publicacao", $Data_de_publicacao);
  $preparacao->bindParam(":Editora", $editora);
  $preparacao->bindParam(":Valor", $valor);
  $preparacao->bindParam(":Quantidade_Disponivel", $quantidade_disponivel);
  $preparacao->execute();
}

InserirLivros($_POST['titulo'], $_POST['autor'], $_POST['genero'], $_POST['data_de_publicacao'], $_POST['editora'], $_POST['valor'], $_POST['quantidade_disponivel']);

 ?>