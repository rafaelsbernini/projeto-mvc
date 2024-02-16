<?php

class Equipe {
    private $ID;
    private $lider;
    private $nome;
    private $patrocinadores;
    private $pilotos;

    public function __construct($ID, $lider, $nome, $patrocinadores, $pilotos) {
        $this->ID = $ID;
        $this->lider = $lider;
        $this->nome = $nome;
        $this->patrocinadores = $patrocinadores;
        $this->pilotos = $pilotos;
    }

    public function getID() {
        return $this->ID;
    }

    public function getLider() {
        return $this->lider;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getPatrocinadores() {
        return $this->patrocinadores;
    }

    public function getPilotos() {
        return $this->pilotos;
    }
}

?>