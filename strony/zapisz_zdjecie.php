<?php

$user = $nowy_user->sprawdz_czy_zalogowany();

if ($user != 2) {
  print ("<div class=tytul3>Nie masz dostêpu do tej czê¶ci strony</div>");
}
else {
  
  
  
  $plik = new plik;
  $plik2 = $plik->zapisz_plik("fileToUpload");
  $plik3 = $plik->zmiejsz_plik( $_FILES["fileToUpload"]["name"], szerokosc);
  $plik2 = mysql_escape_string($plik2);
  //print $plik2;
  setcookie("typ2",$plik2,time()+ 1000);
  
  
  if ($plik2 != 5 and $plik2 != 4 and $plik2 != 3 and $plik2 != 2 and $plik2 != 1) $plik->zapisz_plik_w_bazie($plik2);
  
  header("location: ./index.php?pozycja=dodaj_zdje");


}


?>
