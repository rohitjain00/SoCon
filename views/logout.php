<?php
session_start();
unset($_SESSION['sess_user']);
session_destroy();
echo"<script type='text/javascript'>location.href = '../views/login.php'</script>";
?>