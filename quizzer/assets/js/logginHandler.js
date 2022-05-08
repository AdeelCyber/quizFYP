

    $("#loginForm").submit(function(e){
        e.preventDefault();
        var loading = "<div  style='margin-left:45%'><div class='loader'></div></div>"
    if($("#password").val() == "" || $("#username").val() == "")
    {
        $("#popup").html("Username and Password Can't Be Empty");
        $("#password").val("")
        $("#popup").css("color","red")
        return false;
    }
        document.getElementById('loginBtn').innerHTML = loading;
        
        $.ajax({
            type: "POST",
            url: "basics.php",
            data: {
                username: $("#username").val(),
                password: $("#password").val()
            },
            success: function(data){
                
                if(data == "LoggedIn")
                window.location.href="../Quizzer/";
                else{
                    $("#loginBtn").html("Login");
                    $("#popup").html(data);
                    $("#popup").css("color","red")

                }
            },
            error: function(data){
                if(data == "LoggedIn")
                window.location.href="index.php";
                else{
                    $("#loginBtn").html("Login");
                    $("#popup").html(data);
                    $("#popup").css("color","red")

                }
        }
       });
        });
    $('.form').keyup(function(e){
        if(e.KeyCode != 13){
            $("#popup").empty()
        }
    })
    