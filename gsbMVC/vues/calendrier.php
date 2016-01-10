<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="./javascript/traductionCalendrier.js" type="text/javascript"></script>
<script src="./javascript/jquery-ui-1.11.4.custom/jquery-ui.min.js" type="text/javascript"></script>
<link href="./javascript/jquery-ui-1.11.4.custom/jquery-ui.min.css" rel="stylesheet" type="text/css" />
<script>
    $(function () {
        $(".date").datepicker({
            dateFormat: 'mm/yy',
            changeMonth: true,
            changeYear: true,
            showButtonPanel: true,
            showOn: "button",
            buttonImage: "images/CommonDialog.ico",
            buttonImageOnly: true,
            altField: "#datepicker",
            closeText: 'Fermer',
            prevText: 'Précédent',
            nextText: 'Suivant',
            currentText: 'Aujourd\'hui',
            monthNames: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
            monthNamesShort: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
            onClose: function (dateText, inst) {
                var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
                var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
                $(this).datepicker('setDate', new Date(year, month, 1));
            },
            beforeShow: function (input, inst) {
                if ((datestr = $(this).val()).length > 0) {
                    actDate = datestr.split('/');
                    year = actDate[1];
                    month = actDate[0] - 1;
                    $(this).datepicker('option', 'defaultDate', new Date(year, month));
                    $(this).datepicker('setDate', new Date(year, month));
                }
            }
        });
        $(".date").focus(function () {
            $(".ui-datepicker-calendar").hide();
            $("#ui-datepicker-div").position({
                my: "center top",
                at: "center bottom",
                of: $(this)
            });
        });

    });

</script>

<label for="lstMoisComptable" accesskey="n">Mois : </label>
<input name="lstMoisComptable" type="text" class="date" id="datepicker"/>