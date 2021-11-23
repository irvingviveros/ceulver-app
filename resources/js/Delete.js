const Delete = (function() {
    return {
        run: function(object, id, tableName, rowElement) {
            Modal.alert.confirm(
                'Confirme la eliminación'
                , 'No se podrá revertir el cambio'
                , function () {
                    object.delete(id).then(function () {

                        tableName
                            .row(rowElement.parents('tr'))
                            .remove()
                            .draw();

                        AppNotification.show(
                            'success', 'El registro ha sido eliminado correctamente', 'Registro eliminado'
                        );
                    });
                }
            );
        }
    };
})();