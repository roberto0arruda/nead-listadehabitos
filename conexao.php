<?php

function fObtemConexao() {
    // Parâmetros
    $servidor       = "localhost";
    $usuario        = "root";
    $senha          = "";
    $bancodedados   = "listadehabito";

    // cria uma conexao com o bando de dados
    $conexao = new mysqli($servidor, $usuario, $senha, $bancodedados);

    // verifica se a conexao ocorreu com sucesso
    if ($conexao->connect_error) {
        die("Falha na conexao: ". $conexao->connect_error);
    }

    return $conexao;
}

?>