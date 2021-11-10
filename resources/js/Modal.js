const Modal = (function(Swal) {
    /**
     * id, title, content, cssClass
     * @returns object (jquery)
     * @param config
     */
    function createModal(config) {
        config.hideHeader = (config.hideHeader ? config.hideHeader: false);
        config.hideFooter = (config.hideFooter ? config.hideFooter : false);

        $('body').append(
            '<div id="' + config.id + '" class="modal fade show" tabindex="-1" role="dialog" aria-modal="true">' +
            '<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable ' + (config.sizeClass || '') + '">' +
            '<div class="modal-content">' +
            (!config.hideHeader ?
                    '<div class="modal-header bg-transparent">' +
                    // '<h5 class="text-center mb-1" id="myModalLabel160">' + (config.title || '') + '</h5>' +
                    '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">' +
                    '</button>' +
                    '</div>'
                    : ''
            ) +
            '<div class="modal-body">' +
            '<h1 class="text-center mb-1" id="myModalLabel160">' + (config.title || '') + '</h1>'
            + (config.content || '') +
            '</div>' +
            (!config.hideFooter
                    ? (config.contentFooter ||
                        '<div class="modal-footer col-12 text-center">' +
                        '<button id="okModal" type="button" class="btn btn-primary me-1 mt-2 waves-effect waves-float waves-light">' +
                        '<span class="d-none d-sm-block">' + (config.okButtonText || 'Guardar') + '</span>' +
                        '</button>' +
                        '<button type="reset" id="cancelModal" class="btn btn-outline-secondary mt-2 waves-effect" data-bs-dismiss="modal" aria-label="Close">' +
                        '<span class="d-none d-sm-block">' + (config.cancelButtonText || 'Cerrar') + '</span>' +
                        '</button>' +
                        '</div>')
                    : ''
            ) +
            '</div>' +
            '</div>' +
            '</div>'
        );

        return $('#' + config.id);
    }

    return {
        loading: {
            open: function() {
                $.blockUI({
                    message: '<div class="bx bx-revision icon-spin font-medium-2"></div>',
                    overlayCSS: {
                        backgroundColor: '#fff',
                        opacity: 0.8,
                        cursor: 'wait'
                    },
                    css: {
                        border: 0,
                        padding: 0,
                        backgroundColor: 'transparent'
                    }
                });
            }
            , close: function() {
                $.unblockUI();
            }
        }
        , alert: {
            error: function(title, content, functionConfirm) {
                Swal.fire({
                    title: title || 'Error en el procesamiento'
                    , text: content || ''
                    , type: 'error'
                    , animation: false
                }).then(function(result) {
                    if (result.value && functionConfirm) {
                        functionConfirm();
                    }
                });
            }
            , success: function(title, content, functionConfirm) {
                Swal.fire({
                    title: title || "Procesamiento exitoso"
                    , text: content || ''
                    , type: 'success'
                    , animation: false
                }).then(function(result) {
                    if (result.value && functionConfirm) {
                        functionConfirm();
                    }
                });
            }
            , confirm: function(title, content, functionConfirm) {
                Swal.fire({
                    title: title || '¿Está seguro de inactivar el registro?'
                    , text: content || ''
                    , type: 'warning'
                    , showCancelButton: true
                    , cancelButtonText: 'Cerrar'
                    , confirmButtonText: 'Aceptar'
                    , animation: false
                }).then(function(result) {
                    if (result.value && functionConfirm) {
                        functionConfirm();
                    }
                });
            }
        }
        , create: function(config) {
            let modal = $('#' + config.id);
            if (modal.length > 0) {
                modal.remove();
            }
            modal = createModal(config);

            config.show = (config.show ? config.show : false);
            modal.modal(config);
            modal.on('hidden.bs.modal', function() {
                modal.remove();
            });
            modal.css({
                overflow: 'auto'
            });
            return modal;
        }
        , close: function(id) {
            let modal = $('#' + id);
            modal.modal('hide');
        }
    };
})(Swal);