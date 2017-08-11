$(function(){
    $('#clx_lForm').submit(function(e){
        e.preventDefault()

        alert("buuu")
        var uname = $('#clx-lName').val(),
            usurname = $('#clx-lSurName').val(),
            uemail = $('#clx-lMail').val(),
            ugender = $('#clx-l_gender').val();

        $.ajax({
            url: "http://212.237.16.27/landing2017/mailer-daemon/test.php",
            method: "POST",
            data: { name: uname, surname: usurname, email: uemail, gender: ugender }
        }).done(function(data){
            alert(data.text)
        })
    })
})