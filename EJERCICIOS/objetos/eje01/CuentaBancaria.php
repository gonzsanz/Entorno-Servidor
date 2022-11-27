<?php

class CuentaBancaria {

    private $saldo;
    private $movimientos;
    static private $numeroCuentas = 0;

    function __construct(int $saldo = 0) {
        $this->saldo = $saldo;
        $this->movimientos = 0;
        self::$numeroCuentas++;
    }

    public function ingreso(int $cantidad) {

        $this->saldo += $cantidad;
        $this->movimientos++;
    }

    public function abono(int $cantidad) {
        $this->saldo -= $cantidad;
        $this->movimientos++;
    }

    public function anotarGastos() {
        if ($this->saldo < 1000) {
            $this->saldo -= 20;
            $this->movimientos++;
        }
    }
    public function anotarIntereses(int $interes) {
        $this->saldo += intval(round($this->saldo * ($interes / 100)));
        $this->movimientos++;
    }

    public function transferencia(int $cantidad, CuentaBancaria $destino) {
        $this->abono($cantidad);
        $destino->ingreso($cantidad);
    }

    public function consultarEstado() {
        return "Saldo: " . $this->saldo . "\nNº de movimientos: " . $this->movimientos;
    }
}
