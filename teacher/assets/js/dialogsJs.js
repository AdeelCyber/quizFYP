$(document).ready(function() {
    var plus="true";
    $("#openPkgBox").click(function() {
        if(plus=="true")
        {
          plus="false";
          $("#minus").fadeIn('500');
          $("#plus").hide();
        }
        else{
          plus="true";
          $("#plus").fadeIn('500');
          $("#minus").hide()
        }
        $("#pkgBox").toggle("slow");
        
        
      });
      $("#openBrnchBox").click(function() {
        if(plus=="true")
        {
          plus="false";
          $("#minus").fadeIn('500');
          $("#plus").hide();
        }
        else{
          plus="true";
          $("#plus").fadeIn('500');
          $("#minus").hide()
        }
        $("#branchBox").toggle("slow");
        
        
      });
      $("#openStaffBox").click(function() {
        loadCurrentDate();
        if(plus=="true")
        {
          plus="false";
          $("#minus").fadeIn('500');
          $("#plus").hide();
        }
        else{
          plus="true";
          $("#plus").fadeIn('500');
          $("#minus").hide()
        }
        $("#staffBox").toggle("slow");
        
        
        
      });
      
});
function loadCurrentDate()
{
  var today = new Date();
var dd = String(today.getDate()).padStart(2, '0');
var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
var yyyy = today.getFullYear();

today = yyyy + '-' + mm + '-' + dd;
$("#doj").val(today);
}