<?php
session_start();
$id_alt=$_SESSION["id_alt"];
require("conecta.php");
    $nome = $_GET["nome"];
    $sobrenome = $_GET["sobrenome"];
    $email = $_GET["email"];
    $devweb = $_GET["devweb"];
    $senioridade = $_GET["senioridade"];
     // Verifica se o campo tecnologia contém algum valor
    $tecnologia = isset($_GET["tecnologia"]) ? implode(", ", $_GET["tecnologia"]) : "";


    $experiencia = $_GET["experiencia"];
    
    // Prepara a consulta SQL
    $sql = "UPDATE dev
    SET nome = '$nome',
        sobrenome = '$sobrenome',
        email = '$email',
        devweb = '$devweb',
        senioridade = '$senioridade',
        tecnologia = '$tecnologia',
        experiencia = '$experiencia'
    WHERE id_dev = $id_alt";
    
    // Executa a consulta SQL
        
    // Verifica se a consulta foi bem-sucedida
    if ($conn->query($sql) === TRUE) {
      echo "<center><h1>Registro Atualizado com Sucesso</h1>";
      echo "<a href='index.html'><input type='button' value='Voltar'></a></center>";
    } else {
      echo "Erro ao gravar os dados: ";
      echo $id_alt;
      echo $nome;
      
    }
?>
