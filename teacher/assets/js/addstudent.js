//posting data to the server
$(document).ready(function () {
    $('#submit').click(function () {
        var name = $('#name').val();
        var username = $('#username').val();
        var password = $('#password').val();
        var grop = $('#grop').val();
        //validating username
        if(username == "")
        {
            alert("Username Cannot be Empty.")
            return false;
        }
        //validating password lentgh greater than 6
        if (password.length < 6) {
            alert('Password must be at least 6 characters long');
            return false;
        }
        //validating name
        if (name == '') {
            alert('Please enter your name');
            return false;
        }
        
        $.ajax({
            url: "changes.php",
            type: "POST",
            data: {
                newStudent: name,
                student_email: username,
                pass: password,
                grp: grop
            },
            success: function (data) {
                alert(data)
            if (data == "New Student Added")
            $( "#mainBox" ).hide().load("students.php").show('');
            else
                {
                    console.log(data);
                alert(data);
                }
            },
            error: function (data) {
                if (data == "New Student Added")
            $( "#mainBox" ).hide().load("students.php").show('');
            else
            {
                console.log(data);
                alert(data);
                
            }

            }
        });
        

    })
});
