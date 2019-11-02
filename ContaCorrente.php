<?php


class ContaCorrente
{
    public $titular;

    public $agencia;

    public $numero;

    private $saldo;

    public function __construct($titular = null,$agencia = null,$numero = null,  $saldo = null){
        $this->titular = $titular;
        $this->agencia = $agencia;
        $this->numero = $numero;
        $this->saldo = $saldo;
    }

    public function __get($atributo){

        Validacao::protegeAtributo($atributo);

        return $this->$atributo;

    }


    public function __set($atributo,$valor){

        Validacao::protegeAtributo($atributo);

        $this->$atributo = $valor;

    }

    public function transferir($valor, ContaCorrente $conta){

        $this->sacar($valor);
        $conta->depositar($valor);

    }

    public function sacar($valor)
    {

        $this->saldo = $this->saldo - $valor;
        return $this;

    }

    public function depositar($valor)
    {

        $this->saldo = $this->saldo + $valor;
        return $this;

    }
}