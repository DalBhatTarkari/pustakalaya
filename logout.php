<?php
session_start();
$_SESSION=[];
session_destroy();
header("Location: /pustakalaya/roles/users/dash.php");
exit;
?>