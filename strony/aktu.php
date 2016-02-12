<?php

  if ( !isset($_GET["granicznik"]) ) {
    $granicznik = 0;
  }
  else {
    $granicznik = mysql_escape_string($_GET["granicznik"]);
  }


  $ilosc_wynikow = ilosc_wynikow_aktu;

  $zapytanie = $baza->query("select tytul,tresc,data,id from aktualnosci order by data DESC LIMIT $granicznik, $ilosc_wynikow");

  print ("<table border=0 align=center width=550>");

  while ($zapytanie2 = mysqli_fetch_array($zapytanie) ) {
    
    $data->oblicz_date($zapytanie2[2]);
    $komentarze = $baza->query("select count(*) from komentarze where id_aktu = '$zapytanie2[3]' ");
    $komentarze = mysqli_fetch_array($komentarze);
    
    $br = substr_count ($zapytanie2[1], "<br />");
    $ilosc_char = strlen($zapytanie2[1]);
    if ($br >= 10) {
      $utnij =  substr ($zapytanie2[1] , 0, 70 );
      $utnij .= "...";
    }
    else if ($ilosc_char >= 1000) {
      $utnij =  substr ($zapytanie2[1] , 0, 1000 );
      $utnij .= "...";
    }
    else {
      $utnij = $zapytanie2[1];
    }
    print ("
	    <tr>
	    <td colspan=2><b><font class=normalna><a class= zwykla href=./index.php?pozycja=aktu_kome&id_aktu=$zapytanie2[3]>$zapytanie2[0]</a></font></b></td>
	    </tr>
	    <tr>
	    <td colspan=2><font class=normalna2>$utnij</font>
	    </td>
	    </tr>
	    <tr>
	    <td>
	    <font class=normalna2>Ilość komentarzy $komentarze[0]</font>
	    </td>
	    <td>
	    <font class=normalna2><div align=right>" . $data->data . "</div></font>
	    </td>
	    </tr>
	    <tr>
	    <td colspan=2>
	    <hr width=70% color=blue>
	    </td>
	    
	    </tr>    
    
	  
    
    ");
    
    
    
    
    
    
    
    
    
    
  }


  print ("</table>");
$mysql->drukuj_odno("select count(*) from aktualnosci",ilosc_wynikow_aktu,"aktu");


?>
