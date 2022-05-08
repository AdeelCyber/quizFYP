$(document).ready(function() {
   
    $("#branchForm").submit(function(e){
        e.preventDefault();
        var msg = "";
    var branchName = document.getElementById("branchName");
    var brnachAddress = document.getElementById("branchAddress");
    var branchPassword = document.getElementById("branchPassword");
    var passLength = branchPassword.value;
    if(branchName.value == "")
    {
        msg = msg + "| Enter Branch Name |";
    }
    if(brnachAddress.value == "")
    {
        msg = msg + "| Enter Branch Address |";
    }
    if(branchPassword.value == "")
    {
        msg = msg + "| Enter Branch Password |";
        
    }
    else if(passLength < "6")
    {
        msg = msg + "| Password must be atleast 6 characters long |";
    }
    
    if(msg == "")
    {
        $.ajax({
            type: "POST",
            url: "index.html",
            data: $("#branchForm").serialize(), // serializes form input
            success: function(){
                alert(data)
            }
       });
    }
    else
    {
        var write = document.getElementById("messages");
        write.innerHTML = msg;
    }
    });
   $("#pkgForm").submit(function(e){
    e.preventDefault();

    var msg = "";
    var pkgName = document.getElementById("pkgName");
    var pkgPrice = document.getElementById("pkgPrice");
    var branchName = document.getElementById("branchName");
    if(pkgName.value == "")
    {
        msg = msg + "| Enter A Package Name |";
    }
    if(pkgPrice.value == "0" || pkgPrice.value == "")
    {
        msg = msg + "| Enter Package Price |";
    }
    if(branchName.value == "")
    {
        msg = msg + "| Select Branch |";
    }
    
    if(msg == "")
    {
        $.ajax({
            type: "POST",
            url: "index.html",
            data: $("#pkgForm").serialize(), // serializes form input
            success: function(data){
                alert("")
            }
       });
    }
    else
    {
        var write = document.getElementById("messages");
        write.innerHTML = msg;
    }

   });
        
    
    $("#staffForm").submit(function(e){
        alert("Form Cancelled");
        e.preventDefault();
    });
});