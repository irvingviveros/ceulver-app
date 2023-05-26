function initializeSelect2Json(selectId, dataUrl, enableTags = true) {
    console.log("initialized")
    $(selectId).select2({
        dropdownParent: $(selectId).parent(),
        ajax: {
            url: dataUrl,
            dataType: 'json',
            processResults: function(data) {
                return {
                    results: data
                };
            }
        },
        placeholder: "Seleccione o escriba un concepto",
        language: "es",
        tags: enableTags
    }).on('select2:select', function (e) {
        let paymentConcept = e.params.data.text;
        let selectedPaymentConceptID = $('#selected_payment_concept');
        // Assign the payment concept value to selector
        selectedPaymentConceptID.val(paymentConcept)
    });
}


