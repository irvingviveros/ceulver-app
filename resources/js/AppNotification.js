const AppNotification = (function(toastr) {

    return {
        show: function(type, content, title) {
            toastr[type](
                title
                , content
                , {
                    closeButton: true
                    , tapToDismiss: false
                    , progressBar: true,
                }
            );
        }
    };
})(toastr);
