<?php
require_once '../../app/Controller/CorridaController.php';
require_once '../../app/Controller/PistaController.php';
require_once '../../app/Controller/PilotoController.php'; // Certifique-se de incluir o controlador de Piloto para obter a lista de pilotos

$corridaController = new CorridaController();
$pistaController = new PistaController();
$pilotoController = new PilotoController();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lógica para processar o formulário de cadastro de corrida
    $pistaId = $_POST["pista"];
    $data = $_POST["data"];
    $pilotos = $_POST["pilotos"];

    // Obter instância de Pista com base no ID fornecido
    $pista = $pistaController->obterPistaPorID($pistaId);

    // Obter instâncias de Piloto com base nos IDs fornecidos
    $pilotosArray = [];
    foreach ($pilotos as $pilotoId) {
        $piloto = $pilotoController->obterPilotoPorID($pilotoId);
        if ($piloto) {
            $pilotosArray[] = $piloto;
        }
    }

    $corrida = $corridaController->criarCorrida($pista, $data, $pilotosArray);
    echo "<p>Corrida criada com ID: {$corrida->ID}</p>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Corrida</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>

    <header>
        <h1>Cadastrar Corrida</h1>
    </header>

    <main>
        <form method="post">
            <label for="pista">Pista:</label>
            <select id="pista" name="pista" required>
                <?php
                // Listar pistas disponíveis
                $pistasDisponiveis = $pistaController->listarPistas();
                foreach ($pistasDisponiveis as $pista) {
                    echo "<option value=\"{$pista->ID_PISTA}\">{$pista->cidade}</option>";
                }
                ?>
            </select>

            <label for="data">Data:</label>
            <input type="date" id="data" name="data" required>

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