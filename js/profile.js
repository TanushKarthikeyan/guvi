function getUserDetails() {
    $.ajax({
        'type': 'POST',
        'url': 'php/profile.php',
        'data': {
            'type': 'get',
            'id': sessionStorage.uid,
        },
        'success': function(data) {
            console.log(data);
            data = JSON.parse(data);
            console.log(data)
            $('#name').text(data.personDetails.name);
            $('#email').text(data.personDetails.email);
            $('#dob').val(data.personDetails.dob);
            $('#age').val(data.personDetails.age);
            $('#contact').val(data.personDetails.contact);
        },
        'error': function() {
            console.log('Unable to connect server')
        }
    })

}
$(window).on('load', function() {
    getUserDetails();
})

function postData(e) {
    e.stopPropagation(); // Learn explalin
    e.stopImmediatePropagation();
    e.preventDefault();
    $.ajax({
        'type': 'POST',
        'url': 'php/profile.php',
        'data': {
            'type': 'update',
            'dob': $('#dob').val(),
            'contact':$('#contact').val(),
            'age':$('#age').val(),
            'id': sessionStorage.uid,
        },
        'success': function(data) {
            
        },
        'error': function() {
            console.log('Unable to connect server')
        }
    })
}