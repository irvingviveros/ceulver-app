/*=========================================================================================
    File Name: input-uppercase.js
    Description: This function convert the lowercase string to uppercase.
                 When use it, please attach the following script to add an id selector:
                 document.getElementById("id").addEventListener("keypress", toUpperCase, false);
    ----------------------------------------------------------------------------------------
    Item Name: toUpperCase
    Author: Irving Viveros
    Author URL: https://github.com/irvingviveros
==========================================================================================*/
function toUpperCase(e)
{
    let charInput = e.keyCode;
    if((charInput >= 97) && (charInput <= 122)) { // lowercase
        if(!e.ctrlKey && !e.metaKey && !e.altKey) { // no modifier key
            let newChar = charInput - 32;
            let start = e.target.selectionStart;
            let end = e.target.selectionEnd;
            e.target.value = e.target.value.substring(0, start) + String.fromCharCode(newChar) + e.target.value.substring(end);
            e.target.setSelectionRange(start+1, start+1);
            e.preventDefault();
        }
    }
}
