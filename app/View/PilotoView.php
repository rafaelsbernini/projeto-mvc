<?php

class PilotoView {
    public function mostrarPilotos($pilotos) {
        echo "Listagem de Pilotos:\n";
        foreach ($pilotos as $piloto) {
            echo "ID: {$piloto->ID}, Nome: {$piloto->nome}, Idade: {$piloto->idade}, Peso: {$piloto->peso}\n";
        }
    }
}

?>