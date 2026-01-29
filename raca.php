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
        <form action="backend/raca-cadastrar.php" method="POST">
            <div id="grid">
                <div>
                    <label for="raca">Raça</label>
                    <input type="text" name="raca" id="raca" required>
                </div>
            </div>

            <input type="submit" value="Cadastrar">
            
        </form>
    </main>
    <script src="js/menu.js"></script>
</body>

</html>