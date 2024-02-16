<?php
require_once '../../app/Controller/CarroController.php';
require_once '../../app/Model/Carro.php';

$carroController = new CarroController();
$carros = $carroController->listarCarros();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Carros - Sistema de Gerenciamento de Corrida</title>
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
            <h2>Listar Carros</h2>
            <?php if (is_array($carros) && count($carros) > 0): ?>
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Modelo</th>
                        <th>Cor</th>
                        <th>Ano de Fabricação</th>
                    </tr>
                    <?php foreach ($carros as $carro): ?>
                        <tr>
                            <td><?= $carro->getID() ?></td>
                            <td><?= $carro->getModelo() ?></td>
                            <td><?= $carro->getCor() ?></td>
                            <td><?= $carro->getAnoFabricacao() ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            <?php else: ?>
                <p>Nenhum carro encontrado.</p>
            <?php endif; ?>
        </section>
    </main>
</body>
</html>