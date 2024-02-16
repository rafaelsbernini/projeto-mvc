<?php
// Use o controlador e modelo real para obter dados
require_once '../../app/Controller/EquipeController.php';
require_once '../../app/Controller/PilotoController.php'; 
$equipeController = new EquipeController();
$equipes = $equipeController->listarEquipes();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Equipes - Sistema de Gerenciamento de Corrida</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <header>
        <h1>Sistema de Gerenciamento de Corrida</h1>
    </header>

    <main>
        <nav>
            <ul>
                <!-- Links para outras páginas de cadastro -->
            </ul>
        </nav>

        <section>
            <h2>Listar Equipes</h2>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Líder</th>
                    <th>Nome</th>
                    <th>Patrocinadores</th>
                </tr>
                <?php foreach ($equipes as $equipe): ?>
                    <tr>
                        <td><?= $equipe->getID() ?></td>
                        <td><?= $equipe->getLider() ?></td>
                        <td><?= $equipe->getNome() ?></td>
                        <td><?= $equipe->getPatrocinadores() ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </section>
    </main>
</body>
</html>