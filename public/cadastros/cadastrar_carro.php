<?php
require_once '../../app/Controller/CarroController.php';

$carroController = new CarroController();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lógica para processar o formulário de cadastro de carro
    $modelo = $_POST["modelo"];
    $cor = $_POST["cor"];
    $anoFabricacao = $_POST["ano_fabricacao"];

    $carro = $carroController->cadastrarCarro($modelo, $cor, $anoFabricacao);
    echo "<p>Carro cadastrado com ID: {$carro->ID}</p>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Carro</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>

    <header>
        <h1>Cadastrar Carro</h1>
    </header>

    <main>
        <form method="post">
            <label for="modelo">Modelo:</label>
            <input type="text" id="modelo" name="modelo" required>

            <label for="cor">Cor:</label>
            <input type="text" id="cor" name="cor" required>

            <label for="ano_fabricacao">Ano de Fabricação:</label>
            <input type="text" id="ano_fabricacao" name="ano_fabricacao" required>

            <button type="submit">Cadastrar</button>
        </form>
    </main>

</body>
</html>