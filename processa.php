<?php

class Produto{
    private $descricao;
    private $estoque;
    private $preco;

    public function setDescricao($descricao){
        if(is_string($descricao)){
            $this->descricao = $descricao;
        }
    }

    public function getDescricao(){
        return $this->descricao;
    }

    public function setEstoque($estoque){
        if(is_numeric($estoque) AND $estoque > 0){
            $this->estoque = $estoque;
        }
    }

    public function getEstoque(){
        return $this->estoque;
    }

}

class Livro{
    private $titulo;
    private $autor;
    private $paginas;
    private $disponivel;

    public function setPaginas($paginas){
        if($paginas > 0){
            $this->paginas = $paginas;
        }
    }

    public function getPaginas(){
        return $this->paginas;
    }

    public function setDisponivel($disponivel){
        if(is_bool($disponivel)){
            $this->disponivel = $disponivel;
        }
    }

    public function getDisponivel(){
        return $this->disponivel;
    }


}

$p1 = new Produto;
$p1->setDescricao('Chocolate');
$p1->setEstoque(10);




$livro = new Livro;
$livro->setPaginas(300);
$livro->setDisponivel(true);

echo "Paginas:" . ($livro->getPaginas()) . ($livro->getDisponivel() ? "\nsim" : "\nNão");