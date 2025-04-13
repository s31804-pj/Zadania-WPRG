<?php
$plik_csv = "rezerwacje.csv";

if (file_exists($plik_csv)) {
    echo "<h1>Lista Rezerwacji</h1>";
    echo "<table border='1' cellpadding='10'>";

    $uchwyt = fopen($plik_csv, "r");

    while (($wiersz = fgetcsv($uchwyt, 1000, ";")) !== false) {
        echo "<tr>";
        foreach ($wiersz as $komorka) {
            echo "<td>" . $komorka . "</td>";
        }
        echo "</tr>";
    }

    fclose($uchwyt);
} else {
    echo "Brak danych do wyświetlenia.";
}
?>
