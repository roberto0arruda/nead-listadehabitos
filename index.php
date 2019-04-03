<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Lista de hábitos</title>
</head>

<body>
    <div class="center">
        <h1>Lista de hábitos</h1>
        <p>Cadastre aqui os hábitos que você tem que vencer para melhorar sua vida!</p>
        <?php
            // Obtém a lista de hábitos do
        $servidor       = "mysql";
        $usuario        = "root";
        $senha          = "root";
        $bancodedados   = "listadehabito";

        // Cria uma conexão com o banco de dados
        // banco de dados MySQL
        $conexao = new mysqli($servidor, $usuario, $senha, $bancodedados);

        // Verifica a conexão
        if ($conexao->connect_error) {
            die("Falha na conexão: " . $conexao->connect_error);
        }

        // Executa a query da variável $sql
        $sql = "SELECT id, nome FROM habito WHERE status = 'A'";
        $resultado = $conexao->query($sql);

        // Verifica se a query retornou registros
        if ($resultado->num_rows > 0) {
            ?>

        <br />
        <table class="center">
            <tbody>

                <?php

                // Looping pelos registros retornados
                while ($registro = $resultado->fetch_assoc()) {
                    ?>

                <tr>
                    <td><?php echo $registro["nome"]; ?></td>
                    <td><a href="vencerhabito.php?id=<?php echo $registro["id"]; ?>">Vencer</a></td>
                    <td><a href="desistirhabito.php?id=<?php echo $registro["id"]; ?>">Desistir</a></td>
                </tr>

                <?php

            } // fim do looping
            ?>

            </tbody>
        </table>
        <p>Cadastre mais hábitos!</p>
        <p>Continue mudando sua vida!</p>

        <?php

    } else {
        ?>

        <p>Você não possui hábitos cadastrados!</p>
        <p>Começe já a mudar sua vida!</p>
        <?php

    } // fim do if

    // Fecha a conexão com o MySQL
    $conexao->close();
    ?>
        <a href="novohabito.php">Cadastrar Hábito</a>
    </div>
</body>

</html> 