<?php
$db = new PDO('mysql:host=localhost;dbname=tickit;charset=utf8', 'root', '7dFx794r');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
?>