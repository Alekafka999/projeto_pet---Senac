<?php
require_once"backend/conexao.php";

try {
    $sql = "SELECT * FROM tb_cadastro";
    $comando=$conexao->prepare($sql);
    $comando->execute();
    $pets = $comando->fetchAll(PDO::FETCH_ASSOC);
    // echo"<pre>";
    // var_dump($pets);
} catch(PDOException $err) {
    error_log($err->getMessage());
    echo"Não foi possível listar os pets!";
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adote um pet - Lista</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>Adote um Pet - Lista</h1>
    </header>
    <main>
        <table>
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Espécie</th>            
        <th>Raça</th>
        <th>Porte</th>
        <th>Idade</th>
        <th>Obs</th>
        <th>Ações</th>
    </tr>
    <?php
    
    foreach ($pets as $pet):
        
    
    ?>
    <tr>
        <td><?php echo$pet['id'];?></td>
        <td><?php echo$pet['nome'];?></td>
        <td><?php echo$pet['especie'];?></td>            
        <td><?php echo$pet['raca'];?></td>
        <td><?php echo$pet['porte'];?></td>
        <td><?php echo$pet['idade'];?></td>
        <td><?php echo$pet['obs'];?></td>
        <td><a href="backend/petDell.php?id=<?php echo$pet['id'];?>"> DELETAR</a></td>
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