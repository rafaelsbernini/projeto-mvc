<?php
require_once 'Controller/PistaController.php';
require_once 'Controller/PilotoController.php';
require_once 'Controller/CarroController.php';
require_once 'Controller/EquipeController.php';
require_once 'Controller/CorridaController.php';

require_once 'View/PistaView.php';
require_once 'View/PilotoView.php';
require_once 'View/CarroView.php';
require_once 'View/EquipeView.php';
require_once 'View/CorridaView.php';

$pistaController = new PistaController();
$pilotoController = new PilotoController();
$carroController = new CarroController();
$equipeController = new EquipeController();
$corridaController = new CorridaController();

$pistaView = new PistaView();
$pilotoView = new PilotoView();
$carroView = new CarroView();
$equipeView = new EquipeView();
$corridaView = new CorridaView();

while (true) {
    echo "====== Menu ======\n";
    echo "1. Cadastrar Pista\n";
    echo "2. Listar Pistas\n";
    echo "3. Cadastrar Piloto\n";
    echo "4. Listar Pilotos\n";
    echo "5. Cadastrar Carro\n";
    echo "6. Listar Carros\n";
    echo "7. Cadastrar Equipe\n";
    echo "8. Listar Equipes\n";
    echo "9. Criar Corrida\n";
    echo "10. Iniciar Corrida\n";
    echo "11. Finalizar Corrida\n";
    echo "12. Exibir 3 Primeiros Colocados\n";
    echo "0. Sair\n";
    echo "Escolha uma opção: ";

    $opcao = trim(readline());

    switch (strtolower($opcao)) {
        case "1":
            $pista = $pistaController->cadastrarPista("Cidade A", "500 km", "País X");
            echo "Pista cadastrada com ID: {$pista->ID}\n";
            break;
        case "2":
            $pistas = $pistaController->listarPistas();
            $pistaView->mostrarPistas($pistas);
            break;
        case "3":
            $piloto = $pilotoController->cadastrarPiloto("Piloto A", 25, 70);
            echo "Piloto cadastrado com ID: {$piloto->ID}\n";
            break;
        case "4":
            $pilotos = $pilotoController->listarPilotos();
            $pilotoView->mostrarPilotos($pilotos);
            break;
        case "5":
            $carro = $carroController->cadastrarCarro("Modelo A", "Azul", 2022);
            echo "Carro cadastrado com ID: {$carro->ID}\n";
            break;
        case "6":
            $carros = $carroController->listarCarros();
            $carroView->mostrarCarros($carros);
            break;
        case "7":
            $equipe = $equipeController->cadastrarEquipe("Líder A", "Equipe A", "Patrocinador A, Patrocinador B", [$piloto, $piloto]);
            echo "Equipe cadastrada com ID: {$equipe->ID}\n";
            break;
        case "8":
            $equipes = $equipeController->listarEquipes();
            $equipeView->mostrarEquipes($equipes);
            break;
        case "9":
            $pista = $pistaController->listarPistas()[0];
            $dataCorrida = date('Y-m-d');
            $corrida = $corridaController->criarCorrida($pista, $dataCorrida, [$piloto, $piloto]);
            echo "Corrida criada com ID: {$corrida->ID}\n";
            break;
        case "10":
            if (isset($corrida)) {
                $corridaController->iniciarCorrida($corrida);
                echo "Corrida iniciada!\n";
            } else {
                echo "Crie uma corrida antes de iniciar.\n";
            }
            break;
        case "11":
            if (isset($corrida)) {
                $corridaController->finalizarCorrida($corrida);
                echo "Corrida finalizada!\n";
            } else {
                echo "Crie e inicie uma corrida antes de finalizar.\n";
            }
            break;
        case "12":
            if (isset($corrida)) {
                $classificacao = $corridaController->obterClassificacao($corrida);
                $corridaView->mostrarClassificacao($classificacao);
            } else {
                echo "Crie e finalize uma corrida antes de exibir os colocados.\n";
            }
            break;
        case "0":
            exit("Saindo do programa.\n");
        default:
            echo "Opção inválida. Tente novamente.\n";
    }
}