<?php
require 'Zad1b.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $liczba1 = (float) $_POST['liczba1'];
    $liczba2 = (float) $_POST['liczba2'];
    $dzialanie = $_POST['dzialanie'];
    $wynik = 0;

    switch ($dzialanie) {
        case "dodawanie":
            $wynik = dodawanie($liczba1, $liczba2);
            break;
        case "odejmowanie":
            $wynik = odejmowanie($liczba1, $liczba2);
            break;
        case "mnozenie":
            $wynik = mnożenie($liczba1, $liczba2);
            break;
        case "dzielenie":
            $wynik = dzielenie($liczba1, $liczba2);
            if (!is_numeric($wynik)) {
                echo $wynik; 
                exit;
            }
            break;
        default:
            echo "Nieznane działanie.";
            exit;
    }

    echo "<h1>Wynik: $wynik</h1>";
}
?>
