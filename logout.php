<?php
//loguot and destroy session
session_start();
if(session_destroy())
{
header("Location: index.php");
// Main page

}
?>
