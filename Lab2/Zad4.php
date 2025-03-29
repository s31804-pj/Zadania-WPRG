<?php
function czy_liczba_pierwsza($n, &$iteracje) {
    $iteracje = 0;

    if ($n < 2) return false;  
    if ($n == 2) return true;  
    if ($n % 2 == 0) return false;  

    $pierwiastek = sqrt($n);
    
    for ($i = 3; $i <= $pierwiastek; $i += 2) {
        $iteracje++;
        if ($n % $i == 0) {
            return false;
        }
    }
    return true;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $liczba = $_POST['liczba'];

    
        $liczba = (int) $liczba;
        $iteracje = 0;
        $wynik = czy_liczba_pierwsza($liczba, $iteracje);

        echo "<h2>Wynik</h2>";
        echo "<p>Liczba <strong>$liczba</strong> " . ($wynik ? "jest" : "nie jest") . " liczbą pierwszą.</p>";
        echo "<p>Wykonano <strong>$iteracje</strong> iteracji.</p>";
    }

?>
