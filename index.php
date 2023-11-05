<?php

session_start();

if (isset($_GET['logout'])) {
    // Destruir la sesión
    session_destroy();

    
    header("Location: index.php");
    exit;
}
$usuario1="usuario01";
$usuario2="usuario02";
$password01="password";

if(isset($_POST['enviar'])){

    $usuario=$_REQUEST['username'];
    $clave=$_REQUEST['password'];

    if($usuario==$usuario1 && $clave==$password01 || $usuario==$usuario2 && $clave==$password01 ){
        
      $_SESSION['usuario']=$usuario;
      $_SESSION['cuenta']=0;
      $_SESSION['notransaccion']=0;
      $_SESSION['listaClientes'] = array();
      $_SESSION['transacciones'] = array();
      
      header( "Location: ./inicio.php" );
      exit();
    }
    else{
      echo "<script>alert('Usuario o contraseña no permitida');</script>";
      
      header("Location:index.php");
      exit();

    }

}


?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Banco|| PW1</title>
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>


<body>

<header class="header" text-align="center">
       

    </header>
 <div class="container-flex">

        <div class="row">

            <div class="col-4" id="vacio">
            </div>	

<div class="col-4" id="formulario">
   <h2>Control de Clientes de Banco</h2>
<form action="" method="post">
    <div class="form-group">		
    <input type="text" class="form-control" name="username" placeholder="Usuario"> 
    </div>
    <div class="form-group">		
    <input type="password" class="form-control" name="password" placeholder="Ingrese contraseña"> 
    </div>
    <button type="submit" class="btn btn-primary" name="enviar" id="enviar">Ingresar</button>

</form>
</div>

<div class="col-4" id="vacio2">

</div>
 </div>
 </div>

 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


</body>
</html>