<?php


class plik {
  public function zapisz_plik_w_bazie($nazwa_pliku) {
    global $baza;
    $data = time();
    $baza->query("insert into galeria(sciezka,data) values ('$nazwa_pliku','$data') ");
  }

  public function zapisz_plik($nazwa_pliku) {
  
    $target_dir = "./zdjecia/";
    $target_file = $target_dir . basename($_FILES[$nazwa_pliku]["name"]);
    $plik = "./zdjecia_mini/" . basename($_FILES[$nazwa_pliku]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
      $check = getimagesize($_FILES[$nazwa_pliku]["tmp_name"]);
      if($check === false) {
	return 3;
      }
    }
    // Check if file already exists
    if (file_exists($target_file)) {
      //echo "Sorry, file already exists.";
      return 2;
      $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 50000000) {
      return 4;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
      return 5;
    }
    // Check if $uploadOk is set to 0 by an error

    if (move_uploaded_file($_FILES[$nazwa_pliku]["tmp_name"], $target_file)) {
	  return $plik;
    } else {
	  return 1;
    }
    
  

  
  }

  
  function zmiejsz_plik( $plik, $szerokosc) {
    // pobieramy rozszerzenie pliku, na tej podstawie
    // korzystamy potem z odpowiednich funkcji GD
    $i = explode(".", $plik);
    $plik2 = "./zdjecia_mini/" . $plik;
    $plik = "./zdjecia/" . $plik;

    // rozszerzeniem pliku jest ostatni element tablicy $i
    $rozszerzenie = end($i);

    // jeśli nie mamy jpega, gifa lub png zwracamy false.
    if($rozszerzenie !== "jpg" &&
    $rozszerzenie !== "gif" &&
    $rozszerzenie !== "png") {
      return false;
    }

    // pobieramy rozmiary obrazka
    list($img_szer, $img_wys) = getimagesize($plik);

    // obliczamy proporcje boków
    $proporcje = $img_wys / $img_szer;

    // na tej podstawie obliczamy wysokość
    $wysokosc = $szerokosc * $proporcje;

    // tworzymy nowy obrazek o zadanym rozmiarze
    // korzystamy tu z funkcji biblioteki GD
    // która musi być dołączona do twojej instalacji PHP,
    // najpierw tworzymy canvas.
    $canvas = imagecreatetruecolor($szerokosc, $wysokosc);
    switch($rozszerzenie) {
      case "jpg":
      $org = imagecreatefromjpeg($plik);
      break;
      case "gif":
      $org = imagecreatefromgif($plik);
      break;
      case "png":
      $org = imagecreatefrompng($plik);
      break;
    }

    // kopiujemy obraz na nowy canvas
    imagecopyresampled($canvas, $org, 0, 0, 0, 0,$szerokosc, $wysokosc, $img_szer, $img_wys);
    //$canvas = imagerotate($canvas, 180, 0);

    // zapisujemy jako jpeg, jakość 70/100
    if(imagejpeg($canvas, $plik2, 70)) {
      return true;
    } else {
      return false;
    }
  }
  

}


?>
