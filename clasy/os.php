<?php


class os {


  function os($text) {
    //$text = $_SERVER["HTTP_USER_AGENT"];
    $text = strtolower($text);
    if ( strstr($text,"android") ) return "Linux Android";
    else if ( strstr($text,"linux") ) return "Linux";
    else if ( strstr($text,"windows nt 6.2") ) return "Windows 8";
    else if ( strstr($text,"windows nt 6.3") ) return "Windows 8.1";
    else if ( strstr($text,"windows nt 10") ) return "Windows 10";
    else if ( strstr($text,"windows nt 6.1") ) return "Windows 7";
    
    
    else if ( strstr($text,"windows nt 6.2") ) return "Windows 8";
    
    else if ( strstr($text,"windows nt 5.1") ) return "Windows XP";

    else if ( strstr($text,"windows nt 5.0") ) return "Windows 2000";

    else if ( strstr($text,"windows nt 5.2") ) return "Windows 2003 Server";

    else if ( strstr($text,"windows nt 6.0") ) return "Windows Vista";

    else if ( strstr($text,"windows nt 4") ) return "Windows NT 4";

    else if ( ( strstr($text,"win98") ) or ( strstr($text,"windows 98") ) ) return "Windows 98";

    else if ( ( strstr($text,"win95") ) or ( strstr($text,"windows 95") ) ) return "Windows 95";

    else if ( strstr($text,"win9x4.9") ) return "Windows ME";

    else if ( strstr($text,"freebsd") ) return "FreeBSD";

    else if ( strstr($text,"desktopbsd") ) return "DesktopBSD";

    else if ( strstr($text,"solaris") ) return "Solaris";

    else if ( strstr($text,"netbsd") ) return "NetBSD";
    else if ( strstr($text,"qnx") ) return "QNX";

    else if ( strstr($text,"mac os") or strstr($text,"macos") )   return "Mac OS";

    else return "Nieznany";

  }



  //funckja, która sprawdza jaką przeglądarke ma klient
  function browser($text) {
    //$text = $_SERVER["HTTP_USER_AGENT"];
    $text = strtolower($text);
    if ( strstr($text,"opera") ) return "Opera";

    else if ( strstr($text,"firefox") ) return "Mozilla Firefox";

    else if ( strstr($text,"msie") ) return "Internet Exploler";
    else if ( strstr($text,"applewebkit") ) return "AppleWebKit";

    else if ( strstr($text,"links") ) return "Links";
    
    else if ( strstr($text,"chrome") ) return "Chrome";

    else if ( strstr($text,"konqueror") ) return "Konqueror";

    else return "Nieznana";

  }




}


?>
