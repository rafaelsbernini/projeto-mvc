<?php

class CorridaView {
    public function mostrarDetalhes($corrida) {
        echo "<h2>Detalhes da Corrida</h2>";
        echo "<p>ID: {$corrida->getID()}</p>";
        echo "<p>Data: {$corrida->getData()}</p>";

        $pilotos = $corrida->getPilotos(); // Substitua pelo método real
        echo "<h3>Pilotos Participantes</h3>";
        echo "<ul>";
        foreach ($pilotos as $piloto) {
            echo "<li>{$piloto->getNome()}</li>"; // Substitua pelo método real
        }
        echo "</ul>";
    }

    public function mostrarClassificacao($classificacao) {
        echo "<h2>Classificação da Corrida</h2>";
        echo "<ol>";
        foreach ($classificacao as $posicao => $piloto) {
            echo "<li>{$piloto->getNome()}</li>"; // Substitua pelo método real
        }
        echo "</ol>";
    }
}

?>