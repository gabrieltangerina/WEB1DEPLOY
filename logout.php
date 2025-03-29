<?php
session_start();
session_destroy();

setcookie("user_logged", "", time() - 3600, "/");

header("Location: index.php");
exit();
