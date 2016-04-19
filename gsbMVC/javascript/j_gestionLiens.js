/*document.getElementById('accesFiches').onclick = function(){
 document.getElementById('formHidden').submit() ;
 };*/


function disabledCondi() {
    $('.pourdisabled').prop('disabled', false);
    $('.modif').prop('hidden', false);
    $('.nonmodif').attr('hidden', true);
}

function enabledCondi() {
    $('.pourdisabled').attr('disabled', true);
    $('.modif').attr('hidden', true);
    $('.nonmodif').prop('hidden', false);
}

