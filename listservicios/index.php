<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon"/>
<link rel="stylesheet" href="./style.css">
<title>Electrónica Villacorta</title>
<style>
body {
    font-family: "Lato", sans-serif;
}

.sidenav {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #327ffc;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
}

.sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: #000000;
    display: block;
    transition: 0.3s;
}

.sidenav a:hover {
    color: #ffffff;
}

.sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
}

#main {
    transition: margin-left .5s;
    padding: 16px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>

<script type="text/javascript">
$(document).ready(function(){
$('[data-toggle="tooltip"]').tooltip();   
});    
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
}
function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
}
</script>
</head>
<body>
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="../inventario">Búsqueda en Inventario</a>
  <a href="../listinventario">Listado de Inventario</a>
  <a href="../servicios">Búsqueda en Servicio</a>
  <!-- <a href="../listservicios">Listado de Servicios</a> -->
 </div>
<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; </span>

<div id="main" class="container">

<img src="images\logo3.png" alt="Electrónica Villacorta"style="width:300px;height:130px;">

<!-- (A) SEARCH FORM -->
<form method="post" action="index.php">
  <h1>Listado de Servicios</h1>
</form>

<?php
  require "search.php";
  if (count($results) > 0) 
 {
?>
<br>
<table class='table1'>
<tr>
<td>Documento</td>
<td>Recibido</td>
<td>Cliente</td>
<td>Descripción en Factura</td>
<td>Falla</td>
<td>Diagnóstico</td>
</tr>	  
<?php	  
    foreach ($results as $r) {
?>

<tr>
<td><p>
<a href=<?php echo "../servicios/index.php?search=".$r["facturacredito"]; ?>>
<?php echo $r["facturacredito"]; ?></a></td>
<td><p><?php $date=date_create($r["fecha"]); echo date_format($date,"d/m/Y"); ?></td>
<td><p><?php echo $r["clientenombre"]; ?></td>
<td><p><?php echo $r["descripcion"]; ?></td>
<td><p><?php echo $r["falla"]; ?></td>
<td><p><?php echo $r["diagnostico"]; ?></td>
</tr>


<?php
  }
  }
?>
</table>
</div>
</body>