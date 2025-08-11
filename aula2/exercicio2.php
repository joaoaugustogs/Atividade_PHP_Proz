<?php
    $resultado = "";
    $quantidade = 0;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $quantidade = $_POST['quantidade'];

        if ($quantidade < 12) {
            $preco_unitario = 0.30;
        } else {
            $preco_unitario = 0.25;
        }

        $total = $preco_unitario * $quantidade;
        $resultado = "Total a pagar: R$ " . number_format($total, 2, ',', '.');
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Maçãs</title>
</head>
<body>

    <h1>BEM-VINDO À LOJINHA DE MAÇÃS!!</h1>

    <form method="post">
        <label>Digite a quantidade desejada:</label><br>
        <input type="number" name="quantidade" required min="1"><br><br>
        <input type="submit" value="Calcular">
    </form>

    <?php if (!empty($resultado)): ?>
        <h2><?php echo $resultado; ?></h2>
    <?php endif; ?>

</body>
</html>