<?php
spl_autoload_register(function ($class) {
    include 'app/classes/' . $class . '.php';
});
