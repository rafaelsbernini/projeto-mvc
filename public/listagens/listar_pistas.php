<?php
require_once '../../app/Controller/PistaController.php';
require_once '../../app/Model/Pista.php';

// Use o controlador e modelo real para obter dados
$pistaController = new PistaController();
$pistas = $pistaController->listarPistas();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Pistas - Sistema de Gerenciamento de Corrida</title>
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
            <h2>Listar Pistas</h2>
            <?php if (is_array($pistas) && count($pistas) > 0): ?>
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Cidade</th>
                        <th>Distância</th>
                        <th>País</th>
                    </tr>
                    <?php foreach ($pistas as $pista): ?>
    <tr>
        <td><?= $pista->getID() ?></td>
        <td><?= $pista->getCidade() ?></td>
        <td><?= $pista->getDistancia() ?></td>
        <td><?= $pista->getPais() ?></td>
    </tr>
<?php endforeach; ?>
                </table>
            <?php else: ?>
                <p>Nenhuma pista encontrada.</p>
            <?php endif; ?>
        </section>
    </main>
</body>
</html>