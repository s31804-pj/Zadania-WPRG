<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $imie = $_POST['imie'];
    $nazwisko = $_POST['nazwisko'];
    $email = $_POST['email'];

    $linia = "$imie $nazwisko, $email\n";

    $plik = "dane.txt";

    $uchwyt = fopen($plik, "a");

    if ($uchwyt) {
        fwrite($uchwyt, $linia);
        fclose($uchwyt);
        echo "<h2>Dane zostały zapisane!</h2>";
    } else {
        echo "Błąd podczas otwierania pliku.";
    }

    echo "<a href='Zad2.html'>Powrót do formularza</a>";
} else {
    echo "Nieprawidłowe żądanie.";
}
?>
