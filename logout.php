<?php
session_start();

//Reset session variable
$_SESSION = [];

// Destroy session
session_destroy();

header("Location: index.php");