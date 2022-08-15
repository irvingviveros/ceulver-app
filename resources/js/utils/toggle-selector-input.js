/*=========================================================================================
    File Name: toggle-selector-input.js
    Description: Show the input field input if the value is selected
    ----------------------------------------------------------------------------------------
    Item Name: toUpperCase
    Author: Irving Viveros
    Author URL: https://github.com/irvingviveros
==========================================================================================*/

/**
 * @param {string} selectorValue - The id number of the selector to toggle event (this.value)
 * @param {string} mySelector - The selector id (css) to hide/show
 * @param {string} valueToMatch - The value to match with the selectorValue (#selector)
 */
function toggleSelectorInput(selectorValue, valueToMatch, mySelector) {
    console.log(typeof selectorValue + " " + typeof valueToMatch + " " + mySelector)
    selectorValue === valueToMatch.toString() ? $(mySelector).css('display', 'block') : $(mySelector).css('display', 'none')
}
