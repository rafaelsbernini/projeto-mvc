<?php

class Piloto {
    private $ID;
    private $nome;
    private $idade;
    private $peso;

    public function __construct($ID, $nome, $idade, $peso) {
        $this->ID = $ID;
        $this->nome = $nome;
        $this->idade = $idade;
        $this->peso = $peso;
    }

    public function getID() {
        return $this->ID;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getIdade() {
        return $this->idade;
    }

    public function getPeso() {
        return $this->peso;
    }
}

?>