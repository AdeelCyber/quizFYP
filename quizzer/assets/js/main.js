$(document).ready(function(){
    
    openFullscreen();
});
document.addEventListener('contextmenu', function(e) {
    
    e.preventDefault();
})
document.onkeydown = function(e) {
    if (e.keyCode == 73 && (e.ctrlKey||e.shiftKey) ) {
        return false;
    }
    if (e.ctrlKey && e.keyCode == "C".charCodeAt(0)) {
        return false;
    }
    if (e.ctrlKey && e.keyCode == "X".charCodeAt(0)) {
        return false;
    }
    if (e.ctrlKey && e.keyCode == "V".charCodeAt(0)) {
        return false;
    }
    if (e.ctrlKey && e.keyCode == "R".charCodeAt(0)) {
        return false;
    }
    if (e.ctrlKey && e.keyCode == "A".charCodeAt(0)) {
        return false;
    }
    if (e.ctrlKey && e.keyCode == "S".charCodeAt(0)) {
        return false;
    }
    if(e.ctrlKey && e.keyCode == "Z".charCodeAt(0)){
        return false;
    }
    if(e.ctrlKey && e.keyCode == "Y".charCodeAt(0)){
        return false;
    }
    if ((e.altKey) && e.keyCode == 9 ) {
        return false;
    }
    if(e.keyCode==27){
    alert('Not allowed !!!');
        // or any other code
     return false;
    }
    if(e.keyCode == 122) {
        return false;
    }
    // const query = matchMedia("all and (display-mode: fullscreen");
    // query.onchange = e => {
    // console.log(query.matches ? 'entered' : 'exited', 'fullscreen mode');
    
};

function openFullscreen() {
    var elem = document.documentElement;
    if (elem.requestFullscreen) { // for google chrome
      elem.requestFullscreen();
    } else if (elem.webkitRequestFullscreen) { // for firefox
      elem.webkitRequestFullscreen();
    } else if (elem.msRequestFullscreen) { // for ie or Edge
      elem.msRequestFullscreen();
    }
  }

  !function() {
	function detectDevTool(allow) {
  	if(isNaN(+allow)) allow = 100;
    var start = +new Date();
    debugger;
    var end = +new Date();
    if(isNaN(start) || isNaN(end) || end - start > allow) {
        
      document.write('<div id="mainBox" style="width:100vw;height:100vh"></div>');
      $("#mainBox").load("failing.php");
      var bdy = document.getElementsByTagName("BODY")[0];
      bdy.style.backgroundColor = "black";
      $("#mainBox").css("background-color","black");
    }
  }
  if(window.attachEvent) {
  	if (document.readyState === "complete" || document.readyState === "interactive") {
    	detectDevTool();
      window.attachEvent('onresize', detectDevTool);
      window.attachEvent('onmousemove', detectDevTool);
      window.attachEvent('onfocus', detectDevTool);
      window.attachEvent('onblur', detectDevTool);
    } else {
    	setTimeout(argument.callee, 0);
    }
  } else {
  	window.addEventListener('load', detectDevTool);
    window.addEventListener('resize', detectDevTool);
    window.addEventListener('mousemove', detectDevTool);
    window.addEventListener('focus', detectDevTool);
    window.addEventListener('blur', detectDevTool);
  }
}();