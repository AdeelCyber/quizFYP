$(document).ready(function() {
    
    $('#SnEeditBtn').click(function()
    {
        $(this).html("Edit Allowed")
        $(this).prop('disabled', true);
        $("#info").css("user-select", "auto")
        $("#info").css("pointer-events", "auto")
        
    })
})