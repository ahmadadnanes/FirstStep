<?php 
function checkQuestionMark($inputString) {
    // Check if the input string contains '?'
    $questionMarkPos = strpos($inputString, '?');

    if ($questionMarkPos !== false) {
        // If '?' is found, check if there are characters after it
        if ($questionMarkPos < strlen($inputString) - 1) {
            // If characters exist after '?', return the input string without any change
            return $inputString;
        } else {
            // If no characters exist after '?', return the input string without '?'
            return str_replace('?', '', $inputString);
        }
    }

    // If '?' is not found, return the input string as is
    return $inputString;
}