/*document.getElementById('accesFiches').onclick = function(){
 document.getElementById('formHidden').submit() ;
 };*/


function disabledCondi() {
    $('.pourdisabled').attr('disabled', false);
    $('.modif').attr('hidden', false);
    $('.nonmodif').attr('hidden', true);
}

function enabledCondi() {
    $('.pourdisabled').attr('disabled', true);
    $('.modif').attr('hidden', true);
    $('.nonmodif').attr('hidden', false);
}

function verifEntier(valeur) {
    if (valeur.match(/^-?[0-9]+$/)) {
        return true;
    } else {
        return false;
    }
}


