<?php
require_once "backend/conexao.php";

try {
   $sql = "SELECT * FROM tb_raca";

   $comando = $conexao->prepare($sql);

   $comando->execute();

   $racas = $comando->fetchAll(PDO::FETCH_ASSOC);
   
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
                <th>Raça</th>
                <th>Data Cadastro</th>
                <th>Ativo</th>
                <th>Ações</th>
            </tr>
            <?php
                foreach($racas as $raca):            
            ?>
            <tr>
                <td><?php echo $raca['id'];?></td>
                <td><?php echo $raca['raca'];?></td>
                <td><?php echo $raca['data_cadastro'];?></td>
                <td><?php echo $raca['ativo'];?></td>
                <td>
                    <a href="backend/raca-deletar.php?id=<?php echo $raca['id'];?>">Deletar</a>
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