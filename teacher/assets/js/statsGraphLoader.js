var day,month,year,branch,data; 
$(document).ready(function() {
    $("#graphArea").load("graph.html"); 
    $("#filterCard").change(function(){ 
        $("#graphArea").load("graph.html",lineGraph());
        day = $("#day").val();
        month = $("#month").val();
        year = $("#year").val();
        branch = $("#branch").val();
        data = {
            Branch : branch,
            Year : year,
            Month : month,
            Day : day
        }
        console.log(data)
    });

});
