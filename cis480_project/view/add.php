<?php
require_once('../model/keybind_db.php');
session_start();

$username = $_SESSION['id'];
$ability = $_POST['ability'];
$modifier = $_POST['modifier'];
$value = $_POST['value'];

KeybindDB::addKeybind(null, $ability, $value, $modifier, $username);
header('location:keybinds.php');
?>