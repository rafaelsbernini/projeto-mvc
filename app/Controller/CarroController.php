<?php

require_once '../../app/Model/Carro.php';

class CarroController {
    private $carros = array();

    public function __construct() {
        $this->carregarDados();
    }

    public function cadastrarCarro($modelo, $cor, $anoFabricacao) {
        $novoCarro = new Carro(count($this->carros) + 1, $modelo, $cor, $anoFabricacao);
        $this->carros[] = $novoCarro;

        $this->salvarDados();

        return $novoCarro;
    }

    public function listarCarros() {
        return $this->carros;
    }

    private function salvarDados() {
        $dados = json_encode($this->carros, JSON_PRETTY_PRINT);
        file_put_contents('../data.json', $dados);
    }

    private function carregarDados() {
        if (file_exists('../data.json')) {
            $json = file_get_contents('../data.json');
            $this->carros = json_decode($json, true);
        }
    }
}

?>