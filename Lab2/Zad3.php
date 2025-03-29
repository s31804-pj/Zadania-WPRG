<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $imie = $_POST['imie'];
    $nazwisko = $_POST['nazwisko'];
    $email = $_POST['email'];
    $adres = $_POST['adres'];
    $karta_kredytowa = $_POST['karta_kredytowa'];
    $osoby = (int) $_POST['osoby'];
    $data_przyjazdu = $_POST['data_przyjazdu'];
    $data_wyjazdu = $_POST['data_wyjazdu'];
    $godzina_przyjazdu = $_POST['godzina_przyjazdu'];
    $dostawka = isset($_POST['dostawka']) ? "Tak" : "Nie";
    $udogodnienia = isset($_POST['udogodnienia']) ? $_POST['udogodnienia'] : [];

    
    if (!isset($_POST['imie_osoba']) && $osoby > 1) {
        echo "<h1>Podaj dane pozostałych osób</h1>";
        echo "<form action='Zad3.php' method='post'>";
        
        
        echo "<input type='hidden' name='imie' value='$imie'>";
        echo "<input type='hidden' name='nazwisko' value='$nazwisko'>";
        echo "<input type='hidden' name='email' value='$email'>";
        echo "<input type='hidden' name='adres' value='$adres'>";
        echo "<input type='hidden' name='karta_kredytowa' value='$karta_kredytowa'>";
        echo "<input type='hidden' name='osoby' value='$osoby'>";
        echo "<input type='hidden' name='data_przyjazdu' value='$data_przyjazdu'>";
        echo "<input type='hidden' name='data_wyjazdu' value='$data_wyjazdu'>";
        echo "<input type='hidden' name='godzina_przyjazdu' value='$godzina_przyjazdu'>";
        echo "<input type='hidden' name='dostawka' value='$dostawka'>";

        foreach ($udogodnienia as $u) {
            echo "<input type='hidden' name='udogodnienia[]' value='$u'>";
        }

       
        for ($i = 1; $i < $osoby; $i++) {
            echo "<h3>Osoba " . ($i + 1) . "</h3>";
            echo "Imię: <input type='text' name='imie_osoba[]' required><br><br>";
            echo "Nazwisko: <input type='text' name='nazwisko_osoba[]' required><br><br>";
        }

        echo "<button type='submit'>Przejdź do podsumowania</button>";
        echo "</form>";
        exit;
    }

    // Krok 2: Podsumowanie
    echo "<h1>Podsumowanie Twojej Rezerwacji</h1>";

    echo "<h3>Dane osoby rezerwującej:</h3>";
    echo "Imię: $imie <br>";
    echo "Nazwisko: $nazwisko <br>";
    echo "E-mail: $email <br>";
    echo "Adres: $adres <br>";
    echo "Numer karty kredytowej: **** **** **** " . substr($karta_kredytowa, -4) . " <br>";

    echo "<h3>Szczegóły pobytu:</h3>";
    echo "Ilość osób: $osoby <br>";
    echo "Data przyjazdu: $data_przyjazdu <br>";
    echo "Data wyjazdu: $data_wyjazdu <br>";
    echo "Godzina przyjazdu: $godzina_przyjazdu <br>";
    echo "Potrzebuję dostawki dla dziecka: $dostawka <br>";

    echo "<h3>Wybrane udogodnienia:</h3>";
    if (!empty($udogodnienia)) {
        echo "<ul>";
        foreach ($udogodnienia as $udogodnienie) {
            echo "<li>$udogodnienie</li>";
        }
        echo "</ul>";
    } else {
        echo "Brak dodatkowych udogodnień.";
    }

    
    if ($osoby > 1 && isset($_POST['imie_osoba'])) {
        echo "<h3>Dodatkowe osoby:</h3>";
        $imiona_osob = $_POST['imie_osoba'];
        $nazwiska_osob = $_POST['nazwisko_osoba'];
        for ($i = 0; $i < count($imiona_osob); $i++) {
            echo "Osoba " . ($i + 2) . ": " . $imiona_osob[$i] . " " . $nazwiska_osob[$i] . "<br>";
        }
    }

    echo "<br><br>Dziękujemy za dokonanie rezerwacji!";
}
?>
