<?php
require_once 'backend/conexao.php';

try{
    $sql = 'SELECT * FROM tb_cadastro';
    
    $comando = $conexao->prepare($sql);
    
    $comando->execute();
    
    $pets = $comando->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $err) {
    error_log($err->getMessage());
    echo 'Erro ao buscar os pets no banco de dados.';
}



?>





<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adote um Pet - Lista de Pets</title>
    <link rel="stylesheet" href="css/style.css">
<body>
    <header>
        <h1>Adote um Pet</h1>
    </header>
        <main> 
        <?php 
            foreach($pets as $pet):
        ?>
           <table>
            <tr>
            <td><?php echo $pet['id']; ?></td>
            <td><?php echo $pet['nome']; ?></td>
            <td><?php echo $pet['especie']; ?></td>   
            <td><?php echo $pet['raca']; ?></td>
            <td><?php echo $pet['porte']; ?></td>
            <td><?php echo $pet['idade']; ?></td>
            <td><?php echo $pet['obs']; ?></td>
            </tr>
                    
        <?php
            endforeach;
        ?>
        </table>    
        </main>
    <footer>
        <p>&copy; 2026 Adote um Pet. Todos os direitos reservados.</p>
    </footer>

    
</body>
</html>
