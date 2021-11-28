<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of cPessoaJ
 * Controller de pessoa jurídica
 * @author Paulo Steinborn
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
        $this->getAllBD();
        require_once '../view/listaPessoaJ.php';
    }

    public function imprimepjs() {
        foreach ($this->pjs as $pes) {
            echo $pes;
        }
    }

    public function inserir() {
        if (isset($_POST['salvarPJ'])) {
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

    public function inserirBD() {
        if (isset($_POST['salvarPJ'])) {
            $host = 'localhost';
            $user = 'root';
            $pass = '';
            $schema = 'inf4m211';
            $conexao = mysqli_connect($host, $user, $pass, $schema);
            if (!$conexao) {
                die('Não foi possível conectar. ' . mysqli_error());
            }

            $NomeSocial = $_POST['social'];
            $NomeFantasia = $_POST['fantasia'];
            $Email = $_POST['email'];
            $Endereco = $_POST['endereco'];
            $Telefone = $_POST['telefone'];
            $Site = $_POST['site'];
            $Cnpj = $_POST['cnpj'];


            $sql = "insert into `pessoa`(`nome`,`telefone`,`email`,`endereco`,"
                    . "`cnpj`,`nomeFantasia`,`site`) values ('$NomeSocial','$Telefone','$Email',"
                    . "'$Endereco','$Cnpj','$NomeFantasia','$Site')";

            $resultado = mysqli_query($conexao, $sql);

            if (!$resultado) {
                die('Não foi possível inserir na tabela. ' . mysqli_error($conexao));
            }

            mysqli_close($conexao);
        }
    }

    public function getAllBD() {
        $host = 'localhost';
        $user = 'root';
        $pass = '';
        $schema = 'inf4m211';
        $conexao = mysqli_connect($host, $user, $pass, $schema);
        if (!$conexao) {
            die('Não foi possivel conectar. ' . mysqli_error());
        }

        $sql = "select * from pessoa where cpf is null";
        $result = mysqli_query($conexao, $sql);
        if ($result) {
            $pjsBD = [];
            while ($row = mysqli_fetch_assoc($result)) {
                array_push($pjsBD, $row);
            }
            $_REQUEST['pessoaPJBD'] = $pjsBD;
        } else {
            $_REQUEST['pessoaPJBD'] = 0;
        }
        mysqli_close($conexao);
    }

    public function deletePes() {
        if (isset($_POST['delete'])) {
            $id = $_POST['id'];

            $host = 'localhost';
            $user = 'root';
            $pass = '';
            $schema = 'inf4m211';
            $conexao = mysqli_connect($host, $user, $pass, $schema);
            if (!$conexao) {
                die('Não foi possivel conectar. ' . mysqli_error());
            }

            $sql = "delete from pessoa where idPessoa = $id";
            $result = mysqli_query($conexao, $sql);
            if (!$result) {
                die('Erro ao deletar. ' . mysqli_error($conexao));
            }
            mysqli_close($conexao);
            header('Refresh: 0'); // recarrega a pág. F5 em 0 segundos
        }
    }

    public function getPessoaJById($id) {
        $host = 'localhost';
        $user = 'root';
        $pass = '';
        $schema = 'inf4m211';
        $conexao = mysqli_connect($host, $user, $pass, $schema);
        if (!$conexao) {
            die('Não foi possivel conectar. ' . mysqli_error($conexao));
        }

        $sql = "select * from pessoa where idPessoa = $id";
        $result = mysqli_query($conexao, $sql);
        if ($result) {
            $pjsBD = [];
            while ($row = mysqli_fetch_assoc($result)) {
                array_push($pjsBD, $row);
            }
            return $pjsBD;
        }
        mysqli_close($conexao);
    }

    public function updatePJ() {
        if (isset($_POST['update'])) {
            $host = 'localhost';
            $user = 'root';
            $pass = '';
            $schema = 'inf4m211';
            $conexao = mysqli_connect($host, $user, $pass, $schema);
            if (!$conexao) {
                die('Não foi possivel conectar. ' . mysqli_error());
            }
            
            $idPessoa = $_POST['id'];
            $NomeSocial = $_POST['social'];
            $NomeFantasia = $_POST['fantasia'];
            $Email = $_POST['email'];
            $Endereco = $_POST['endereco'];
            $Telefone = $_POST['telefone'];
            $Site = $_POST['site'];
            $Cnpj = $_POST['cnpj'];


            $sql = "UPDATE `pessoa` SET `nome` = '$NomeSocial',`telefone` = '$Telefone',"
                    . "`email` = '$Email', `endereco` = '$Endereco', `cnpj` = '$Cnpj',"
                    . "`nomeFantasia` = '$NomeFantasia',`site` = '$Site' WHERE `idPessoa` = '$idPessoa'";

            $resultado = mysqli_query($conexao, $sql);

            if (!$resultado) {
                die('Erro ao atualizar pessoa na tabela. ' . mysqli_error($conexao));
            }
            mysqli_close($conexao);
            header('Location: ../view/cadPessoaJ.php');
        }
        if (isset($_POST['cancelar'])) {
            header('Location: ../view/cadPessoaJ.php');
        }
    }

}
