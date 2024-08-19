<?php
include "banco.php";
session_destroy();
header("Location: index.php");
?>