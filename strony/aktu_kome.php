<?php

$id_aktu = mysql_escape_string($_GET["id_aktu"]);


$zapytanie = $baza->query("select tytul,tresc,data from aktualnosci where id = '$id_aktu' ");
$zapytanie = mysqli_fetch_array($zapytanie);

    $data->oblicz_date($zapytanie[2]);
    $komentarze = $baza->query("select count(*) from komentarze where id_aktu = '$id_aktu' ");
    $komentarze = mysqli_fetch_array($komentarze);

  print ("<table border=0 align=center width=550>");

    print ("
	    <tr>
	    <td colspan=2><b><font class=normalna>$zapytanie[0]</font></b></td>
	    </tr>
	    <tr>
	    <td colspan=2><font class=normalna2>$zapytanie[1]</font>
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





  print ("</table>");


$mysql->drukuj_kome("aktu",$id_aktu);
if (aktualnosci == "yes") {

if ( isset($_GET["id_kome"]) ) $id_kome = $_GET["id_kome"];
else $id_kome = 0;
print ("<form action=./index.php?pozycja=dodaj_kome method=post>
<div class=tytul3><font class=normalna>Dodaj komentarz</font></div>
<div class=tytul3><textarea name=kome rows=7 cols=55></textarea></div>
<input type=hidden name=id_aktu value=$id_aktu>
<input type=hidden name=id_kome value=$id_kome>
<input type=hidden name=zdjecia value=aktu>
<input type=hidden name=aktu_kome value=aktu_kome>
<input type=hidden name=aktu value=id_aktu>
<div class=tytul3><input type=submit value=\"Dodaj komentarz\"></div>
");
if (isset($_COOKIE["typ3"]) ) {
  if ($_COOKIE["typ3"] == 1) print ("<div class=tytul3>Musisz coś wpisać w polu komentarza</div>");
  else print ("<div class=tytul3><font class=normalna> komentarz został dodany poprawnie</font></div>");
}
}
print ("<br><br>");



?>
