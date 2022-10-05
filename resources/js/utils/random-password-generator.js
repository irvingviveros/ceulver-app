$( "#studentGeneratePwd" ).click(function() {
    let randomstring = Math.random().toString(36).slice(-6);
    $('#studentPassword').val(randomstring);
});

$( "#guardianGeneratePwd" ).click(function() {
    let randomstring = Math.random().toString(36).slice(-6);
    $('#guardianPassword').val(randomstring);
});
