function postData(e) {
    e.stopPropagation(); // Learn explalin
    e.stopImmediatePropagation();
    e.preventDefault();
    $('#err-login').hide();
    if($('#password').val() !== $('#conpassword').val()) {
        $('#err-login').show();
        return false;
    }
    $.ajax({
        'type': 'POST',
        'url': 'php/register.php',
        'data': {
            'email': $('#email').val(),
            'password':$('#password').val(),
            'name':$('#name').val(),
        },
        'success': function(data) {
            data = JSON.parse(data);
            if(data.statuscode == 200) {
                window.location.href  = "index.html"
            } else {
                $("#err-login").show();
            }
        },
        'error': function() {
            console.log('Unable to connect server')
        }
    })
}
$('#err-login').hide();