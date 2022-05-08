$("#loginForm").submit(function(e){
    e.preventDefault();
    $("#errors").html("");
    var loading = "<div  style='margin-left:45%'><div class='loader'></div></div>"
    var username = $('#name').val();
    var password = $('#pass').val();
    $("#loginBtn").html(loading);
    var data = {
        'username': username,
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
                
                document.getElementById('loginBtn').innerHTML = "Log In";
                $("#errors").text(data);
            }
        }
    });
});
