var correct=0;
var final = false;
var total = $("#totalQ").html();
$("#startQuiz").click(function() {
    $("#quizBox").hide('slow');
    $("#mainQuestionBox").show('slow');
    startStopwatch();
    var qid = $("#quizID").html();
    openFullscreen();
    $("#questionBox").hide('slow').load("question.php?qid="+qid+"&question=1").show('slow');
})
function finalizeQuiz(x)
{
    stopStopwatch()
    var selected = $('input[name="answer"]:checked').attr('id');
    if(selected == undefined) {
        $("#popup").html("Please select an answer");
        return; 
    }
    final = true;
    sendData(selected,x)
    
}