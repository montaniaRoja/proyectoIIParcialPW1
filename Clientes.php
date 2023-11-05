<?php

session_start();

if (!isset($_SESSION['listaClientes'])) {
    $_SESSION['listaClientes'] = array();
}

$cuenta = isset($_GET['cuenta']) ? intval($_GET['cuenta']) : null;
$monto = isset($_GET['monto']) ? floatval($_GET['monto']) : null;
$tipo = isset($_GET['tipo']) ? intval($_GET['tipo']) : null;


if ($cuenta != null && $monto != null) {
    
    foreach ($_SESSION['listaClientes'] as $cliente) {
        if ($cliente->numerodecuenta === $cuenta) {
            if($tipo==1){
            $cliente->saldo += $monto;
           
            }
            if($tipo==2){
                if ($cliente->saldo >= $monto) {
                    $cliente->saldo -= $monto;
                   
                } 
                else{
                    echo "<script>alert('Fondos insuficientes');</script>";
                }
               
            }
            echo "<script>alert('Transaccion realizada correctamente');</script>";
            header("Location: Clientes.php");
            
        }
    }
}

$tipo=0;


class Clientes {
    public $identidad;
    public $nombre;
    public $apellido;
    public $correo;
    public $direccion;
    public $telefono;
    public $numerodecuenta;
    public $saldo;
    public $usuario;

    // Constructor de la clase
    public function __construct($identidad, $nombre, $apellido, $correo, $direccion, $telefono,$numerodecuenta,$saldo,$usuario) {
        $this->identidad = $identidad;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->correo = $correo;
        $this->direccion = $direccion;
        $this->telefono = $telefono;
        $this->numerodecuenta = $numerodecuenta;
        $this->saldo = (float)$saldo; 
        $this->usuario=$usuario;
    }
}

if (isset($_POST['enviar'])) {
    $id = $_REQUEST['identidad'];
    $nom = $_REQUEST['nombre'];
    $ape = $_REQUEST['apellidos'];
    $cor = $_REQUEST['correo'];
    $dir = $_REQUEST['direccion'];
    $tel = $_REQUEST['telefono'];
    $_SESSION['cuenta'] += 1;
    $cta = $_SESSION['cuenta'];
    $saldo=0;
    $usuario=$_SESSION['usuario'];

    $cliente = new Clientes($id, $nom, $ape, $cor, $dir, $tel, $cta,$saldo,$usuario);
    $cliente_duplicado = false;

    foreach ($_SESSION['listaClientes'] as $cliente_existente) {
        if ($cliente_existente->identidad === $id) {
            $cliente_duplicado = true;
            break; // Sal del bucle si ya se encontró un cliente duplicado
        }
    }

    if (!$cliente_duplicado) {
        if (is_array($_SESSION['listaClientes'])) {
            array_push($_SESSION['listaClientes'], $cliente);
        } else {
            $_SESSION['listaClientes'] = array($cliente);
        }
    } else {
        echo "<script>alert('Identidad de cliente duplicada, no se agregó el registro');</script>";
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
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">    
</head>	
<body>
<?php include 'menuprincipal.php';?>
<header class="header" align="center">
        <h2>Control de Clientes de Banco</h2>

    </header>


<div class="container-flex">
    <div class="row">
        <div class="col-4" id="formulario" style="margin-left: 20px;">
<form action="" method="post" id="clientes">
  <div class="form-group">
  <label for="identidad">Numero de Identidad</label>
  <input type="text" id="identidad" class="form-control" name="identidad" placeholder="DNI" required>  
  </div>	

  <div class="form-group">
  <label for="nombre">Nombre del Cliente</label>
  <input type="text" id="nombre" class="form-control" name="nombre" placeholder="nombre del cliente" required>  
  </div>

  <div class="form-group">
  <label for="apellidos">Apellidos del Cliente</label>
  <input type="text" class="form-control" id="apeliidos" name="apellidos" placeholder="apellido del cliente" required>  
  </div>

  <div class="form-group">
  <label for="correo">Correo Electronico</label>
  <input type="email" class="form-control" id="correo" name="correo" placeholder="un correo electronico" required>  
  </div>		

  <div class="form-group">
  <label for="direccion">Direccion</label>
  <input type="text" class="form-control" id="direccion" name="direccion" placeholder="direccion del cliente" required>  
  </div>		

  <div class="form-group">
  <label for="telefono">Telefono del Cliente</label>
  <input type="text" class="form-control" name="telefono" id="telefono" placeholder="telefono del cliente" required>  
  </div>
  <div class="form-group">
  <button type="submit" class="btn btn-primary" name="enviar" id="enviar">Guardar Datos de Cliente</button>
  </div>

</form>
</div>



        <div class="col-5">
            <img src="images/logo.jpg" alt="logo uth" width="600" height="600">
        </div>
    </div>
</div>


<div class="container-flex mt-4">

        <div class="row">
        <div class="col-128" id="tabla" style="margin-left: 20px;">
<table id="example" class="display" style="width:100%">

    <thead>
    <tr>
        <th>Identidad</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Correo</th>
        <th>Dirección</th>
        <th>Teléfono</th>
        <th>Número de Cuenta</th>
        <th>Saldo</th>
        <th>Usuario</th>
        <th>Acciones</th>
    </tr>
    </thead>
    <tbody>
    <?php

    foreach ($_SESSION['listaClientes'] as $cliente) {
        echo "<tr>";
        echo "<td>" . $cliente->identidad . "</td>";
        echo "<td>" . $cliente->nombre . "</td>";
        echo "<td>" . $cliente->apellido . "</td>";
        echo "<td>" . $cliente->correo . "</td>";
        echo "<td>" . $cliente->direccion . "</td>";
        echo "<td>" . $cliente->telefono . "</td>";
        echo "<td>" . $cliente->numerodecuenta . "</td>";
        echo "<td>" . $cliente->saldo . "</td>";
        echo "<td>" . $cliente->usuario . "</td>";
      echo "<td>";
      echo '<a class="btn btn-primary btn-sm" href="procesar.php?cuenta=' . $cliente->numerodecuenta . '&nombre=' . $cliente->nombre . '&apellido=' . $cliente->apellido . '&tipo=1">Depósitos</a>';
      
      echo '<a class="btn btn-primary btn-sm" href="procesar.php?cuenta=' . $cliente->numerodecuenta . '&nombre=' . $cliente->nombre . '&apellido=' . $cliente->apellido . '&tipo=2">Retiros</a>';
      
      echo '<a class="btn btn-primary btn-sm" href="historial.php?cuenta=' . $cliente->numerodecuenta . '&nombre=' . $cliente->nombre . '&apellido='.$cliente->apellido.'">Historial</a>';
      echo "</td>";

        echo "</tr>";
    }
    ?>
    </tbody>
   
</table>
</div>
</div>
</div>

  

  
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script>new DataTable('#example');</script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
