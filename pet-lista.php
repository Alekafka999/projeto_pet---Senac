<?php
require_once "backend/conexao.php";

try {
   $sql = "SELECT 
    tb_cadastro.*,
    tb_especie.especie,
    tb_raca.raca 
   FROM tb_cadastro 
   INNER JOIN tb_especie ON tb_especie.id = tb_cadastro.id_especie 
   INNER JOIN tb_raca ON tb_raca.id = tb_cadastro.id_raca"; 

   $comando = $conexao->prepare($sql);

   $comando->execute();

   $pets = $comando->fetchAll(PDO::FETCH_ASSOC);
   
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
                <th>Nome</th>
                <th>Espécie</th>
                <th>Raça</th>
                <th>Porte</th>
                <th>Idade</th>
                <th>Obs</th>
                <th>Ações</th>
            </tr>
            <?php
                foreach($pets as $pet):            
            ?>
            <tr>
                <td><?php echo $pet['id'];?></td>
                <td><?php echo $pet['nome'];?></td>
                <td><?php echo $pet['especie'];?></td>
                <td><?php echo $pet['raca'];?></td>
                <td><?php echo $pet['porte'];?></td>
                <td><?php echo $pet['idade'];?></td>
                <td><?php echo $pet['obs'];?></td>
                <td>
                    <a href="pet-editar.php?id=<?php echo $pet['id'];?>">Editar</a>
                    <a href="backend/pet-deletar.php?id=<?php echo $pet['id'];?>">Deletar</a>
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
