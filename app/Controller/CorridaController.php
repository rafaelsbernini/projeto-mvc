<?php

require_once '../../app/Model/Corrida.php';

class CorridaController {
    private $corridas = array();

    public function __construct() {
        $this->carregarDados();
    }

    public function criarCorrida($pista, $data, $pilotos) {
        $novaCorrida = new Corrida(count($this->corridas) + 1, $pista, $data, $pilotos);
        $this->corridas[] = $novaCorrida;

        $this->salvarDados();

        return $novaCorrida;
    }

    public function listarCorridas() {
        return $this->corridas;
    }

    public function iniciarCorrida($corrida) {
        // Lógica para iniciar a corrida
    }

    public function finalizarCorrida($corrida) {
        // Lógica para finalizar a corrida
    }

    public function obterClassificacao($corrida) {
        // Lógica para obter a classificação da corrida
    }

    private function salvarDados() {
        $dados = json_encode($this->corridas, JSON_PRETTY_PRINT);
        file_put_contents('../data.json', $dados);
    }

    private function carregarDados() {
        if (file_exists('../data.json')) {
            $json = file_get_contents('../data.json');
            $this->corridas = json_decode($json, true);
        }
    }
}

?>