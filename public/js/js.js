
document.addEventListener('DOMContentLoaded', function() {
    var specialPassword = 'durianruntuh';
    $('#passwordModal').modal({
        backdrop: 'static',
        keyboard: false
    });

    $('#submitPassword').click(function() {
        var userPassword = $('#specialPassword').val();
        if (userPassword !== specialPassword) {
            $('#passwordError').show();
        } else {
            $('#passwordModal').modal('hide');
        }
    });
});
