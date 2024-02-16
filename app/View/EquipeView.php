<?php

class EquipeView {
    public function mostrarEquipes($equipes) {
        echo "Listagem de Equipes:\n";
        foreach ($equipes as $equipe) {
            $pilotos = implode(", ", array_map(function ($piloto) {
                return $piloto->nome;
            }, $equipe->pilotos));

            echo "ID_EQUIPE: {$equipe->ID}, Líder: {$equipe->lider}, Nome: {$equipe->nome}, Pilotos: {$pilotos}, Patrocinadores: {$equipe->patrocinadores}\n";
        }
    }
}

?>