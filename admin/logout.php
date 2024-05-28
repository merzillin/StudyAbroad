<?php
session_unset();
session_destroy();
header("Location: ../guest/login.php");
exit();
?>
