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
        echo "<form action='Zad3a.php' method='post'>";

        
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

        echo "<button type='submit'>Zakończ rezerwację</button>";
        echo "</form>";
        exit;
    }

   
    $dodatkowe_osoby = "";
    if ($osoby > 1 && isset($_POST['imie_osoba'])) {
        $imiona_osob = $_POST['imie_osoba'];
        $nazwiska_osob = $_POST['nazwisko_osoba'];
        for ($i = 0; $i < count($imiona_osob); $i++) {
            $dodatkowe_osoby .= $imiona_osob[$i] . " " . $nazwiska_osob[$i] . " | ";
        }
    }

    
    $plik_csv = "rezerwacje.csv";
    $dodaj_naglowek = !file_exists($plik_csv);
    $uchwyt = fopen($plik_csv, "a");

    if ($uchwyt) {
        if ($dodaj_naglowek) {
            $naglowki = [
                "Imię", "Nazwisko", "Email", "Adres", "Karta", "Osoby",
                "Data przyjazdu", "Data wyjazdu", "Godzina", "Dostawka",
                "Udogodnienia", "Pozostałe osoby"
            ];
            fputcsv($uchwyt, $naglowki, ";");
        }

        $dane = [
            $imie,
            $nazwisko,
            $email,
            $adres,
            "****" . substr($karta_kredytowa, -4),
            $osoby,
            $data_przyjazdu,
            $data_wyjazdu,
            $godzina_przyjazdu,
            $dostawka,
            implode(", ", $udogodnienia),
            $dodatkowe_osoby
        ];
        fputcsv($uchwyt, $dane, ";");
        fclose($uchwyt);
        echo "<h2>Rezerwacja została zapisana pomyślnie!</h2>";
    } else {
        echo "Błąd zapisu do pliku.";
    }

    echo "<br><a href='Zad3.html'>Powrót do formularza</a>";
}
?>
