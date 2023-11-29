<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualização de Devs</title>
</head>

<body>
    <center>
        <h1>Devs Cadastrados</h1>

        <table border="4">
            <tr>
                
                <td>NOME</td>
                <td>SOBRENOME</td>
                <td>EMAIL</td>
                <td>LINGUAGENS</td>
                <td>SENIORIDADE</td>
                <td>TECNOLOGIA</td>
                <td>EXPERIENCIA</td>
            </tr>
            <?php
                require("conecta.php");

                $dados_select = mysqli_query($conn, "SELECT * FROM DEV");

                while($dado = mysqli_fetch_assoc($dados_select)) {
                        echo '<tr>';
                        
                        echo '<td>'.$dado['NOME'].'</td>';
                        echo '<td>'.$dado['SOBRENOME'].'</td>';
                        echo '<td>'.$dado['EMAIL'].'</td>';
                        echo '<td>'.$dado['DEVWEB'].'</td>';
                        echo '<td>'.$dado['SENIORIDADE'].'</td>';
                        echo '<td>'.$dado['TECNOLOGIA'].'</td>';
                        echo '<td>'.$dado['EXPERIENCIA'].'</td>';
                        echo '<td>';
                        echo '<form method="GET" action="atualiza.php">';
                        echo '<button class="btn btn-danger btn-sm" type="submit" name="btnAlterar" value="'.$dado['id_dev'].'"> Editar </button>';
                        echo '</form>';
                        echo '</td>';
                        echo '</tr>';
                }
            ?>
        </table>
        <br />
        <a href="index.html"><input type="button" value="Voltar"></a>
    </center>
</body>

</html>