const motif = document.getElementById('motif')
const ttc = document.getElementById('ttc')
const tvaField = document.getElementById('tva')
const showTVA = document.getElementById('showTVA')
const showMotifError = document.getElementById('showMotifError')
const htField = document.getElementById('ht')
let tva = 0
let result = ''

function ht(motif, ttc ){
    if(motif == 1 || motif == 2){
        tva = 0.1
    }else if(motif == 'Choisissez un motif')
    {
        showMotifError.innerText = ' Motif non sélectionné'
        return
    } else {
        tva = 0.2
    }
    result = ttc - ttc * tva
    resultTVA = ttc * tva
    htField.value = result
    tvaField.value = resultTVA
    showTVA.innerText = ' (' + tva*100 +'%)'
    showMotifError.innerText = ''
}
htField.addEventListener('click', function(){
    ht(motif.value, ttc.value)
})

tvaField.addEventListener('click', function(){
    ht(motif.value, ttc.value)
})

motif.addEventListener('change', function(){
    ht(motif.value, ttc.value)
})