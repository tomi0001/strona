<?php


class user {
public $user;
public $haslo;
public $typ;
public $zapamietywanie;
public $kolor;
  /*public function sprawdz_czy_zalogowany() {
    //$this->zaloguj(false);
    if (isset($_COOKIE["user"]) and isset($_COOKIE["haslo"]) and isset($_COOKIE["typ"] ) ) return true;
    else return false;
    
  }*/

  
  public function sprawdz_czy_jest_juz_taki_uzytkownik($login) {
    global $baza;
    $user = $baza->query("select login from user where login = '$login' ");
    $user2 = mysqli_fetch_array($user);
    if ($user2[0] == "") return true;
    else return false;
    
  }
  
  public function zaktualizuj_online() {
    global $baza;
    $login = $_COOKIE["user"];
    $data = time();
    $baza->query("update user set data_ostatniego = '$data'  where login = '$login' ");
  
  }
  
  
  public function dodaj_usera($login,$haslo) {
    //print $login . "<br>" . $haslo;
    global $baza;
    $data = time();
    $baza->query("insert into user (login,haslo,data,zablokowany) values ('$login','$haslo','$data','1')");
    
  }
  
    public function zaloguj($bool) {
      global $baza;
      if ( !isset($_POST['login']) or !isset($_POST['haslo']) or $_POST['login'] == "" or $_POST['haslo'] == "" ) return 3;
      if ( $_POST['login'] == login_admina and $_POST['haslo'] == haslo_admina) {
	$this->user = login_admina;
	$this->haslo = sha1(haslo_admina);
	$this->typ = "root";
	$this->zapamietywanie = $bool;
	$this->kolor = $this->ustaw_kolor();
	$this->utworz_cookie($this->zapamietywanie);
	return 4;
    }

      //w razie ataków typu SQL infection
      $this->user = mysql_escape_string($_POST['login']);
      $this->haslo = mysql_escape_string($_POST['haslo']); 
      //$this->haslo = mysql_escape_string(sha1($this->haslo));
      $this->zapamietywanie = $bool;
      $this->typ = "user";
      $login = $this->user;
      $haslo = sha1($this->haslo);
  
      $sprawdz = $baza->query("select login,haslo from user where login = '$login' and haslo = '$haslo' and zablokowany = '1' ");
      $sprawdz = mysqli_fetch_array($sprawdz);
      if ($sprawdz[0] == "") return 2;
      else {
	$this->user = $sprawdz[0];
	$this->haslo = $sprawdz[1];
	$this->zapamietywanie = $bool;
	$this->kolor = $this->ustaw_kolor();
	$this->utworz_cookie($this->zapamietywanie);
	return 1;
    }
    

  }
  
  public function dodaj_staty($co_robil) {
    global $baza;
    $user = "";
    if ($this->sprawdz_czy_zalogowany() == 0) $user = "anonim";
    else {
      $user = $_COOKIE["user"];
    }
    $ip = $_SERVER["REMOTE_ADDR"];
    $user_agent = $_SERVER["HTTP_USER_AGENT"];
    $os = new os;
    $os2 = $os->os($user_agent);
    $browser = $os->browser($user_agent);
    $data = time();
    $baza->query("insert into statystyki(ip,http_user,os,browser,data,user,co_robil) values('$ip','$user_agent','$os2','$browser','$data','$user','$co_robil')");
    
  }
  public function utworz_cookie($zapamietywanie) {
  
  //  if ( !isset($_POST['user']) or !isset($_POST['haslo']) or $_POST['user'] == "" or $_POST['haslo'] == "" ) return false;
  //w razie atakĂłw typu SQL infection
  //$this->user = addslashes($_POST['user']);
  //$this->haslo = addslashes($_POST['haslo']);
  //szyfruje hasĹo
  //$this->haslo = sha1($this->haslo);
  //ustawia cookie
  //$this->ustaw_kolor();
    if ($zapamietywanie == true) {
      setcookie("user",$this->user, time() + 3153600);
      setcookie("haslo",$this->haslo, time() + 3153600);
      setcookie("typ",$this->typ,time() + 3153600);
      setcookie("zapamietywanie",$this->zapamietywanie,time() + 3153600);
      setcookie("kolor",$this->kolor,time() + 3153600);
    }
    else {
      setcookie("user",$this->user, time() + 3600);
      setcookie("haslo",$this->haslo, time() + 3600);
      setcookie("typ",$this->typ,time() + 3600);  
      setcookie("zapamietywanie",$this->zapamietywanie,time() + 3600);
      setcookie("kolor",$this->kolor,time() + 3600);
    }
    return true;
  }
  
  public function wyloguj() {
    $this->user = "";
    $this->haslo = "";
    $this->typ = "";
    setcookie("user","", time()- 3153600);
    setcookie("haslo","", time()- 3153600);
    setcookie("typ","",time()- 3153600);
    setcookie("kolor","",time()- 3153600);
  }
  
    public function sprawdz_czy_zalogowany() {
    global $baza;
    if ( isset($_COOKIE['user']) or isset($_COOKIE['haslo']) or isset($_COOKIE['typ']) ) {
    $user = $_COOKIE['user'];
    $haslo = $_COOKIE['haslo'];
    $typ = $_COOKIE['typ'];
    $kolor = $_COOKIE['kolor'];
    if ( isset($_COOKIE["zapamietywanie"]) ) {
      $zapamietywanie = $_COOKIE['zapamietywanie'];
    }
    
    $this->user = $user;
    $this->haslo = $haslo;
    $this->typ = $typ;
    $this->kolor = $kolor;
    if ( isset($_COOKIE["zapamietywanie"]) ) {
      $this->zapamietywanie = $zapamietywanie;
    }
    
    
    
      if ( isset($user) and isset($haslo) and isset($typ) ) {
      $sprawdz = $baza->query("select login,haslo from user where login = '$user' and haslo = '$haslo' ");
      $sprawdz = mysqli_fetch_array($sprawdz);
      
	if ($sprawdz[0] != "") {
	  if ($this->zapamietywanie == true) {
	    $this->utworz_cookie(true);
	  }
	  else {
	    $this->utworz_cookie(false);
	  }
	return 1;
	}
	else if ( $user == login_admina and $haslo == sha1(haslo_admina) ) {
	  if ($this->zapamietywanie == true) $this->utworz_cookie(true);
	  else $this->utworz_cookie(false);
	  return 2;
	}
	else {
	  return 0;
	}
      }
    }
    
  }
  
  public function ustaw_kolor() {
    /*$liczba1 = rand(0,15);
    $liczba2 = rand(0,15);
    $liczba3 = rand(0,15);
    $liczba4 = rand(0,15);
    $liczba5 = rand(0,15);
    $liczba6 = rand(0,15);*/
    $liczba = array();
    //$liczba[1] = rand(0,15);
    //$liczba[2] = rand(0,15);
    //$liczba[3] = rand(0,15);
    //$liczba[4] = rand(0,15);
    //$liczba[5] = rand(0,15);
    //if ($liczba1 == 10 or $liczba2 == 10 or $liczba3 == 10 or $liczba4 == 10 or $liczba5 == 10 or $liczba6 == 10)
    for ($i = 0;$i <= 6;$i++) {
      $liczba[$i] = rand(0,15);
      if ($liczba[$i] == 10) $liczba[$i] = "A";
      if ($liczba[$i] == 11) $liczba[$i] = "B";
      if ($liczba[$i] == 12) $liczba[$i] = "C";
      if ($liczba[$i] == 13) $liczba[$i] = "D";
      if ($liczba[$i] == 14) $liczba[$i] = "E";
      if ($liczba[$i] == 15) $liczba[$i] = "F";
    }
    $this->kolor = $liczba[0] . $liczba[1] . $liczba[2] . $liczba[3] . $liczba[4] . $liczba[5];
    return $this->kolor;
  }
  
  public function zapisz_czat($wiadomosc) {
//    if ($this->kolor == "") {
//      $kolor = $this->ustaw_kolor();
    //}
    $this->sprawdz_czy_zalogowany();
    $plik = fopen("./czat.txt","a+");
    if ($this->user == "") {
      $user = "anonim";
    }
    else {
      $user = $this->user;
    }
    $kolor = $this->kolor;
    $tekst = "<font color=#$kolor>$user : </font>$wiadomosc" . "\n";
    fwrite($plik,$tekst);
  
  }
  
  
  
  
}




?>
