<?php

$user = $nowy_user->sprawdz_czy_zalogowany();

if ($user != 2) {
  print ("<div class=tytul3>Nie masz dostępu do tej części strony</div>");
}
else {
  print ("
    <table width=600 align=center>
    <tr>
    <td>
    <form action=./index.php?pozycja=dodaj_aktu2 method=post>
    <font class=text>Tytul</font><input type=text name=tytul size=70>
    </td>
    </tr>
    <tr>
    <td>
    <div class=tytul2><font class=text>Treść</font></div><br>
    <textarea name=tresc cols=80 rows=20></textarea>
    </td>
    </tr>
    <tr>
    <td>
    <div class=tytul2><input type=submit value=Dodaj></div>
    </td>
    </tr><tr><td>");
    if ( isset($_GET["typ4"]) and $_GET["typ4"] == "false") {
      print ("<div class=tytul3>Musisz uzupełnić pole tytul i treść</div>");
    }
    else if ( isset($_GET["typ4"]) and $_GET["typ4"] == "true" ) {
      print ("<div class=tytul=2>Pomyślnie dodałeś aktualność</div>");
    }
  
    print ("</td></tr>
    </table>
  ");
  








}



















?>
