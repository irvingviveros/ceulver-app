const FormIsValid = (form) => {

    form.validate({
        rules: {
            schoolSelect: "required",
            paternalSurname: {
                required: true,
                maxlength: 25
            },
            maternalSurname: {
                maxlength: 25
            },
            firstName: {
                required: true,
                maxlength: 35
            },
            nationalId: {
                required: true,
                minlength: 18,
                maxlength: 18
            },
            occupation: {
                required: function () {
                    return $("#schoolSelect option:checked").attr('educationalsystem') === 'Universidad';
                }
            },
            sexSelect: "required",
            // address: "required",
            maritalStatus: {
                required: function () {
                    return $("#schoolSelect option:checked").attr('educationalsystem') === 'Universidad';
                }
            },
            email: {
                // required: function () {
                //     return $("#schoolSelect option:checked").attr('educationalSystem') === 'Universidad';
                // },
                email: true
            },
            // phone: {
            //     required: true,
            //     minlength:10,
            //     maxlength:10
            // },
            bloodGroup: "required",
            careerSelect: {
                required: function () {
                    return $("#schoolSelect option:checked").attr('educationalSystem') === 'Universidad';
                },
            },
            enrollment: {
                minlength: 5,
                required: function () {
                    return $("#schoolSelect option:checked").attr('educationalSystem') === 'Universidad';
                },
            },
            // guardianLastName: "required",
            // guardianFirstName: "required",
            // guardianRelationship: "required",
            // guardianAddress: "required",
            guardianEmail: {
                email: true
            },
            guardianPhone: {
                // required: true,
                minlength:10,
                maxlength:10
            },
            // studentUsername: {
            //     required: function () {
            //         let schoolSelector = $("#schoolSelect option:checked").attr('educationalSystem');
            //         return  schoolSelector !== 'Maternal'
            //             && schoolSelector !== 'Kinder'
            //             && schoolSelector !== 'Primaria';
            //     }
            // },
            // studentPassword: {
            //     required: function () {
            //         let schoolSelector = $("#schoolSelect option:checked").attr('educationalSystem');
            //         return  schoolSelector !== 'Maternal'
            //             && schoolSelector !== 'Kinder'
            //             && schoolSelector !== 'Primaria';
            //     },
            //     minlength: 6
            // }
        },
        messages: {
            schoolSelect: "Seleccione una institución.",
            paternalSurname: "Introduzca el apellido paterno.",
            firstName: "Introduzca el nombre.",
            nationalId: {
                required: "Introduzca la CURP.",
                minlength: "La CURP debe tener 18 dígitos.",
                maxlength: "La CURP debe tener solo 18 dígitos."
            },
            occupation: "Introduzca la ocupación.",
            sexSelect: "Seleccione el sexo.",
            maritalStatus: "Seleccione el estado civil.",
            email: {
                required: "Introduzca el correo electrónico.",
                email: "Introduzca un correo electrónico válido."
            },
            bloodGroup: "Seleccione el grupo sanguíneo.",
            careerSelect: "Seleccione la carrera a cursar.",
            enrollment: {
                minlength: "Introduzca una matrícula válida.",
                required: "Introduzca la matrícula."
            },
            guardianLastName: {
                required: "Introduzca el apellido."
            },
            guardianFirstName: "Introduzca el nombre.",
            guardianRelationship: "Seleccione el parentesco.",
            guardianAddress: "Introduzca la dirección.",
            guardianPhone: "Introduzca un número de contacto.",
            // studentUsername: "El usuario no debe estar vacío.",
            // studentPassword: {
            //     required: "Introduzca una contraseña o genere una.",
            //     minlength: "Establezca una contraseña de al menos 5 dígitos o genere una.",
            // }
        }
    })

    return form.valid()
}
