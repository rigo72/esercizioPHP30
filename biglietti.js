const maxBiglietti = 4;
let bigliettiAggiuntivi = 1;
let codiciFiscaliAggiuntivi = [];
document.addEventListener("DOMContentLoaded", () => {
    document.getElementById('unico').addEventListener('click', nascondiDivBigliettiAggiuntivi);
    document.getElementById('multi').addEventListener('click', mostraDivBigliettiAggiuntivi);

    aggiornaBigliettiAggiuntivi();
});
function aggiornaBigliettiAggiuntivi() {
    const container = document.getElementById('codici-aggiuntivi');
    container.innerHTML = '';
    codiciFiscaliAggiuntivi = [];
    for (let i = 1; i <= bigliettiAggiuntivi; i++) {
        let input = document.createElement('input');
        input.type = 'text';
        input.name = 'agg' + i;
        input.placeholder = 'Codice fiscale aggiuntivo ' + i;
        input.required = true;
        codiciFiscaliAggiuntivi.push(input);
        container.appendChild(input);
        container.appendChild(document.createElement('br'));
    }
    document.getElementById('numBiglietti').value = bigliettiAggiuntivi;
}
function mostraDivBigliettiAggiuntivi() {
    document.getElementById('biglietti-aggiuntivi').style.display = 'block';
    aggiornaBigliettiAggiuntivi();
}
function nascondiDivBigliettiAggiuntivi() {
    document.getElementById('biglietti-aggiuntivi').style.display = 'none';
    bigliettiAggiuntivi = 1;
    aggiornaBigliettiAggiuntivi();
}
function aggiungiBiglietto() {
    if (bigliettiAggiuntivi < maxBiglietti) {
        bigliettiAggiuntivi++;
        aggiornaBigliettiAggiuntivi();
    }
}
function rimuoviBiglietto() {
    if (bigliettiAggiuntivi > 1) {
        bigliettiAggiuntivi--;
        aggiornaBigliettiAggiuntivi();
    }
}