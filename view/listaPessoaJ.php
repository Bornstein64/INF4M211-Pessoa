<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php $listPes = $_REQUEST['pessoasJ'];?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
         <table>
            <tr>
                <th>Nome</th>
                <th>Telefone</th>
                <th>Site</th>
            </tr>
            <?php foreach ($listPes as $pj): ?>
            <tr>
                <td><?php echo $pj->getNome(); ?></td>
                <td><?php echo $pj->getTelefone(); ?></td>
                <td><?php echo $pj->getSite(); ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php
        // put your code here
        ?>
    </body>
</html>
