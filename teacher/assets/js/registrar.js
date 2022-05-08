$("#registerForm").submit(function(e){
    e.preventDefault();
    $("#errors").html("");
    var loading = "<div  style='margin-left:45%'><div class='loader'></div></div>"
    var username = $('#name').val();
    var password = $('#pass').val();

    $("#loginBtn").html(loading);
    var data = {
        'newUser': username,
        'master':$("#master").val(),
        'password': password,
    };
    $.ajax({
        url: 'logger.php',
        type: 'POST',
        data: data,
        success: function(data)
        {
            if (data == 'LoggedIn')
            {
                window.location.href = 'index.php';
            }
            else
            {
                if(data == 'New User Added')
                {
                    $("#errors").css('color', 'green');
                }
                else
                {
                    $("#errors").css('color', 'red');
                }
                document.getElementById('loginBtn').innerHTML = "Log In";
                $("#errors").text(data);
            }
        },
        error: function(data)
        {
            if (data == 'LoggedIn')
            {
                window.location.href = 'index.php';   
            }
            else
            {
                if(data == 'New User Added')
                {
                    $("#errors").css('color', 'green');
                }
                else
                {
                    $("#errors").css('color', 'red');
                }
                document.getElementById('loginBtn').innerHTML = "Log In";
                $("#errors").text(data);
            }
        }
    });
});
