const FormIsValid = (form) => {

    form.validate({
        rules: {
            student_id: "required",
            payment_sheet: "required",
            student_reference: "required",
            payment_method: "required",
            payment_concept: "required",
            payment_amount: "required",
            payment_date: {
                required: true,
                date: true,
            },
        },
        messages: {
            payment_concept: "Introduzca un concepto.",
            payment_amount: "Campo obligatorio.",
            payment_method: "Seleccione un método de pago.",
        }
    })

    return form.valid()
}
