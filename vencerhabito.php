<?php

require_once('conexao.php');
$conn = fObtemConexao();

// Atualiza do status de A - ativo para V- vencido
$id = $_GET["id"];
$sql = "UPDATE habito SET status='V' WHERE id=".$id;

// verifica se o comando foi executado com sucesso
if (! ($conn->query($sql) === TRUE) ) {
    $conn->close();
    die("Erro ao atualizar: ". $conn->error);
}

// fecha a conexao
$conn->close();

// redirect para a pagina index
header("Location: index.php");

?>
