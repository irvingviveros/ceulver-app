function initializeSelect2Json(selectElementId, outputElementId, placeholderText, dataUrl, enableTags = true) {
    $(selectElementId).select2({
        dropdownParent: $(selectElementId).parent(),
        ajax: {
            url: dataUrl,
            dataType: 'json',
            processResults: function(responseData) {
                return {
                    results: responseData
                };
            }
        },
        placeholder: placeholderText,
        language: "es",
        tags: enableTags
    }).on('select2:select', function (event) {
        let selectedText = event.params.data.text;
        let outputElement = $(outputElementId);
        // Assign the selected value to the output element
        outputElement.val(selectedText);
    });
}
