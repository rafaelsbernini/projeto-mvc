<?php

class CarroView {
    public function mostrarCarros($carros) {
        echo "<h2>Listagem de Carros</h2>";
        if (count($carros) > 0) {
            echo "<table>";
            echo "<tr><th>ID</th><th>Modelo</th><th>Cor</th><th>Ano de Fabricação</th></tr>";
            foreach ($carros as $carro) {
                echo "<tr><td>{$carro->getID()}</td><td>{$carro->getModelo()}</td><td>{$carro->getCor()}</td><td>{$carro->getAnoFabricacao()}</td></tr>";
            }
            echo "</table>";
        } else {
            echo "<p>Nenhum carro cadastrado.</p>";
        }
    }
}

?>