<?php

class Pista {
    private $ID;
    private $cidade;
    private $distancia;
    private $pais;

    public function __construct($ID, $cidade, $distancia, $pais) {
        $this->ID = $ID;
        $this->cidade = $cidade;
        $this->distancia = $distancia;
        $this->pais = $pais;
    }

    public function getID() {
        return $this->ID;
    }

    public function getCidade() {
        return $this->cidade;
    }

    public function getDistancia() {
        return $this->distancia;
    }

    public function getPais() {
        return $this->pais;
    }
}

?>