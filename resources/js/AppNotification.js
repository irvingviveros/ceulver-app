const AppNotification = (function(toastr) {

    return {
        show: function(type, content, title) {
            toastr[type](
                content
                , title
                , {
                    closeButton: true
                    , tapToDismiss: false
                    , progressBar: true,
                }
            );
        }
    };
})(toastr);
