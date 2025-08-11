<?php
    $resultado = "";
    $litros = 0;
    $tipo = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $litros = floatval($_POST['litros']);
        $tipo = strtoupper($_POST['tipo']);

        // Preço base por litro
        $preco_alcool = 4.90;
        $preco_gasolina = 5.30;

        if ($tipo == "A") {
            $preco_unitario = $preco_alcool;
            if ($litros <= 20) {
                $desconto = 0.03;
            } else {
                $desconto = 0.05;
            }
        } elseif ($tipo == "G") {
            $preco_unitario = $preco_gasolina;
            if ($litros <= 20) {
                $desconto = 0.04;
            } else {
                $desconto = 0.06;
            }
        } else {
            $resultado = "Tipo de combustível inválido!";
            $desconto = 0;
            $preco_unitario = 0;
        }

        if ($preco_unitario > 0) {
            $total_sem_desconto = $preco_unitario * $litros;
            $valor_desconto = $total_sem_desconto * $desconto;
            $total_com_desconto = $total_sem_desconto - $valor_desconto;

            $resultado = "Total a pagar: R$ " . number_format($total_com_desconto, 2, ',', '.') . 
                         " (Desconto de " . ($desconto * 100) . "% aplicado)";
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Posto de Combustível</title>
</head>
<body>

    <h1>Calculadora de Combustível</h1>

    <form method="post">
        <label>Quantidade de litros:</label><br>
        <input type="number" name="litros" step="0.01" min="0" required value="<?php echo htmlspecialchars($litros); ?>"><br><br>

        <label>Tipo de combustível:</label><br>
        <select name="tipo" required>
            <option value="">Selecione</option>
            <option value="A" <?php if ($tipo == "A") echo "selected"; ?>>Álcool</option>
            <option value="G" <?php if ($tipo == "G") echo "selected"; ?>>Gasolina</option>
        </select><br><br>

        <input type="submit" value="Calcular">
    </form>

    <?php if (!empty($resultado)): ?>
        <h2><?php echo $resultado; ?></h2>
    <?php endif; ?>

</body>
</html>
