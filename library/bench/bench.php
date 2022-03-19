<?php
header('Content-Type: application/json');
require_once 'bench-class.php';
$result = benchmark::run();
echo json_encode($result);
?>