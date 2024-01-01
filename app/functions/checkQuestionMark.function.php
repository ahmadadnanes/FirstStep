<?php
function checkQuestionMark($inputString)
{
    // Check if the input string contains '?'
    $questionMarkPos = strpos($inputString, '?');

    if ($questionMarkPos !== false) {
        // If '?' is found, check if there are characters after it
        if ($questionMarkPos < strlen($inputString) - 1) {
            // If characters exist after '?', return the input string without any change
            return $inputString;
        } else {
            // If no characters exist after '?', return the input string without '?'
            $withOutQuestionMark = str_replace('?', '', $inputString);
            $firstSlashPos = strpos($withOutQuestionMark, '/');
            if ($firstSlashPos !== false) {
                // Find the position of the second '/'
                $secondSlashPos = strpos($withOutQuestionMark, '/', $firstSlashPos + 1);
                if ($secondSlashPos !== false) {
                    // Remove the second '/'
                    $outputString = substr_replace($withOutQuestionMark, '', $secondSlashPos, 1);
                    return $outputString;
                }
            } else {
                return $withOutQuestionMark;
            }
        }
    }

    // If '?' is not found, return the input string as is
    return $inputString;
}
