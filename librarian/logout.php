<?php
session_start();
include 'connection.php';
unset($_SESSION["librarian"]);
 ?>

<script type="text/javascript">
  window.location = "login.php";
</script>
