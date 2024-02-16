
<?php

class CorridaID {
    private $ID;
    private $pista;
    private $data;
    private $pilotos;

    public function __construct($ID, $pista, $data, $pilotos) {
        $this->ID = $ID;
        $this->pista = $pista;
        $this->data = $data;
        $this->pilotos = $pilotos;
    }

    public function getID() {
        return $this->ID;
    }

    public function getPista() {
        return $this->pista;
    }

    public function getData() {
        return $this->data;
    }

    public function getPilotos() {
        return $this->pilotos;
    }
}

?>


<?php
/*class CorrID_CORRIDAa {
    public $ID_CORRIDA;
    public $pista; // objeto Pista
    public $data;
    public $pilotos; // array de objetos Piloto

    // Array com base nos dados da instância
    public $dados = [];

    public function __construct($ID_CORRIDA, $pista, $data, $pilotos) {
        $this->ID_CORRIDA = $ID_CORRIDA;
        $this->pista = $pista;
        $this->data = $data;
        $this->pilotos = $pilotos;

        // Preencher o array $dados
        $this->dados = [
            'ID_CORRIDA' => $this->ID_CORRIDA,
            'pista' => $this->pista,
            'data' => $this->data,
            'pilotos' => $this->pilotos,
        ];
    }
}*/

?>