const Delete = (function() {

    return {
        ejecutar: function(id, url, datatable, row) {
            Modal.alert.confirm(
                'Confirme la eliminación'
                , 'No se podrá revertir el cambio'
                , function () {
                    Configuration.consume({
                        url: Application.getUrl() + url + id
                        , data: {
                            _method: 'delete'
                            , _token: Application.getToken()
                        }
                    }).then(function() {
                        row.remove();

                        AppNotification.show(
                            'success', 'El registro ha sido eliminado correctamente', 'Registro Eliminado'
                        );
                    });
                }
            );
        }
    };
})();