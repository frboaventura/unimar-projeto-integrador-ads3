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
<?php
require("conecta.php");
// Obtém o valor do ID do registro a ser excluído
$id_exc = $_GET['btnExcluir'];



// Prepara a consulta SQL
$sql = 'DELETE FROM dev WHERE id_dev ='.$id_exc;

// Executa a consulta SQL
$resultado = mysqli_query($conn, $sql);

// Verifica se a consulta foi bem-sucedida
if ($resultado) {
  // Registro excluído com sucesso
  echo "<h1>Registro excluído com sucesso</h1>";
} else {
  // Erro ao excluir o registro
  echo "<h1>Erro ao excluir o registro</h1>";
}

// Fecha a conexão com o banco de dados
mysqli_close($conn);

?>

<br />
<a href="exclui_dev.php"><input type="button" value="Voltar"></a>
    </center>
</body>

</html>