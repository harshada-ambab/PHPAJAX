$(document).ready(function() {
    $('#submit').on('click', function(e) {
    e.preventDefault();
    var name =  $('#name').val();
    var email = $('#email').val();
    var date = $('#date').val();
    $.ajax({
    type : "POST",
    url : "crud.php", 
    data : {
    name: name,
    email :email,
    date :date
    }
    }).done(function(msg) {
        $('#msg').html(msg);
        $('#crud')[0].reset();
       // $("#table").load('fetch.php');
    }).fail(function(data) {
    alert("This is not working");
    });
    });
});

