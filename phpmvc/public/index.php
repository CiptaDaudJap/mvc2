<?php
  // tutup nya tdk usah karenahanya file php
  // tdk ada htmlnya
  // kita jalankan session nya di sini 
 // if ( !session_id() ){
 //      session_start();
 // }
if ( !session_id() ) session_start();

require_once '../app/init.php';

$app = new App;