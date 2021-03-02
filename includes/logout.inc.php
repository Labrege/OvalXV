<?php

session_start();
session_unset();
unset($_SESSION['useruid']);
session_destroy();

header("location: ../login.php");
exit();