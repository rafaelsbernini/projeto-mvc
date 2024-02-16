<?php
require_once '../../app/Controller/PistaController.php';

$pistaController = new PistaController();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lógica para processar o formulário de cadastro de pista
    $cidade = $_POST["cidade"];
    $distancia = $_POST["distancia"];
    $pais = $_POST["pais"];

    $pista = $pistaController->cadastrarPista($cidade, $distancia, $pais);
    echo "<p>Pista cadastrada com ID: {$pista->ID}</p>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Pista</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>

    <header>
        <h1>Cadastrar Pista</h1>
    </header>

    <main>
        <form method="post">
            <label for="cidade">Cidade:</label>
            <input type="text" id="cidade" name="cidade" required>

            <label for="distancia">Distância:</label>
            <input type="text" id="distancia" name="distancia" required>

            <label for="pais">País:</label>
            <input type="text" id="pais" name="pais" required>

            <button type="submit">Cadastrar</button>
        </form>
    </main>

</body>
</html>