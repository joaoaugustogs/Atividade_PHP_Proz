<?php
    $resultado = ""; // variável inicial

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $senha = $_POST['Senha'];

        if ($senha == 1234) {
            $resultado = "ACESSO PERMITIDO";
        } else {
            $resultado = "ACESSO NEGADO";
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Verificação de Senha</title>
</head>
<body>

    <h1>BEM VINDO!!</h1>

    <form method="post">
        <label>Digite a senha:</label><br>
        <input type="password" name="Senha" required><br><br>
        <input type="submit" value="Verificar">
    </form>

    <?php if (!empty($resultado)): ?>
        <h2><?php echo $resultado; ?></h2>
    <?php endif; ?>

</body>
</html>