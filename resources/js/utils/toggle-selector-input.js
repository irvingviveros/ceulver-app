/*=========================================================================================
    File Name: toggle-selector-input.js
    Description: Show the input field input if the value is selected
    ----------------------------------------------------------------------------------------
    Item Name: toUpperCase
    Author: Irving Viveros
    Author URL: https://github.com/irvingviveros
==========================================================================================*/
$(function() {
    $("#schoolSelect").change(function (){
        let selector = $('div[dynamic-toggle]');
        let option = $('option:checked', this).attr('educationalSystem')
        option === "Universidad" ? selector.removeClass("d-none") : selector.addClass("d-none")
    })
})
