<?php
session_start();

// Obtém o valor do ID do registro a ser excluído
$id_alt = $_GET['btnAlterar'];
$_SESSION["id_alt"]=$id_alt;
// Conecta ao banco de dados
require("conecta.php");

// Consulta o registro no banco de dados
$dados_select = mysqli_query($conn, "SELECT * FROM DEV WHERE id_dev = $id_alt");

// Captura os dados do registro
while($dado = mysqli_fetch_assoc($dados_select)) {
    $id  =$dado['id_dev'];
    $nome=$dado['NOME'];
    $sobrenome=$dado['SOBRENOME'];
    $email=$dado['EMAIL'];
    $devweb=$dado['DEVWEB'];
    $senioridade=$dado['SENIORIDADE'];
    $tecnologia=$dado['TECNOLOGIA'];
    $experiencia=$dado['EXPERIENCIA'];
}

// Preenche o formulário com os dados do registro
/* if($id_alt > 0) {
    $_GET['nome'] = $nome;
    $_GET['sobrenome'] = $sobrenome;
    $_GET['email'] = $email;
    $_GET['devweb'] = $devweb;
    $_GET['senioridade'] = $senioridade;
    $_GET['tecnologia'] = $tecnologia;
    $_GET['experiencia'] = $experiencia;
} */

// Atualiza os dados no banco de dados
if(isset($_GET['nome']) && isset($_GET['sobrenome']) && isset($_GET['email']) && isset($_GET['devweb']) && isset($_GET['senioridade']) && isset($_GET['tecnologia']) && isset($_GET['experiencia'])) {
    $nome = $_GET['nome'];
    $sobrenome = $_GET['sobrenome'];
    $email = $_GET['email'];
    $devweb = $_GET['devweb'];
    $senioridade = $_GET['senioridade'];
    $tecnologia = implode(',', $_GET['tecnologia']);
    $experiencia = $_GET['experiencia'];

    $sql = "UPDATE DEV SET
            NOME = '$nome',
            SOBRENOME = '$sobrenome',
            EMAIL = '$email',
            DEVWEB = '$devweb',
            SENIORIDADE = '$senioridade',
            TECNOLOGIA = '$tecnologia',
            EXPERIENCIA = '$experiencia'
            WHERE id_dev = $id_alt";

    mysqli_query($conn, $sql);

    // Redireciona para a página de listagem de registros
    header("Location: lista_devs.php");
}
?>

<!doctype html>
<html>

    <head>
        <!-- Metadados -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="formulario.css" media="screen">

        <!-- Título da página (aparece na aba) -->
        <title>Cadastro</title>
    </head>

    <body>  

        <!-- Cabeçalho com título e subtítulo (ambos com css de id "titulo") -->
        <div>
            <h1 id="titulo">Edita Cadastro de Devs</h1>
            <p id="subtitulo">Complete os campos com suas informações</p>
            <br>
        </div>

        <!-- Início do formulário -->
        <form method="GET" action="atualiza_dev.php">

            <fieldset class="grupo">
                <!-- Campo do nome com legenda "nome" e css de classe "campo" -->
                <div class="campo">
                    <label for="nome"><strong>Nome</strong></label>
                <?php echo    '<input type="text" name="nome" id="nome" value="'.$nome.'" required>'; ?>
                </div>

                <!-- Campo do sobrenome com legenda "sobrenome" e css de classe "campo" -->
                <div class="campo">
                    <label for="sobrenome"><strong>Sobrenome</strong></label>
                    <?php echo    '<input type="text" name="sobrenome" id="sobrenome" value="'.$sobrenome.'" required>'; ?>
                </div>
            </fieldset> 

            <!-- Campo de email com-->
            <div class="campo">
                <label for="email"><strong>Email</strong></label>
                <?php echo    '<input type="text" name="email" id="email" value="'.$email.'" required>'; ?>
            </div>

            <!-- Campo de desenvolvimento web com 3 opções de botões selecionáveis (radio button) e css de classe "campo" -->
            <div class="campo" >
                <label><strong>De qual lado da aplicação você desenvolve?</strong></label>
                <label>
                    <input type="radio" name="devweb" value="frontend" <?php if (str_contains($devweb, 'frontend')) {echo 'checked';}?>>Front-end
                </label>
                <label>
                    <input type="radio" name="devweb" value="backend" <?php if (str_contains($devweb, 'backend')) {echo 'checked';}?>>Back-end
                </label>
                <label>
                    <input type="radio" name="devweb" value="fullstack" <?php if (str_contains($devweb, 'fullstack')) {echo 'checked';}?>>Fullstack
                </label>
            </div>

            <!-- Campo de senioridade com 3 opções para escolha (select option) e css de classe "campo" -->
            <div class="campo">
                <label for="senioridade"><strong>Senioridade</strong></label>
                <select name="senioridade">
                    <option value="Junior" <?php if (str_contains($senioridade, 'Junior')) {echo 'selected';}?>>Júnior</option>
                    <option value="Pleno" <?php if (str_contains($senioridade, 'Pleno')) {echo 'selected';}?>>Pleno</option>
                    <option value="Sênior" <?php if (str_contains($senioridade, 'Sênior')) {echo 'selected';}?>>Sênior</option>
                  </select>
            </div>

            <fieldset class="grupo">
                <!-- Campo de tecnologias para escolha de 1 ou mais opções para marcar (checkbox) e css de classe "campo" -->
                <div id="check">
                    <label><strong>Selecione as tecnologias que utiliza:</strong></label><br><br>
                    <input type="checkbox" name="tecnologia[]" value="HTML" <?php if (str_contains($tecnologia, 'HTML')) {echo 'checked';}?>>HTML
                    <input type="checkbox" name="tecnologia[]" value="CSS" <?php if (str_contains($tecnologia, 'CSS')) {echo 'checked';}?>>CSS
                    <input type="checkbox" name="tecnologia[]" value="JavaScript" <?php if (str_contains($tecnologia, 'JavaScript')) {echo 'checked';}?>>JavaScript
                    <input type="checkbox" name="tecnologia[]" value="PHP" <?php if (str_contains($tecnologia, 'PHP')) {echo 'checked';}?>>PHP
                    <input type="checkbox" name="tecnologia[]" value="C#" <?php if (str_contains($tecnologia, 'C#')) {echo 'checked';}?>>C#
                    <input type="checkbox" name="tecnologia[]" value="Python" <?php if (str_contains($tecnologia, 'Python')) {echo 'checked';}?>>Python
                    <input type="checkbox" name="tecnologia[]" value="Java" <?php if (str_contains($tecnologia, 'Java')) {echo 'checked';}?>>Java

                </div>
            </fieldset>

            <!-- Caixa de texto -->
            <div class="campo">
                <br>
                <label for="experiencia"><strong>Conte um pouco mais da sua experiência: </strong></label>
                <!-- <textarea rows="6" style="width: 26em" id="experiencia" name="experiencia"></textarea> -->
                <?php echo    '<textarea rows="6" style="width: 26em" id="experiencia" name="experiencia" value="'.$experiencia.'">'.$experiencia.'</textarea>'; ?>
            </div>

            <!-- Botão para enviar o formulário -->
            <div>
            <button class="botao" type="submit" onsubmit="">Concluído</button>
                       
            </div>
        </form>

    </body>

</html>




