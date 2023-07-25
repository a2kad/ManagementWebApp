const motif = document.getElementById('motif')
const ttc = document.getElementById('ttc')
const showTVA = document.getElementById('showTVA')
const showMotifError = document.getElementById('showMotifError')
const htField = document.querySelector('#ht')
let tva = 0
let result = ''

function ht(motif, ttc ){
    if(motif == 1 || motif == 2){
        tva = 0.2
    }else if(motif == 'Choisissez un motif')
    {
        showMotifError.innerText = ' Motif non sélectionné'
        return
    } else {
        tva = 0.1
    }
    result = ttc - ttc * tva
    showTVA.innerText = ' (TVA = ' + tva*100 +'%)'
    showMotifError.innerText = ''
}
htField.addEventListener('click', function(){
    ht(motif.value, ttc.value)
})