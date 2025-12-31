<?php

class Produto{
    private $descricao;
    private $estoque;
    private $preco;


    public function __construct($descricao, $estoque, $preco){
        if(is_string($descricao)){
            $this->descricao = $descricao;
        }

        if(is_numeric($estoque) AND $estoque > 0){
            $this->estoque = $estoque;
        }

        if(is_float($preco) AND $preco > 0){
            $this->preco = $preco;
        }

        print "Todos os objetos criados\n";
        print "Descrição: ". $descricao . "\nEstoque: " . $estoque . "\nPreço: " . $preco;
    }

    public function __destruct(){
        print "\ntodos os objetos destruidos";
    }

    public function getDescricao(){
        return $this->descricao;
    }

    public function getEstoque(){
        return $this->estoque;
    }

    public function getPreco(){
        return $this->preco;
    }

}

$p1 = new Produto("produto1", 200, 5.5);

unset($p1);
