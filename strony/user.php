<?php

if (uzytkownicy != "yes") print ("<div class=tytul3>Nie masz dostępu do tej części strony</div>");
else {
  if ( !isset($_GET["granicznik"]) ) {
    $granicznik = 0;
  }
  else {
    $granicznik = mysql_escape_string($_GET["granicznik"]);
  }
  $ilosc_wynikow = ilosc_wynikow;
  if (!isset($_GET["sort"]) or $_GET["sort"] == "") {
    
    //$_GET["sort"] = " order by login ";
    $zapytanie = "select login,data,data_ostatniego from user" . " order by login " . "LIMIT $granicznik, $ilosc_wynikow";
  }
  /*wiem, że takie podejście jest głupie, ale inaczej to nie działa jak np. skonstruuję zapytanie 
  $zapytanie = "select login,data,data_ostatniego from user" .  "order by " .  $_GET["sort"] .  "LIMIT $granicznik, $ilosc_wynikow";
  to nie działa */
  else if ($_GET["sort"] == "login") {
    //$sortowanie =  mysql_escape_string($_GET["sort"]);
    //$sortowanie =  "ORDER BY " . $sortowanie . " DESC ";
    $zapytanie = "select login,data,data_ostatniego from user" . " order by login " . "LIMIT $granicznik, $ilosc_wynikow";
    
  }
  else if ($_GET["sort"] == "data") {
    //$sortowanie =  mysql_escape_string($_GET["sort"]);
    //$sortowanie =  "ORDER BY " . $sortowanie . " DESC ";
    $zapytanie = "select login,data,data_ostatniego from user" . " order by data DESC " . "LIMIT $granicznik, $ilosc_wynikow";
    
  }
    else if ($_GET["sort"] == "data_ostatniego") {
    //$sortowanie =  mysql_escape_string($_GET["sort"]);
    //$sortowanie =  "ORDER BY " . $sortowanie . " DESC ";
    $zapytanie = "select login,data,data_ostatniego from user" . " order by data_ostatniego " . "LIMIT $granicznik, $ilosc_wynikow";
    
  }
  //$zapytanie = "select login,data,data_ostatniego from user" . $_GET["sort"] . "LIMIT $granicznik, $ilosc_wynikow";
  $wybierz_userow = $baza->query($zapytanie);
  print ("<table width=700 align=center>
	  <tr><td class=reje><a class=normalna href=./index.php?pozycja=user&sort=login>Login</a></td><td class=reje><a class=normalna href=./index.php?pozycja=user&sort=data>Data Rejestracji</a></td><td class=reje2><a class=normalna href=./index.php?pozycja=user&sort=data_ostatniego>Data data ostatniego pobytu</a></td>
  
  ");
  while ($zapytanie2 = mysqli_fetch_array($wybierz_userow) ) {
  $rejestracja = $data->oblicz_date($zapytanie2[1]);
    print ("<tr>
	    <td class=reje><div class=tytul2><font class=normalna>$zapytanie2[0]</font></div></td><td class=reje><font class=normalna>" . $data->data . "
	    
	    
	    
	    ");
	    
	    $data->oblicz_date($zapytanie2[2]);
	    print ("</font></td><td class=reje><font class=normalna>" . $data->data  . "</font></td>
	    </tr>");
  
  
  
  
  
  
  }
  $mysql->drukuj_odno("select count(*) from user",ilosc_wynikow,"user");
  
  
  
  
  
  
  
}















?>
