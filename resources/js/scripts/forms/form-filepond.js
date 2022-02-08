$(function(){
    // First register any plugins
    // $.fn.filepond.registerPlugin();

    // Turn input element into a pond
    $('.my-pond').filepond();

    // Set allowMultiple property to true
    $('.my-pond').filepond('allowMultiple', false);

    // Listen for addfile event
    $('.my-pond').on('FilePond:addfile', function(e) {
        console.log('file added event', e);
    });

    FilePond.setOptions({
        server: {
            url: 'upload/',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            revert: {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    _method: 'DELETE'
                }
            },
        },
        labelIdle:
            'Arrastra y suelta tus archivos o ' +
            '<span class="filepond--label-action"> Buscar </span>'
        ,labelFileProcessing:
            'Cargando'
        ,labelFileProcessingComplete:
            'Carga completada'
        , labelTapToCancel:
            'Toca para cancelar'
        , labelTapToUndo:
            'Toca para deshacer'


    })
});