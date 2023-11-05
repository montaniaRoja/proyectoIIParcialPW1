<?php

session_start();
include 'Transaccion.php';
$cuentaC=intval($_GET['cuenta']);
$nombre=$_GET['nombre'];
$apellido=$_GET['apellido'];
$tr=$_GET['tipo'];



if (isset($_POST['depositar'])) {
    $fecha = date("Y-m-d H:i:s");
    $cuenta=$cuentaC;
    $monto = floatval($_REQUEST['deposito']);
    $usuario=$_SESSION['usuario'];
    $_SESSION['notransaccion']+=1;
    $noTransaccion=$_SESSION['notransaccion'];
    if($tr==1){
        $tipo="Deposito";
    }
    else{$tipo="Retiro";}
    
    $transaccion = new Transaccion($fecha,$cuenta,$noTransaccion,$monto,$tipo,$usuario);
    
    if (is_array($_SESSION['transacciones'])) {
        array_push($_SESSION['transacciones'], $transaccion);
        
        
    } else {
        $_SESSION['transacciones'] = array($transaccion);
    }
    
    
    if($tr==1){
        header("Location: Clientes.php?cuenta=" . $cuenta . "&monto=" . number_format($monto, 2, '.', '') . "&tipo=1");
    }
    else{header("Location: Clientes.php?cuenta=" . $cuenta . "&monto=" . number_format($monto, 2, '.', '') . "&tipo=2");}
    
}
?>


<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Banco|| PW1</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">    
</head>	
<body>
<?php include 'menuprincipal.php';?>
<header class="header" align="center">
        <h2>Control de Depositos Banco</h2>

    </header>


<div class="container-flex">
    <div class="row">
        <div class="col-4" id="formulario" style="margin-left: 20px;">
<form id="formulario" action="" method="post">
  <div class="form-group">
  <label for="cuenta">Cuenta</label>
  <input type="text" class="form-control" id="cuenta" name="cuenta" placeholder="" value="<?php echo $cuentaC; ?>" disabled>  
  </div>	

  <div class="form-group">
  <label for="nombre">Nombre del Cliente</label>
  <input type="text" class="form-control" id="nombre" name="nombre" placeholder="nombre del cliente" value="<?php echo $nombre; ?>" disabled>  
  </div>

  <div class="form-group">
  <label for="apellidos">Apellidos del Cliente</label>
  <input type="text" class="form-control" name="apellidos" id="apellidos" placeholder="apellido del cliente" value="<?php echo $apellido; ?>" disabled>  
  </div>

  <div class="form-group">
  <label for="correo">Monto</label>
  <input type="number" class="form-control" id="correo" name="deposito" min="0" step="0.01" >
  
  </div>		

  
  <div class="form-group">
  <button type="submit" class="btn btn-primary" name="depositar" id="enviar">
    <?php echo ($tr == 1) ? "Guardar Deposito" : "Procesar Retiro"; ?>
</button>

  </div>

</form>
</div>



        <div class="col-5">
            <img src="images/logo.jpg" alt="logo uth" width="600" height="600">
        </div>
    </div>
</div>


<div class="container-flex mt-4">

       
  

  
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script>new DataTable('#example');</script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>

