<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="text-align: center; font-family: Arial, Helvetica, sans-serif; font-size: 30px; background-color: beige">
    <?php
    $nome = $_GET['nome'];
    $cognome = $_GET['cognome'];
    $cf = $_GET['cf'];
    $settore = $_GET['settore'];
    $tipologia = $_GET['tipologia'];
    $cfAggiuntivo = $_GET['cfAggiuntivo'];
    $numBiglietti = $_GET['numBiglietti'];
    $dataOra = date('d/m/Y H:i:s');
    $codiceSconto = $_GET['codiceSconto'];
    $prezzoCurva = 30;
    $prezzoTribunaCentrale = 80;
    $prezzoTribunaOnore = 120;
    echo "<p>Dati Cliente: $nome $cognome - $cf</p>";
    echo "<p>Data e ora acquisto: $dataOra</p>";
    echo "<p>Numero di biglietti acquistati: $numBiglietti</p>";
    $totale = 0;
    if ($settore == 'curva') {
        $totale = $totale + $prezzoCurva * $numBiglietti;
    } else if ($settore == 'tribunaCentrale') {
        $totale = $totale + $prezzoTribunaCentrale * $numBiglietti;
    } else if ($settore == 'tribunaOnore') {
        $totale = $totale + $prezzoTribunaOnore * $numBiglietti;
    }
    if ($codiceSconto == 'FIRENZE5') {
        $sconto = $totale * 0.05;
        $prezzoFinale = $totale - $sconto;
        echo "<p>Totale da pagare: $totale euro</p>";
        echo "<p>Sconto: - $sconto euro</p>";
        echo "<p style='color: green'>Prezzo finale: $prezzoFinale euro</p>";
    } else if ($codiceSconto != '') {
        echo "<p style='color: red'>Codice inesistente</p>";
        echo "<p style='color: green'>Totale da pagare: $totale euro</p>";
    } else {
        echo "<p style='color: green'>Totale da pagare: $totale euro</p>";
    }
    ?>
</body>
</html>