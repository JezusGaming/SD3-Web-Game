<?php
if(!session_id()) session_start();
$username = "test";
if(!isset($_SESSION['filename'])) {
    $_SESSION['filename'] = $username;
}
?>