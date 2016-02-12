<div align=center width=500><iframe src=./strony/czat2.php width=600 height=300 NAME=auto frameborder="0"></iframe></div>
<form method=get id =form action="./strony/czat3.php">
    
<input type=text id=czat size=60>
<input type="submit" value ="wyslij">

    
    
    <div id=TargetDiv2></div>
    
    
    <script langugage="javascript">
    
    
    (function() {
 
    var form = document.getElementById("form");
    var url = form.getAttribute("action");
 
    form.addEventListener("submit", function(e) {
 
        e.preventDefault();
        getData3(url, "TargetDiv2");
 
    }, false);
 
})();
    </script>
