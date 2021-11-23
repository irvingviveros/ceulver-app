const AppNotification = (function(toastr) {

    return {
        show: function(type, title, content) {
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