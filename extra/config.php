
<?php
$project= mysqli_connect('localhost','root','','market');
if(!$project){
    echo "database is not connect";
}
 

$project->query("SET NAMES utf8");
$project->query("SET CHARACTER SET utf8");

?>


<link href="./style/bootstrap.css" rel="stylesheet" >
<link  href="./style/nice.css"  rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
<!-- Include a required theme -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Include a required theme -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>

</html>