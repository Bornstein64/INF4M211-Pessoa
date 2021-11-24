<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of cPessoaJ
 *
 * @author Paulo
 */
require_once '../model/pessoaJ.php';

class cPessoaJ {

    //put your code here
    private $pjs = []; //estamos usando este array pq não estamos trabalhando com

    //banco de dados ainda

    public function __construct() {
        $this->mokPJ();
    }

    public function addPessoaJ($p) {
        array_push($this->pjs, $p);
    }

    public function mokPJ() {
        $pj1 = new pessoaJ();
        $pj1->setNome('Senac RS');
        $pj1->setNomeFantasia('Senac Tech');
        $pj1->setEndereco('Av. Venancio Aires');
        $pj1->setEmail('contato@senacrs.com.br');
        $pj1->setSite('www.senacrs.com.br');
        $pj1->setTelefone('5133403340');
        $pj1->setCnpj('123321123001-18');
        $this->addPessoaJ($pj1);
        
        $pj2 = new pessoaJ();
        $pj2->setNome('Padaria');
        $pj2->setNomeFantasia('Pão Doce');
        $pj2->setEndereco('Av. Osvaldo Aranha');
        $pj2->setEmail('contato@paodoce.com.br');
        $pj2->setSite('www.paodoce.com.br');
        $pj2->setTelefone('5133403340');
        $pj2->setCnpj('123321123001-18');
        $this->addPessoaJ($pj2);
    }
    
    public function getAll() {
        $_REQUEST['pessoasJ'] = $this->pjs;
        require_once '../view/listaPessoaJ.php';
    }
    
     public function imprimepjs() {
        foreach ($this->pjs as $pes) {
            echo $pes;
        }
     }
     
     public function inserir() {
        if(isset($_POST['salvarPJ'])){
           $pj = new pessoaJ();
           $pj->setNome($_POST['social']);
           $pj->setNomeFantasia($_POST['fantasia']);
           $pj->setEmail($_POST['email']);
           $pj->setEndereco($_POST['endereco']);
           $pj->setTelefone($_POST['telefone']);
           $pj->setSite($_POST['site']);
           $pj->setCnpj($_POST['cnpj']);
           $this->addPessoaJ($pj);
        }
        
    }
     
}
