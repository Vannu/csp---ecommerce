

<?php
session_start();
session_destroy();
print "<script>window.location='dashboard.php';</script>";
?>