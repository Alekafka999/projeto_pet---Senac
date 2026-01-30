<?php
require_once "backend/conexao.php";

$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

if (!$id) {
    echo "ID do pet inválido.";
    exit;
}

try {
    $sql = 'SELECT id, nome, id_especie, id_raca, porte, idade, obs FROM tb_cadastro WHERE id = :id';
    $comando = $conexao->prepare($sql);
    $comando->bindParam(":id", $id, PDO::PARAM_INT);
    $comando->execute();
    $pet = $comando->fetch(PDO::FETCH_ASSOC);

    if (!$pet) {
        echo "Pet não encontrado.";
        exit;
    }

    $sql = 'SELECT id, especie FROM tb_especie WHERE ativo = 1';
    $comando = $conexao->prepare($sql);
    $comando->execute();
    $especies = $comando->fetchAll(PDO::FETCH_ASSOC);

    $sql = 'SELECT id, raca FROM tb_raca WHERE ativo = 1';
    $comando = $conexao->prepare($sql);
    $comando->execute();
    $racas = $comando->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $err) {
    error_log($err->getMessage());
    echo "Não foi possível carregar os dados!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adote um PET - Editar</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php require_once "menu.php"; ?>
    <main>
        <form action="backend/pet-atualizar.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $pet['id']; ?>">
            <div id="grid">
                <div>
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" id="nome" required value="<?php echo $pet['nome']; ?>">
                </div>
                <div>
                    <label for="especie">Espécie</label>
                    <select name="especie" id="especie" required>
                        <option value="" disabled>Selecione...</option>
                        <?php foreach ($especies as $especie): ?>
                            <option value="<?php echo $especie['id']; ?>" <?php echo ($especie['id'] == $pet['id_especie']) ? "selected" : ""; ?>>
                                <?php echo $especie['especie']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div>
                    <label for="raca">Raça</label>
                    <select name="raca" id="raca" required>
                        <option value="" disabled>Selecione...</option>
                        <?php foreach ($racas as $raca): ?>
                            <option value="<?php echo $raca['id']; ?>" <?php echo ($raca['id'] == $pet['id_raca']) ? "selected" : ""; ?>>
                                <?php echo $raca['raca']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div>
                    <label for="porte">Porte</label>
                    <select name="porte" id="porte" required>
                        <option value="" disabled>Selecione...</option>
                        <option value="P" <?php echo ($pet['porte'] == "P") ? "selected" : ""; ?>>Pequeno</option>
                        <option value="M" <?php echo ($pet['porte'] == "M") ? "selected" : ""; ?>>Médio</option>
                        <option value="G" <?php echo ($pet['porte'] == "G") ? "selected" : ""; ?>>Grande</option>
                    </select>
                </div>
                <div>
                    <label for="idade">Idade</label>
                    <input type="text" name="idade" id="idade" required value="<?php echo $pet['idade']; ?>">
                </div>
            </div>
            <div>
                <label for="obs">Observação</label>
                <textarea name="obs" id="obs"><?php echo $pet['obs']; ?></textarea>
            </div>
            <input type="submit" value="Atualizar">
        </form>
    </main>
    <script src="js/menu.js"></script>
</body>
</html>
