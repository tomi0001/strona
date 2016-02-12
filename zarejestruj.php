<?php
  require("./clasy/mysql.php");
  require("./clasy/user.php");
  
  $login =   mysql_escape_string($_GET["login"]);
  $haslo3 =  mysql_escape_string($_GET["haslo"]);
  $haslo4 =  mysql_escape_string($_GET["haslo2"]);
  //$baza = new baza;
  //$baza->polacz_z_baza();
  $user2 = new user;
  if ($login == "") print "Podaj Login<br>";
  if ($haslo3 == "") print "Wpisz hasło<br>";
  if ($user2->sprawdz_czy_jest_juz_taki_uzytkownik($login) == false ) print "Jest już podany login wybierz inny<br>";
  if ($haslo3 != $haslo4) print "Podane hasła się różnią<br>";
  if (strlen($haslo3) <= 5 or strlen($haslo4) <= 5)  print "Hasło powinno mieć przynajmniej 5 znaków";
  else if ($user2->sprawdz_czy_jest_juz_taki_uzytkownik($login) == true and $login != "") {
    //print $login;
    $haslo = sha1($haslo3);
    $user2->dodaj_usera($login,$haslo);
    print "<font color=green>Poprawnie dodałeś użytkownika</font>";
  }
//print "<font color=green>dobrze</font>";



//print $haslo;

 

?>
