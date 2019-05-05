// A $( document ).ready() block.
jQuery( document ).ready(function() {

    var parameters = Joomla.getOptions('parameters');

    var fieldValues = parameters.values;
    if(fieldValues != ''){
        setMutipleValuesFromDatabase();
    }

    function setMutipleValuesFromDatabase(){
        fieldValues = fieldValues.split(',');
        jQuery('#userSelect').val(fieldValues);

    }

    jQuery('#userSelect').on('change', function(){
        var valuesFromSelect = jQuery(this).val();
        jQuery('#' + parameters.selectID).val(valuesFromSelect);
    });


});