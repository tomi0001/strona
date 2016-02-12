<?php

$sciezka = mysql_escape_string($_GET["sciezka"]);

$sciezka2 = $baza->query("select sciezka,data from galeria where id = '$sciezka' ");
$sciezka2 = mysqli_fetch_array($sciezka2);

$data->oblicz_date($sciezka2[1]);
$sciezka2 = explode("./zdjecia_mini/",$sciezka2[0]);
$sciezka3 = "./zdjecia/" . $sciezka2[1];
//$baza = new baza;
print "<div class=tytul3><img src=$sciezka3 width=700></img><br><font class=normalna><b>Dodano </b>"
 . $data->data . "</font>


</div>";

$mysql->drukuj_kome("zdjecia",$sciezka);
/*
print ("<form method=post><div class=tytul3><font class=normalna>Dodaj komentarz</font></div>
<div class=tytul3><textarea id=kome rows=7 cols=55></textarea></div>
<input type=hidden id=id_aktu value=$sciezka>
<div class=tytul3><input type = \"button\" value =\"Dodaj komentarz\"
    onclick = \"getData2('dodaj_kome.php',
    'targetDiv')\"</div>
");
*/
if (galeria == "yes") {
if ( isset($_GET["id_kome"]) ) $id_kome = $_GET["id_kome"];
else $id_kome = 0;
print ("<form action=./index.php?pozycja=dodaj_kome method=post>
<div class=tytul3><font class=normalna>Dodaj komentarz</font></div>
<div class=tytul3><textarea name=kome rows=7 cols=55></textarea></div>
<input type=hidden name=id_aktu value=$sciezka>
<input type=hidden name=id_kome value=$id_kome>
<input type=hidden name=zdjecia value=zdjecia>
<input type=hidden name=aktu_kome value=gale_kome>

<div class=tytul3><input type=submit value=\"Dodaj komentarz\"></div>
");
if (isset($_COOKIE["typ3"]) ) {
  if ($_COOKIE["typ3"] == 1) print ("<div class=tytul3>Musisz coś wpisać w polu komentarza</div>");
  else print ("<div class=tytul3><font class=normalna> komentarz został dodany poprawnie</font></div>");
}
}
print ("<br><br>");








?>
