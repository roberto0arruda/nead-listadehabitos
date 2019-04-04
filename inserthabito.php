<?php

require_once('conexao.php');
$conexao = fObtemConexao();

// Recebe o nome que vem do form
$nome = $_GET["nome"];

// insere o habito no tabela habito
$sql = "INSERT INTO habito (nome) VALUE ('".$nome."')";

// verifica se correu tudo bem, caso houver erro fecha a conexao e aborta
if (! ($conexao->query($sql) === TRUE) ) {
    $conexao->close();
    die("Erro: ". $sql . "<br>". $conexao->error);
}

// fecha a conexao
$conexao->close();

// redirect para a pagina index
header("Location: index.php");
?>