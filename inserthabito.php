<?php

$servidor       = "mysql";
$usuario        = "root";
$senha          = "root";
$bancodedados   = "listadehabito";

// Abre a conexao com o banco
$conexao = new mysqli($servidor, $usuario, $senha, $bancodedados);

// verifica se houve erro ao abrir a conexao
if ($conexao->connect_error) {
    die("A conexao falhou: ". $conexao->connect_error);
}

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