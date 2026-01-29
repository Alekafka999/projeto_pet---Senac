<?php
require_once "backend/conexao.php";

try {
   $sql = "SELECT * FROM tb_especie";

   $comando = $conexao->prepare($sql);

   $comando->execute();

   $especies = $comando->fetchAll(PDO::FETCH_ASSOC);
   
//    echo "<pre>";
//    var_dump($pets);
    
} catch (PDOException $err) {
    error_log($err->getMessage());
    echo "Não foi possível listar os dados!";    
}




?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adote um Pet - Lista</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php
        require_once "menu.php";
    ?>
    <main>
        <table>
            <tr>
                <th>Id</th>
                <th>Espécie</th>
                <th>Data Cadastro</th>
                <th>Ativo</th>
                <th>Ações</th>
            </tr>
            <?php
                foreach($especies as $especie):            
            ?>
            <tr>
                <td><?php echo $especie['id'];?></td>
                <td><?php echo $especie['especie'];?></td>
                <td><?php echo $especie['data_cadastro'];?></td>
                <td><?php echo $especie['ativo'];?></td>
                <td>
                    <a href="backend/especie-deletar.php?id=<?php echo $especie['id'];?>">Deletar</a>
                </td>
            </tr>
            <?php
                endforeach;
            ?>
        </table>        
    </main>
    <script src="js/menu.js"></script>
</body>
</html>