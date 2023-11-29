<?php
require("conecta.php");
    $nome = $_POST["nome"];
    $sobrenome = $_POST["sobrenome"];
    $email = $_POST["email"];
    $devweb = $_POST["devweb"];
    $senioridade = $_POST["senioridade"];
     // Verifica se o campo tecnologia contém algum valor
     if (isset($_POST["tecnologia"])) {
      $tecnologia = implode(", ", $_POST["tecnologia"]);
      } else {
      $tecnologia = "";
      }


    $experiencia = $_POST["experiencia"];
    
    // Prepara a consulta SQL
    $sql = "INSERT INTO dev (nome, sobrenome, email, devweb, senioridade, tecnologia, experiencia)
    VALUES ('$nome', '$sobrenome', '$email', '$devweb', '$senioridade', '$tecnologia', '$experiencia')";
    
    // Executa a consulta SQL
        
    // Verifica se a consulta foi bem-sucedida
    if ($conn->query($sql) === TRUE) {
      echo "<center><h1>Registro Inserido com Sucesso</h1>";
      echo "<a href='index.html'><input type='button' value='Voltar'></a></center>";
    } else {
      echo "Erro ao gravar os dados: " . mysqli_error($conn);
    }
?>