<?php

$user = $nowy_user->sprawdz_czy_zalogowany();

if ($user != 2) {
  print ("<div class=tytul3>Nie masz dostępu do tej części strony</div>");
}
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
    $zapytanie = "select ip,http_user,os,browser,data,user,co_robil from statystyki" . " order by ip " . "LIMIT $granicznik, $ilosc_wynikow";
  }
  else if ($_GET["sort"] == "ip") {
    
    //$_GET["sort"] = " order by login ";
    $zapytanie = "select ip,http_user,os,browser,data,user,co_robil from statystyki" . " order by ip " . "LIMIT $granicznik, $ilosc_wynikow";
  }
  /*wiem, Ĺźe takie podejĹcie jest gĹupie, ale inaczej to nie dziaĹa jak np. skonstruujÄ zapytanie 
  $zapytanie = "select login,data,data_ostatniego from user" .  "order by " .  $_GET["sort"] .  "LIMIT $granicznik, $ilosc_wynikow";
  to nie dziaĹa */
  else if ($_GET["sort"] == "os") {
    //$sortowanie =  mysql_escape_string($_GET["sort"]);
    //$sortowanie =  "ORDER BY " . $sortowanie . " DESC ";
    $zapytanie = "select ip,http_user,os,browser,data,user,co_robil from statystyki" . " order by os " . "LIMIT $granicznik, $ilosc_wynikow";
    
  }
  else if ($_GET["sort"] == "browser") {
    //$sortowanie =  mysql_escape_string($_GET["sort"]);
    //$sortowanie =  "ORDER BY " . $sortowanie . " DESC ";
    $zapytanie = "select ip,http_user,os,browser,data,user,co_robil from statystyki" . " order by browser " . "LIMIT $granicznik, $ilosc_wynikow";
    
  }
  else if ($_GET["sort"] == "data") {
    //$sortowanie =  mysql_escape_string($_GET["sort"]);
    //$sortowanie =  "ORDER BY " . $sortowanie . " DESC ";
    $zapytanie = "select ip,http_user,os,browser,data,user,co_robil from statystyki" . " order by data DESC " . "LIMIT $granicznik, $ilosc_wynikow";
    
  }
    else if ($_GET["sort"] == "user") {
    //$sortowanie =  mysql_escape_string($_GET["sort"]);
    //$sortowanie =  "ORDER BY " . $sortowanie . " DESC ";
    $zapytanie = "select ip,http_user,os,browser,data,user,co_robil from statystyki" . " order by user " . "LIMIT $granicznik, $ilosc_wynikow";
    
  }
   else if ($_GET["sort"] == "co_robil") {
    //$sortowanie =  mysql_escape_string($_GET["sort"]);
    //$sortowanie =  "ORDER BY " . $sortowanie . " DESC ";
    $zapytanie = "select ip,http_user,os,browser,data,user,co_robil from statystyki" . " order by co_robil " . "LIMIT $granicznik, $ilosc_wynikow";
    
  }
  //$zapytanie = "select login,data,data_ostatniego from user" . $_GET["sort"] . "LIMIT $granicznik, $ilosc_wynikow";
  $wybierz_userow = $baza->query($zapytanie);
  print ("<table width=700 align=center>
	  <tr><td class=reje  width=10%><a class=normalna href=./index.php?pozycja=staty&sort=ip>IP</a></td><td class=reje><a class=normalna href=./index.php?pozycja=staty&sort=os>System operacyjny</a></td><td class=reje2><a class=normalna href=./index.php?pozycja=staty&sort=browser>Przeglądarka</a></td><td class=reje2><a class=normalna href=./index.php?pozycja=staty&sort=data>data</a></td><td class=reje2><a class=normalna href=./index.php?pozycja=staty&sort=user>Użytkownik</a></td>
	  <td class=reje2><a class=normalna href=./index.php?pozycja=staty&sort=co_robil>Co robił</a></td>
  
  ");
  while ($zapytanie2 = mysqli_fetch_array($wybierz_userow) ) {
  $data->oblicz_date($zapytanie2[4]);
    print ("<tr>
	    <td class=reje width=10%><div class=tytul2><font class=normalna>$zapytanie2[0]</font></div></td>
	    <td class=reje><div class=tytul2><font class=normalna title=\"$zapytanie2[1]\">$zapytanie2[2]</font></div></td>
	    <td class=reje><div class=tytul2><font class=normalna title=\"$zapytanie2[1]\">$zapytanie2[3]</font></div></td>
	    <td class=reje><font class=normalna>" . $data->data . "
	    
	    
	    
	    ");
	    
	    
	    print ("</font></td><td class=reje><font class=normalna>$zapytanie2[5]</font></td><td class=reje><font class=normalna>$zapytanie2[6]</font></td>
	    </tr>");
  
  
  
  
  
  
  }
  $mysql->drukuj_odno("select count(*) from statystyki",ilosc_wynikow,"staty");
  
  
  
  
  
  
  
}















?>
