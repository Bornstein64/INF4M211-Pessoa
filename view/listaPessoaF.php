<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
$listPes = $_REQUEST['pessoasF'];
$listPesBD = $_REQUEST['pessoaPFBD'];
?>
<html>
    <head>
    <a href="../controller/cPessoaF.php"></a>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
    <table>
        <tr>
            <th>Nome</th>
            <th>e-mail</th>
            <th>CPF</th>
        </tr>
        <!--
        <?php foreach ($listPes as $pf): ?>
                <tr>
                    <td><?php // echo $pf->getNome();   ?></td>
                    <td><?php // echo $pf->getEmail();   ?></td>
                    <td><?php // echo $pf->getCpf();   ?></td>
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
