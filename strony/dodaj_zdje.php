<!DOCTYPE html>
<html>
<body>

<form action="./index.php?pozycja=zapisz_zdjecie" method="post" enctype="multipart/form-data">
    <font class=normalna>Wybierz zdjęcie</font>
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Załącz zdjęcie" name="submit">
</form>
<?php
  
  if (isset($_COOKIE["typ2"]) ) {
    $typ = $_COOKIE["typ2"];
    if ($typ == 1 or $typ == 3) print ("<div class=tytul3>Nie udało się przesłać zdjęcia</div>");
    if ($typ == 2) print ("<div class=tytul3>Już jest plik o podanej nazwie wybierz inny</div>");
    if ($typ == 5) print ("<div class=tytul3>Plik musi mieć rozszerzenie .jpg .png .gif .jpeg </div>");
    if ($typ == 4) print ("<div class=tytul3>Za duży rozmiar pliku </div>");
    else if ($typ != 1 and $typ != 2 and $typ != 3 and $typ != 4 and $typ != 5) {
      print ("<div class=tytul2><font class=normalna>Pomyślnie przesłano zdjęcie </font></div>");
    }
  }





?>
</body>
</html> 
