<?php
require_once '../../app/Controller/CorridaController.php';
require_once '../../app/Model/Corrida.php';

$corridaController = new CorridaController();
$corridas = $corridaController->listarCorridas();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Corridas - Sistema de Gerenciamento de Corrida</title>
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
            <h2>Listar Corridas</h2>
            <?php if (is_array($corridas) && count($corridas) > 0): ?>
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Pista</th>
                        <th>Data</th>
                        <th>Pilotos</th>
                    </tr>
                    <?php foreach ($corridas as $corrida): ?>
                        <tr>
                            <td><?= $corrida->getID() ?></td>
                            <td><?= $corrida->getPista()->getCidade() ?></td>
                            <td><?= $corrida->getData() ?></td>
                            <td>
                                <?php foreach ($corrida->getPilotos() as $piloto): ?>
                                    <?= $piloto->getNome() ?><br>
                                <?php endforeach; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            <?php else: ?>
                <p>Nenhuma corrida encontrada.</p>
            <?php endif; ?>
        </section>
    </main>
</body>
</html>