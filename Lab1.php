<!-- Zadanie 1 -->

<!-- <?php
$owoce = array ("mango", "papaja", "banan", "aronia");
foreach($owoce as $owoc){
    $owocrev="";
    for($a=strlen($owoc)-1; $a>=0; $a--){
        $owocrev.=$owoc[$a];
    }
if($owoc[0]=='p'){
echo ("Owoc zaczyna się na literę p.\n");
echo($owoc . " od tyłu to " . $owocrev ."\n");
} else {
    echo ("Owoc nie zaczyna się na literę p.\n");
    echo($owoc . " od tyłu to " . $owocrev . "\n");
}

}
?>  -->

<!-- Zadanie 2 -->

<!-- <?php
function czyLiczbaPierwsza($liczba) {
    if ($liczba < 2) {
        return false;
    }
    for ($i = 2; $i * $i <= $liczba; $i++) {
        if ($liczba % $i == 0) {
            return false;
        }
    }
    return true;
}

function wypiszLiczbyPierwsze($poczatek, $koniec) {
    echo "Liczby pierwsze w zakresie $poczatek - $koniec: \n";
    for ($i = $poczatek; $i <= $koniec; $i++) {
        if (czyLiczbaPierwsza($i)) {
            echo $i . " ";
        }
    }
    echo "\n";
}


$poczatek = 10;
$koniec = 50;
wypiszLiczbyPierwsze($poczatek, $koniec);
?> -->


<!-- Zadanie 3 -->

<!-- <?php
function fibonacci($n) {
    if ($n < 1) {
        echo "N musi być większe od 0.\n";
        return;
    }

    $fibo = [0, 1];

    
    for ($i = 2; $i < $n; $i++) {
        $fibo[$i] = $fibo[$i - 1] + $fibo[$i - 2];
    }

    $numerLinii = 1;
    foreach ($fibo as $wartosc) {
        if ($wartosc % 2 != 0) {
            echo "$numerLinii: $wartosc\n";
            $numerLinii++;
        }
    }
}

$n = 10; 
fibonacci($n);
?> -->



<!-- Zadanie 3 -->

<!-- <?php

$tekst = "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum."
;

$interpunkcja = ['.', ',', '\'', '"', '!', '?', ';', ':', '(', ')', '-', '—'];

$czystyTekst = "";
for ($i = 0; $i < strlen($tekst); $i++) {
    $char = $tekst[$i];

    
    $czyInterpunkcja = false;
    for ($j = 0; $j < count($interpunkcja); $j++) {
        if ($char === $interpunkcja[$j]) {
            $czyInterpunkcja = true;
            break; 
        }
    }

    if (!$czyInterpunkcja) {
        $czystyTekst .= $char; 
    }
}


$slowa = explode(" ", $czystyTekst );

print_r($slowa);

$tablicaAsocjacyjna = [];
foreach ($slowa as $index => $slowo) {
    if (($index % 2 != 0) && isset($slowa[$index + 1])) { 
        $tablicaAsocjacyjna[$slowo] = $slowa[$index + 1];
    }
}


foreach ($tablicaAsocjacyjna as $klucz => $wartosc) {
    echo "$klucz => $wartosc\n";
}

?>
 -->