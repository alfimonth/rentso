<?php
# Konek ke Web Server Lokal
$myHost  = "localhost";
$myUser  = "root";
$myPass  = "";
$myDbs  = "rentso_db";

$koneksidb = mysqli_connect($myHost, $myUser, $myPass, $myDbs);
if (!$koneksidb) {
  echo "Failed Connection !";
}
