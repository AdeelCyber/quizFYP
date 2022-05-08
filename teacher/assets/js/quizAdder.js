$("#newQuiz").click(function () {
    var type = $("#quizType").val();
    $("#mainBox").hide().load("questionsAE.php/?type="+type).show('');
});