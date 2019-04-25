<?php

include 'fungsi.php';
session_unset();
session_destroy();
unset($_SESSION['id_admin']);
unset($_SESSION['nm_admin']);
unset($_SESSION['password']);
unset($_SESSION['username']);

header("Location: gas-auth.php");//use for the redirection to some page

?>

