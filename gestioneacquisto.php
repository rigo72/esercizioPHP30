<?php
date_default_timezone_set('Europe/Rome');
$nome = $_POST['nome'];
$cognome = $_POST['cognome'];
$cf = $_POST['cf'];
$settore = $_POST['settore'];
$codice_sconto = $_POST['codice_sconto'];
$tipo_acquisto = $_POST['tipo_acquisto'];
$numBiglietti = 1;
$codiciAggiuntivi = [];
if ($tipo_acquisto === 'multi') {
    $numBiglietti += intval($_POST['numBiglietti']);
    for ($i = 1; $i <= $_POST['numBiglietti']; $i++) {
        if (isset($_POST['agg' . $i])) {
            $codiciAggiuntivi[] = $_POST['agg' . $i];
        }
    }
}
$prezzi = [
    'curva' => 30,
    'tribuna_centrale' => 80,
    'tribuna_onore' => 120,
];
$prezzoSettore = $prezzi[$settore];
$totale = $prezzoSettore * $numBiglietti;
$sconto = 0;
if (strtoupper($codice_sconto) === "FIRENZE5") {
    $sconto = $totale * 0.05;
    $totale_scontato = $totale - $sconto;
    $codiceValido = true;
} else {
    $totale_scontato = $totale;
    $codiceValido = empty($codice_sconto);
}
$dataAcquisto = date("d-m-Y H:i:s");
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Dettagli Acquisto Biglietti</title>
    <style>
        .error { color: red; }
    </style>
</head>
<body>
    <h1>Dettagli dell'Acquisto</h1>
    <p><strong>Nome:</strong> <?php echo htmlspecialchars($nome); ?></p>
    <p><strong>Cognome:</strong> <?php echo htmlspecialchars($cognome); ?></p>
    <p><strong>Codice Fiscale:</strong> <?php echo htmlspecialchars($cf); ?></p>
    <p><strong>Data e Ora Acquisto:</strong> <?php echo $dataAcquisto; ?></p>
    <p><strong>Numero di Biglietti:</strong> <?php echo $numBiglietti; ?></p>
    <?php if (!empty($codiciAggiuntivi)): ?>
        <h2>Codici Fiscali Aggiuntivi</h2>
        <ul>
            <?php foreach ($codiciAggiuntivi as $cfAggiuntivo): ?>
                <li><?php echo htmlspecialchars($cfAggiuntivo); ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <h2>Riepilogo Prezzo</h2>
    <p><strong>Totale senza sconto:</strong> €<?php echo number_format($totale, 2); ?></p>

    <?php if (!$codiceValido && $codice_sconto): ?>
        <p class="error">Codice inesistente</p>
    <?php elseif ($sconto > 0): ?>
        <p><strong>Sconto:</strong> €<?php echo number_format($sconto, 2); ?> (5%)</p>
        <p><strong>Totale con sconto:</strong> €<?php echo number_format($totale_scontato, 2); ?></p>
    <?php else: ?>
        <p><strong>Totale da pagare:</strong> €<?php echo number_format($totale_scontato, 2); ?></p>
    <?php endif; ?>
    <br>
    <a href="biglietti.html">Torna alla pagina di acquisto</a>
</body>
</html>