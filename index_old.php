<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <?php

    function linkSite($dominio) {
        ?>
        <a href="https://www.<?php echo $dominio ?>.com.br" target="blank">
            <?php echo $dominio ?>
        </a>
        <?php
    }
    ?>
    <head>
        <meta charset="UTF-8">
        <title>INF4M211 - Primeiro Projeto</title>
    </head>
    <body>
        <table><!-- Cria tabela -->
            <tr><!-- Cria linha -->
                <td><!-- Cria coluna -->
                    <h1>Projeto teste da turma:</h1>
                    <h2>INF4M211</h2>
                    <h3>Paulo Steinborn</h3>
                    <br>
                    <p><font face='Verdana'>Mussum Ipsum, cacilds vidis litro abertis. Interessantiss quisso 
                        pudia ce receita de bolis, mais bolis eu num gostis. <br>Viva Forevis 
                        aptent taciti sociosqu ad litora torquent. Paisis, filhis, 
                        espiritis santis. Posuere libero varius. <br>Nullam a nisl ut ante 
                        blandit hendrerit. Aenean sit amet nisi.</font></p>
                    <?php
                    // put your code here
                    echo 'Hello World!';
                    echo '<br>';
                    //int valor = 4; no Java
                    //$valor = 4; no PHP não tem data type
                    $var1 = 4;
                    $var2 = 2;
                    $res = $var1 % $var2; //mod ou modal = resto da divisão
                    if ($res == 0) {
                        echo 'Núm. ' . $var1 . ' é Par!';
                    } else {
                        echo 'Núm. ' . $var1 . ' é Impar!';
                    }
                    echo '<br>';
                    linkSite('Google');
                    echo " | ";
                    linkSite('Terra');
                    echo " | ";
                    linkSite('Youtube');
                    ?>
                </td><!-- Fecha coluna -->
                <td>
                    <h3>Form. Get</h3>
                    <form method="GET">
                        <label>Nome: </label>
                        <br>
                        <input type="text" name="nome"/>
                        <br>
                        <label>Idade: </label>
                        <br>
                        <input type="number" name="idade"/>
                        <br>
                        <input type="submit" name="calc" value="Calcular"/>
                        <input type="reset" name="limpar" value="Limpar"/>
                    </form>
                </td>
                <td>
                    <h3>Form. Post</h3>
                    <form method="POST">
                        <input type="text" name="nome" placeholder="Nome aqui..."/>
                        <br>
                        <input type="number" name="idade" placeholder="Idade aqui..."/>
                        <br>
                        <input type="submit" name="calc" value="Calcular"/>
                        <input type="reset" name="limpar" value="Limpar"/>
                    </form>
                </td>
            </tr><!-- Fecha linha -->
        </table><!-- Fecha tabela -->
        <?php
        require_once './controller/cPessoaF.php';
        $cadPFs = new cPessoaF();
        echo '<table><tr><td>';
        $pf1 = new pessoaF();
        $pf1->setNome('Beltrano de Tal');
        $pf1->setTelefone('519888998899');
        $pf1->setEmail('beltrano@hotmail.com');
        $pf1->setEndereco('Rua das Candongas');
        $pf1->setCpf('123321123321');
        $pf1->setRg('12312332112');
        $pf1->setSexo('M');
        $cadPFs->addPessoaF($pf1);
        
        $cadPFs->imprimePFs();
        echo '</td>';
        echo '<td>';
        echo '</td></tr></table>';
        ?>
    </body><!-- Fecha Corpo da pág -->
    <?php
    if (isset($_GET['calc'])) {
        $dias = $_GET['idade'] * 365;
        $msg = 'Get: ' . $_GET['nome'] . ' tem ' . $_GET['idade']
                . ' anos de vida e viveu ' . $dias . ' dias aproximadamente.';
        echo "<script type='text/javascript'>alert('$msg');</script>";
    }
    if (isset($_POST['calc'])) {
        $dias = $_POST['idade'] * 365;
        $msg = 'Post: ' . $_POST['nome'] . ' tem ' . $_POST['idade']
                . ' anos de vida e viveu ' . $dias . ' dias aproximadamente.';
        print_r($msg);
    }
    ?>
</html><!-- Fecha a pág -->
