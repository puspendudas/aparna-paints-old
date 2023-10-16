<?php
	session_start();
	unset($_SESSION['phone']);
    session_destroy();
	Header("Location:../index.php");
?>