<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $liczba1 = (float) $_POST['liczba1'];
    $liczba2 = (float) $_POST['liczba2'];
    $dzialanie = $_POST['dzialanie'];
    $wynik = 0;

    switch ($dzialanie) {
        case "dodawanie":
            $wynik = $liczba1 + $liczba2;
            break;
        case "odejmowanie":
            $wynik = $liczba1 - $liczba2;
            break;
        case "mnozenie":
            $wynik = $liczba1 * $liczba2;
            break;
        case "dzielenie":
            if ($liczba2 != 0) {
                $wynik = $liczba1 / $liczba2;
            } else {
                echo "Błąd: Nie można dzielić przez zero!";
                exit;  
            }
            break;
        default:
            echo "Nieznane działanie.";
            exit;
    }

    // Wyświetlenie wyniku
    echo "<h1>Wynik: $wynik</h1>";
}
?>
