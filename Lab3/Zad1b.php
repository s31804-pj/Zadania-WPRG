<?php
function dodawanie($a, $b) {
    return $a + $b;
}

function odejmowanie($a, $b) {
    return $a - $b;
}

function mnożenie($a, $b) {
    return $a * $b;
}

function dzielenie($a, $b) {
    if ($b == 0) {
        return "Błąd: Nie można dzielić przez zero!";
    }
    return $a / $b;
}
?>
