function changeGrpStatus(id,status)
{
    var ff = "30.588";

    status = parseInt(status);
    if(status==1)
    {
        status = 0;
    }
    else
    {
        status = 1;
    }
    
    $.ajax({
        url: "changes.php",
        type: "POST",
        data: {
            changeGrpStatus: id,
            status: status
        },
        success: function (data) {
            $( "#mainBox" ).load("groups.php");
        },
        error: function (data) {
            $( "#mainBox" ).load("groups.php");
        }
    });
}