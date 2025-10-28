<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Caixa Eletrônico</title>
    <link rel="stylesheet" href="style.css">
    <style>
        img.nota{
            height: 50px;
            margin: 5px;

        }
    </style>
</head>
<body>
    <?php 
        $saque = $_REQUEST['saque'] ?? 0;
    ?>
    <main>
        <h1>Caixa Eletrônico</h1>
        <form action="<?=$_SERVER['PHP_SELF']?>" method="get">
            <label for="saque">Qual valor você deseja sacar? (R$) <sup>*</sup></label>
            <input type="number" name="saque" id="saque" step="5" required value="<?=$saque?>">
            <p style="font-size: 0.7em;"><sup>*</sup>Notas disponíveis: R$100, R$50, R$10 e R$5</p>
            <input type="submit" value="Sacar">
        </form>
    </main>

    <?php 
        if ($saque > 0) {
            $resto = $saque;

            // Cálculo das notas
            $tot100 = floor($resto / 100);
            $resto %= 100;

            $tot50 = floor($resto / 50);
            $resto %= 50;

            $tot10 = floor($resto / 10);
            $resto %= 10;

            $tot5 = floor($resto / 5);
            $resto %= 5;
    ?>
    <section>
        <h2>Saque de R$<?=number_format($saque, 2, "," , ".")?> realizado</h2>
        <p>O caixa eletrônico vai te entregar as seguintes notas:</p>
        <ul>
            <?php if ($tot100 > 0) { ?>
                <li><img src="imagens/100-reais.jpg" alt="Nota de 100" class="nota"> × <?=$tot100?></li>
            <?php } ?>
            <?php if ($tot50 > 0) { ?>
                <li><img src="imagens/50-reais.jpg" alt="Nota de 50" class="nota"> × <?=$tot50?></li>
            <?php } ?>
            <?php if ($tot10 > 0) { ?>
                <li><img src="imagens/10-reais.jpg" alt="Nota de 10" class="nota"> × <?=$tot10?></li>
            <?php } ?>
            <?php if ($tot5 > 0) { ?>
                <li><img src="imagens/5-reais.jpg" alt="Nota de 5" class="nota"> × <?=$tot5?></li>
            <?php } ?>
        </ul>
        <?php if ($resto > 0) { ?>
            <p><strong>Valor restante não pode ser sacado:</strong> R$<?=number_format($resto, 2, "," , ".")?></p>
        <?php } ?>
    </section>
    <?php } ?>
</body>
</html>

