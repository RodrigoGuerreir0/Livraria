<?php
echo " <h2> Cadastro de Clientes </h2>";

function consultClientes(){

    $conexao = new PDO("mysql:host=localhost;dbname=livraria", "root", "");

    $select = "SELECT * FROM cadastro_de_cliente";

    $resultado = $conexao->query($select);

    $consulta = $resultado->fetchAll();

    echo '<ul>';
    foreach ($consulta as $linha) {
        echo '<hr><pre>';
        echo '<p>' . $linha['nome'] . '</p>';
        echo '<p>' . $linha['CPF'] . '</p>';
        echo '<p>' . $linha['Idade'] . '</p>';
        echo '<p>' . $linha['Data_Nascimento'] . '</p>';
        echo '<p>' . $linha['Telefone'] . '</p>';
        echo '<p>' . $linha['CEP'] . '</p>';
        echo '<hr>';
    }
    echo '</ul>';
}

$_POST['nome'];
$_POST['cpf'];
$_POST['idade'];
$_POST['data_de_nascimento'];
$_POST['telefone'];
$_POST['cep'];


function InserirClientes($nome, $cpf, $idade, $data_nasc, $telefone, $cep)
{
  $conexao = new PDO("mysql:host=localhost;dbname=livraria","root","");

  $guarda = "INSERT INTO cadastro_de_clientes (nome, cpf, idade, data_nascimento, telefone, cep) VALUES (:Nome, :CPF, :Idade, :Data_Nascimento, :Telefone, :CEP)";

  $preparacao = $conexao->prepare($guarda);

  $preparacao->bindParam(":Nome", $nome);
  $preparacao->bindParam(":CPF", $cpf);
  $preparacao->bindParam(":Idade", $idade);
  $preparacao->bindParam(":Data_Nascimento", $data_nasc);
  $preparacao->bindParam(":Telefone", $telefone);
  $preparacao->bindParam(":CEP", $cep);
  $preparacao->execute();
}

InserirClientes($_POST['nome'], $_POST['cpf'], $_POST['idade'], $_POST['data_de_nascimento'], $_POST['telefone'], $_POST['cep']);

?>