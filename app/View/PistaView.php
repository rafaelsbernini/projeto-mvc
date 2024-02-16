<?php

class PistaView {
    public function mostrarPistas($pistas) {
        echo "Listagem de Pistas:\n";
        foreach ($pistas as $pista) {
            echo "ID: {$pista->ID}, Cidade: {$pista->cidade}, Distância: {$pista->distancia}, País: {$pista->pais}\n";
        }
    }
}

?>