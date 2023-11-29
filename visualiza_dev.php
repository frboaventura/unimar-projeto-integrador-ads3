<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualização de Devs</title>
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

                $dados_select = mysqli_query($conn, "SELECT NOME, SOBRENOME, EMAIL, DEVWEB, SENIORIDADE, TECNOLOGIA, EXPERIENCIA FROM DEV");

                while($dado = mysqli_fetch_array($dados_select)) {
                        echo '<tr>';
                        echo '<td>'.$dado[0].'</td>';
                        echo '<td>'.$dado[1].'</td>';
                        echo '<td>'.$dado[2].'</td>';
                        echo '<td>'.$dado[3].'</td>';
                        echo '<td>'.$dado[4].'</td>';
                        echo '<td>'.$dado[5].'</td>';
                        echo '<td>'.$dado[6].'</td>';
                        
                        echo '</tr>';
                }
            ?>
        </table>
        <br />
        <a href="index.html"><input type="button" value="Voltar"></a>
    </center>
</body>

</html>