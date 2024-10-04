function displayErrors(errors) {
    let allErrors = errors.errors;

    $.each(allErrors, function (error, message) {
        error = error.replace('.', '_');
        if (!$('#' + error).hasClass('is-invalid')) {
            $('#' + error).addClass('is-invalid');
        }

        var errorId = error + '_error';
        $('#' + errorId).text('');
        $('#' + errorId).text(message + "\n");
    });
}
