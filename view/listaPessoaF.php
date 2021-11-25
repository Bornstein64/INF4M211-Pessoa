<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
require_once '../controller/cPessoaF.php'; //require == import do java
$listPes = $_REQUEST['pessoasF']; //Lista do array, fora de uso
$listPesBD = $_REQUEST['pessoaPFBD']; // Lista do BD
$cadPFs = new cPessoaF();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <table>
            <tr>
                <th>Nome</th>
                <th>E-mail</th>
                <th>CPF</th>
                <th>Funções</th>
            </tr>
            <!--
            <?php foreach ($listPes as $pf): ?>
                            <tr>
                                <td><?php // echo $pf->getNome();     ?></td>
                                <td><?php // echo $pf->getEmail();     ?></td>
                                <td><?php // echo $pf->getCpf();     ?></td>
                            </tr>
            <?php endforeach; ?>
            -->
            <!--Lista com dados recuperados do banco de dados-->
            <?php
            if ($listPesBD == null) {
                echo "Tabela Pessoa Física está vazia!";
            } else {
                foreach ($listPesBD as $pf) :
                    ?>
                    <tr>
                        <td><?php echo $pf['nome']; ?></td>
                        <td><?php echo $pf['email']; ?></td>
                        <td><?php echo $pf['cpf']; ?></td>
                        <td>
                            <form action="editPessoaF.php" method="POST"> 
                                <input type="hidden" name="id" value="<?php echo $pf['idPessoa']; ?>"/>  
                                <input type="submit" name="updatePF" value="Editar"/>
                            </form>
                            <form action="<?php $cadPFs->deletePes(); ?>" method="POST">
                                <input type="hidden" name="id" value="<?php echo $pf['idPessoa']; ?>"/>
                                <input type="submit" name="delete" value="Deletar"/>
                            </form>
                        </td>
                    </tr>
                    <?php
                endforeach;
            }
            ?>
        </table>
        <?php
        // put your code here
        ?>
    </body>
</html>
