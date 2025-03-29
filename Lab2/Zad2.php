<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $imie =($_POST['imie']);
    $nazwisko = ($_POST['nazwisko']);
    $email = ($_POST['email']);
    $adres = ($_POST['adres']);
    $karta_kredytowa = ($_POST['karta_kredytowa']);
    $osoby = ($_POST['osoby']);
    $data_przyjazdu = ($_POST['data_przyjazdu']);
    $data_wyjazdu = ($_POST['data_wyjazdu']);
    $godzina_przyjazdu = ($_POST['godzina_przyjazdu']);
    $dostawka = isset($_POST['dostawka']) ? "Tak" : "Nie";
    $udogodnienia = isset($_POST['udogodnienia']) ? $_POST['udogodnienia'] : [];

    
    if ($data_przyjazdu >= $data_wyjazdu) {
        echo "Błąd: Data wyjazdu musi być późniejsza niż data przyjazdu!";
        exit;
    }

    
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
            echo "<li>" . ($udogodnienie) . "</li>";
        }
        echo "</ul>";
    } else {
        echo "Brak dodatkowych udogodnień.";
    }

    echo "<br><br>Dziękujemy za dokonanie rezerwacji!";
}
?>
