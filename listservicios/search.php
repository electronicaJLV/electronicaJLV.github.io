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

// (C) SEARCH
//$stmt = $pdo->prepare("SELECT * FROM `inventario` WHERE descripcion LIKE ? OR codigodebarras LIKE ? ORDER BY descripcion ASC");
$stmt = $pdo->prepare("SELECT * FROM cargo WHERE servicio = 1 ORDER BY descripcion ASC");
$stmt->execute();
$results = $stmt->fetchAll();
if (isset($_POST['ajax'])) { echo json_encode($results); }