<?php
session_unset();
session_destroy();
header("Location: ../guest/home.php");
exit();
?>
