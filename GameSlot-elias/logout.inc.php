<?php
//session_cache_expire(5);
session_start();
session_unset();
session_destroy();
header("location: handler.php");
exit();
?>

