<?php
function connected(){
    if(session_status() === PHP_SESSION_NONE){ 
        session_status();
    }
  return !empty($_SERVER['connecte']);
  // empty(session_status());
}

function user_connect ()  {
    if(connected()){
        header("location: loading.php");
    exit();
    }
}