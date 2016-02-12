<?php

  $dodaj = $mysql->dodaj_aktu($_POST["tytul"],$_POST["tresc"]);
  if ($dodaj == false) {
    header("location: ./index.php?pozycja=dodaj_aktu&typ4=false");
  }
  else {
  
    header("location: ./index.php?pozycja=dodaj_aktu&typ4=true");
  }













?>
