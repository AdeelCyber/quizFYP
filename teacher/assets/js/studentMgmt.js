var check = true;
function selectAll(x)
{
    
    if(check)
    {
        $(x).html("Unselect All");
    }
    else
    {
        $(x).html("Select All");
    }
    var checkBoxes = document.getElementsByClassName("checker");
    var checkBoxesLength = checkBoxes.length;
    if(check)
    {
        check=false;
    for(var i = 0; i < checkBoxesLength; i++)
        {
            checkBoxes[i].checked = true;
            
        }
    }
    else
    {
        check=true;
    for(var i = 0; i < checkBoxesLength; i++)
        {
            checkBoxes[i].checked = false;
            
        }
    }
}
function changeGroup()
{
    var arr=[];
    var checkBoxes = document.getElementsByClassName("checker");
    var checkBoxesLength = checkBoxes.length;
    var ids= "(";
    for(var i = 0; i < checkBoxesLength; i++)
        {
            if(checkBoxes[i].checked)
            {
                if (i!=checkBoxesLength-1)
                    ids+=checkBoxes[i].closest('tr').getAttribute('id')+",";
                else
                    ids+=checkBoxes[i].closest('tr').getAttribute('id')+")";
                
                
            }
            
        }
    $.ajax({
        url: "changes.php",
        type: "POST",
        data: {
            changeMultipleGroup: ids,
            grp: $("#multipleGroup").find(":selected").val()
        },
        success: function (data) {
            
            if(parseInt(data))
            {
                $( "#mainBox" ).load("students.php");
            }
            else
            {
                alert(data);
            }
        },
        error: function (data) {
            if(parseInt(data))
            {
                $( "#mainBox" ).load("students.php");
            }
            else
            {
                alert(data);
            }
        }
    });


    
}
function change(x,id)
{
    var check = $( x ).find(":selected").val();
    $.ajax({
        url: "changes.php",
        type: "POST",
        data: {
            changeStudentGroup: id,
            grp: check
        },
        success: function (data) {
            if(parseInt(data))
            {
                $( "#mainBox" ).load("students.php");
            }
            else
            {
                alert(data);
            }
        },
        error: function (data) {
            if(parseInt(data))
            {
                $( "#mainBox" ).load("students.php");
            }
            else
            {
                alert(data);
            }
        }
    });
}
function viewQuizes(x)
{
    var id = $(x).closest('tr').attr('id');
    $( "#mainBox" ).load("studentQuiz.php?id="+id);
}