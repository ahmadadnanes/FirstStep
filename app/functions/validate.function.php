<?php 
function validate(string $text ):string {
    $text = trim($text);
    $text = htmlspecialchars($text);
    return $text;
}