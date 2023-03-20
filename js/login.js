$("#err-login").hide();
function postData(e) {
    e.stopPropagation(); // Learn explalin
    e.stopImmediatePropagation();
    e.preventDefault(); 
    $.ajax({
        'type': 'POST',
        'url': 'php/login.php',
        'data': {'email': $('#email').val(),'password':$('#password').val()},
        'success': function(data) {
            data = JSON.parse(data);
            if(data.statuscode == 200) {
                sessionStorage.uid = data.id;
                window.location.href  = "profile.html"
            } else {
                $("#err-login").show();
            }
        },
        'error': function() {
            console.log('Unable to connect server')
        }
    })
}

function hiddeError(){
    $("#err-login").hide();
} 

$('#email').on('keydow',hiddeError);
$('#password').on('keydow',hiddeError);