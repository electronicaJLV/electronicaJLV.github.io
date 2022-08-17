<?php
// (A) DATABASE CONFIG - CHANGE TO YOUR OWN!
define('DB_HOST', 'localhost');
define('DB_NAME', 'electronica villacorta');
define('DB_CHARSET', 'utf8');
define('DB_USER', 'root');
define('DB_PASSWORD', '11887760');

// (B) CONNECT TO DATABASE
try {
  $pdo = new PDO(
    "mysql:host=".DB_HOST.";charset=".DB_CHARSET.";dbname=".DB_NAME,
    DB_USER, DB_PASSWORD, [
       PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]
  );
} catch (Exception $ex) { exit($ex->getMessage()); }
if (isset($_POST['search'])){$valor=$_POST['search'];}
if (isset($_GET['search'])){$valor=$_GET['search'];}
$valor=(int)$valor;//evita error de valor de string
$stmt = $pdo->prepare("SELECT * FROM cargo WHERE servicio = 1 AND facturacredito = ".$valor." ORDER BY descripcion ASC");
$stmt->execute(["%".$valor."%"]);
$results = $stmt->fetchAll();
if (isset($_POST['ajax'])) { echo json_encode($results); }
////////////////////////////////////////////////////////////
if (count($results)>0){ //evita error de variable vacia
$stmt = $pdo->prepare("SELECT * FROM cliente WHERE referencia = ".$results[0]['clientereferencia']);
$stmt->execute();
$cliente = $stmt->fetchAll();
if (isset($_POST['ajax'])) { echo json_encode($cliente); }
}