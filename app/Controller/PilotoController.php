<?php

require_once '../../app/Model/Piloto.php';

class PilotoController {
    private $pilotos = array();

    public function __construct() {
        $this->carregarDados();
    }

    public function cadastrarPiloto($nome, $idade, $peso) {
        $novoPiloto = new Piloto(count($this->pilotos) + 1, $nome, $idade, $peso);
        $this->pilotos[] = $novoPiloto;

        $this->salvarDados();

        return $novoPiloto;
    }

    public function listarPilotos() {
        return $this->pilotos;
    }

    private function salvarDados() {
        $dados = json_encode($this->pilotos, JSON_PRETTY_PRINT);
        file_put_contents('../data.json', $dados);
    }

    private function carregarDados() {
        if (file_exists('../data.json')) {
            $json = file_get_contents('../data.json');
            $this->pilotos = json_decode($json, true);
        }
    }
}

?>