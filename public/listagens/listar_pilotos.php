<?php
require_once '../../app/Controller/PilotoController.php';
require_once '../../app/Model/Piloto.php';

$pilotoController = new PilotoController();
$pilotos = $pilotoController->listarPilotos();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Pilotos - Sistema de Gerenciamento de Corrida</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <header>
        <h1>Sistema de Gerenciamento de Corrida</h1>
    </header>

    <main>
        <nav>
            <ul>
                <li><a href="../../index.php">HOME</a></li>
            </ul>
        </nav>

        <section>
            <h2>Listar Pilotos</h2>
            <?php if (is_array($pilotos) && count($pilotos) > 0): ?>
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Idade</th>
                        <th>Peso</th>
                    </tr>
                    <?php foreach ($pilotos as $piloto): ?>
                        <tr>
                            <td><?= $piloto->getID() ?></td>
                            <td><?= $piloto->getNome() ?></td>
                            <td><?= $piloto->getIdade() ?></td>
                            <td><?= $piloto->getPeso() ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            <?php else: ?>
                <p>Nenhum piloto encontrado.</p>
            <?php endif; ?>
        </section>
    </main>
</body>
</html>