<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
    

<header>
        <h1>Gerenciador de Corrida</h1>
    </header>

    <main>
    <form method="post">
    <label for="opcao">Escolha uma opção:</label>
    <select id="opcao" name="opcao">
        <option value="1">Cadastrar Pista</option>
        <option value="2">Listar Pistas</option>
        <option value="3">Cadastrar Piloto</option>
        <option value="4">Listar Pilotos</option>
        <option value="5">Cadastrar Carro</option>
        <option value="6">Listar Carros</option>
        <option value="7">Cadastrar Equipe</option>
        <option value="8">Listar Equipes</option>
        <option value="9">Criar Corrida</option>
        <option value="10">Iniciar Corrida</option>
        <option value="11">Finalizar Corrida</option>
        <option value="12">Exibir 3 Primeiros Colocados</option>
    </select>
    <button type="submit">Enviar</button>
</form>

        <?php
// Exemplo de como utilizar os controllers
require_once 'Controller/PistaController.php';
require_once 'Controller/PilotoController.php';
require_once 'Controller/CarroController.php';
require_once 'Controller/EquipeController.php';
require_once 'Controller/CorridaController.php';

$pistaController = new PistaController();
$pilotoController = new PilotoController();
$carroController = new CarroController();
$equipeController = new EquipeController();
$corridaController = new CorridaController();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $opcao = trim($_POST["opcao"]);

    switch (strtolower($opcao)) {
        case "1":
            // Cadastrar Pista
            $pista = $pistaController->cadastrarPista("Cidade A", "500 km", "País X");
            echo "<p>Pista cadastrada com ID: {$pista->ID}</p>";
            break;
        case "2":
            // Listar Pistas
            $pistas = $pistaController->listarPistas();
            echo "<h2>Listagem de Pistas</h2>";
            echo "<table>";
            echo "<tr><th>ID</th><th>Cidade</th><th>Distância</th><th>País</th></tr>";
            foreach ($pistas as $pista) {
                echo "<tr><td>{$pista->ID}</td><td>{$pista->cidade}</td><td>{$pista->distancia}</td><td>{$pista->pais}</td></tr>";
            }
            echo "</table>";
            break;
        case "3":
            // Cadastrar Piloto
            $piloto = $pilotoController->cadastrarPiloto("Piloto A", 25, 70);
            echo "<p>Piloto cadastrado com ID: {$piloto->ID}</p>";
            break;
        case "4":
            // Listar Pilotos
            $pilotos = $pilotoController->listarPilotos();
            echo "<h2>Listagem de Pilotos</h2>";
            echo "<table>";
            echo "<tr><th>ID</th><th>Nome</th><th>Idade</th><th>Peso</th></tr>";
            foreach ($pilotos as $piloto) {
                echo "<tr><td>{$piloto->ID}</td><td>{$piloto->nome}</td><td>{$piloto->idade}</td><td>{$piloto->peso}</td></tr>";
            }
            echo "</table>";
            break;
        case "5":
            // Cadastrar Carro
            $carro = $carroController->cadastrarCarro("Modelo A", "Azul", 2022);
            echo "<p>Carro cadastrado com ID: {$carro->ID}</p>";
            break;
        case "6":
            // Listar Carros
            $carros = $carroController->listarCarros();
            echo "<h2>Listagem de Carros</h2>";
            echo "<table>";
            echo "<tr><th>ID</th><th>Modelo</th><th>Cor</th><th>Ano de Fabricação</th></tr>";
            foreach ($carros as $carro) {
                echo "<tr><td>{$carro->ID}</td><td>{$carro->modelo}</td><td>{$carro->cor}</td><td>{$carro->anoFabricacao}</td></tr>";
            }
            echo "</table>";
            break;
        case "7":
            // Cadastrar Equipe
            $equipe = $equipeController->cadastrarEquipe("Líder A", "Equipe A", "Patrocinador A, Patrocinador B", [$piloto, $piloto]);
            echo "<p>Equipe cadastrada com ID: {$equipe->ID}</p>";
            break;
        case "8":
            // Listar Equipes
            $equipes = $equipeController->listarEquipes();
            echo "<h2>Listagem de Equipes</h2>";
            echo "<table>";
            echo "<tr><th>ID</th><th>Líder</th><th>Nome</th><th>Patrocinadores</th></tr>";
            foreach ($equipes as $equipe) {
                echo "<tr><td>{$equipe->ID}</td><td>{$equipe->lider}</td><td>{$equipe->nome}</td><td>{$equipe->patrocinadores}</td></tr>";
            }
            echo "</table>";
            break;
        case "9":
            // Criar Corrida
            $pista = $pistaController->listarPistas()[0];
            $dataCorrida = date('Y-m-d');
            $corrida = $corridaController->criarCorrida($pista, $dataCorrida, [$piloto, $piloto]);
            echo "<p>Corrida criada com ID: {$corrida->ID}</p>";
            break;
        case "10":
            // Iniciar Corrida
            if (isset($corrida)) {
                $corridaController->iniciarCorrida($corrida);
                echo "<p>Corrida iniciada!</p>";
            } else {
                echo "<p>Crie uma corrida antes de iniciar.</p>";
            }
            break;
        case "11":
            // Finalizar Corrida
            if (isset($corrida)) {
                $corridaController->finalizarCorrida($corrida);
                echo "<p>Corrida finalizada!</p>";
            } else {
                echo "<p>Crie e inicie uma corrida antes de finalizar.</p>";
            }
            break;
        case "12":
            // Exibir 3 Primeiros Colocados
            if (isset($corrida)) {
                $classificacao = $corridaController->obterClassificacao($corrida);
                echo "<h2>Classificação da Corrida</h2>";
                echo "<ol>";
                foreach ($classificacao as $posicao => $piloto) {
                    echo "<li>{$piloto->nome}</li>";
                    if ($posicao === 2) {
                        break; // Mostrar apenas os 3 primeiros colocados
                    }
                }
                echo "</ol>";
            } else {
                echo "<p>Crie e finalize uma corrida antes de exibir os colocados.</p>";
            }
            break;
        case "0":
            exit("<p>Saindo do programa.</p>");
        default:
            echo "<p>Opção inválida. Tente novamente.</p>";
    }
}
?>
        

    </main>

</body>
</html>