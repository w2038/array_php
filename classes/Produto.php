<?php

class Produto{
    private $descricao;
    private $estoque;
    private $preco;
    private $fabricante;
    private $caracteristicas;
    private $nome;
    private $valor;

    public function __construct($descricao, $estoque, $preco){
        $this->descricao = $descricao;
        $this->estoque = $estoque;
        $this->preco = $preco;
    }

    public function getDescricao(){
        return $this->descricao;
    }

    // aqui está a classe inteira Fabricante
    public function setFabricante(Fabricante $f){
        $this->fabricante = $f;
    }

    public function getFabricante(){
        return  $this->fabricante;
    }

    public function addCaracteristica($nome, $valor){
        $this->caracteristicas[] = new Caracteristica($nome, $valor);
    }

    public function getCaracteristicas(){
        return $this->caracteristicas;
    }
}