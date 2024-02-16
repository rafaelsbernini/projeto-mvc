<?php

require_once '../../app/Model/Pista.php';

class PistaController {
    private $pistas = array();

    public function __construct() {
        $this->carregarDados(); // Carregar dados ao instanciar o controlador
    }

    public function cadastrarPista($cidade, $distancia, $pais) {
        // Lógica para cadastrar uma nova pista
        $novaPista = new Pista(count($this->pistas) + 1, $cidade, $distancia, $pais);
        $this->pistas[] = $novaPista;

        // Após cadastrar, salvar os dados no arquivo JSON
        $this->salvarDados();

        return $novaPista;
    }

    public function listarPistas() {
        return $this->pistas;
    }

    private function salvarDados() {
        $dados = json_encode($this->pistas, JSON_PRETTY_PRINT);
        file_put_contents('../data.json', $dados);
    }

    private function carregarDados() {
        if (file_exists('../data.json')) {
            $json = file_get_contents('../data.json');
            $dados = json_decode($json, true);

            // Transformar os dados em objetos Pista
            foreach ($dados as $pistaData) {
                $this->pistas[] = new Pista($pistaData['ID'], $pistaData['cidade'], $pistaData['distancia'], $pistaData['pais']);
            }
        }
    }
}

?>