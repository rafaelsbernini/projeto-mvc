<?php

class Carro {
    private $ID;
    private $modelo;
    private $cor;
    private $anoFabricacao;

    public function __construct($ID, $modelo, $cor, $anoFabricacao) {
        $this->ID = $ID;
        $this->modelo = $modelo;
        $this->cor = $cor;
        $this->anoFabricacao = $anoFabricacao;
    }

    public function getID() {
        return $this->ID;
    }

    public function getModelo() {
        return $this->modelo;
    }

    public function getCor() {
        return $this->cor;
    }

    public function getAnoFabricacao() {
        return $this->anoFabricacao;
    }
}

?>