function putActive(id)
{
    var activeclasses="text-gray-800 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100";
    var inactiveClasses="hover:text-gray-800 dark:hover:text-gray-200";
    var nowActiveParentLi = document.getElementById("activeClass").parentElement;
    var active = document.getElementById("activeClass").innerHTML;
    document.getElementById("activeClass").remove();
    var NowActive = document.createElement('span');
    NowActive.innerHTML = active;
    NowActive.id="activeClass";
    var toBeActve = document.getElementById(id)
    toBeActve.appendChild(NowActive);
    var btn = toBeActve.children[0];
    var preActivebtn = nowActiveParentLi.children[0];
    preActivebtn.classList.remove("text-gray-800");
    preActivebtn.classList.remove("dark:text-gray-100");
    preActivebtn.classList.add("hover:text-gray-800");
    preActivebtn.classList.add("dark:hover:text-gray-100");
    btn.classList.remove("hover:text-gray-800");    
    btn.classList.add("text-gray-800");   
    btn.classList.remove("dark:hover:text-gray-100");   
    btn.classList.add("dark:text-gray-100");   
    

}
function putActiveM(id)
{
    var activeclasses="text-gray-800 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100";
    var inactiveClasses="hover:text-gray-800 dark:hover:text-gray-200";
    var nowActiveParentLi = document.getElementById("activeClassM").parentElement;
    var active = document.getElementById("activeClassM").innerHTML;
    document.getElementById("activeClassM").remove();
    var NowActive = document.createElement('span');
    NowActive.innerHTML = active;
    NowActive.id="activeClassM";
    var toBeActve = document.getElementById(id)
    toBeActve.appendChild(NowActive);
    var btn = toBeActve.children[0];
    var preActivebtn = nowActiveParentLi.children[0];
    preActivebtn.classList.remove("text-gray-800");
    preActivebtn.classList.remove("dark:text-gray-100");
    preActivebtn.classList.add("hover:text-gray-800");
    preActivebtn.classList.add("dark:hover:text-gray-100");
    
    btn.classList.remove("hover:text-gray-800");    
    btn.classList.add("text-gray-800");   
    btn.classList.remove("dark:hover:text-gray-100");   
    btn.classList.add("dark:text-gray-100");   
    

}
const lineConfig = {
    type: 'line',
    data: {
      labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
      datasets: [
        {
          label: 'Organic',
          /**
           * These colors come from Tailwind CSS palette
           * https://tailwindcss.com/docs/customizing-colors/#default-color-palette
           */
          backgroundColor: '#0694a2',
          borderColor: '#0694a2',
          data: [43, 48, 40, 54, 67, 73, 70],
          fill: false,
        },
        {
          label: 'Paid',
          fill: false,
          /**
           * These colors come from Tailwind CSS palette
           * https://tailwindcss.com/docs/customizing-colors/#default-color-palette
           */
          backgroundColor: '#7e3af2',
          borderColor: '#7e3af2',
          data: [19,25,26],
        },
      ],
    },
    options: {
      responsive: true,
      /**
       * Default legends are ugly and impossible to style.
       * See examples in charts.html to add your own legends
       *  */
      legend: {
        display: true,
      },
      tooltips: {
        mode: 'index',
        intersect: false,
      },
      hover: {
        mode: 'nearest',
        intersect: true,
      },
      scales: {
        x: {
          display: true,
          scaleLabel: {
            display: true,
            labelString: 'Month',
          },
        },
        y: {
          display: true,
          scaleLabel: {
            display: true,
            labelString: 'Value',
          },
        },
      },
    },
  }
  
  // change this to the id of your chart element in HMTL
  function loadGraph()
  {

  const lineCtx = document.getElementById('line')
    window.myLine = new Chart(lineCtx, lineConfig)
  }
$(document).ready(function() {
    $( "#mainBox" ).load("home.php");
    $("#loadHome").click(function() {
     
        putActive("loadHome");
        putActiveM("MloadHome");
        $("#mainBox").load("home.php");
        
    }
    );
    $("#loadQuestionare").click(function() {
        putActive("loadQuestionare");
        putActiveM("MloadQuestionare");
        $( "#mainBox" ).load("quizes.php");
    }
    );
    $("#loadStudents").click(function() {
        putActive("loadStudents");
        putActiveM("MloadStudents");
        $( "#mainBox" ).load("students.php");
    }
    );
    $("#loadGroups").click(function() {
        putActive("loadGroups");
        putActiveM("MloadGroups");
        $( "#mainBox" ).load("groups.php");
        loadGraph();
    }
    );
    
    ////////////////////////////////////////////
    /// MOBILE VIEW
    ////////////////////////////////////////////
    $("#MloadHome").click(function() {
        putActive("loadHome");
        putActiveM("MloadHome");
        $( "#mainBox" ).load("home.html");

    }
    );
    $("#MloadQuestionare").click(function() {
        putActive("loadQuestionare");
        putActiveM("MloadQuestionare");
        $( "#mainBox" ).load("quizes.php");
    }
    );
    $("#MloadStudents").click(function() {
        putActive("loadStudents");
        putActiveM("MloadStudents");
        $( "#mainBox" ).load("students.php");
    }
    );
    $("#MloadGroups").click(function() {
        putActive("loadGroups");
        putActiveM("MloadGroups");
        $( "#mainBox" ).load("groups.php");
    }
    );
    
});
