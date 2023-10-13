<?php
$uri = $_SERVER["REQUEST_URI"];

if ($uri === '/') {
    require '../index.php';
}
