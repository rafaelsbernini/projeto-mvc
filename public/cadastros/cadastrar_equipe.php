<?php
require_once '../../app/Controller/EquipeController.php';
require_once '../../app/Controller/PilotoController.php'; // Certifique-se de incluir o controlador de Piloto para obter a lista de pilotos

$equipeController = new EquipeController();
$pilotoController = new PilotoController();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lógica para processar o formulário de cadastro de equipe
    $lider = $_POST["lider"];
    $nome = $_POST["nome"];
    $patrocinadores = $_POST["patrocinadores"];
    $pilotos = $_POST["pilotos"];

    // Obter instâncias de Piloto com base nos IDs fornecidos
    $pilotosArray = [];
    foreach ($pilotos as $pilotoId) {
        $piloto = $pilotoController->obterPilotoPorID($pilotoId);
        if ($piloto) {
            $pilotosArray[] = $piloto;
        }
    }

    $equipe = $equipeController->cadastrarEquipe($lider, $nome, $patrocinadores, $pilotosArray);
    echo "<p>Equipe cadastrada com ID: {$equipe->ID}</p>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Equipe</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>

    <header>
        <h1>Cadastrar Equipe</h1>
    </header>

    <main>
        <form method="post">
            <label for="lider">Líder:</label>
            <input type="text" id="lider" name="lider" required>

            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>

            <label for="patrocinadores">Patrocinadores:</label>
            <input type="text" id="patrocinadores" name="patrocinadores" required>

            <label for="pilotos">Pilotos (selecione múltiplos):</label>
            <select id="pilotos" name="pilotos[]" multiple required>
                <?php
                // Listar pilotos disponíveis
                $pilotosDisponiveis = $pilotoController->listarPilotos();
                foreach ($pilotosDisponiveis as $piloto) {
                    echo "<option value=\"{$piloto->ID}\">{$piloto->nome}</option>";
                }
                ?>
            </select>

            <button type="submit">Cadastrar</button>
        </form>
    </main>

</body>
</html>