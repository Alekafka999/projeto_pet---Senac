<?php

// conexao com o banco de dados
require_once 'backend/conexao.php';

// =================================especie==========================
try {
   $sql = "SELECT * FROM tb_especie WHERE ativo = 1";
   $comando = $conexao->prepare($sql);
   $comando->execute();
   $especies = $comando->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $err) {
    error_log($err->getMessage());
    echo "Não foi possível listar os dados!";    
}
// =================================especie==========================

// =================================raca==========================
try {
   $sql = "SELECT * FROM tb_raca WHERE ativo = 1";
   $comando = $conexao->prepare($sql);
   $comando->execute();
   $racas = $comando->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $err) {
    error_log($err->getMessage());
    echo "Não foi possível listar os dados!";    
}
// =================================raca==========================


?>




<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adote um PET - Gerenciamento</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php
        require_once "menu.php";
    ?>
    <main>
        <form action="backend/pet-cadastrar.php" method="POST">
            <div id="grid">
                <div>
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" id="nome" required>
                </div>
                <div>
                    <label for="especie">Espécie</label>
                    <select name="especie" id="especie" required>
                        <option value="" disabled selected>Selecione...</option>
                        <?php
                            foreach($especies as $especie):                        
                        ?>
                        <option value="<?php echo $especie['id'];?>"><?php echo $especie['especie'];?></option>    

                        <?php endforeach;?>            
                    </select>
                </div>

                <div>
                    <label for="raca">Raça</label>
                    <select name="raca" id="raca" required>
                        <option value="" disabled selected>Selecione...</option>
                        <?php
                            foreach($racas as $raca):                        
                        ?>
                        <option value="<?php echo $raca['id'];?>"><?php echo $raca['raca'];?></option>    

                        <?php endforeach;?>
                    </select>
                </div>

                <div>
                    <label for="porte">Porte</label>
                    <select name="porte" id="porte" required>
                        <option value="" disabled selected>Selecione...</option>
                        <option value="P">Pequeno</option>
                        <option value="M">Médio</option>
                        <option value="G">Grande</option>
                    </select>
                </div>

                <div>
                    <label for="idade">Idade</label>
                    <input type="text" name="idade" id="idade" required>
                </div>
            </div>

            <div>
                <label for="obs">Observação</label>
                <textarea name="obs" id="obs"></textarea>
            </div>

            <input type="submit" value="Cadastrar">


        </form>
    </main>
    <script src="js/menu.js"></script>

</body>

</html>