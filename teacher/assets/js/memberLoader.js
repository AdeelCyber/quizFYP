
$(document).ready(function() {
    
    $("#allMemberCard").click(function() {
        $("#basicMemberCard").hide("slow");
        $("#memberCard").load("branchMembers.html #memberTable",success("All Members")).fadeIn("slow");
        $("#backBtn").show("slow");
    });
    $("#branchMembersCard").click(function() {
        $("#basicMemberCard").hide("slow");
        $("#memberCard").load("branchMembers.html #memberTable",success("Branch Members")).fadeIn("slow");
        $("#backBtn").show("slow");
    });
    $("#memberAttendanceCard").click(function() {
        $("#basicMemberCard").hide("slow");
        $("#backBtn").show("slow");
        $("#memberCard").load("branchMembers.html",success("Daily Attendance")).fadeIn("slow");
    });
    $("#backCard").click(function() {
        
        $("#basicMemberCard").show("slow");
        $("#memberCard").fadeOut("slow");
        $("#backBtn").hide("hide");
        success("Members");
    });
    function success(id){
        
        var update =document.getElementById("currentHeading");
        update.innerHTML = id;
    }
});