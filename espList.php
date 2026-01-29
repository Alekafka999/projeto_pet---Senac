<?php
require_once"backend/conexao.php";

try {
    $sql = "SELECT * FROM tb_especie";
    $comando=$conexao->prepare($sql);
    $comando->execute();
    $especies = $comando->fetchAll(PDO::FETCH_ASSOC);
    // echo"<pre>";
    // var_dump($pets);
} catch(PDOException $err) {
    error_log($err->getMessage());
    echo"Não foi possível listar as espécies!";
}


?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Espécie</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header>
        <h1>Lista de espécie</h1>
    </header>
    <main>
        <table>
            <tr>
                <th>ID</th>
                <th>Espécie</th>
                <th>Data de Cadastro</th>
                <th>Ativo</th>
                <th>Ações</th>
            </tr>
            <?php
            
            foreach ($especies as $especie):
                
            ?>

            <tr>
                <td><?php echo$especie['ID'];?></td>
                <td><?php echo$especie['especie'];?></td>
                <td><?php echo$especie['data_cadastro'];?></td>            
                <td><?php echo$especie['ativo'];?></td>
                <td><a href="backend/espDell.php?id=<?php echo$especie['ID'];?>"> DELETAR</a></td>
            </tr>
            <?php
                endforeach
            ?>
        </table>
    </main>
    <footer>
        <a href="index.html">Voltar</a>
    </footer>
</body>

</html>