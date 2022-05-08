//posting data to the server
$(document).ready(function () {
    $('#submit').click(function () {
        var name = $('#name').val();
        var isactive = $('#isActive').prop("checked");
        if(isactive == true)
        {
            isactive = "1";
        }
        else
        {
            isactive = "0";
        }
        
        if (name == '') {
            alert('Please Enter A Proper Name');
            return false;
        }
  
        //ajax call
        $.ajax({
            url: "changes.php",
            type: "POST",
            data: {
                new_group: name,
                isActive: isactive,
            },
            success: function (data) {
                if(parseInt(data))
                {
                    
                    $( "#mainBox" ).hide().load("groups.php").show('');
                }
                else
                {
                    alert(data);
                }
            },
            error: function (data) {
                if(parseInt(data))
                {
                    
                    $( "#mainBox" ).hide().load("groups.php").show('');
                }
                else
                {
                    alert(data);
                }
            }

        });


    })
});
