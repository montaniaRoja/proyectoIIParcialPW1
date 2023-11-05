<?php


?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="styles/styles.css">

</head>
<body>

<!-- Top Navigation Menu -->
<div class="topnav">
  <a href="#home" class="active">UTH</a>
  <div id="myLinks">
    <a href="Clientes.php">Clientes</a>
    <a href="equipo.php">Equipo</a>
    <a href="index.php?logout=1">Salir</a>
  </div>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>

<script>
function myFunction() {
  var x = document.getElementById("myLinks");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}
</script>

</body>
</html>
