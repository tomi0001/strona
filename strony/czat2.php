
<meta http-equiv="refresh" content="2"; > 

<?php
    setcookie("user","", time()- 3153600);
    setcookie("haslo","", time()- 3153600);
    setcookie("typ","",time()- 3153600);
    setcookie("kolor","",time()- 3153600);
$plik = fopen('./czat.txt','r');

// przypisanie zawartości do zmiennej
//$zawartosc = fgets($plik, 8192);
$licznik = 0;
while(!feof($plik))
{
   $linia = fgets($plik);
   $zawartosc[$licznik] = $linia;
   $licznik++;
}

//print $nowy_user->user;
$wynik = $licznik - 60;
$i = 0;
while ($i <= $licznik) {
  $zawartosc[$i] = str_replace("\n","<br>",$zawartosc[$i]);
  if ($i >= $wynik) {
    print $zawartosc[$i];
  }
  $i++;
}

?>
