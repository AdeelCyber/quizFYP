
$("#registrationForm").submit(function(e) {
    var loading = "<div  style='margin-left:45%'><div class='loader'></div></div>"
    if($("#password").val() == "" || $("#name").val() == "" || $("#username").val() == "" )
    {
        $("#popup").html("Please fill all the fields")
        $("#password").val("")
        $("#password2").val("")
        $("#popup").css("color","red")
        return false;
    }
    if( $( "#grp option:selected" ).val() == "0")
    {
        $("#popup").html("Please select a group")
        $("#popup").css("color","red")
        return false;
    }
    if($("#password").val() == $("#password2").val()){
    if($("#password").val().length < 8)
    {
        $("#popup").html("Password must be atleast 8 characters long")
        $("#password").val("")
        $("#password2").val("")
        $("#popup").css("color","red")
        return false;
    }
    else{
        e.preventDefault();
    var data = {
        newUser: $("#name").val(),
        email: $("#username").val(),
        password: $("#password").val(),
        grp: $("#grp option:selected").val()
    }
    $.ajax({
        type: "POST",
        url: "basics.php",
        data: data,
        success: function(data) {
            if(data=="success"){
                $("#popup").html("Registration Successful! You will be redirected to the login page in 5 seconds.");
                $("#popup").css("color","green");
                setTimeout(function(){
                    window.location.href = "login.php";
                }, 5000);
            }
            else if(data="notUnique"){
                $("#popup").html("User with this Username already exists");
                $("#popup").css("color","red");
            }
            else{
                $("#popup").html("Registration Failed! Please try again.");
                $("#popup").css("color","red");
            }
        }
    });
    }
}
else{
    $("#popup").html("Passwords do not match")
    $("#popup").css("color", "red")
    return false;
}
});

$('input').keyup(function(e){
    if(e.KeyCode != 13){
        $("#popup").empty()
    }
})