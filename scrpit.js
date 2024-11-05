const divBigliettiInPiu = document.getElementById('divBigliettiInPiu');
const tipologia = document.getElementsByName('tipologia');
tipologia.forEach(radio => {
    radio.addEventListener('change', function () {
        if (this.value == 'piuBiglietti') {
            divBigliettiInPiu.style.display = 'block';
        } else {
            divBigliettiInPiu.style.display = 'none';
        }
    });
});