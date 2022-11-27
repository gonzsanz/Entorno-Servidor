<?php

namespace pruebas00\taller\POO;

class Coche {
    // Definir los atributos
    private $modelo;
    private $distancia_total;
    private $distancia_parcial;
    private $motor;
    private $velocidad;
    private $velocidadMax;

    // Completar los métodos

    function __construct(String $modelo, int $velocidadMax) {
        $this->modelo = $modelo;
        $this->velocidadMax = $velocidadMax;
        $this->distancia_total = 0;
        $this->distancia_parcial = 0;
        $this->motor = false;
        $this->velocidad = 0;
    }

    public function  arrancar(): bool {
        $this->motor = true;
        return true;
    }

    public function parar(): bool {
        $this->motor = false;
        return false;
    }

    public function acelera(int $cantidad): bool {
        return true;
    }

    public function frena(int $cantidad): bool {
        return true;
    }

    public function recorre(): bool {
        return true;
    }

    public function info(): string {
        return "";
    }

    public function getKilometros(): int {
        return 0;
    }

    private function infoError(String $mensaje): void {
    }
}
