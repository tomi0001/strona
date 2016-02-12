<?php

  if ( !isset($_GET["granicznik"]) ) {
    $granicznik = 0;
  }
  else {
    $granicznik = mysql_escape_string($_GET["granicznik"]);
  }
  $ilosc_wynikow = ilosc_wynikow_gale;
$zapytanie = $baza->query("select sciezka,id from galeria LIMIT $granicznik, $ilosc_wynikow");

print ("<table border=0 align=center width=400>");
for ($i = 0;$zapytanie2 = mysqli_fetch_array($zapytanie);$i++) {
  if ($i % 4 == 0) print ("<tr></tr>");
  
  print ("<td><a href=./index.php?pozycja=gale_kome&sciezka=$zapytanie2[1]><img src=$zapytanie2[0] width=150></a></td>");


  


}
print ("</table>");
$mysql->drukuj_odno("select count(*) from galeria",ilosc_wynikow_gale,"gale");







?>
