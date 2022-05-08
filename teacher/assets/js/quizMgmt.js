
function validateForm()
{
    if($("#question").val()=='' || $("#optA").val()=='' || $("#optB").val()=='' || $("#optC").val()=='' || $("#optD").val()=='' )
    {
        alert('Please Enter All Fields');
        return false;
    }
    else
    {
        return true;
    }
}
function changeQuizStatus(id,status)
{
    
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
            changeQuizStatus: id,
            status: status
        },
        success: function (data) {
            $( "#mainBox" ).load("quizes.php");
        },
        error: function (data) {
            $( "#mainBox" ).load("quizes.php");
        }
    });
}
var another=false;
$("#newQuizS").click(function(){
  
    var name = $('#quizName').val();
    var type = $('#quizType').val();
    var grp = $('#quizGrp').val();
    
    if (name == '') {
        alert('Please Enter Quiz Name');
        return false;
    }

    //ajax call
    $.ajax({
        url: "changes.php",
        type: "POST",
        data: {
            newQuiz: name,
            type: type,
            grp: grp
        },
        success: function (data) {
          if(parseInt(data))
          {
              $( "#mainBox" ).hide().load("questionsAE.php?id="+data+"&count=1").show('');
          }
        },
        error: function (data) {
            console.log('Error:', data);
        }

})
});
$('#queForm').on('submit',(function(e) {

    e.preventDefault();
    var count = $('#Qcount').html();
    count = parseInt(count);
    count = count + 1;
    $.ajax({
        url: "changes.php",
        type: "POST",
        data: new FormData( this ),
        contentType: false,
        processData: false,
        success: function (data) {
            
            if(parseInt(data))
            {
                if(another)
                {   
                    $("#finalQ").prop("disabled",false)
                    $("#addQ").prop("disabled",false)
                    $( "#mainBox" ).hide().load("questionsAE.php?id="+data+"&count="+count).show('');
                }
                
            }
            else
            {
                alert(data);
            
            }
        },
        error: function (data) {

            
            if(parseInt(data))
            {
                if(another)
                {
                    $("#finalQ").prop("disabled",false)
                    $("#addQ").prop("disabled",false)
                    $( "#mainBox" ).hide().load("questionsAE.php?id="+data+"&count="+count).show('');
                }
            }
            else{
                alert(data)
            }
        }
    });

}));
$("#addQ").click(function(){
    $(this).prop("disabled",true)
    $("#finalQ").prop("disabled",true)
    another=true;
    if(validateForm())
    {
    $("#queForm").submit();
    }
});
$("#finalQ").click(function(){
    another=false;
    $(this).prop("disabled",true)
    $("#addQ").prop("disabled",true)
    if(validateForm())
    {
        $("#queForm").submit();
    $.ajax({
        url: "changes.php",
        type: "POST",
        data: {
            finalQ: $("#Qcount").html(),
            Qid: $('#Qid').val()
        },
        success: function (data) {
            
            if(parseInt(data))
            {
                $("#finalQ").prop("disabled",false)
                    $("#addQ").prop("disabled",false)
                $( "#mainBox" ).hide().load("quizes.php").show('');

            }
            else
            {
                alert(data);
            }
        },
        error: function (data) {
            if(parseInt(data))
            {
                $( "#mainBox" ).load("quizes.php");
            }
            else
            {
                alert(data);
            }
        }
    });
    }
});