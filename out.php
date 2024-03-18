<?php
session_start();
unset($_SESSION['prof']);
header('Location: index.php');

unset($_SESSION['admin']);
header('Location: index.php');
?>
