<?php 
 session_start();
if(!isset($_SESSION['id_admin'])) {
    include("gas-auth.php");
 }
elseif(isset($_SESSION['id_admin'])){
    include("home.php");
     
}   
?>