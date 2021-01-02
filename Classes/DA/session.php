<?php 
session_start();

class Session
{
   function session_set($key,$value) {
      $_SESSION[$key] = $value;
   }

   function session_get($key)
   {
      return isset($_SESSION[$key])?$_SESSION[$key]:false;
   }

   function session_delete($key)
   {
      if(isset($_SESSION[$key]))
         unset($_SESSION[$key]);
   }
}
?>