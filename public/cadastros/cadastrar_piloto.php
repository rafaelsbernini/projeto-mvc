<?php
require_once '../../app/Controller/PilotoController.php';

$pilotoController = new PilotoController();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lógica para processar o formulário de cadastro de piloto
    $nome = $_POST["nome"];
    $idade = $_POST["idade"];
    $peso = $_POST["peso"];

    $piloto = $pilotoController->cadastrarPiloto($nome, $idade, $peso);
    echo "<p>Piloto cadastrado com ID: {$piloto->ID}</p>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Piloto</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>

    <header>
        <h1>Cadastrar Piloto</h1>
    </header>

    <main>
        <form method="post">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>

            <label for="idade">Idade:</label>
            <input type="text" id="idade" name="idade" required>

            <label for="peso">Peso:</label>
            <input type="text" id="peso" name="peso" required>

            <button type="submit">Cadastrar</button>
        </form>
    </main>

</body>
</html>