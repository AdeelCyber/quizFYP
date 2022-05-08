function sendData(selected,x)
{ 
    $.ajax({
        type: "POST",
        url: "attempt.php",
        data: {
            questionID: $("#questionID").html(),
            selected: selected
        },
        success: function(data){
            
            if(data == "correct") {
            $(x).prop("disabled",false)
            correct++;

            }
            if(final)
            {
                $(x).prop("disabled",false)
                resolveQuiz();
            }
        },
        error: function(data){
            
            if(data == "correct") {
                correct++;
                $(x).prop("disabled",false)
                }
            if(final)
            {
                $(x).prop("disabled",false)
                resolveQuiz();
            }
    }
   })
   return true;
}
function resolveQuiz()
{
    var qid = $("#quizID").html();
    var time = $("#timer").html();
    var d = new Date();
    var strDate =d.getDate()+ "-" + (d.getMonth()+1) + "-" + d.getFullYear();
    correct = parseInt(correct);
    total = parseInt(total);
    var score = (correct/total)*100;
    if(score>=50&&score<=70)
    {
        var remarks = "Pass";
    }
    else if(score>=70&&score<=90)
    {
        var remarks = "Good";
    }
    else if(score>=90&&score<=100)
    {
        var remarks = "Excellent";
    }
    else if(score<50)
    {
        var remarks = "Fail";
    }
    var dataToBeSent = {
        correctAns: score,
        correct: correct,
        student: $("#studentID").html(),
        quiz: qid,
        time: time,
        date: strDate,
        remarks: remarks,

    }
    
        $.ajax({
            type: "POST",
            url: "attempt.php",
            data:dataToBeSent,
            success: function(data){
                
                if(data == "Submitted") {
                window.location.href = "results.php?quiz="+qid;
                }
                
            },
            error: function(data){
                
                if(data == "Submitted") {
                    window.location.href = "results.php?quiz="+qid;
                    }
                    
        }
       })
    
}
$("#nextQuestion").click(function() {
    $(this).prop('disabled',true)
    var selected = $('input[name="answer"]:checked').attr('id');
    if(selected == undefined) {
        $("#popup").html("Please select an answer");
        return;
    }
    sendData(selected,this);
    var qid = $("#quizID").html();
    var currentQ = $("#currentQ").html();
    var nextQ = parseInt(currentQ) + 1;
    $("#currentQ").html(nextQ);
    var qno = nextQ;
    $("#questionBox").hide('slow').load("question.php?qid="+qid+"&question="+qno,function()
    {
        $("#questionBox").show('slow');
    });
})

$("#submitQuiz").click(function() {
    finalizeQuiz(this);
})
$("input").change(function(e){
    $("#popup").empty()

})