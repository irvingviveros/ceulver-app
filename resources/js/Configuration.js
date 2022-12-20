const Configuration = (function(Modal){
    function getInitialConfig() {
        return {
            url : null
            , dataType : "html" // text, html, xml, json, jsonp, and script
            , method : "POST" // POST, GET, PUT, DELETE
            , statusCode : {
                400: function() {
                    const respuesta = arguments[0].responseText;
                    if (respuesta === 'Se detecto una sesión abierta, se ha cerrado, por favor ingresa los datos de acceso nuevamente.') {
                        Modal.alert.success(
                            "Petición incorrecta"
                            , respuesta
                            , function() {
                                // expira el token enviado
                                if (respuesta === 'token inválido') {
                                    Sesion.abrirModalLogin();
                                    return;
                                }
                            }
                        );
                    } else {
                        Modal.alert.error(
                            "Petición incorrecta"
                            , respuesta
                            , function() {
                                // expira el token enviado
                                if (respuesta === 'token inválido') {
                                    Sesion.abrirModalLogin();
                                    return;
                                }
                            }
                        );
                    }
                }
                , 401: function() {
                    const respuesta = arguments[0].responseText;
                    Modal.alert.error(
                        "Recurso no autorizado"
                        , respuesta
                        , function() {
                            // expira el token enviado
                            if (respuesta === 'token inválido') {
                                Sesion.abrirModalLogin();
                                return;
                            }

                            // expira la sesion del front
                            if (respuesta === 'sesion expirada') {
                                Sesion.cerrarSesion().fail(function() {
                                    Sesion.abrirModalLogin();
                                }).then(function() {
                                    Sesion.abrirModalLogin();
                                });
                            }
                        }
                    );
                }
                , 404: function() {
                    console.log(arguments[0]);
                    Modal.alert.error(
                        "Página no encontrada"
                        , arguments[0].responseText
                    );
                }
                , 415: function() {
                    console.log(arguments[0]);
                    Modal.alert.error(
                        "El tipo de contenido enviado no es soportado"
                        , arguments[0].responseText
                    );
                }
                , 422: function() {
                    let jsonResponse = JSON.parse(arguments[0].responseText)
                    let response = jsonResponse[Object.keys(jsonResponse)[0]]

                    Modal.alert.error(
                        "Error al procesar la información"
                        , response
                    );
                }
                , 500: function() {
                    Modal.alert.error(
                        "Error interno del servidor"
                        , arguments[0].responseText
                    );
                }
            }
            , beforeSend: function (xhr, opciones) {
                Modal.loading.open();
            }
        };
    };

    return {
        consume: function(pconfig) {
            let config = getInitialConfig();
            $.extend(config, (pconfig || {}));
            return $.ajax(config).always(function(
                data, status, error
            ) {
                Modal.loading.close();
            });
        }
    };
})(Modal);
