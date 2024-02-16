<?php

require_once '../../app/Model/Equipe.php';

class EquipeController {
    private $equipes = array();

    public function __construct() {
        $this->carregarDados();
    }

    public function cadastrarEquipe($lider, $nome, $patrocinadores, $pilotos) {
        $novaEquipe = new Equipe(count($this->equipes) + 1, $lider, $nome, $patrocinadores, $pilotos);
        $this->equipes[] = $novaEquipe;

        $this->salvarDados();

        return $novaEquipe;
    }

    public function listarEquipes() {
        return $this->equipes;
    }

    private function salvarDados() {
        $dados = json_encode($this->equipes, JSON_PRETTY_PRINT);
        file_put_contents('../data.json', $dados);
    }

    private function carregarDados() {
        if (file_exists('../data.json')) {
            $json = file_get_contents('../data.json');
            $this->equipes = json_decode($json, true);
        }
    }
}

?>